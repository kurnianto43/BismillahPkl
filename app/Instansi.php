<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $fillable = ['nama_instansi', 'alamat', 'no_telp'];

    public function suratkeluar()
    {
    	return $this->hasMany('App\SuratKeluar');
    }

    public function suratmasuk()
    {
        return $this->hasMany('App\SuratMasuk');
    }
}
