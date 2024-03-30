<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $data["title"] = "LKP Mulya Bhakti Computer";
        return view('landing-page', $data);
    }
}
