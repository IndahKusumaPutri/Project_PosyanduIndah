<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nimbang;
use App\pasien;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NimbangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nimbang = Nimbang::orderBy('created_at', 'desc')->get();

        $tglnimbang = Carbon::now()->format('Y-m-d');

        // $nimbang = Nimbang::all();

        $pasien = Pasien::all();

        return view('nimbang.index',compact('nimbang','pasien','tglnimbang'));
    }

    public function fetchNameBalita(Request $request)
    {
        $pasien = Pasien::where('id_pasien', $request->id)
                    ->get(["nama_pasien", "NIB", "id_pasien","usia"]);
        
        return response()->json($pasien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tglnimbang = Carbon::now()->format('Y-m-d');

        $nimbang = \App\Nimbang::all();

        $pasien = \App\Pasien::all();

        $kodeotomatis = DB::table('nimbangs')->select(DB::raw('MAX(RIGHT(id_timbang,4)) as kode'));
        $kd = "";
        if($kodeotomatis->count()>0) {
            foreach ($kodeotomatis->get() as $k) {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        
        return view('nimbang.create',compact('nimbang','pasien','kd','tglnimbang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = ([
            'unique'    => "ID timbang sudah terdata",
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request,[
            'id_timbang'    => 'required|unique:nimbangs,id_timbang',
            'id_pasien'     => 'required',
            'tgl'           => 'required',
            'berat'         => 'required',
            'tinggi'        => 'required',
            'status_gizi'   => 'required'
        ], $message);

        Nimbang::create($request->all());

        return redirect()->route('nimbang.index')->with('Data ditambah','Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nimbang = Nimbang::where('id',$id)->first();     
        return view('nimbang.show',compact('nimbang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tglnimbang = carbon::now()->format('Y-m-d');

        $nimbang = nimbang::where('id',$id)->first();

        $pasien = pasien::where('id_pasien',$nimbang->id_pasien)->first();

        $pasiens = pasien::all();
        
        return view('nimbang.edit',compact('nimbang','pasien','pasiens','tglnimbang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $message = ([
            'unique'    => "ID timbang sudah terdata",
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request,[
            'id_timbang'    => 'required',
            'id_pasien'     => 'required',
            'tgl'           => 'required',
            'berat'         => 'required',
            'tinggi'        => 'required',
            'status_gizi'   => 'required'
        ], $message);

        nimbang::where('id',$id)->update([
            'id_timbang' => $request->id_timbang,
            'id_pasien' => $request->id_pasien,
            'tgl' => $request->tgl,
            'berat' => $request->berat,
            'tinggi' => $request->tinggi,
            'status_gizi' => $request->status_gizi
        ]);
        
        return redirect()->route('nimbang.index')->with('Data diedit','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Nimbang::where('id',$id)->delete();

        pasien::where('id_pasien',$id)->delete();

        return redirect()->route('nimbang.index')->with('Data dihapus','Data berhasil dihapus');
    }

    public function cetaknimbang()
    {
        $cetaknimbang = Nimbang::all();
        return view('nimbang.cetaknimbang',compact('cetaknimbang'));
    }
}
