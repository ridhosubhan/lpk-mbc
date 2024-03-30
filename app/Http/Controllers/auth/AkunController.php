<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\ProfilPegawaiModel;
use App\Models\ProfilSiswaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.akun.index', [
            'title' => 'Akun',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'profil_siswa' => ProfilSiswaModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_user' => User::where('id', Auth::user()->id)->first(),
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

        $update_password = User::where('id', Auth::user()->id)->update([
            'password' => bcrypt($request->input('password_new')),
        ]);

        if ($update_password) {
            return redirect('/' . Auth::user()->role . '/akun')->with('sukses', 'Berhasil Ganti Password!');
        }
    }
}
