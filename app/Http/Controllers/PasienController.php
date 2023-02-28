<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pasien;
use App\ibu;
use App\imunisasi;
use App\nimbang;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = Pasien::orderBy('created_at', 'desc')->get();
        
        $ibu = Ibu::all();

        $tgl = date('Y');
        $umur = date('Y-m-d', strtotime('-tanggal_lahir', strtotime( $tgl )));
        
        return view('pasien.index',compact('pasien','ibu','tgl','umur'));
    }

    public function fetchNameIbu(Request $request)
    {
        $ibu = Ibu::where('id_ibu', $request->id)
                    ->get(["nama_ibu", "ID", "id_ibu"]);
        
        return response()->json($ibu);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = \App\Pasien::all();

        $ibu = Ibu::all();

        $tgl = Carbon::now()->format('Y-m-d');
        //$umur = date('usia', strtotime('-1 year', strtodate( $tgl )));

        $kodeotomatis = DB::table('pasiens')->select(DB::raw('MAX(RIGHT(NIB,4)) as kode'));
        $kd = "";
        if($kodeotomatis->count()>0) {
            foreach ($kodeotomatis->get() as $k) {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }

        return view('pasien.create',compact('pasien','ibu','kd','tgl'));   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tgl = Carbon::now()->format('Y-m-d');
        $tanggal_lahir = $request->tanggal_lahir;
        $tgl_lahir = Carbon::parse($tanggal_lahir);

        //$years = $tgl_lahir->diffInYears($tgl);
        $age = $tgl_lahir->diffInMonths($tgl);

        $message = ([
            'unique'    => "NIB sudah terdata",
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request,[
            'NIB'           => 'required|unique:pasiens,NIB',
            'nama_pasien'   => 'required',
            'jenkel'        => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'id_ibu'        => 'required'
        ], $message);

        Pasien::create([
            'NIB'           => $request->NIB,
            'nama_pasien'   => $request->nama_pasien,
            'jenkel'        => $request->jenkel,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia'          => $age,
            'id_ibu'        => $request->id_ibu
        ]);

        return redirect()->route('pasien.index')->with('Data ditambah','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pasien = Pasien::where('id_pasien',$id)->first();

        $ibu = Ibu::all();     
        
        return view('pasien.show',compact('pasien','ibu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pasien = Pasien::where('id_pasien',$id)->first();

        $ibu = Ibu::all(); 

        $tgl = Carbon::now()->format('Y-m-d');

        return view('pasien.edit',compact('pasien','ibu','tgl'));
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
        
        $tgl = Carbon::now()->format('Y-m-d');
        $tanggal_lahir = $request->tanggal_lahir;
        $tgl_lahir = Carbon::parse($tanggal_lahir);

        //$years = $tgl_lahir->diffInYears($tgl);
        $age = $tgl_lahir->diffInMonths($tgl);

        $message = ([
            'unique'    => "NIB sudah terdata",
            'required'  => "Data tidak boleh kosong!"
        ]);
        
        $this->validate($request,[
            'NIB'           => 'required',
            'nama_pasien'   => 'required',
            'jenkel'        => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'id_ibu'        => 'required'
        ], $message);

        Pasien::where('id_pasien',$id)->update([
            'NIB'           => $request->NIB,
            'nama_pasien'   => $request->nama_pasien,
            'jenkel'        => $request->jenkel,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia'          => $age,
            'id_ibu'        => $request->id_ibu
        ]);
        
        return redirect()->route('pasien.index')->with('Data diedit','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pasien::where('id_pasien',$id)->delete();

        Nimbang::where('id_pasien',$id)->delete();

        Imunisasi::where('id_pasien',$id)->delete();

        return redirect()->route('pasien.index')->with('Data dihapus','Data berhasil dihapus');
    }

    public function cetakPasienall()
    {
        $cetakpasien = Pasien::all();
        return view('pasien.cetak',compact('cetakpasien'));
    }

    public function cetakPasien($id)
    {
        $cetakpasien = Pasien::where('id_pasien',$id)->first();
        return view('pasien.cetakpasien',compact('cetakpasien'));
    }
}
