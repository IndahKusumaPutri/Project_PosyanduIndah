@extends('layouts.app')
@section('menu', 'layanan')
@section('submenu', 'nimbang')
@section('title', 'Data Penimbangan')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="container-fluid">
    <div class="row"> 
        <div class="col-md-12">
            <div class="card" style="margin-top: 10px;">
                <div class="card-header">
                    <div class="float-sm-left"> <p>Detail Data Penimbangan</p> </div>
                </div> 
                <form class="form-horizontal">
                <div class="card-body"> {{ csrf_field() }}
                   <input type="hidden" name="_method" value="PUT">
                    <div class="form-group row"> 
                        <label class="col-sm-2">ID Timbang</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->id_timbang }}</p>
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label class="col-sm-2">Tanggal Timbang</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->tgl }}</p>
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-2">NIB</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->pasien->NIB }}</p>
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label class="col-sm-2">Nama Balita</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->pasien->nama_pasien }}</p>
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label class="col-sm-2">Usia</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->pasien->usia }}</p>
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label class="col-sm-2">ID Ibu</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->ibu->ID }}</p>
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-2">Nama Ibu</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->ibu->nama_ibu }}</p>
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-2">Berat Badan (KG)</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->berat }}</p>
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-2">Tinggi Badan (CM)</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->tinggi }}</p>
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-2">Keterangan</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $nimbang->status_gizi }}</p>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-offset-2 col-sm-10"> 
                        <a href="{{ route('nimbang.index') }}" class="btn btn-outline-danger">Kembali</a> 
                        </div>
                    </div>
                </div>
                </form>
            </div> 
        </div> 
    </div> 
</div>
@endsection