@extends('layouts.app')
@section('menu', 'master')
@section('submenu', 'pasien')
@section('title','Data Balita')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0"><center><font color="A8A4CE">Data Balita</font></center></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('pasien.index') }}">Home</a></li> --}}
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
                                    <div class="float-sm-right">
                                        {{-- <p>Seluruh Data Balita</p> --}}
                                    </div>
                                    <a href="/pasien/create" class="btn btn-outline-info"><i class="nav-icon fa fa-thin fa-plus-square"> Tambah Data</i></a>
                                    <a href="/cetakpasien" target="_blank" class="btn btn-outline-primary"><i class="fas fa-print"> Cetak Data</i></a>
                                </div>
                                <br/>
                                <!--/.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table id="table-data" class="table table-hover text-nowrap">
                                        <thead>
                                            <tr class="table-info">
                                                <th>NIB</th>
                                                <th>Nama Balita</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Usia</th>
                                                <th>Nama Ibu</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pasien as $i => $p)
                                                <tr>
                                                    <td>{{ $p->NIB }}</td>
                                                    <td>{{ $p->nama_pasien }}</td>
                                                    <td>{{ $p->jenkel }}</td>
                                                    <td>{{ $p->usia }} Bulan</td>
                                                    <td>{{ $p->ibu->nama_ibu }}</td>
                                                    <td>
                                                        <form method="post"
                                                            action="{{ route('pasien.destroy', $p->id_pasien) }}">
                                                            {{ csrf_field() }}
                                                            <a href="{{ route('pasien.show', $p->id_pasien) }}"
                                                                class="btn btn-outline-warning"><i
                                                                    class="nav-icon fa fa-thin fa-eye"></i></a>
                                                            <a href="{{ route('pasien.edit', $p->id_pasien) }}"
                                                                class="btn btn-outline-success"><i
                                                                    class="nav-icon fa fa-solid fa-marker"></i></a>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button class="btn btn-outline-danger" type="submit"
                                                                onclick="return confirm('Yakin anda ingin menghapus data tersebut?')"><i
                                                                    class="nav-icon fa fa-thin fa-trash"></i></button>
                                                            <a href="{{ 'cetakpasien/'.$p->id_pasien }}" target="_blank" class="btn btn-outline-primary"><i class="fas fa-print"></i></a>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
