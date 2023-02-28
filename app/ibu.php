<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ibu extends Model
{
    // public $timestamps = false;
    protected $table = 'ibus';
    protected $fillable = ['ID','nik','nama_ibu','no_telp','alamat'];

    public function pasien()
    {
        return $this->hasMany('App\pasien');
    }

    public function nimbang()
    {
        return $this->hasMany('App\nimbang');
    }
}

