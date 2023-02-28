<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-POSYANDU - @yield('title')</title>

    <style type="text/css">
        .preloader {
            top: 0;
            left: 0;
            width: 100;
            height: 90%;
            z-index: 9999;
            position: fixed;
            background-color: white;
        }

        .loading {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            /* animation: mymove 30s Infinite alternate; */
        }
    </style>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Search Icons -->
    <link rel="stylesheet" href="{{ asset('tampilan/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('tampilan/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="preloader">
        <div class="loading">
            <img src="{{ asset('/img/loading.gif') }}">
        </div>
    </div>
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        {{-- <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside> --}}
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('layouts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('tampilan/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('tampilan/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('tampilan/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('tampilan/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tampilan/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('tampilan/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('tampilan/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('tampilan/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('tampilan/dist/js/adminlte.min.js') }}"></script>
    <script>
        if ($('#table-data')) {
            $('#table-data').DataTable({
                "order": [[2, "desc"]]
            })
        }

        

        $(document).ready(function() {
            datePickerId.max = new Date().toISOString().split("T")[0];
        })

        function getDataPasien() {
            var data = {
                id_pasien: parseInt($('#id_pasien option:selected').val())
            }
            $.ajax({
                url: "{{ route('pasien.index') }}",
                data: data,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    console.log(res.content[0]);
                    $('#nik').val(res.content[0].nik);
                    $('#nama_pasien').val(res.content[0].nama_pasien);
                }
            });
        }
    </script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('preloader').delay('100000').fadeout();
        });
    </script>
</body>
 
</html>