<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
 	protected $guarded =[''];

 	public function disposisi()
    {
    	return $this->belongsTo('App\Disposisi');
    }

    public function instansi()
    {
        return $this->belongsTo('App\Instansi');
    }

}
