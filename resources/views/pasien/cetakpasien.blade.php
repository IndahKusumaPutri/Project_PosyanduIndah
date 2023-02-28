<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('tampilan/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Search Icons --> 
    <link rel="stylesheet" href="{{asset('tampilan/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('tampilan/dist/css/adminlte.min.css')}}">
    
    <title>Cetak Data Pasien</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="margin-top: 10px;" width="full">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-text-width"></i>
                     Data Balita
                    </h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <dl class="row">
                      <dt class="col-sm-4">NIB</dt>
                      <dd class="col-sm-8">{{ $cetakpasien->NIB }}</dd>
                      <dt class="col-sm-4">Nama Balita</dt>
                      <dd class="col-sm-8">{{ $cetakpasien->nama_pasien }}</dd>
                      <dt class="col-sm-4">Jenis Kelamin</dt>
                      <dd class="col-sm-8">{{ $cetakpasien->jenkel }}</dd>
                      <dt class="col-sm-4">Tempat Lahir</dt>
                      <dd class="col-sm-8">{{ $cetakpasien->tempat_lahir }}</dd>
                      <dt class="col-sm-4">Tanggal Lahir</dt>
                      <dd class="col-sm-8">{{ $cetakpasien->tanggal_lahir }}</dd>
                      <dt class="col-sm-4">Usia Balita</dt>
                      <dd class="col-sm-8">{{ $cetakpasien->usia }} Bulan</dd>
                      <dt class="col-sm-4">ID Ibu</dt>
                      <dd class="col-sm-8">{{ $cetakpasien->ibu->ID }}</dd>
                      <dt class="col-sm-4">Nama Ibu</dt>
                      <dd class="col-sm-8">{{ $cetakpasien->ibu->nama_ibu }}</dd>
                      <dt class="col-sm-4">Berat Badan</dt>
                      <dd class="col-sm-8">...</dd>
                      <dt class="col-sm-4">Tinggi Badan</dt>
                      <dd class="col-sm-8">...</dd>
                      <dt class="col-sm-4">Keterangan</dt>
                      <dd class="col-sm-8">...</dd>
                      <dt class="col-sm-4">Jenis Vaksin</dt>
                      <dd class="col-sm-8">...</dd>
                      <dt class="col-sm-4">Ruang Imunisasi </dt>
                      <dd class="col-sm-8">...</dd>
                    </dl>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div> 
        </div> 
    </div>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>

{{-- $dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'potrait');

$dompdf->render();

$dompdf->stream(" Data Balita.pdf", array("Attachment"=>0));
?> --}}
