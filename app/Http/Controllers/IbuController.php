<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ibu;
use Illuminate\Support\Facades\DB;

class IbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ibu = Ibu::orderBy('created_at', 'desc')->get();
        
        return view('ibu.index',compact('ibu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ibu = \App\Ibu::all();

        $kodeotomatis = DB::table('ibus')->select(DB::raw('MAX(RIGHT(ID,4)) as kode'));
        $kd = "";
        if($kodeotomatis->count()>0) {
            foreach ($kodeotomatis->get() as $k) {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }

        return view('ibu.create',compact('ibu','kd'));
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
            'unique'    => "NIK sudah terdata",
            'required'  => "Data tidak boleh kosong!",
            'numeric'   => "Harus berupa angka"
        ]);

        $this->validate($request,[
            'ID'        => 'required',
    		'nik'       => 'required|numeric|unique:ibus,nik',
            'nama_ibu'  => 'required',
            'no_telp'   => 'required|numeric',
            'alamat'    => 'required'
    	], $message);

        Ibu::create($request->all()); 

        return redirect()->route('ibu.index')->with('Data ditambah','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ibu = Ibu::where('id_ibu',$id)->first();     
        return view('ibu.show',compact('ibu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ibu = Ibu::where('id_ibu',$id)->first();

        $bln = date('m');
        
        $kodeotomatis = DB::table('ibus')->select(DB::raw('MAX(RIGHT(ID,4)) as kode'));
        $kd = "";
        if($kodeotomatis->count()>0) {  
            foreach ($kodeotomatis->get() as $k) {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }

        return view('ibu.edit',compact('ibu','kd'));
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
        $message = ([
            'required'  => "Data tidak boleh kosong!",
            'numeric'   => "Harus berupa angka"
        ]);

        $this->validate($request,[
            'ID'        => 'required',
            'nik'       => 'required|numeric',
            'nama_ibu'  => 'required',
            'no_telp'   => 'required|numeric',
            'alamat'    => 'required'
        ], $message);

        Ibu::where('id_ibu',$id)->update([
            'ID'        => $request->ID,
            'nik'       => $request->nik,
            'nama_ibu'  => $request->nama_ibu,
            'no_telp'   => $request->no_telp,
            'alamat'    => $request->alamat
        ]);
        
        return redirect()->route('ibu.index')->with('Data diedit','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ibu::where('id_ibu',$id)->delete(); 
        return redirect()->route('ibu.index')->with('Data dihapus','Data berhasil dihapus');
    }

    public function cetakibu()
    {
        $cetakibu = Ibu::all();
        return view('ibu.cetakibu',compact('cetakibu'));
    }
}
