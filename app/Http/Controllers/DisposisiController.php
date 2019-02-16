<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;
use App\SuratMasuk;
use PDF;

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

    public function store(Request $request)
    {
        $this->validate(request(), [
            // 'nomor_surat' => Rule::unique('surat_masuks', 'nomor_surat')->ignore($suratmasuk->id),
            'surat_masuk_id' => 'required|unique:disposisis',
            'isi_disposisi' => 'required|max:100',
        ]); 

    	Disposisi::create([
    		'surat_masuk_id'=>request('surat_masuk_id'),
    		'isi_disposisi'=>request('isi_disposisi'),
    	]);

        return redirect()->route('disposisi.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Disposisi $disposisi)
    {
        $suratmasuks=SuratMasuk::all();
        return view ('disposisi.editdisposisi',compact('disposisi', 'suratmasuks'));
    }

    public function update(Request $request, Disposisi $disposisi)
    {
         $this->validate(request(), [
            'surat_masuk_id' => Rule::unique('disposisis', 'surat_masuk_id')->ignore($disposisi->id),
            'surat_masuk_id' => 'required',
            'isi_disposisi' => 'required|max:100',
        ]);

        $disposisi->update([
            'surat_masuk_id'=>request('surat_masuk_id'),
            'isi_disposisi'=>request('isi_disposisi'),
        ]);

        return redirect()->route('disposisi.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Disposisi $disposisi)
    {
        $disposisi->delete();
        return redirect()->route('disposisi.index')->with('success', 'Data berhasil dihapus');
    }

    public function pdf()
    {
        $disposisis = Disposisi::all();
        $pdf = PDF::loadView('disposisi.laporandisposisi', compact('disposisis'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('disposisi.pdf', compact('disposisis'));
    }
}
