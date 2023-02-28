<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tugas extends Model
{
    // public $timestamps = false;
    protected $table = 'tugas';
    protected $fillable = ['nm_tugas'];
    
    public function kader()
    {
        return $this->hasOne('App\kader');
    }

    
}
