@extends('layouts.app')
@section('menu', 'layanan')
@section('submenu', 'nimbang')
@section('title', 'Data Penimbangan')
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
                                                            <p>Tambah Data Penimbangan</p>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <form class="form-horizontal" action="/nimbang/store"
                                                            action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> {{ csrf_field() }}
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">ID Timbang</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="id_timbang" value="{{ ("T-".$kd) }}" readonly>
                                                                    @if ($errors->has('id_timbang'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('id_timbang') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Tanggal
                                                                    Timbang</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="datePickerId" name="tgl"
                                                                        value="{{ $tglnimbang }}" readonly>
                                                                    @if ($errors->has('tgl'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('tgl') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">NIB</label>
                                                                <div class="col-sm-10">
                                                                    <select class="col-sm-12 form-control" name="id_pasien"
                                                                        id="NIB-dropdown">
                                                                        <option value="0" aria-readonly="true" >
                                                                            -- Select NIB --</option>
                                                                        @foreach ($pasien as $key => $val)
                                                                            :
                                                                            <option value="<?= $val['id_pasien'] ?>">
                                                                                {{ $val['NIB'] }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @if ($errors->has('id_pasien'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('id_pasien') }}
                                                                        </div>  
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Nama Balita</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="nameBalita" disabled placeholder="Nama Balita">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Usia (Bulan)</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        id="umurBalita" disabled placeholder="Umur Balita">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Berat Badan(KG)</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="berat" value="{{ old('berat') }}" placeholder="Masukkan Berat Badan">
                                                                    @if ($errors->has('berat'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('berat') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Tinggi Badan(CM)</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="tinggi" value="{{ old('tinggi') }}" placeholder="Masukkan Tinggi Badan">
                                                                    @if ($errors->has('tinggi'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('tinggi') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-2">Keterangan</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="status_gizi"
                                                                        value="{{ old('status_gizi') }}" placeholder="Masukkan Keterangan Kesehatan balita">
                                                                    @if ($errors->has('status_gizi'))
                                                                        <div class="text-danger">
                                                                            {{ $errors->first('status_gizi') }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-offset-5 col-sm-6">
                                                                    <a href="{{ route('nimbang.index') }}" class="btn btn-outline-danger">Kembali</a>
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
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#NIB-dropdown').on('change', function() {
            var id_pasien = this.value;

            $("#name-dropdown").html('');
            $.ajax({
                url: "{{ url('api/fetchnamebalita') }}",
                type: "GET",
                data: {
                    id: id_pasien
                },
                dataType: "json",
                success: function(result) {
                    $('#nameBalita').val(result[0].nama_pasien);
                    $('#umurBalita').val(result[0].usia);

                }
            });
        });
    });
</script>
