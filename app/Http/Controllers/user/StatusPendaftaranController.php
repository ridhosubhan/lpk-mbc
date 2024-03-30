<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\PembayaranSppModel;
use App\Models\ProfilSiswaModel;
use App\Models\TagihanPembayaranModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use PDF;

class StatusPendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('user.status-pendaftaran.index',  [
            'title' => 'Status Pendaftaran',
            'profil_siswa' => ProfilSiswaModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'tagihan' => TagihanPembayaranModel::join('setting_pembayaran', 'setting_pembayaran.id', '=', 'tagihan_pembayaran.setting_pembayaran_id')
                ->get([
                    'tagihan_pembayaran.id as spp_id', 'tagihan_pembayaran.siswa_id',
                    'tagihan_pembayaran.setting_pembayaran_id', 'tagihan_pembayaran.bulan_tagihan', 'tagihan_pembayaran.is_active',
                    'setting_pembayaran.id as tagihan_id', 'setting_pembayaran.keterangan', 'setting_pembayaran.nominal'
                ])
                ->where('siswa_id', Auth::user()->siswa_id)
                ->where('is_active', 'y')
                ->first(),
        ]);
    }

    function unggah_bukti_bayar(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'file_bukti' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
            ],
            [

                'file_bukti.required' => 'Wajib diisi',
                'file_bukti.mimes' => 'Mohon upload file dengan ekstensi png,jpg,jpeg',
                'file_bukti.max' => 'File terlalu besar',
            ]
        );

        if (!$validator->passes()) {
            return response()->json([
                'status' => 0,
                'error' => $validator->errors()
            ]);
        } else {
            $pembayaran_spp = PembayaranSppModel::create([
                'spp_id' => $request->input('spp_id'),
                'siswa_id' => Auth::user()->siswa_id,
                'bulan_bayar' => date('m'),
                'tanggal_bayar' => \Carbon\Carbon::now()->toDateTimeString(),
                'tagihan_id' => $request->input('tagihan_id'),
                'bukti_transfer' => $request->file('file_bukti')->store('transfers'),
            ]);

            $update = TagihanPembayaranModel::where('id', $request->input('spp_id'))->update([
                'is_active' => 'process',
            ]);

            if ($pembayaran_spp) {
                return response()->json([
                    'status' => 1,
                    'success' => 'Berhasil Unggah Bukti Pembayaran'
                ]);
            }
        }
    }

    function cetak_pdf()
    {
        $student = ProfilSiswaModel::join('tagihan_pembayaran', 'tagihan_pembayaran.siswa_id', '=', 'profil_siswa.id')
            ->join('setting_pembayaran', 'setting_pembayaran.id', '=', 'tagihan_pembayaran.setting_pembayaran_id')
            ->leftJoin('pembayaran_spp', 'pembayaran_spp.siswa_id', '=', 'profil_siswa.id')
            ->get([
                'profil_siswa.id as siswa_id', 'profil_siswa.nama as nama_siswa',
                'profil_siswa.tempat_lahir', 'profil_siswa.tanggal_lahir',
                'profil_siswa.jenis_kelamin', 'profil_siswa.alamat',
                'profil_siswa.foto', 'profil_siswa.status_daftar',
                'profil_siswa.status_daftar', 'profil_siswa.email_user',

                'tagihan_pembayaran.id as spp_id', 'tagihan_pembayaran.siswa_id',
                'tagihan_pembayaran.setting_pembayaran_id', 'tagihan_pembayaran.bulan_tagihan',
                'tagihan_pembayaran.is_active',

                'setting_pembayaran.id as tagihan_id', 'setting_pembayaran.keterangan',
                'setting_pembayaran.nominal',

                'pembayaran_spp.tanggal_bayar', 'pembayaran_spp.bukti_transfer'
            ])
            ->where('siswa_id', Auth::user()->siswa_id)
            ->first();

        $hari_ini = Carbon::now()->isoFormat('D MMMM Y');
        $tahun = Carbon::now()->isoFormat('Y');

        $pdf = PDF::loadview('user.status-pendaftaran.cetak-kartu',  [
            'student' => $student,
            'tanggal' => $hari_ini,
            'tahun' => $tahun
        ]);
        $pdf->set_paper('A4', 'potrait');
        $pdf->render();

        // return $pdf->download('cetak-kartu.pdf');
        return $pdf->stream("", array("Attachment" => false));
    }
}
