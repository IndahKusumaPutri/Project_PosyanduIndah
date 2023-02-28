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
                            <p>Ubah Data Ibu</p>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="/ibu/edit/{{ $ibu->id_ibu }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group row">
                                <label class="control-label col-sm-2">ID Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="ID" value="{{ $ibu->ID }}" readonly>
                                    @if ($errors->has('ID'))
                                        <div class="text-danger">
                                            {{ $errors->first('ID') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">NIK</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="nik" value="{{ $ibu->nik }}" readonly
                                    placeholder="Masukkan NIK">
                                    @if ($errors->has('nik'))
                                        <div class="text-danger">
                                            {{ $errors->first('nik') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Nama Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_ibu" value="{{ $ibu->nama_ibu }}"
                                    placeholder="Masukkan Nama">
                                    @if ($errors->has('nama_ibu'))
                                        <div class="text-danger">
                                            {{ $errors->first('nama_ibu') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">No Telepon</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="no_telp" value="{{ $ibu->no_telp }}"
                                    placeholder="Masukkan No Telepon">
                                    @if ($errors->has('no_telp'))
                                        <div class="text-danger">
                                            {{ $errors->first('no_telp') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="alamat" value="{{ $ibu->alamat }}"
                                    placeholder="Masukkan Alamat">
                                    @if ($errors->has('alamat'))
                                        <div class="text-danger">
                                            {{ $errors->first('alamat') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="{{ route('ibu.index') }}" class="btn btn-outline-danger">Batal</a>
                                    <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Yakin anda ingin mengubah data tersebut?')">Perbaharui Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
