<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imunisasi extends Model
{
    // public $timestamps = false;
    protected $table = 'imunisasis';
    protected $fillable = ['kode','id_pasien','id_vaksin','tgl_imun','id_kader'];

    public function pasien()
    {
        return $this->belongsTo('App\pasien','id_pasien','id_pasien');
    }

    public function vaksin()
    {
        return $this->belongsTo('App\vaksin','id_vaksin','id_vaksin');
    }

    public function kader()
    {
        return $this->belongsTo('App\kader','id_kader','id_kader');
    }

}

