<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuratkeluarStoreRequest;
use App\SuratKeluar;
use Storage;
use PDF;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class SuratKeluarController extends Controller
{

    public function index()
    {
        $suratkeluars = SuratKeluar::all();
    	return view('suratkeluar.indexsuratkeluar', compact('suratkeluars'));
    }


    public function create()
    {
    	return view('suratkeluar.tambahdata');
    }


    public function store(SuratkeluarStoreRequest $request)
    {

        $validated = $request->validated();

        $path = $request->file('lampiran')->store('lampiran_surat_keluar');

        SuratKeluar::create([
            'nomor_surat' => request('nomor_surat'),
            'instansi' => request('instansi'),
            'perihal' => request('perihal'),
            'instansi_tujuan' => request('instansi_tujuan'),
            'tanggal_surat' => request('tanggal_surat'),
            'lampiran' => $path
        ]);

        return redirect()->route('suratkeluar.index')->with('success', 'Data berhasil disimpan');
    }


    public function edit(SuratKeluar $suratkeluar)
    {
        return view('suratkeluar.editsuratkeluar', compact('suratkeluar'));
    }


    public function update(SuratKeluar $suratkeluar)
    {

         $this->validate(request(), [
            'nomor_surat' => Rule::unique('surat_keluar', 'nomor_surat')->ignore($suratkeluar->id),
            'nomor_surat' => 'bail|required|max:50',
            'instansi' => 'required|max:50',
            'perihal' => 'required|max:100',
            'instansi_tujuan' => 'required|max:50',
            'tanggal_surat' => 'required',
            'lampiran' => 'required|max:2500'
        ]); 

        $suratkeluar->update([
            'nomor_surat' => request('nomor_surat'),
            'instansi' => request('instansi'),
            'perihal' => request('perihal'),
            'instansi_tujuan' => request('instansi_tujuan'),
            'tanggal_surat' => request('tanggal_surat'),
            'lampiran' => request()->file('lampiran')->store('lampiran_surat_keluar')
        ]);

        return redirect()->route('suratkeluar.index')->with('warning', 'Data berhasil diubah');
    }


    public function destroy(SuratKeluar $suratkeluar)
    {
        $suratkeluar->delete();

        return redirect()->route('suratkeluar.index')->with('danger', 'Data berhasil dihapus');
    }


    public function details(SuratKeluar $suratkeluar)
    {

        return view('suratkeluar.detailsuratkeluar', compact('suratkeluar'));
    }



    public function response(SuratKeluar $suratkeluar)
    {
        return Storage::response($suratkeluar->lampiran);
    }


    public function pdf()
    {
        $suratkeluars = SuratKeluar::all();
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluar', compact('suratkeluars'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('suratkeluar.pdf', compact('suratkeluar'));
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['tgl_surat'])->format('d, M Y H:i');
    }


}
