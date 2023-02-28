<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vaksin extends Model
{
    // public $timestamps  = false;
    protected $table    = 'vaksins';
    protected $fillable = ['nama_vaksin','usia_wajib'];

    public function imunisasi()
    {
        return $this->hasMany('App\imunisasi');
    }
}
