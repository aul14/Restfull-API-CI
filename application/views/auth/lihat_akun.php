<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Pengguna</a>
    </li>
    <li class="breadcrumb-item active">Aplikasi Pengaduan Masyarakat</li>
  </ol>
  <?= $this->session->flashdata('addAkun'); ?>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Email Pengguna</th>
              <th>Nama Lengkap</th>
              <th>Aksi</th>

            </tr>
          </thead>

          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($tbl_user as $u) { ?>
              <tr>
                <td><?php echo  $no++; ?></td>
                <td><?php echo $u->user_email ?></td>
                <td><?php echo $u->user_nama ?></td>


                <td>
                  <a href="#form" class="btn btn-outline-success btn-xs" data-toggle="modal" onclick="submit('+<?php echo $u->id_user ?>+')"><i class="material-icons">
                      visibility
                    </i> </a>
                  <a href="<?php echo site_url('user/hapus_user/' . $u->id_user) ?>" class="btn btn-outline-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin hapus data ini?')"><i class="material-icons">
                      delete
                    </i></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>

        </table>



      </div>
    </div>
  </div>

</div>

<!--  -->

<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pengguna</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <table class="table">
        <tr>
          <td>Nama</td>
          <td><input type="text" name="user_nama" placeholder="Nama" class="form-control" readonly /></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="text" name="user_email" placeholder="Email" class="form-control" readonly /></td>
        </tr>
        <tr>
          <td>No Hp</td>
          <td><input type="number" name="user_hp" placeholder="Belum Terdaftar" class="form-control" readonly /></td>
        </tr>
        <tr>
          <td>IP Address</td>
          <td><input type="text" name="ip_address" placeholder="IP Address" class="form-control" readonly /></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td><input type="text" name="keterangan" placeholder="Keterangan" class="form-control" readonly /></td>
        </tr>
        <tr>
          <td>Tanggal Pendaftaran</td>
          <td><input type="text" name="user_register" placeholder="Tanggal Pendaftaran" class="form-control" readonly /></td>
        </tr>
        <tr>
          <td></td>
          <td><button type="button" id="btn-keluar" class="btn btn-outline-danger float-sm-right" data-dismiss="modal">Keluar</button></td>
        </tr>
      </table>
    </div>
  </div>
</div>

</div>