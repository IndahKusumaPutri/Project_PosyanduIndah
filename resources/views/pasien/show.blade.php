@extends('layouts.app')
@section('menu', 'master')
@section('submenu', 'pasien')
@section('title','Data Balita')
@section("content")
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0">Detail Data Anak</h1> --}}
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="{{ route('pasien.index') }}">Home</a></li> --}}
            {{-- <li class="breadcrumb-item active">Detail Data Warga</li> --}}
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
                    <div class="float-sm-left"> <p>Detail Data Balita</p> </div>
                </div> 
                <form class="form-horizontal">
                <div class="card-body"> {{ csrf_field() }}
                   <input type="hidden" name="_method" value="PUT">
                    <div class="form-group row"> 
                        <label class="col-sm-2">NIB</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $pasien->NIB }}</p>
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label class="col-sm-2">Nama Balita</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $pasien->nama_pasien }}</p>
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label class="col-sm-2">Jenis Kelamin</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $pasien->jenkel }}</p>
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label class="col-sm-2">Tempat Lahir</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $pasien->tempat_lahir }}</p>
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label class="col-sm-2">Tanggal Lahir</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $pasien->tanggal_lahir }}</p>
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-2">Usia</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $pasien->usia }}</p>
                        </div> 
                    </div> 
                    <div class="form-group row"> 
                        <label class="col-sm-2">ID Ibu</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $pasien->ibu->ID }}</p>
                        </div> 
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-2">Nama Ibu</label> 
                        <div class="col-sm-10"> 
                            <p>{{ $pasien->ibu->nama_ibu }}</p>
                        </div> 
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-offset-2 col-sm-10"> 
                        <a href="{{ route('pasien.index') }}" class="btn btn-outline-danger">Kembali</a> 
                        </div>
                    </div>
                </div>
                </form>
            </div> 
        </div> 
    </div> 
</div>
@endsection