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

    <title>Cetak Data Ibu</title>
</head>

<body>
    <div class="card-body">
        <div class="card-header">
            <div class="float-sm-center">
                <p class="bold" align="center">Laporan Data Ibu</p>
            </div>
        </div>
        <table class="table table-bordered text-nowrap">
            <thead>
                <tr>
                    <th width="3%">ID Ibu</th>
                    <th width="20%">NIK</th>
                    <th width="20%">Nama Ibu</th>
                    <th>No Telepon</th>
                    <th width="30%">Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cetakibu as $i => $p)
                    <tr>
                        <td>{{ $p->ID }}</td>
                        <td>{{ $p->nik }}</td>
                        <td>{{ $p->nama_ibu }}</td>
                        <td>{{ $p->no_telp }}</td>
                        <td>{{ $p->alamat }}</td>
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
