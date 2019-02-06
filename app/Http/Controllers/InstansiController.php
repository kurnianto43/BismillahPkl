<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instansi;

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

    public function store()
    {
    	Instansi::create([
    		'nama_instansi' => request('nama_instansi'),
    		'alamat' => request('alamat'),
    		'no_telp' => request('no_telp')
    	]);

    	return redirect()->route('instansi.index')->with('success', 'Berhasil');
    }

    public function edit(Instansi $instansi)
    {
    	return view('instansi.editdata', compact('instansi'));
    }

    public function update(Instansi $instansi)
    {
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
    	return redirect()->route('instansi.index')->with('success', 'Data dihapus');
    }
}
