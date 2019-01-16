<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = ([
        'nomor_surat', 'instansi', 'perihal', 'instansi_tujuan', 'tanggal_surat', 'lampiran'
    ]);
}
