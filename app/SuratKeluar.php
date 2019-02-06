<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = [
    	'nomor_surat', 'instansi_id', 'perihal', 'tanggal_surat', 'tanggal_kirim', 'lampiran'
    ];


    public function instansi()
    {
    	return $this->hasMany('App\Instansi');
    }
}
