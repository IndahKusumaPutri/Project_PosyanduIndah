<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kader;
use App\Tugas;
use Carbon\Carbon;
use App\User;

class kadercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kader = Kader::orderBy('created_at', 'desc')->get();

        // $kader = Kader::all();

        $tugas = Tugas::all();

        return view('kader.index',compact('kader','tugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kader = \App\Kader::all();

        $tugas = Tugas::all();

        return view('kader.create',compact('kader','tugas'));
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
            'required'  => "Data tidak boleh kosong!",
            'numeric'   => "Harus berupa angka",
            'min:11'    => "Minimal 11 Angka",
            'unique'    => "Sudah ada yang bertugas"
        ]);

        $this->validate($request,[
    		'nama_kader'    => 'required',
            'jenkel_kader'  => 'required',
            'no_hp'         => 'required|numeric|min:11',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required',
            'id_tugas'      => 'required',
            'email'         => 'required'
    	], $message);

        Kader::create([
            'nama_kader'    => $request->nama_kader,
            'jenkel_kader'  => $request->jenkel_kader,
            'no_hp'         => $request->no_hp,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'id_tugas'      => $request->id_tugas,
            'email'         => $request->email
        ]);

        user::create([
            'name'      => bcrypt($request->nama_kader),
            'email'     => $request->email,
            'password'  => bcrypt($request->no_hp)
        ]);

        return redirect()->route('kader.index')->with('Data ditambah','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tgl   = Carbon::now()->format('d-m-Y');

        $kader = Kader::where('id_kader',$id)->first();
        
        $tugas = Tugas::all();    

        return view('kader.show',compact('kader','tugas','tgl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kader = Kader::where('id_kader',$id)->first();

        $tugas = Tugas::all();

        return view('kader.edit',compact('kader','tugas'));
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
            'numeric'   => "Harus berupa angka",
            'min:11'    => "Minimal 11 Angka",
        ]);

        $this->validate($request,[
            'nama_kader'    => 'required',
            'jenkel_kader'  => 'required',
            'no_hp'         => 'required|numeric|min:11',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required',
            'id_tugas'      => 'required'
        ], $message);

        Kader::where('id_kader',$id)->update([
            'nama_kader'    => $request->nama_kader,
            'jenkel_kader'  => $request->jenkel_kader,
            'no_hp'         => $request->no_hp,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'        => $request->alamat,
            'id_tugas'      => $request->id_tugas
        ]);
        
        return redirect()->route('kader.index')->with('Data diedit','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kader::where('id_kader',$id)->delete(); 

        tugas::where('id_tugas',$id)->delete();

        return redirect()->route('kader.index')->with('Data dihapus','Data berhasil dihapus');
    }

    public function cetakKader()
    {
        $cetakkader = Kader::all();
        return view('kader.cetakkader',compact('cetakkader'));
    }
}
