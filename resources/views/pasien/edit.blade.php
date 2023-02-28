@extends('layouts.app')
@section('menu', 'master')
@section('submenu', 'pasien')
@section('title', 'Data Balita')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0">Ubah Data Warga</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        {{-- <li class="breadcrumb-item"><a href="{{ route('pasien.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Ubah Data Warga</li> --}}
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
                            <p>Ubah Data Warga</p>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="/pasien/edit/{{ $pasien->id_pasien }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="POST">
                            <div class="form-group row">
                                <label class="control-label col-sm-2">NIB</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="NIB" 
                                    value="{{ $pasien->NIB }}" {{ $pasien->NIB == $pasien->NIB ? 'selected' : '' }} readonly>
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
                                    <input type="text" class="form-control" name="nama_pasien"
                                        value="{{ $pasien->nama_pasien }}" placeholder="Masukkan Nama">
                                    @if ($errors->has('nama_pasien'))
                                        <div class="text-danger">
                                            {{ $errors->first('nama_pasien') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Jenis Kelamin</label>
                                <div class="col-sm-6">
                                    <label for="jenkel">
                                        <input type="radio" name="jenkel"
                                            value="{{ $pasien->jenkel == 'laki-laki' ? 'laki-laki' : 'laki-laki' }}"
                                            {{ $pasien->jenkel == 'laki-laki' ? 'checked' : '' }}> &nbsp Laki-Laki &nbsp
                                        &nbsp &nbsp
                                        <input type="radio" name="jenkel"
                                            value="{{ $pasien->jenkel == 'perempuan' ? 'perempuan' : 'perempuan' }}"
                                            {{ $pasien->jenkel == 'perempuan' ? 'checked' : '' }}> &nbsp Perempuan
                                    </label>
                                    @if ($errors->has('jenkel'))
                                        <div class="text-danger">
                                            {{ $errors->first('jenkel') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Tempat Lahir</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tempat_lahir"
                                        value="{{ $pasien->tempat_lahir }}" placeholder="Masukkan Tempat Lahir">
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
                                    <input type="date" id="datePickerId" class="form-control" name="tanggal_lahir"
                                        value="{{ $pasien->tanggal_lahir }}">
                                    @if ($errors->has('tanggal_lahir'))
                                        <div class="text-danger">
                                            {{ $errors->first('tanggal_lahir') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="control-label col-sm-2">Usia</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="usia" 
                                    value="{{ $pasien->usia }}" placeholder="Masukkan Usia">
                                    @if ($errors->has('usia'))
                                        <div class="text-danger">
                                            {{ $errors->first('usia') }}
                                        </div>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="form-group row">
                                <label class="control-label col-sm-2">ID Ibu</label>
                                <div class="col-sm-10">
                                    <select class="col-sm-12 form-control" name="id_ibu" id="ID-dropdown">
                                        <option value="0" aria-readonly="true">
                                            -- Select ID Ibu --</option>
                                        @foreach ($ibu as $key => $val)
                                            :
                                            <option value="<?= $val['id_ibu'] ?>" {{ $val->id_ibu == $pasien->id_ibu ? 'selected' : '' }}>
                                                {{ $val['ID'] }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('id_ibu'))
                                        <div class="text-danger">
                                            {{ $errors->first('id_ibu') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-2">Nama Ibu</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nameibu" disabled
                                        placeholder="Nama Ibu" value="{{ $pasien->ibu->nama_ibu }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-offset-2 col-sm-6">
                                    <a href="{{ route('pasien.index') }}" class="btn btn-outline-danger">Batal</a>
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
        $('#ID-dropdown').on('change', function() {
            var id_ibu = this.value;

            $("#name-dropdown").html('');
            //console.log(id_ibu);
            $.ajax({
                url: "{{ url('api/fetchnameibu') }}",
                type: "GET",
                data: {
                    id: id_ibu
                },
                dataType: "json",
                success: function(result) {
                    $('#nameibu').val(result[0].nama_ibu);

                }
            });
        });
    });
</script>
