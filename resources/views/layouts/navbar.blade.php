<nav class="main-header navbar navbar-expand navbar-transparent navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                {{-- <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button> --}}
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <div class="user-panel mt-2 pb-2 mb-2 d-flex" data-toggle="dropdown" href="#">
          <img src="{{ asset('img/posyandu.png') }}" class="img-circle elevation-2" alt="user img">
        </div>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <img src="{{ asset('img/posyandu.png') }}" class="img-circle elevation mt-1 pt-1 pb-1 mb-1 col-sm-3">
              {{ Auth::user()->name }}
            </i>
            </a>
            <a href="/auth/profile" class="dropdown-item">
              <i class="fa fa-pen"> Edit Profile</i>
            </a>
            <a href="{{ route('logout') }}" class="dropdown-item">
              <i class="fa fa-key"> Log Out</i>
            </a>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> --}}
    </ul>
  </nav>