<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
 	protected $fillable =['nomor_surat', 'tanggal_masuk', 'perihal', 'tujuan'];
}
