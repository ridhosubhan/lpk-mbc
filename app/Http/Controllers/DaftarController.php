<?php

namespace App\Http\Controllers;

use App\Models\ProfilSiswaModel;
use App\Models\SettingPembayaranModel;
use App\Models\TagihanPembayaranModel;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    function index()
    {
        $data["title"] = "Daftar - LKP Mulya Bhakti Computer";
        return view('daftar-siswa',  $data);
    }

    function proses_daftar(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama_lengkap' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'foto' => 'required|mimes:png,jpg,jpeg|max:2048',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ],
            [
                'nama_lengkap.required' => 'Wajib diisi',
                'tempat_lahir.required' => 'Wajib diisi',
                'tanggal_lahir.required' => 'Wajib diisi',
                'jenis_kelamin.required' => 'Wajib diisi',
                'alamat.required' => 'Wajib diisi',

                'foto.required' => 'Wajib diisi',
                'foto.mimes' => 'Mohon upload file dengan ekstensi png,jpg,jpeg',
                'foto.max' => 'File terlalu besar',

                'email.required' => 'Wajib diisi',
                'email.email' => 'Format email tidak valid',
                'email.unique' => 'Email sudah terdaftar',

                'password.required' => 'Wajib diisi',
            ]
        );

        $user = User::create([
            'name' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => 'user',
        ]);

        $profil_siswa = ProfilSiswaModel::create([
            'nama' => $request->input('nama_lengkap'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'foto' => $request->file('foto')->store('images'),
            'email_user' => $request->input('email')
        ]);

        $setting_bayar = SettingPembayaranModel::where('nama', 'bayar_full')->first();

        if ($user && $profil_siswa) {
            $siswa_id = ProfilSiswaModel::where('email_user', $request->input('email'))->first();

            $update_user = User::where('email', $request->input('email'))->update([
                'siswa_id' => $siswa_id->id,
            ]);

            $tagihan = TagihanPembayaranModel::create([
                'siswa_id' => $siswa_id->id,
                'setting_pembayaran_id' => $setting_bayar->id,
                'bulan_tagihan' => date('m'),
            ]);
            if ($tagihan) {
                return redirect('/daftar')->with('sukses', 'Berhasil Daftar!');
            }
        }
    }
}
