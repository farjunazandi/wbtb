<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <nav class="navbar navbar-light bg-primary">
        <a href="admin_home">
            <img src="{{ url('assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image" width="80px" height="80px">
            <span class="brand-text font-weight-light"><strong>WBTB - {{ auth()->user()->name }}</strong></span>
        </a>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/admin/home" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Beranda
                  </p>
                </a>
            </li>
        </ul>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">DATA</li>
            <li class="nav-item">
                <a href="/admin/alternatif" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Alternatif
                  </p>
                </a>
            </li>
            <?php if (auth()->user()->role == 'Admin') { ?>
              <li class="nav-item">
                <a href="/admin/substansi" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Substansi
                  </p>
                </a>
              </li> 
            <?php } ?>
            <li class="nav-item">
                <a href="/admin/kriteria" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Kriteria
                  </p>
                </a>
            </li>
            <?php if (auth()->user()->role == 'Admin') { ?>
              <li class="nav-item">
                <a href="/admin/skoring" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Perhitungan
                  </p>
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
                <a href="/admin/ranking" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Ranking
                  </p>
                </a>
            </li>
            <li class="nav-header">SETUP</li>
            <?php if (auth()->user()->role == 'Admin') { ?>
              <li class="nav-item">
                <a href="/admin/user" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Kelola User
                  </p>
                </a>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a href="/admin/changePasswordView" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Ubah Password
                  </p>
                </a>
            </li>
            <li class="nav-header">MASTER DATA</li>
            <li class="nav-item">
                <a href="/admin/provinsi" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Provinsi
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/admin/kab_kota" class="nav-link active">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Kabupaten / Kota
                  </p>
                </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>