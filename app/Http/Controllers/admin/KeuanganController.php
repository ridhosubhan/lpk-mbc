<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PembayaranSppModel;
use App\Models\ProfilPegawaiModel;
use App\Models\ProfilSiswaModel;
use App\Models\SettingPembayaranModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.keuangan.index', [
            'title' => 'Keuangan',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'total_pembayaran_siswa' => SettingPembayaranModel::selectRaw('sum(setting_pembayaran.nominal) AS uang_total')
                ->join('pembayaran_spp', 'pembayaran_spp.tagihan_id', '=', 'setting_pembayaran.id')
                ->where('pembayaran_spp.lunas', 'y')
                ->groupBy('setting_pembayaran.id')
                ->first(),
            'data_log_pemasukan' => ProfilSiswaModel::join('pembayaran_spp', 'pembayaran_spp.siswa_id', '=', 'profil_siswa.id')
                ->join('setting_pembayaran', 'pembayaran_spp.tagihan_id', '=', 'setting_pembayaran.id')
                ->where('pembayaran_spp.lunas', 'y')
                ->get([
                    'profil_siswa.id as siswa_id', 'profil_siswa.nama as nama_siswa',

                    'pembayaran_spp.id as pembayaran_id', 'pembayaran_spp.spp_id',
                    'pembayaran_spp.tanggal_bayar', 'pembayaran_spp.lunas',

                    'setting_pembayaran.id as setting_pembayaran_id', 'setting_pembayaran.keterangan',
                    'setting_pembayaran.nominal',
                ])
                ->sortDesc()
        ]);
    }
}
