<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PembayaranSppModel;
use App\Models\ProfilSiswaModel;
use App\Models\ProfilPegawaiModel;
use App\Models\TagihanPembayaranModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PDF;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('admin.pendaftaran.index',  [
            'title' => 'Pendaftaran',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_pendaftar' => ProfilSiswaModel::leftJoin('tagihan_pembayaran', 'tagihan_pembayaran.siswa_id', '=', 'profil_siswa.id')
                ->leftJoin('setting_pembayaran', 'setting_pembayaran.id', '=', 'tagihan_pembayaran.setting_pembayaran_id')
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

                    'pembayaran_spp.id as pembayaran_spp_id', 'pembayaran_spp.tanggal_bayar', 'pembayaran_spp.bukti_transfer'
                ])->sortDesc()
        ]);
    }

    function detail_pendaftar(Request $request)
    {
        if ($request->ajax()) {
            $pendaftar = ProfilSiswaModel::join('tagihan_pembayaran', 'tagihan_pembayaran.siswa_id', '=', 'profil_siswa.id')
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
                ->where('siswa_id', $request->input('siswa_id'))
                ->first();

            return response()->json([
                'status' => 1,
                'data' => $pendaftar
            ]);
        }
    }

    function terima_pendaftar(Request $request)
    {
        if ($request->ajax()) {
            $update_siswa = ProfilSiswaModel::where('id', $request->input('siswa_id'))->update([
                'status_daftar' => 'diterima',
            ]);
            $update_pembayaran_spp = PembayaranSppModel::where('id', $request->input('pembayaran_spp_id'))->update([
                'lunas' => 'y',
            ]);
            $update_tagihan_pembayaran = TagihanPembayaranModel::where('id', $request->input('tagihan_pembayaran_id'))->update([
                'is_active' => 'n',
            ]);

            if ($update_siswa  && $update_pembayaran_spp && $update_tagihan_pembayaran) {
                return response()->json([
                    'status' => 1,
                    'data' => 'Siswa diterima'
                ]);
            }
        }
    }

    function tolak_pendaftar(Request $request)
    {
        if ($request->ajax()) {

            $update_siswa = ProfilSiswaModel::where('id', $request->input('siswa_id'))->update([
                'status_daftar' => 'ditolak',
            ]);

            $get_pembayaran_spp = PembayaranSppModel::where('id', $request->input('pembayaran_spp_id'))->first();
            if (!empty($get_pembayaran_spp->bukti_transfer)) {
                if (Storage::exists($get_pembayaran_spp->bukti_transfer)) {
                    $unlink_file = Storage::delete($get_pembayaran_spp->bukti_transfer);
                }
            }
            $delete_pembayaran_spp = PembayaranSppModel::where('id', $request->input('pembayaran_spp_id'))->delete();

            $delete_tagihan_pembayaran = TagihanPembayaranModel::where('id', $request->input('tagihan_pembayaran_id'))->delete();

            if ($update_siswa  && $delete_pembayaran_spp && $delete_tagihan_pembayaran) {
                return response()->json([
                    'status' => 1,
                    'data' => 'Siswa ditolak'
                ]);
            }
        }
    }

    function cetak_pdf($siswa_id)
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
            ->where('siswa_id', $siswa_id)
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
