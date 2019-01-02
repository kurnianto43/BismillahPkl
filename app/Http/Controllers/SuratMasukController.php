<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use PDF;

class SuratMasukController extends Controller
{
    public function index()
    {

    	$suratmasuks = SuratMasuk::all();
    	return view('suratmasuk.indexsuratmasuk', compact('suratmasuks'));
    }

    public function create()
    {
    	return view('suratmasuk.tambahdata');
    }

    public function store()
    {
    	SuratMasuk::create([
    		'nomor_surat' => request('nomor_surat'),
            'unit_kerja' => request('unit_kerja'),
            'perihal' => request('perihal'),
    		'tanggal_surat' => request('tanggal_surat'),
    		'tanggal_diterima' => request('tanggal_diterima'),
            'lampiran' => request('lampiran'),
    	]);
    	return redirect('surat-masuk');
    }

    public function pdf()
    {
    	$suratmasuks = SuratMasuk::all();
    	$pdf = PDF::loadView('suratmasuk.pdf', compact('suratmasuks'));
    	return $pdf->download('suratmasuk.pdf', compact('suratmasuks'));
    }
}
