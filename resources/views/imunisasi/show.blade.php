@extends('layouts.app')
@section('menu', 'layanan')
@section('submenu', 'imunisasi')
@section('title', 'Imunisasi Balita')
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
                        <div class="float-sm-left">
                            <p>Data Detail Imunisasi</p>
                        </div>
                    </div>
                    <form class="form-horizontal">
                        <div class="card-body"> {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-sm-2">ID Imunisasi</label>
                                <div class="col-sm-10">
                                    <p>{{ $imunisasi->kode }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tanggal Imunisasi</label>
                                <div class="col-sm-10">
                                    <p>{{ $imunisasi->tgl_imun }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">NIB</label>
                                <div class="col-sm-10">
                                    <p>{{ $imunisasi->pasien->NIB }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Balita</label>
                                <div class="col-sm-10">
                                    <p>{{ $imunisasi->pasien->nama_pasien }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Usia</label>
                                <div class="col-sm-10">
                                    <p>{{ $imunisasi->pasien->usia }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Jenis Vaksin</label>
                                <div class="col-sm-10">
                                    <p>{{ $imunisasi->vaksin->nama_vaksin }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <a href="{{ route('imunisasi.index') }}" class="btn btn-outline-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
