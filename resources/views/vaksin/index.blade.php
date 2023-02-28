@extends('layouts.app')
@section('menu', 'master')
@section('submenu', 'vaksin')
@section('title','Data Vaksin')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0"><center><font color="A8A4CE">Data Vaksin dan Vitamin</font></center></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('vaksin.index') }}">Home</a></li> --}}
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            @if (session('Data dihapus'))
                <div class="alert alert-danger" role="alert">
                    {{ session('Data dihapus') }}
                </div>
            @endif

            @if (session('Data diedit'))
                <div class="alert alert-success" role="alert">
                    {{ session('Data diedit') }}
                </div>
            @endif

            @if (session('Data ditambah'))
                <div class="alert alert-success" role="alert">
                    {{ session('Data ditambah') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin-top: 10px">
                        <div class="panel panel-default">
                            <div class="card-header">
                                <div class="col-md-12">
                                    <a href="/vaksin/create" class="btn btn-outline-info"><i class="nav-icon fa fa-thin fa-plus-square"> Tambah Data</i></a>
                                    <a href="/cetakvaksin" target="_blank" class="btn btn-outline-primary"><i class="fas fa-print"> Cetak Data</i></a>
                                    {{-- <a href="/cetakrutin" target="_blank" class="btn btn-outline-primary"><i class="fas fa-print"> Cetak Data</i></a> --}}
                                </div>
                                <br/>
                                <!--/.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table id="table-data" class="table table-hover text-nowrap">
                                        <thead>
                                            <tr class="table-info">
                                                <th>No</th>
                                                <th>Nama Vaksin</th>
                                                <th>Usia Wajib</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vaksin as $i => $p)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $p->nama_vaksin }}</td>
                                                    <td>{{ $p->usia_wajib }}</td>
                                                    <td>
                                                        <form method="post"
                                                            action="{{ route('vaksin.destroy', $p->id_vaksin) }}">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a href="{{ route('vaksin.edit', $p->id_vaksin) }}" class="btn btn-outline-success"><i class="nav-icon fa fa-solid fa-marker"></i></a>
                                                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin anda ingin menghapus data tersebut?')"><i class="nav-icon fa fa-thin fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <br/>
                                    <font color="red">*Catatan = Data ini berdasarkan vaksin atau vitamin yang akan diberikan oleh petugas puskesmas kepada para balita</font>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
