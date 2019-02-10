<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SuratmasukStoreRequest;
use App\SuratMasuk;
use PDF;
use Storage;
use Illuminate\Validation\Rule;
use App\Instansi;
use Carbon\Carbon;

class SuratMasukController extends Controller
{


    public function index()
    {

    	$suratmasuks = SuratMasuk::all();
    	return view('suratmasuk.indexsuratmasuk', compact('suratmasuks'));
    }


    public function day()
    {
        $dt = Carbon::now();

        $data = SuratMasuk::whereDay('created_at', $dt->day)->get();
        return view('suratmasuk.day', compact('data','dt'));
    }

    public function month()
    {
        Carbon::setLocale('id_ID.utf8');

        $dt = Carbon::now();

        $data = SuratMasuk::whereMonth('created_at', $dt->month)->get();
        return view('suratmasuk.month', compact('data','dt'));
    }



    public function create()
    {
        $instansis = Instansi::all();

    	return view('suratmasuk.tambahdata', compact('instansis'));
    }



    public function store(SuratmasukStoreRequest $request)
    {

       $validated = $request->validated();

    	$path = $request->file('lampiran')->store('lampiran_surat_masuk');

        SuratMasuk::create([
            'nomor_surat' => request('nomor_surat'),
            'instansi_id' => request('instansi_id'),
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
        $instansis = Instansi::all();
        return view('suratmasuk.editsuratmasuk', compact('suratmasuk', 'instansis')); 
    }


    public function update(Suratmasuk $suratmasuk)
    {
        $this->validate(request(), [
            'nomor_surat' => Rule::unique('surat_masuks', 'nomor_surat')->ignore($suratmasuk->id),
            'nomor_surat' => 'required|max:50',
            'instansi_id' => 'required|max:50',
            'perihal' => 'required|max:100',
            'tanggal_surat' => 'required',
            'tanggal_diterima' => 'required',
            'lampiran' => 'required|max:2500'
        ]); 

        $suratmasuk->update([
            'nomor_surat' => request('nomor_surat'),
            'instansi_id' => request('instansi_id'),
            'perihal' => request('perihal'),
            'tanggal_surat' => request('tanggal_surat'),
            'tanggal_diterima' => request('tanggal_diterima'),
            'lampiran' => request()->file('lampiran')->store('lampiran_surat_masuk')
        ]);

        return redirect()->route('suratmasuk.index')->with('success', ' Data berhasil diubah');
    }



    public function destroy(Suratmasuk $suratmasuk)
    {
        $suratmasuk->delete();

        return redirect()->route('suratmasuk.index')->with('success', ' Data berhasil dihapus');
    }


    public function pdf()
    {
        $suratmasuks = SuratMasuk::all();
        $pdf = PDF::loadView('suratmasuk.laporansuratmasuk', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('suratmasuk.pdf', compact('suratmasuks'));
    }

    public function pdfmonth()
    {
        $dt = Carbon::now();

        $suratmasuks = SuratMasuk::whereMonth('created_at', $dt->month)->get();
        $pdf = PDF::loadView('suratmasuk.laporansuratmasuk', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('suratmasuk-bulanan.pdf', compact('suratmasuks'));
    }


    public function pdfday()
    {
        $dt = Carbon::now();

        $suratmasuks = SuratMasuk::whereDay('created_at', $dt->day)->get();
        $pdf = PDF::loadView('suratmasuk.laporansuratmasuk', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('suratmasuk-harian.pdf', compact('suratmasuks'));
    }

}