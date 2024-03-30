<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
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
        return view('user.keuangan.index', [
            'title' => 'Keuangan',
            'profil_siswa' => ProfilSiswaModel::where('id', Auth::user()->siswa_id)
                ->first(),

            'data_log_tagihan' => ProfilSiswaModel::join('tagihan_pembayaran', 'tagihan_pembayaran.siswa_id', '=', 'profil_siswa.id')
                ->join('setting_pembayaran', 'tagihan_pembayaran.setting_pembayaran_id', '=', 'setting_pembayaran.id')
                ->where('tagihan_pembayaran.is_active', 'y')
                ->where('profil_siswa.id', Auth::user()->siswa_id)
                ->get([
                    'profil_siswa.id as siswa_id', 'profil_siswa.nama as nama_siswa',

                    'tagihan_pembayaran.id as tagihan_id',
                    'tagihan_pembayaran.bulan_tagihan',

                    'setting_pembayaran.id as setting_pembayaran_id', 'setting_pembayaran.keterangan',
                    'setting_pembayaran.nominal',
                ]),

            'data_log_pembayaran' => ProfilSiswaModel::join('pembayaran_spp', 'pembayaran_spp.siswa_id', '=', 'profil_siswa.id')
                ->join('setting_pembayaran', 'pembayaran_spp.tagihan_id', '=', 'setting_pembayaran.id')
                ->where('pembayaran_spp.lunas', 'y')
                ->where('profil_siswa.id', Auth::user()->siswa_id)
                ->get([
                    'profil_siswa.id as siswa_id', 'profil_siswa.nama as nama_siswa',

                    'pembayaran_spp.id as pembayaran_id', 'pembayaran_spp.spp_id',
                    'pembayaran_spp.tanggal_bayar', 'pembayaran_spp.lunas',

                    'setting_pembayaran.id as setting_pembayaran_id', 'setting_pembayaran.keterangan',
                    'setting_pembayaran.nominal',
                ])
        ]);
    }
}
