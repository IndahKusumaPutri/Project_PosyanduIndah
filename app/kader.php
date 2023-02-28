<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kader extends Model
{
    // public $timestamps = false;
    protected $table = 'kaders';
    protected $fillable = ['nama_kader','jenkel_kader','no_hp',
    'tempat_lahir','tanggal_lahir','alamat','id_tugas','email'];

    public function imunisasi()
    {
        return $this->hasMany('App\imunisasi');
    }

    public function tugas()
    {
        return $this->belongsTo('App\tugas','id_tugas','id_tugas');
    }

}
