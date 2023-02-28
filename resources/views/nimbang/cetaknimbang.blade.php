<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Search Icons -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('tampilan/dist/css/adminlte.min.css') }}">

    <title>Cetak Data Penimbangan</title>
</head>

<body>
    <div class="card-body">
        <div class="card-header">
            <div class="float-sm-center">
                <p class="bold" align="center">Laporan Data Penimbangan</p>
            </div>
        </div>
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr>
                    <th width="10%">ID Timbang</th>
                    <th>Tanggal Timbang</th>
                    <th width="10%">NIB</th>
                    <th width="20%">Nama Balita</th>
                    <th>Usia Balita</th>
                    <th>Berat Badan(KG)</th>
                    <th>Tinggi Badan(CM)</th>
                    <th width="30%">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cetaknimbang as $i => $p)
                    <tr>
                        <td>{{ $p->id_timbang }}</td>
                        <td>{{ $p->tgl }}</td>
                        <td>{{ $p->pasien->NIB }}</td>
                        <td>{{ $p->pasien->nama_pasien }}</td>
                        <td>{{ $p->pasien->usia }} Bulan</td>
                        <td>{{ $p->berat }}</td>
                        <td>{{ $p->tinggi }}</td>
                        <td>{{ $p->status_gizi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
    window.print();
</script>

</html>
