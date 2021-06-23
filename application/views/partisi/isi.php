<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <div class="panel panel-flat bg-info">
    <div class="panel-heading">
      <h3 class="panel-title">
        <!-- <marquee scrollamount="8"><span style="color: white"><center>Selamat Datang,

          </center></span></marquee> -->
      </h3>
    </div>
  </div>
  <br>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <?php
    if ($user) {
      foreach ($user as $d) {
    ?>
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Pengguna</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $d->total ?></div>

                </div>
                <div class="col-auto">
                  <i class="fas fa-users"></i>
                </div>
              </div>
            </div>
            <a href="tampil_akun" style="text-align:center;">

              <i class="fas fa-chevron-circle-left"></i> Selengkapnya

            </a>
          </div>
        </div>
    <?php
      }
    }
    ?>
    <!-- Earnings (Monthly) Card Example -->
    <?php
    if ($admin) {
      foreach ($admin as $d) {
    ?>
        <div class="col-xl-6 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Admin</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $d->total ?></div>
                </div>

                <div class="col-auto">
                  <i class="material-icons">
                    supervised_user_circle
                  </i>
                </div>
              </div>

            </div>
            <a href="admin" style="text-align:center;">

              Selengkapnya <i class="fas fa-chevron-circle-right"></i>

            </a>
          </div>
        </div>
    <?php
      }
    }
    ?>
    <!-- Content Row -->

    <!-- Area Chart -->

  </div>
  <div class="row">
    <div class="col-lg-12">

      <div class="calendar"></div>
      <div class="box"></div>
      <br>
    </div>

    <br>


  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->