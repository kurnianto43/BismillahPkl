<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuratmasukStoreRequest;
use App\SuratMasuk;
use PDF;
use Storage;
use Illuminate\Validation\Rule;

class SuratMasukController extends Controller
{


    public function index()
    {

    	$suratmasuks = SuratMasuk::all();
    	return view('suratmasuk.indexsuratmasuk', compact('suratmasuks'));
    }



    public function create(Suratmasuk $suratmasuk)
    {

    	return view('suratmasuk.tambahdata', compact('suratmasuk'));
    }



    public function store(SuratmasukStoreRequest $request)
    {

       $validated = $request->validated();

    	$path = $request->file('lampiran')->store('lampiran_surat_masuk');

        SuratMasuk::create([
            'nomor_surat' => request('nomor_surat'),
            'unit_kerja' => request('unit_kerja'),
            'perihal' => request('perihal'),
            'tanggal_surat' => request('tanggal_surat'),
            'tanggal_diterima' => request('tanggal_diterima'),
            'lampiran' => $path,
        ]);

        return redirect()->route('suratmasuk.index')->with('success', 'Data berhasil ditambahkan');
    }



    public function details(Suratmasuk $suratmasuk)
    {

        return view('suratmasuk.detailsuratmasuk', compact('suratmasuk'));
    }



    public function response(Suratmasuk $suratmasuk)
    {
        return Storage::response($suratmasuk->lampiran);
    }



    public function edit(Suratmasuk $suratmasuk)
    {
        return view('suratmasuk.editsuratmasuk', compact('suratmasuk')); 
    }


    public function update(Suratmasuk $suratmasuk)
    {
        $this->validate(request(), [
            'nomor_surat' => Rule::unique('surat_masuks', 'nomor_surat')->ignore($suratmasuk->id),
            'nomor_surat' => 'required|max:50',
            'unit_kerja' => 'required|max:50',
            'perihal' => 'required|max:100',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'lampiran' => 'required|max:2500'
        ]); 

        $suratmasuk->update([
            'nomor_surat' => request('nomor_surat'),
            'unit_kerja' => request('unit_kerja'),
            'perihal' => request('perihal'),
            'tanggal_surat' => request('tanggal_surat'),
            'tanggal_diterima' => request('tanggal_diterima'),
            'lampiran' => request()->file('lampiran')->store('lampiran_surat_masuk')
        ]);

        return redirect()->route('suratmasuk.index')->with('warning', ' Data berhasil diubah');
    }



    public function destroy(Suratmasuk $suratmasuk)
    {
        $suratmasuk->delete();

        return redirect()->route('suratmasuk.index')->with('danger', ' Data berhasil dihapus');
    }


    public function pdf()
    {
        $suratmasuks = SuratMasuk::all();
        $pdf = PDF::loadView('suratmasuk.laporansuratmasuk', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('suratmasuk.pdf', compact('suratmasuks'));
    }

}