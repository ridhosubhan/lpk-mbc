<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPegawaiModel;
use App\Models\SettingPembayaranModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReferensiPembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.referensi-pembayaran.index', [
            'title' => 'Referensi Pembayaran',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data_ref_pembayaran' => SettingPembayaranModel::all()
        ]);
    }

    function create()
    {
        return view('admin.referensi-pembayaran.create', [
            'title' => 'Referensi Pembayaran',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
        ]);
    }

    function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'required',
                'nominal' => 'required',
                'keterangan' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'nominal.required' => 'Wajib diisi',
                'keterangan.required' => 'Wajib diisi',
            ]
        );

        $ref_pembayaran = SettingPembayaranModel::create([
            'nama' => $request->input('nama'),
            'nominal' => $request->input('nominal'),
            'tahun_id' => date("Y"),
            'keterangan' => $request->input('keterangan'),
        ]);

        if ($ref_pembayaran) {
            return redirect('/admin/referensi-pembayaran')->with('sukses', 'Berhasil Tambah Data!');
        }
    }

    function edit($id)
    {
        return view('admin.referensi-pembayaran.edit', [
            'title' => 'Referensi Pembayaran',
            'profil_admin' => ProfilPegawaiModel::where('id', Auth::user()->siswa_id)
                ->first(),
            'data' => SettingPembayaranModel::where('id', $id)->first()
        ]);
    }

    function update(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nama' => 'required',
                'nominal' => 'required',
                'keterangan' => 'required',
            ],
            [
                'nama.required' => 'Wajib diisi',
                'nominal.required' => 'Wajib diisi',
                'keterangan.required' => 'Wajib diisi',
            ]
        );

        $ref_pembayaran = SettingPembayaranModel::where('id', $request->input('id_ref'))->update([
            'nama' => $request->input('nama'),
            'nominal' => $request->input('nominal'),
            'tahun_id' => date("Y"),
            'keterangan' => $request->input('keterangan'),
        ]);
        if ($ref_pembayaran) {
            return redirect('/admin/referensi-pembayaran')->with('sukses', 'Berhasil Edit Data!');
        }
    }

    function destroy(Request $request)
    {
        if ($request->ajax()) {
            $ref_pembayaran =  SettingPembayaranModel::where('id', $request->input('id_ref'))->delete();

            if ($ref_pembayaran) {
                return response()->json([
                    'status' => 1,
                    'data' => 'Berhasil Hapus'
                ]);
            }
        }
    }
}
