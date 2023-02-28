@extends('layouts.app')
@section('menu', 'master')
@section('submenu', 'tugas')
@section('title', 'Data Tugas')
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
                            <p>Ubah Data Tugas</p>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="/tugas/edit/{{ $tugas->id_tugas }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Tugas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nm_tugas"
                                        value="{{ $tugas->nm_tugas }}" placeholder="Masukkan Tugas Kader">
                                    @if ($errors->has('nm_tugas'))
                                        <div class="text-danger">
                                            {{ $errors->first('nm_tugas') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="{{ route('tugas.index') }}" class="btn btn-outline-danger">Batal</a>
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
