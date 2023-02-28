@extends("layouts.app")
@section("menu","master")
@section("submenu","tugas")
@section("title","Data Tugas")
@section("content")
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0"><center><font color="A8A4CE">Data Tugas</font></center></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
    <div class="container-fluid">
      @if(session('Data dihapus'))
            <div class="alert alert-danger" role="alert">
                {{session('Data dihapus')}}
            </div>
        @endif

        @if(session('Data ditambah'))
            <div class="alert alert-success" role="alert">
                {{session('Data ditambah')}}
            </div>
        @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="margin-top: 10px">
            <div class="panel panel-default">
                <div class="card-header">
                    <div class="col-md-12">
                      <a href="/tugas/create" class="btn btn-outline-info"><i class="nav-icon fa fa-thin fa-plus-square"> Tambah Data</i></a>
                    </div>
                    <br/>
                    <!--/.card-header -->
                    <div class="card-body table-responsive p-0">
                      <table id="table-data" class="table table-hover text-nowrap">
                            <thead>
                                <tr class="table-info">
                                <th>No</th>
                                <th>Tugas</th>
                                <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tugas as $i => $p)
                                <tr> 
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $p->nm_tugas }}</td>
                                    <td>
                                      <form method="post" action="{{ route('tugas.destroy',$p->id_tugas) }}"> {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <a href="{{ route('tugas.edit', $p->id_tugas) }}" class="btn btn-outline-success"><i class="nav-icon fa fa-solid fa-marker"></i></a>
                                          <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Yakin anda ingin menghapus data tersebut?')"><i
                                          class="nav-icon fa fa-thin fa-trash"></i></button>
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