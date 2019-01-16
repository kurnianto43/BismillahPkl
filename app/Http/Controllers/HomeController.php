<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use App\SuratKeluar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $suratmasukCount = SuratMasuk::count();
        $suratkeluarCount = SuratKeluar::count();
        return view('home.beranda', compact('suratmasukCount', 'suratkeluarCount'));
    }

    public function setting()
    {
        return view('users.sementara');
    }
}
