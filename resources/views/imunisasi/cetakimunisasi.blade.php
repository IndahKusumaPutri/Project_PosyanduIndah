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

    <title>Cetak Data Imunisasi</title>
</head>

<body>
    <div class="card-body">
        <div class="card-header">
            <div class="float-sm-center">
                <p class="bold" align="center">Laporan Data Imunisasi</p>
            </div>
        </div>
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr>
                    <th width="10%">ID Imunisasi</th>
                    <th width="10%">Tanggal Imunisasi</th>
                    <th width="10%">NIB</th>
                    <th width="30%">Nama Balita</th>
                    <th width="10%">Usia Balita</th>
                    <th width="20%">Jenis Vaksin</th>
                    <th width="20%">Nama Kader</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cetakimunisasi as $i => $p)
                    <tr>
                        <td>{{ $p->kode }}</td>
                        <td>{{ $p->tgl_imun }}</td>
                        <td>{{ $p->pasien->NIB }}</td>
                        <td>{{ $p->pasien->nama_pasien }}</td>
                        <td>{{ $p->pasien->usia }} Bulan</td>
                        <td>{{ $p->vaksin->nama_vaksin }}</td>
                        <td>{{ $p->kader->nama_kader }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
