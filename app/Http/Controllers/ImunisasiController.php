<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imunisasi;
use App\vaksin;
use App\Pasien;
use App\kader;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ImunisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imunisasi = Imunisasi::orderBy('created_at', 'desc')->get();

        // $imunisasi = Imunisasi::all();

        $pasien = Pasien::all();

        $vaksin = Vaksin::all();

        $kader  = Kader::all();

        return view('imunisasi.index', compact('imunisasi', 'vaksin', 'pasien','kader'));
    }

    public function fetchBalita(Request $request)
    {
        $pasien = Pasien::where('id_pasien', $request->id)
            ->get(["nama_pasien", "NIB", "id_pasien", "usia"]);

        return response()->json($pasien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tgl        = Carbon::now()->format('Y-m-d');

        $imunisasi  = \App\Imunisasi::all();

        $vaksin     = \App\Vaksin::all();

        $pasien     = \App\Pasien::all();

        $kader      = \App\Kader::all();

        $kodeotomatis = DB::table('imunisasis')->select(DB::raw('MAX(RIGHT(Kode,4)) as kode'));
        $kd = "";
        if($kodeotomatis->count()>0) {
            foreach ($kodeotomatis->get() as $k) {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }

        return view('imunisasi.create', compact('imunisasi','vaksin', 'pasien','kd','kader','tgl'));
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
            'unique'    => "ID imunisasi sudah terdata",
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request, [
            'kode'      => 'required|unique:imunisasis,kode',
            'id_pasien' => 'required',
            'id_vaksin' => 'required',
            'tgl_imun'  => 'required',
            'id_kader'  => 'required'
        ], $message);

        Imunisasi::create($request->all());

        return redirect()->route('imunisasi.index')->with('Data ditambah', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imunisasi = Imunisasi::where('id_imunisasi', $id)->first();

        $vaksin = \App\Vaksin::all();

        $pasien = \App\Pasien::all();

        $kader  = \App\Kader::all();

        return view('imunisasi.show', compact('imunisasi', 'vaksin', 'pasien','kader'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tgl        = Carbon::now()->format('Y-m-d');

        $imunisasi  = Imunisasi::where('id_imunisasi', $id)->first();

        $pasien     = Pasien::all();

        $vaksin     = Vaksin::all();

        $kader      = Kader::all();

        return view('imunisasi.edit', compact('imunisasi','pasien','vaksin','kader','tgl'));
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
            'unique'    => "ID imunisasi sudah terdata",
            'required'  => "Data tidak boleh kosong!"
        ]);

        $this->validate($request, [
            'kode'      => 'required',
            'id_pasien' => 'required',
            'id_vaksin' => 'required',
            'tgl_imun'  => 'required',
            'id_kader'  => 'required'
        ],$message);

        Imunisasi::where('id_imunisasi', $id)->update([
            'kode'      => $request->kode,
            'id_pasien' => $request->id_pasien,
            'id_vaksin' => $request->id_vaksin,
            'tgl_imun'  => $request->tgl_imun,
            'id_kader'  => $request->id_kader
        ]);

        return redirect()->route('imunisasi.index')->with('Data diedit', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Imunisasi::where('id_imunisasi', $id)->delete();

        pasien::where('id_pasien',$id)->delete();

        return redirect()->route('imunisasi.index')->with('Data dihapus', 'Data berhasil dihapus');
    }

    public function cetakimunisasi()
    {
        $cetakimunisasi = Imunisasi::all();
        return view('imunisasi.cetakimunisasi', compact('cetakimunisasi'));
    }
}
