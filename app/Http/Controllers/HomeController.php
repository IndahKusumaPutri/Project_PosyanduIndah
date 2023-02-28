<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kader;
use App\pasien;
use App\ibu;
use App\tugas;
use App\nimbang;
use App\imunisasi;
use App\vaksin;

class HomeController extends Controller
{
    public function index()
    {
        //$pinjam = date("06-09-2022");
        $tujuh_hari = mktime(0,0,0, date("n"), date("j")+30, date("Y"));
        $kembali = date("d-m-Y", $tujuh_hari);

        $jumlah_tugas = Tugas::count();
        $jumlah_kader = Kader::count();
        $jumlah_pasien = Pasien::count();
        $jumlah_ibu = Ibu::count();
        $jumlah_nimbang = Nimbang::count();
        $jumlah_imunisasi = Imunisasi::count();
        $jumlah_vaksin = vaksin::count();

        return view('beranda.home')
        ->with('jumlah_tugas',$jumlah_tugas)
        ->with('jumlah_kader',$jumlah_kader)
        ->with('jumlah_pasien',$jumlah_pasien)
        ->with('jumlah_ibu',$jumlah_ibu)
        ->with('jumlah_nimbang',$jumlah_nimbang)
        ->with('jumlah_imunisasi',$jumlah_imunisasi)
        ->with('jumlah_vaksin',$jumlah_vaksin)
        ->with('kembali',$kembali);
    }
}
