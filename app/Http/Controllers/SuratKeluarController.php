<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKeluar;
use App\Instansi;

class SuratKeluarController extends Controller
{
    public function index()
    {
    	$suratkeluars = SuratKeluar::all();
    	return view('suratkeluar.index', compact('suratkeluars'));
    }

    public function create()
    {
    	$instansis = Instansi::all();
    	return view('suratkeluar.tambahdata', compact('instansis'));
    }

    public function store()
    {
    	SuratKeluar::create([
    		'nomor_surat' => request('nomor_surat'),
    		'instansi_id' => request('instansi_id'),
    		'perihal' => request('perihal'),
    		'tanggal_surat' => request('tanggal_surat'),
    		'tanggal_kirim' => request('tanggal_kirim'),
    		'lampiran' => request('lampiran')
    	]);

    	return redirect()->route('instansi.index')->with('success', 'Berhasil');
    } 
}
