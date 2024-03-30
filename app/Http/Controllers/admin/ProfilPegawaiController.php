<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPegawaiModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilPegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.profil.pegawai.index', [
            'title' => 'Profil Pegawai',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_pegawai' => ProfilPegawaiModel::all()->sortDesc()
        ]);
    }

    function edit($id)
    {
        return view('admin.profil.pegawai.edit', [
            'title' => 'Edit Profil Pegawai',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_pegawai' => ProfilPegawaiModel::where('id', $id)->first(),
        ]);
    }

    function update(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'alamat' => 'required',
                'foto' => 'mimes:png,jpg,jpeg|max:2048',
                'jabatan' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'tempat_lahir.required' => 'Wajib diisi',
                'tanggal_lahir.required' => 'Wajib diisi',
                'jenis_kelamin.required' => 'Wajib diisi',
                'alamat.required' => 'Wajib diisi',
                'jabatan.required' => 'Wajib diisi',

                'foto.required' => 'Wajib diisi',
                'foto.mimes' => 'Mohon upload file dengan ekstensi png,jpg,jpeg',
                'foto.max' => 'File terlalu besar',
            ]
        );

        // update tanpa file
        if (empty($request->file('foto'))) {
            $update_pegawai = ProfilPegawaiModel::where('id', $request->input('id_pegawai'))->update([
                'nama' => $request->input('nama'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
                'kat_pegawai' => $request->input('jabatan'),
            ]);

            if ($update_pegawai) {
                return redirect('/admin/profil-pegawai')->with('sukses', 'Berhasil Edit Data!');
            }
        }
        // upda
        else if (!empty($request->file('foto'))) {
            $get_pegawai = ProfilPegawaiModel::where('id', $request->input('id_pegawai'))->first();
            if (!empty($get_pegawai->foto)) {
                if (Storage::exists($get_pegawai->foto)) {
                    $unlink_file = Storage::delete($get_pegawai->foto);
                }
                $update_pegawai = ProfilPegawaiModel::where('id', $request->input('id_pegawai'))->update([
                    'nama' => $request->input('nama'),
                    'tempat_lahir' => $request->input('tempat_lahir'),
                    'tanggal_lahir' => $request->input('tanggal_lahir'),
                    'jenis_kelamin' => $request->input('jenis_kelamin'),
                    'alamat' => $request->input('alamat'),
                    'foto' => $request->file('foto')->store('images'),
                    'kat_pegawai' => $request->input('jabatan'),
                ]);
                if ($update_pegawai) {
                    return redirect('/admin/profil-pegawai')->with('sukses', 'Berhasil Edit Data!');
                }
            }
        }
    }

    function destroy(Request $request)
    {
        if ($request->ajax()) {
            $get_pegawai = ProfilPegawaiModel::where('id', $request->input('siswa_id'))->first();
            if (!empty($get_pegawai->foto)) {
                if (Storage::exists($get_pegawai->foto)) {
                    $unlink_file = Storage::delete($get_pegawai->foto);
                }
            }

            $delete_profil_pegawai =  ProfilPegawaiModel::where('id', $request->input('pegawai_id'))->delete();
            $delete_users =  User::where('siswa_id', $request->input('pegawai_id'))->delete();

            if ($delete_profil_pegawai || $delete_users) {
                return response()->json([
                    'status' => 1,
                    'data' => 'Berhasil Hapus'
                ]);
            }
        }
    }
}
