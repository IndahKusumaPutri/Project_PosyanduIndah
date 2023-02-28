<aside class="main-sidebar sidebar-light-info elevation-4">
    <!-- Brand Logo -->
    <a href="//" class="brand-link">
        <img src="{{ asset('img/Logo Posyandu.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">E-POSYANDU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('img/posyandu.png') }}" class="img-circle elevation-2" alt="user img">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div> --}}

        <!-- SidebarSearch Form -->
        <br />
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ e($__env->yieldContent('menu')) == 'dashboard' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item menu-open">
                    <a href="#"
                        class="nav-link {{ e($__env->yieldContent('menu')) == 'master' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-server"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('tugas.index') }}"
                                class="nav-link {{ e($__env->yieldContent('submenu')) == 'tugas' ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Data Tugas Kader</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kader.index') }}"
                                class="nav-link {{ e($__env->yieldContent('submenu')) == 'kader' ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Data Kader</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('vaksin.index') }}"
                                class="nav-link {{ e($__env->yieldContent('submenu')) == 'vaksin' ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Data Vaksin & Vitamin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ibu.index') }}"
                                class="nav-link {{ e($__env->yieldContent('submenu')) == 'ibu' ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Data Ibu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pasien.index') }}"
                                class="nav-link {{ e($__env->yieldContent('submenu')) == 'pasien' ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Data Balita</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#"
                        class="nav-link {{ e($__env->yieldContent('menu')) == 'layanan' ? 'active' : '' }}">
                        <i class="nav-icon fa fa-medkit"></i>
                        <p>
                            Layanan Kesehatan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('nimbang.index') }}"
                                class="nav-link {{ e($__env->yieldContent('submenu')) == 'nimbang' ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Penimbangan Balita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('imunisasi.index') }}"
                                class="nav-link {{ e($__env->yieldContent('submenu')) == 'imunisasi' ? 'active' : '' }}">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Imunisasi Balita</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
