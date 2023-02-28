@extends('layouts.app')
@section('menu', 'master')
@section('submenu', 'vaksin')
@section('title', 'Data Vaksin')
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
                            <p>Ubah Data Vaksin dan Vitamin</p>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="/vaksin/edit/{{ $vaksin->id_vaksin }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Nama Vaksin</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_vaksin"
                                        value="{{ $vaksin->nama_vaksin }}">
                                    @if ($errors->has('nama_vaksin'))
                                        <div class="text-danger">
                                            {{ $errors->first('nama_vaksin') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Usia Wajib</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="usia_wajib"
                                        value="{{ $vaksin->usia_wajib }}">
                                    @if ($errors->has('usia_wajib'))
                                        <div class="text-danger">
                                            {{ $errors->first('usia_wajib') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="{{ route('vaksin.index') }}" class="btn btn-outline-danger">Batal</a>
                                    <button type="submit" class="btn btn-outline-primary"
                                        onclick="return confirm('Yakin anda ingin mengubah data tersebut?')">Perbaharui
                                        Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
