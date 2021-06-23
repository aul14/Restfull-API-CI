<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-lawrence sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url('beranda') ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Pengaduan Masyarakat</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider ">
      <!-- Heading -->
      <div class="sidebar-heading">
        Home
      </div>
      <!-- Nav Item - Dashboard -->
      <li class="<?php if ($this->uri->segment(1) == "beranda") {
                    echo "nav-item active";
                  } elseif ($this->uri->segment(2) == "tampil_admin") {
                    echo "nav-item";
                  } else {
                    echo "nav-item";
                  } ?>">
        <a class="nav-link " href="<?php echo site_url('beranda') ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Profile
      </div>
      <li class="<?php if ($this->uri->segment(1) == "user") {
                    echo "nav-item active";
                  } else {
                    echo "nav-item";
                  } ?>">
        <a class="nav-link " href="<?php echo site_url('user') ?>">
          <i class="fas fa-user"></i>
          <span>Akun Saya</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Admin
      </div>

      <li class="<?php if ($this->uri->segment(1) == "admin") {
                    echo "nav-item active";
                  } else {
                    echo "nav-item";
                  } ?>">
        <a class="nav-link " href="<?php echo site_url('admin') ?>">
          <i class="fas fa-user-secret"></i>
          <span>Data Admin</span></a>
      </li>


      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Main
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="<?php if ($this->uri->segment(1) == "tampil_akun") {
                    echo "nav-item active";
                  } else {
                    echo "nav-item";
                  } ?> ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Pengaturan User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header ">Pengaturan User:</h6>
            <a class="collapse-item" href="<?php echo site_url('tampil_akun') ?>"><i class="fas fa-fw fa-users"></i> &nbsp;&nbsp;User</a>
            <a class="collapse-item" href="<?php echo site_url('tampil_akun/aktivitas_login') ?>"><i class="fas fa-sign-in-alt"></i> &nbsp;&nbsp;Aktivitas Login</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="<?php if ($this->uri->segment(1) == "tampil_pengaduan") {
                    echo "nav-item active";
                  } else {
                    echo "nav-item";
                  } ?> ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-envelope-open-text"></i>
          <span>Pengaduan Masyarakat</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pengaduan:</h6>
            <a class="collapse-item" href="<?php echo site_url('tampil_pengaduan') ?>"><i class="fas fa-download"></i>&nbsp;&nbsp;Pengaduan Masyarakat</a>
            <a class="collapse-item" href="<?php echo site_url('tampil_pengaduan/detail_tanggapan') ?>"><i class="fas fa-book"></i>&nbsp;&nbsp;Detail Tanggapan</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-calendar-alt"></i>
          <span>Laporan</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Laporan:</h6>
            <a class="collapse-item" href=""><i class="fas fa-print"></i>&nbsp;&nbsp;Pengaduan Masyarakat</a>
           
           
          </div>
        </div>
      </li>  -->

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item ">
        <a class="nav-link " href="">
          <i class="fas fa-calendar-alt"></i>
          <span>Laporan Pengaduan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Logout
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url() ?>auth/logout" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-power-off"></i>
          <span>Logout</span></a>
      </li>
      <p></p>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <p></p>
      <p></p>
      <p></p>
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->