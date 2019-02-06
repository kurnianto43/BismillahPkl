<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;
use App\SuratMasuk;

class DisposisiController extends Controller
{
    public function index()
    {
        $disposisis=Disposisi::all();
        return view('disposisi.indexdisposisi', compact('disposisis'));
    }
    public function create()
    {
    	$suratmasuks=SuratMasuk::all();
    	return view ('disposisi.tambahdata',compact('suratmasuks'));
    }

    public function store()
    {

    	Disposisi::create([
    		'surat_masuk_id'=>request('surat_masuk_id'),
    		'isi_disposisi'=>request('isi_disposisi'),
    	]);

        return redirect()->route('disposisi.index')->with('success', 'Data ditambahkan');
    }

    public function edit(Disposisi $disposisi)
    {
        $suratmasuks=SuratMasuk::all();
        return view ('disposisi.editdisposisi',compact('disposisi', 'suratmasuks'));
    }

    public function update(Disposisi $disposisi)
    {
        $disposisi->update([
            'surat_masuk_id'=>request('surat_masuk_id'),
            'isi_disposisi'=>request('isi_disposisi'),
        ]);

        return redirect()->route('disposisi.index')->with('success', 'Data diubah');
    }

    public function destroy(Disposisi $disposisi)
    {
        $disposisi->delete();
        return redirect()->route('disposisi.index')->with('success', 'Data dihapus');
    }

    public function pdf()
    {
        $suratkeluars = SuratKeluar::all();
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluar', compact('suratkeluars'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('suratkeluar.pdf', compact('suratkeluar'));
    }
}
