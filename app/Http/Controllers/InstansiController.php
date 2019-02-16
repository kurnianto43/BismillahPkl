<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instansi;
use Illuminate\Validation\Rule;
use PDF;

class InstansiController extends Controller
{
    public function index()
    {
    	$instansis = Instansi::all();
    	return view('instansi.index', compact('instansis'));
    }

    public function create()
    {
    	return view('instansi.tambahdata');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            // 'nomor_surat' => Rule::unique('surat_masuks', 'nomor_surat')->ignore($suratmasuk->id),
            'nama_instansi' => 'required|unique:instansis|max:100',
            'alamat' => 'required|max:100',
            'no_telp' => 'required|max:15',
        ]); 

    	Instansi::create([
    		'nama_instansi' => request('nama_instansi'),
    		'alamat' => request('alamat'),
    		'no_telp' => request('no_telp')
    	]);

    	return redirect()->route('instansi.index')->with('success', 'Berhasil data telah ditambahkan');
    }

    public function edit(Instansi $instansi)
    {
    	return view('instansi.editdata', compact('instansi'));
    }

    public function update(Instansi $instansi)
    {
        $this->validate(request(), [
            'nama_instansi' => Rule::unique('instansis', 'nama_instansi')->ignore($instansi->id),
            'nama_instansi' => 'required|max:100',
            'alamat' => 'required|max:100',
            'no_telp' => 'required|max:15',
        ]); 

    	$instansi->update([
    		'nama_instansi' => request('nama_instansi'),
    		'alamat' => request('alamat'),
    		'no_telp' => request('no_telp')
    	]);

    	return redirect()->route('instansi.index')->with('success', 'Berhasil');
    }

    public function destroy(Instansi $instansi)
    {
    	$instansi->delete();
    	return redirect()->route('instansi.index')->with('success', 'Data berhasil dihapus');
    }


    public function pdf()
    {
        $instansis = Instansi::all();
        $pdf = PDF::loadView('instansi.laporaninstansi', compact('instansis'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('instansi.pdf', compact('instansis'));
    }
}
