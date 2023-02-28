<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    //public $timestamps = false;
    protected $table = 'pasiens';
    protected $fillable = ['NIB','nama_pasien','jenkel','tempat_lahir','tanggal_lahir','id_ibu','usia'];

    public function program()
    {
        return $this->hasMany('App\program');
    }

    public function ibu()
    {
        return $this->belongsTo('App\ibu','id_ibu','id_ibu');
    }

    public function nimbang()
    {
        return $this->hasMany('App\nimbang');
    }
}
