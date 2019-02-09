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

    public function store(Request $request)
    {

        $path = $request->file('lampiran')->store('lampiran_surat_keluar');

    	SuratKeluar::create([
    		'nomor_surat' => request('nomor_surat'),
    		'instansi_id' => request('instansi_id'),
    		'perihal' => request('perihal'),
    		'tanggal_surat' => request('tanggal_surat'),
    		'tanggal_kirim' => request('tanggal_kirim'),
    		'lampiran' => $path,
    	]);

    	return redirect()->route('suratkeluar.index')->with('success', 'Berhasil');
    }


    public function details(SuratKeluar $suratkeluar)
    {

        return view('suratkeluar.detailsuratkeluar', compact('suratkeluar'));
    }



    public function response(SuratKeluar $suratkeluar)
    {
        return Storage::response($suratkeluar->lampiran);
    } 

    public function edit(SuratKeluar $suratkeluar)
    {
        $instansis = Instansi::all();
        return view('suratkeluar.edit', compact('suratkeluar', 'instansis'));
    }

    public function update(Request $request, SuratKeluar $suratkeluar)
    {
        $suratkeluar->update([
            'nomor_surat' => request('nomor_surat'),
            'instansi_id' => request('instansi_id'),
            'perihal' => request('perihal'),
            'tanggal_surat' => request('tanggal_surat'),
            'tanggal_kirim' => request('tanggal_kirim'),
            'lampiran' => request()->file('lampiran')->store('lampiran_surat_keluar')
        ]);

        return redirect()->route('suratkeluar.index')->with('success', 'Data berhasil diubah');
    }


    public function destroy(SuratKeluar $suratkeluar)
    {
        $suratkeluar->delete();

        return redirect()->route('suratkeluar.index')->with('success', 'Data berhasil dihapus');
    }
}
