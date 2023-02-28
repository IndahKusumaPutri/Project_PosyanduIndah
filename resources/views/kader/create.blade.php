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
                    {{-- <h1 class="m-0">Tambah Data Kader Posyandu</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('kader.index') }}">Home</a></li> --}}
                        {{-- <li class="breadcrumb-item active">Tambah Data Kader</li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin-top: 10px">
                        <div class="panel panel-default">
                            <div class="card-header">
                                <!--/.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card" style="margin-top: 10px;">
                                                    <div class="card-header">
                                                        <div class="float-sm-left">
                                                            <p>Tambah Data Kader</p>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <form class="form-horizontal" action="/kader/store"
                                                            action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> {{ csrf_field() }}
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Nama Kader</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="nama_kader" value="{{ old('nama_kader') }}" placeholder="Masukkan Nama">
                                                                    @if ($errors->has('nama_kader'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('nama_kader') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Jenis Kelamin</label>
                                                                <div class="col-sm-6">
                                                                    <label for="jenkel_kader">
                                                                        <input type="radio" name="jenkel_kader"
                                                                            value="Laki-laki" id="jenkel_kader"
                                                                            checked>&nbsp Laki-Laki &nbsp &nbsp &nbsp
                                                                        <input type="radio" name="jenkel_kader"
                                                                            value="Perempuan" id="jenkel_kader">&nbsp
                                                                        Perempuan
                                                                    </label>
                                                                    @if ($errors->has('jenkel_kader'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('jenkel_kader') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">No Telepon</label>
                                                                <div class="col-sm-10">
                                                                    <input type="number" class="form-control"
                                                                        name="no_hp" value="{{ old('no_hp') }}" placeholder="Masukkan No Telepon">
                                                                    @if ($errors->has('no_hp'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('no_hp') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Tempat Lahir</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="tempat_lahir"
                                                                        value="{{ old('tempat_lahir') }}" placeholder="Masukkan Kota Lahir">
                                                                    @if ($errors->has('tempat_lahir'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('tempat_lahir') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Tanggal Lahir</label>
                                                                <div class="col-sm-10">
                                                                    <input type="date" id="datePickerId"
                                                                        class="form-control" name="tanggal_lahir"
                                                                        value="{{ old('tanggal_lahir') }}" >
                                                                    @if ($errors->has('tanggal_lahir'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('tanggal_lahir') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Alamat</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="alamat" value="{{ old('alamat') }}" placeholder="Masukkan Alamat">
                                                                    @if ($errors->has('alamat'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('alamat') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Tugas </label>
                                                                <div class="col-sm-10">
                                                                    <select class="col-sm-12 form-control" name="id_tugas"
                                                                        id="tugas-dropdown">
                                                                        <option value="0" aria-readonly="true" 
                                                                            >-- Select Tugas --
                                                                        </option>
                                                                        @foreach ($tugas as $key => $val)
                                                                            :
                                                                            <option value="<?= $val['id_tugas'] ?>">
                                                                                {{ $val['nm_tugas'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('id_tugas'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('id_tugas') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Email</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                                                                    @if ($errors->has('email'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('email') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-offset-5 col-sm-10">
                                                                    <a href="{{ route('kader.index') }}" class="btn btn-outline-danger">Kembali</a>
                                                                    <button type="submit" class="btn btn-outline-primary" onclick="return confirm('Yakin anda ingin menyimpan data tersebut?')">Simpan</i></button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
