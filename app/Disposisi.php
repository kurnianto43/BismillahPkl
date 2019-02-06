<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $fillable=['surat_masuk_id', 'isi_disposisi'];

    public function suratmasuk()
    {
    	return $this->belongsTo('App\SuratMasuk', 'surat_masuk_id');
    }
    
}

