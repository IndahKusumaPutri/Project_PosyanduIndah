@extends('layouts.app')
@section('menu', 'master')
@section('submenu', 'kader')
@section('title', 'Data Kader')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Detail Data Kader Posyandu</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('kader.index') }}">Home</a></li> --}}
                        {{-- <li class="breadcrumb-item active">Detail Data Kader</li> --}}
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
                            <p>Data Detail Kader</p>
                        </div>
                    </div>
                    <form class="form-horizontal">
                        <div class="card-body"> {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Kader</label>
                                <div class="col-sm-10">
                                    <p>{{ $kader->nama_kader }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Jenis Kelamin</label>
                                <div class="col-sm-10">
                                    <p>{{ $kader->jenkel_kader }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">No Telepon</label>
                                <div class="col-sm-10">
                                    <p>{{ $kader->no_hp }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <p>{{ $kader->tempat_lahir }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tanggal Lahir</label>
                                <div class="col-sm-10">
                                    <p>{{ $kader->tanggal_lahir }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Alamat</label>
                                <div class="col-sm-10">
                                    <p>{{ $kader->alamat }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Tugas</label>
                                <div class="col-sm-10">
                                    <p>{{ $kader->tugas->nm_tugas }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <a href="{{ route('kader.index') }}" class="btn btn-outline-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
