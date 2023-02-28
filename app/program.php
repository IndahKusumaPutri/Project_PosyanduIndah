<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class program extends Model
{
    // Public $timestamps  = false;
    Protected $table    = 'programs';
    protected $fillable = ['id_pasien','id_layanankesehatan','tanggal_datang','datang_kembali','hasil_periksa'];

    public function pasien()
    {
        return $this->belongsTo('App\pasien','id_pasien','id_pasien');
    }

    public function lakes()
    {
        return $this->belongsTo('App\lakes','id_layanankesehatan','id_layanankesehatan');
    }
}
