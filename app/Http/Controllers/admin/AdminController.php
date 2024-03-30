<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPegawaiModel;
use App\Models\ProfilSiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'jumlah_siswa' => ProfilSiswaModel::where('status_daftar', '=', 'diterima')
                ->count(),
            'jumlah_guru' => ProfilPegawaiModel::where('kat_pegawai', '=', 'guru')
                ->count(),
            'jumlah_tenaga_pendidik' => ProfilPegawaiModel::where('kat_pegawai', '=', 'tenaga_pendidik')
                ->count(),
        ]);
    }
}
