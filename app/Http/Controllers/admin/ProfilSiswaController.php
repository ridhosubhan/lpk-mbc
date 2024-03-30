<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PembayaranSppModel;
use App\Models\ProfilPegawaiModel;
use App\Models\ProfilSiswaModel;
use App\Models\TagihanPembayaranModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilSiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.profil.siswa.index', [
            'title' => 'Profil Siswa',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_siswa' => ProfilSiswaModel::all()->sortDesc()
        ]);
    }

    function edit($id)
    {
        return view('admin.profil.siswa.edit', [
            'title' => 'Edit Profil Siswa',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_siswa' => ProfilSiswaModel::where('id', $id)->first(),
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
            ],
            [
                'nama.required' => 'Wajib diisi',
                'tempat_lahir.required' => 'Wajib diisi',
                'tanggal_lahir.required' => 'Wajib diisi',
                'jenis_kelamin.required' => 'Wajib diisi',
                'alamat.required' => 'Wajib diisi',

                'foto.required' => 'Wajib diisi',
                'foto.mimes' => 'Mohon upload file dengan ekstensi png,jpg,jpeg',
                'foto.max' => 'File terlalu besar',
            ]
        );

        // update tanpa file
        if (empty($request->file('foto'))) {
            $update_siswa = ProfilSiswaModel::where('id', $request->input('id_siswa'))->update([
                'nama' => $request->input('nama'),
                'tempat_lahir' => $request->input('tempat_lahir'),
                'tanggal_lahir' => $request->input('tanggal_lahir'),
                'jenis_kelamin' => $request->input('jenis_kelamin'),
                'alamat' => $request->input('alamat'),
            ]);

            if ($update_siswa) {
                return redirect('/admin/profil-siswa')->with('sukses', 'Berhasil Edit Data!');
            }
        }
        // update dengan file
        else if (!empty($request->file('foto'))) {
            $get_siswa = ProfilSiswaModel::where('id', $request->input('id_siswa'))->first();
            if (!empty($get_siswa->foto)) {
                if (Storage::exists($get_siswa->foto)) {
                    $unlink_file = Storage::delete($get_siswa->foto);
                }
                $update_siswa = ProfilSiswaModel::where('id', $request->input('id_siswa'))->update([
                    'nama' => $request->input('nama'),
                    'tempat_lahir' => $request->input('tempat_lahir'),
                    'tanggal_lahir' => $request->input('tanggal_lahir'),
                    'jenis_kelamin' => $request->input('jenis_kelamin'),
                    'alamat' => $request->input('alamat'),
                    'foto' => $request->file('foto')->store('images'),
                ]);
                if ($update_siswa) {
                    return redirect('/admin/profil-siswa')->with('sukses', 'Berhasil Edit Data!');
                }
            }
        }
    }

    function destroy(Request $request)
    {
        if ($request->ajax()) {
            $get_siswa = ProfilSiswaModel::where('id', $request->input('siswa_id'))->first();
            if (!empty($get_siswa->foto)) {
                if (Storage::exists($get_siswa->foto)) {
                    $unlink_file = Storage::delete($get_siswa->foto);
                }
            }

            $get_pembayaran_spp = PembayaranSppModel::where('siswa_id', $request->input('siswa_id'))->first();
            foreach ($get_pembayaran_spp as $row) {
                if (Storage::exists($row->bukti_transfer)) {
                    $unlink_file = Storage::delete($row->bukti_transfer);
                }
            }

            $delete_pembayaran_spp =  PembayaranSppModel::where('siswa_id', $request->input('siswa_id'))->delete();
            $delete_tagihan_pembayaran =  TagihanPembayaranModel::where('siswa_id', $request->input('siswa_id'))->delete();
            $delete_profil_siswa =  ProfilSiswaModel::where('id', $request->input('siswa_id'))->delete();
            $delete_users =  User::where('siswa_id', $request->input('siswa_id'))->delete();

            if ($delete_pembayaran_spp  || $delete_tagihan_pembayaran || $delete_profil_siswa || $delete_users) {
                return response()->json([
                    'status' => 1,
                    'data' => 'Berhasil Hapus'
                ]);
            }
        }
    }
}
