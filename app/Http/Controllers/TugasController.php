<?php

namespace App\Http\Controllers;

use App\kader;
use Illuminate\Http\Request;
use App\tugas;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tugas = Tugas::orderBy('created_at', 'desc')->get();

        // $tugas = Tugas::all();

        return view('tugas.index',compact('tugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tugas = \App\Tugas::all();
        return view('tugas.create',compact('tugas'));
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
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request,[
            'nm_tugas'=>'required'
        ], $message);

        Tugas::create($request->all());

        return redirect()->route('tugas.index')->with('Data ditambah','Data berhasil ditambah');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tugas = Tugas::where('id_tugas',$id)->first();
        return view('tugas.show',compact('tugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tugas = Tugas::where('id_tugas',$id)->first();
        return view('tugas.edit',compact('tugas'));
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
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request,[
            'nm_tugas' => 'required'
        ], $message);

        Tugas::where('id_tugas',$id)->update([
            'nm_tugas' => $request->nm_tugas
        ]);
        
        return redirect()->route('tugas.index')->with('Data diedit','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tugas::where('id_tugas',$id)->delete();

        kader::where('id_tugas',$id)->delete();

        return redirect()->route('tugas.index')->with('Data dihapus','Data berhasil dihapus');
    }
}
