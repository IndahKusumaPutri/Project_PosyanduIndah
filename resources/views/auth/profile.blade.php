@extends("layouts.app")
@section('title','Edit Profile')
@section("content")
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0"><center>EDIT PROFILE</center></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            {{-- <li class="breadcrumb-item"><a href="{{ route('kader.index') }}">Home</a></li> --}}
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    @if(session('Data diedit'))
      <div class="alert alert-success" role="alert">
        {{session('Data diedit')}}
      </div>
      @endif
    <div class="container-fluid text-left">
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/posyandu.png') }}" alt="User Profile Picture">
              </div>

              <div class="profile-username text-center">
                  <h3 class="d-block nav-link dropdown-item">{{ Auth::user()->name }}</h3>
              </div>

                  <p class="text-muted text-center">{{ Auth::user()->role }}</p>

              <form action="/auth/profile" method="POST" class="form-horizontal">
              {{ csrf_field() }}

                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Ubah Nama</label>
                  <div class="col-sm-10">
                    <input type="name" name="name" class="form-control" id="name">
                  </div>
                </div>

                <div class="form-group row">
                  <label for="email" class="col-sm-2 col-form-label">Ubah Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email">
                  </div>
                </div> 

                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Ubah Password</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password">
                  </div>
                </div> 

                <button type="submit" class="btn btn-primary btn-block"><b><i class="bi bi-pencil-fill"></i> Edit</b></button>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection