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

    <title>Cetak Data Kader</title>
</head>

<body>
    <div class="card-body">
        <div class="card-header">
            <div class="float-sm-center">
                <p class="bold" align="center">Laporan Data Kader</p>
            </div>
        </div>
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="20%">Nama Kader</th>
                    <th>Jenis Kelamin</th>
                    <th width="5%">No Telepon</th>
                    <th width="10%">Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th width="20%">Alamat</th>
                    <th>Tugas</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cetakkader as $i => $p)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $p->nama_kader }}</td>
                        <td>{{ $p->jenkel_kader }}</td>
                        <td>{{ $p->no_hp }}</td>
                        <td>{{ $p->tempat_lahir }}</td>
                        <td>{{ $p->tanggal_lahir }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->tugas->nm_tugas }}</td>
                        <td>{{ $p->email }}</td>
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
