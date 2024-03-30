<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPegawaiModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.users.index', [
            'title' => 'Users',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_pegawai' => User::join('profil_pegawai', 'users.siswa_id', '=', 'profil_pegawai.id')
                ->get([
                    'users.id as user_id',
                    'users.name as name',
                    'users.email as user_email',
                    'users.role',

                    'profil_pegawai.id as pegawai_id',
                    'profil_pegawai.nama as nama',
                    'profil_pegawai.tempat_lahir',
                    'profil_pegawai.tanggal_lahir',
                    'profil_pegawai.jenis_kelamin',
                    'profil_pegawai.alamat',
                    'profil_pegawai.foto',
                    'profil_pegawai.kat_pegawai'
                ])->sortDesc(),
            'data_siswa' => User::join('profil_siswa', 'users.siswa_id', '=', 'profil_siswa.id')
                ->get([
                    'users.id as user_id',
                    'users.name as name',
                    'users.email as user_email',
                    'users.role',

                    'profil_siswa.id as pegawai_id',
                    'profil_siswa.nama as nama',
                    'profil_siswa.tempat_lahir',
                    'profil_siswa.tanggal_lahir',
                    'profil_siswa.jenis_kelamin',
                    'profil_siswa.alamat',
                    'profil_siswa.foto',
                ])->sortDesc(),
        ]);
    }

    function edit($user_id)
    {
        return view('admin.users.edit', [
            'title' => 'Edit Users',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_pegawai' => User::join('profil_pegawai', 'users.siswa_id', '=', 'profil_pegawai.id')
                ->get([
                    'users.id as user_id',
                    'users.name as name',
                    'users.email as user_email',
                    'users.role',

                    'profil_pegawai.id as pegawai_id',
                    'profil_pegawai.nama as nama',
                    'profil_pegawai.tempat_lahir',
                    'profil_pegawai.tanggal_lahir',
                    'profil_pegawai.jenis_kelamin',
                    'profil_pegawai.alamat',
                    'profil_pegawai.foto',
                    'profil_pegawai.kat_pegawai'
                ])->where('user_id', $user_id)
                ->first(),
        ]);
    }

    function edit_siswa($user_id)
    {
        return view('admin.users.edit-siswa', [
            'title' => 'Edit Users',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_siswa' => User::join('profil_siswa', 'users.siswa_id', '=', 'profil_siswa.id')
                ->get([
                    'users.id as user_id',
                    'users.name as name',
                    'users.email as user_email',
                    'users.role',

                    'profil_siswa.id as pegawai_id',
                    'profil_siswa.nama as nama',
                    'profil_siswa.tempat_lahir',
                    'profil_siswa.tanggal_lahir',
                    'profil_siswa.jenis_kelamin',
                    'profil_siswa.alamat',
                    'profil_siswa.foto',
                ])->where('user_id', $user_id)
                ->first(),
        ]);
    }

    function update(Request $request)
    {
        $validatedData = $request->validate(
            [
                'password_new' => 'required',
            ],
            [
                'password_new.required' => 'Wajib diisi',
            ]
        );

        $update_password = User::where('email', $request->input('email'))->update([
            'password' => bcrypt($request->input('password_new')),
        ]);

        if ($update_password) {
            return redirect('/admin/users')->with('sukses', 'Berhasil Ganti Password!');
        }
    }
}
