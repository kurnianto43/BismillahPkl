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

        $data = SuratKeluar::whereDay('tanggal_kirim', $dt->day)->get();
        return view('suratkeluar.day', compact('data', 'dt'));
    }

    public function month()
    {
        $dt = Carbon::now();

        $data = SuratKeluar::whereMonth('tanggal_kirim', $dt->month)->get();
        return view('suratkeluar.month', compact('data', 'dt'));
    }

//ini bikin next month
    public function januari()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 01)->get();
        return view('suratkeluar.januari', compact('data'));
    }

    public function februari()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 02)->get();
        return view('suratkeluar.februari', compact('data'));
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

        $suratkeluars = SuratKeluar::whereMonth('tanggal_kirim', $dt->month)->get();
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarbulanan', compact('suratkeluars', 'dt'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-bulanan.pdf', compact('suratkeluars', 'dt'));
    }

    public function pdfday()
    {
        $dt = Carbon::now();

        $suratkeluars = SuratKeluar::whereDay('tanggal_kirim', $dt->day)->get();
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarharian', compact('suratkeluars', 'dt'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-harian.pdf', compact('suratkeluars', 'dt'));
    }


// ini
    public function pdfjanuari()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 01)->get();
        // dd($data);
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarjan', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-jan.pdf', compact('data'));
    }

     public function pdffebruari()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 02)->get();
        // dd($data);
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarfeb', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-feb.pdf', compact('data'));
    }

     public function pdfmaret()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 03)->get();
        // dd($data);
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarmar', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-man.pdf', compact('data'));
    }

     public function pdfapril()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 04)->get();
        // dd($data);
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarapr', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-apr.pdf', compact('data'));
    }

     public function pdfmei()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 05)->get();
        // dd($data);
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarmei', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-mei.pdf', compact('data'));
    }

     public function pdfjuni()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 06)->get();
        // dd($data);
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarjun', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-jun.pdf', compact('data'));
    }

     public function pdfjuli()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 07)->get();
        // dd($data);
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarjul', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-jul.pdf', compact('data'));
    }

    public function pdfagustus()
    {
        $data = SuratKeluar::whereMonth('tanggal_kirim', 8)->get();
        // dd($data);
        $pdf = PDF::loadView('suratkeluar.laporansuratkeluarags', compact('data'));
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('surat-keluar-ags.pdf', compact('data'));
    }


    //  public function pdfseptember()
    // {
    //     $data = SuratKeluar::whereMonth('tanggal_kirim', 09)->get();
    //     // dd($data);
    //     $pdf = PDF::loadView('suratkeluar.laporansuratkeluarsep', compact('data'));
    //     $pdf->setPaper('a4', 'landscape');
    //     return $pdf->download('surat-keluar-sep.pdf', compact('data'));
    // }

    // public function pdfoktober()
    // {
    //     $data = SuratKeluar::whereMonth('tanggal_kirim', 10)->get();
    //     // dd($data);
    //     $pdf = PDF::loadView('suratkeluar.laporansuratkeluarokt', compact('data'));
    //     $pdf->setPaper('a4', 'landscape');
    //     return $pdf->download('surat-keluar-okt.pdf', compact('data'));
    // }

    // public function pdfnovember()
    // {
    //     $data = SuratKeluar::whereMonth('tanggal_kirim', 11)->get();
    //     // dd($data);
    //     $pdf = PDF::loadView('suratkeluar.laporansuratkeluarnov', compact('data'));
    //     $pdf->setPaper('a4', 'landscape');
    //     return $pdf->download('surat-keluar-nov.pdf', compact('data'));
    // }

    // public function pdfdesember()
    // {
    //     $data = SuratKeluar::whereMonth('tanggal_kirim', 12)->get();
    //     // dd($data);
    //     $pdf = PDF::loadView('suratkeluar.laporansuratkeluardes', compact('data'));
    //     $pdf->setPaper('a4', 'landscape');
    //     return $pdf->download('surat-keluar-des.pdf', compact('data'));
    // }
}
