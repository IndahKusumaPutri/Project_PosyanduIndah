<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Beranda extends Controller
{
    public function index()
    {
        return view('layouts.beranda');
    }

}
