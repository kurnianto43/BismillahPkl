<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
    	return view('suratkeluar.index');
    }

    public function create()
    {
    	return view('suratkeluar.tambahdata');
    }
}
