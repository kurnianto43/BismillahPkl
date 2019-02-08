<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
 	protected $fillable =['nomor_surat', 'unit_kerja', 'perihal', 'tanggal_surat', 'tanggal_diterima', 'lampiran'];

 	public function disposisi()
    {
    	return $this->belongsTo('App\Disposisi');
    }
}
