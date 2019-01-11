<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratMasuk;
use PDF;
use Storage;

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

    public function store(Request $request)
    {

    	$path = $request->file('lampiran')->store('lampiran_surat_masuk');

        SuratMasuk::create([
            'nomor_surat' => request('nomor_surat'),
            'unit_kerja' => request('unit_kerja'),
            'perihal' => request('perihal'),
            'tanggal_surat' => request('tanggal_surat'),
            'tanggal_diterima' => request('tanggal_diterima'),
            'lampiran' => $path,
        ]);

        return redirect('surat-masuk');
    }


    public function details(Suratmasuk $suratmasuk)
    {

        return view('suratmasuk.detailsuratmasuk', compact('suratmasuk'));
    }


    public function response(Suratmasuk $suratmasuk)
    {
        return Storage::response($suratmasuk->lampiran);
    }

    public function pdf()
    {
    	$suratmasuks = SuratMasuk::all();
    	$pdf = PDF::loadView('suratmasuk.pdf', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
    	return $pdf->download('suratmasuk.pdf', compact('suratmasuks'));
    }
}
