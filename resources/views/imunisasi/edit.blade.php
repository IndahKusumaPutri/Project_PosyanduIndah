@extends('layouts.app')
@section('menu', 'layanan')
@section('submenu', 'imunisasi')
@section('title', 'Imunisasi Balita')
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
                            <p>Ubah Data Imunisasi</p>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="/imunisasi/edit/{{ $imunisasi->id_imunisasi }}"
                            method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group row">
                                <label class="control-label col-sm-2">ID Imunisasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="kode" value="{{ $imunisasi->kode }}"
                                    readonly>
                                    @if ($errors->has('kode'))
                                        <div class="text-danger">
                                            {{ $errors->first('kode') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Tanggal Imunisasi</label>
                                <div class="col-sm-10">
                                    <input type="text" id="datePickerId" class="form-control" name="tgl_imun"
                                        value="{{ $imunisasi->tgl_imun }}" readonly>
                                    @if ($errors->has('tgl_imun'))
                                        <div class="text-danger">
                                            {{ $errors->first('tgl_imun') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">NIB</label>
                                <div class="col-sm-10">
                                    <select class="col-sm-12 form-control" name="id_pasien" id="NIB-dropdown" required>
                                        <option value="0" aria-readonly="true">
                                            -- Select NIB --</option>
                                        @foreach ($pasien as $key => $val)
                                            :
                                            <option value="<?= $val['id_pasien'] ?>" {{ $val->id_pasien == $imunisasi->id_pasien ? 'selected' : '' }}>
                                                {{ $val['NIB'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('NIB'))
                                        <div class="text-danger">
                                            {{ $errors->first('NIB') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Nama Balita</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"
                                        id="nm_balita" disabled placeholder="Nama Balita" value="{{ $imunisasi->pasien->nama_pasien }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Usia (Bulan)</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control"
                                        id="usia_balita" disabled placeholder="Usia Balita" value="{{ $imunisasi->pasien->usia }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Jenis Vaksin</label>
                                <div class="col-sm-10">
                                    <select class="col-sm-12 form-control" name="id_vaksin" >
                                        <option value="0" aria-readonly="true">
                                            -- Select Jenis Vaksin --</option>
                                        @foreach ($vaksin as $key => $val)
                                            :
                                            <option value="<?= $val['id_vaksin'] ?>" {{ $val->id_vaksin == $imunisasi->id_vaksin ? 'selected' : '' }}>
                                                {{ $val['nama_vaksin'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_vaksin'))
                                        <div class="text-danger">
                                            {{ $errors->first('id_vaksin') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Nama Kader</label>
                                <div class="col-sm-10">
                                    <select class="col-sm-12 form-control" name="id_kader" >
                                        <option value="0" aria-readonly="true">
                                            -- Select Nama Kader --</option>
                                        @foreach ($kader as $key => $val)
                                            :
                                            <option value="<?= $val['id_kader'] ?>" {{ $val->id_kader == $imunisasi->id_kader ? 'selected' : '' }}>
                                                {{ $val['nama_kader'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_kader'))
                                        <div class="text-danger">
                                            {{ $errors->first('id_kader') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="{{ route('imunisasi.index') }}" class="btn btn-outline-danger">Batal</a>
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
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#NIB-dropdown').on('change', function() {
            var id_pasien = this.value;

            $("#name-dropdown").html('');
            $.ajax({
                url: "{{ url('api/fetchbalita') }}",
                type: "GET",
                data: {
                    id: id_pasien
                },
                dataType: "json",
                success: function(result) {
                    $('#nm_balita').val(result[0].nama_pasien);
                    $('#usia_balita').val(result[0].usia);

                }
            });
        });
    });
</script>
