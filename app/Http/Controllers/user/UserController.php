<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\ProfilSiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.index', [
            'title' => 'Dashboard',
            'profil_siswa' => ProfilSiswaModel::where('id', Auth::user()->siswa_id)->first()
        ]);
    }
}
