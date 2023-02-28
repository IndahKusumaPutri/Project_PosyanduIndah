@extends('layouts.app')
@section('menu', 'master')
@section('submenu', 'ibu')
@section('title', 'Data Ibu')
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
                            <p>Data Detail Ibu</p>
                        </div>
                    </div>
                    <form class="form-horizontal">
                        <div class="card-body"> {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-sm-2">ID Ibu</label>
                                <div class="col-sm-10">
                                    <p>{{ $ibu->ID }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">NIK</label>
                                <div class="col-sm-10">
                                    <p>{{ $ibu->nik }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Nama Ibu</label>
                                <div class="col-sm-10">
                                    <p>{{ $ibu->nama_ibu }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">No Telepon</label>
                                <div class="col-sm-10">
                                    <p>{{ $ibu->no_telp }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">Alamat</label>
                                <div class="col-sm-10">
                                    <p>{{ $ibu->alamat }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <a href="{{ route('ibu.index') }}" class="btn btn-outline-danger">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
