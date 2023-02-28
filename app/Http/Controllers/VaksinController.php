<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vaksin;

class VaksinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaksin = Vaksin::orderBy('created_at', 'desc')->get();

        // $vaksin = Vaksin::all();

        return view('vaksin.index',compact('vaksin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vaksin = \App\Vaksin::all();
        return view('vaksin.create',compact('vaksin'));
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
            'nama_vaksin' => 'required',
            'usia_wajib' => 'required'
        ], $message);

        Vaksin::create($request->all());

        return redirect()->route('vaksin.index')->with('Data ditambah','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaksin = vaksin::where('id_vaksin',$id)->first();
        return view('vaksin.edit',compact('vaksin'));
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
        // dd($request);
        $message = ([
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request,[
            'nama_vaksin' => 'required',
            'usia_wajib'  => 'required'
        ],$message);

        vaksin::where('id_vaksin',$id)->update([
            'nama_vaksin' => $request->nama_vaksin,
            'usia_wajib'  => $request->usia_wajib
        ]);

        return redirect()->route('vaksin.index')->with('Data diedit','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vaksin::where('id_vaksin',$id)->delete();
        return redirect()->route('vaksin.index')->with('Data dihapus','Data berhasil dihapus');
    }

    public function cetakvaksin()
    {
        $cetakvaksin = Vaksin::all();
        return view('vaksin.cetakvaksin',compact('cetakvaksin'));
    }
}
