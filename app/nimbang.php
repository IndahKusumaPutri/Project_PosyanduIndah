<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nimbang extends Model
{
    // public $timestamps = false;
    protected $table = 'nimbangs';
    protected $fillable = ['id_timbang','id_pasien','tgl','berat','tinggi','status_gizi'];

    public function pasien()
    {
        return $this->belongsTo('App\pasien','id_pasien','id_pasien');
    }
}
