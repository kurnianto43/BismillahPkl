<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuratKeluar;
use App\Instansi;
use Carbon\Carbon;
use PDF;
use Illuminate\Validation\Rule;

class SuratKeluarController extends Controller
{

    public function index()
    {
        $suratkeluars = SuratKeluar::all();

    	return view('suratkeluar.index', compact('suratkeluars'));
    }

    public function day()
    {
        $dt = Carbon::now();

        $data = SuratKeluar::whereDay('created_at', $dt->day)->get();
        return view('suratkeluar.day', compact('data', 'dt'));
    }

    public function month()
    {
        $dt = Carbon::now();

        $data = SuratKeluar::whereMonth('created_at', $dt->month)->get();
        return view('suratkeluar.month', compact('data', 'dt'));
    }

    public function create()
    {
    	$instansis = Instansi::all();
    	return view('suratkeluar.tambahdata', compact('instansis'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            // 'nomor_surat' => Rule::unique('surat_masuks', 'nomor_surat')->ignore($suratmasuk->id),
            'nomor_surat' => 'required|unique:surat_keluars|max:50',
            'instansi_id' => 'required|max:50',
            'perihal' => 'required|max:100',
            'tanggal_surat' => 'required',
            'tanggal_kirim' => 'required',
            'lampiran' => 'required|max:2500'
        ]); 

        $path = $request->file('lampiran')->store('lampiran_surat_keluar');

    	SuratKeluar::create([
    		'nomor_surat' => request('nomor_surat'),
    		'instansi_id' => request('instansi_id'),
    		'perihal' => request('perihal'),
    		'tanggal_surat' => request('tanggal_surat'),
    		'tanggal_kirim' => request('tanggal_kirim'),
    		'lampiran' => $path,
    	]);

    	return redirect()->route('suratkeluar.index')->with('success', 'Data berhasil ditambah');
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
        $this->validate(request(), [
            'nomor_surat' => Rule::unique('surat_keluars', 'nomor_surat')->ignore($suratkeluar->id),
            'nomor_surat' => 'required|max:50',
            'instansi_id' => 'required|max:50',
            'perihal' => 'required|max:100',
            'tanggal_surat' => 'required',
            'tanggal_kirim' => 'required',
            'lampiran' => 'required|max:2500'
        ]); 

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


    public function pdf()
    {
        $suratkeluars = Suratkeluar::all();
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluar', compact('suratkeluars'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar.pdf', compact('suratkeluars'));
    }

    public function pdfmonth()
    {
        $dt = Carbon::now();

        $suratkeluars = SuratKeluar::whereMonth('created_at', $dt->month)->get();
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluar', compact('suratkeluars'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-bulanan.pdf', compact('suratkeluars'));
    }

    public function pdfday()
    {
        $dt = Carbon::now();

        $suratkeluars = SuratKeluar::whereDay('created_at', $dt->day)->get();
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluar', compact('suratkeluars'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-harian.pdf', compact('suratkeluars'));
    }
}
