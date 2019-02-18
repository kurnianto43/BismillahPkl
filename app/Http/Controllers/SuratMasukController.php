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

        $data = SuratMasuk::whereDay('tanggal_diterima', $dt->day)->get();
        return view('suratmasuk.day', compact('data','dt'));
    }

    public function month()
    {
        Carbon::setLocale('id_ID.utf8');

        $dt = Carbon::now();

        $data = SuratMasuk::whereMonth('tanggal_diterima', $dt->month)->get();
        return view('suratmasuk.month', compact('data','dt'));
    }

    public function januari()
    {
        $data = suratmasuk::whereMonth('tanggal_diterima', 01)->get();
        return view('suratmasuk.januari', compact('data'));
    }

    public function februari()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', 02)->get();
        return view('suratmasuk.februari', compact('data'));
    }

    public function maret()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', 03)->get();
        return view('suratmasuk.maret', compact('data'));
    }

     public function april()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', 04)->get();
        return view('suratmasuk.april', compact('data'));
    }

     public function mei()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', 05)->get();
        return view('suratmasuk.mei', compact('data'));
    }

     public function juni()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', 06)->get();
        return view('suratmasuk.juni', compact('data'));
    }

     public function juli()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', 07)->get();
        return view('suratmasuk.juli', compact('data'));
    }

    public function agustus()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', '08')->get();
        return view('suratmasuk.agustus', compact('data'));
    }

     public function september()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', '09')->get();
        return view('suratmasuk.september', compact('data'));
    }

     public function oktober()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', 10)->get();
        return view('suratmasuk.oktober', compact('data'));
    }

     public function november()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', 11)->get();
        return view('suratmasuk.november', compact('data'));
    }

     public function desember()
    {
        $data = SuratMasuk::whereMonth('tanggal_diterima', 12)->get();
        return view('suratmasuk.desember', compact('data'));
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

        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', $dt->month)->get();
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukbulanan', compact('suratmasuks', 'dt'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('suratmasuk-bulanan.pdf', compact('suratmasuks', 'dt'));
    }


    public function pdfday()
    {
        $dt = Carbon::now();

        $suratmasuks = SuratMasuk::whereDay('tanggal_diterima', $dt->day)->get();
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukharian', compact('suratmasuks', 'dt'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('suratmasuk-harian.pdf', compact('suratmasuks', 'dt'));
    }

    // ini
    public function pdfjanuari()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 01)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukjan', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-jan.pdf', compact('suratmasuks'));
    }

     public function pdffebruari()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 02)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukfeb', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-feb.pdf', compact('suratmasuks'));
    }

     public function pdfmaret()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 03)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukmar', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-man.pdf', compact('suratmasuks'));
    }

     public function pdfapril()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 04)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukapr', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-apr.pdf', compact('suratmasuks'));
    }

     public function pdfmei()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 05)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukmei', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-mei.pdf', compact('suratmasuks'));
    }

     public function pdfjuni()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 06)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukjun', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-jun.pdf', compact('suratmasuks'));
    }

     public function pdfjul()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 07)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukjul', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-jul.pdf', compact('suratmasuks'));
    }

    public function pdfags()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 8)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukags', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-ags.pdf', compact('suratmasuks'));
    }


     public function pdfsep()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 9)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasuksep', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-sep.pdf', compact('suratmasuks'));
    }

    public function pdfokt()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 10)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukokt', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-okt.pdf', compact('suratmasuks'));
    }

    public function pdfnov()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 11)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasuknov', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-nov.pdf', compact('suratmasuks'));
    }

    public function pdfdes()
    {
        $suratmasuks = SuratMasuk::whereMonth('tanggal_diterima', 12)->get();
        // dd($suratmasuks);
        $pdf = PDF::loadView('suratmasuk.laporansuratmasukdes', compact('suratmasuks'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-masuk-des.pdf', compact('suratmasuks'));
    }

}