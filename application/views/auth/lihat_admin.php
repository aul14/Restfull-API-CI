<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Admin</a>
    </li>
    <li class="breadcrumb-item active">Aplikasi Pengaduan Masyarakat</li>
  </ol>
  <?= $this->session->flashdata('addAkun'); ?>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <?php if ($this->session->userdata('idstatus') == 3) { ?>
      <div class="card-header py-3">

        <a href="<?php echo site_url('admin/tambah_admin') ?>" class="btn btn-primary"><i class="fas fa-upload"></i></i> Tambah Admin Baru </a>
      </div>
    <?php } ?>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Email Pengguna</th>
              <th>Nama Lengkap</th>
              <th>Tanggal Daftar</th>
              <th>Keterangan Daftar</th>
              <th>IP Address</th>
              <?php if ($this->session->userdata('idstatus') == 3) { ?>
                <th>Aksi</th>
              <?php } ?>

            </tr>
          </thead>

          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($tbl_user as $u) { ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $u->user_email ?></td>
                <td><?php echo $u->user_nama ?></td>
                <td><?php echo $u->user_register ?></td>
                <td><?php echo $u->keterangan ?></td>
                <td><?php echo $u->ip_address ?></td>

                <?php if ($this->session->userdata('idstatus') == 3) { ?>

                  <td>

                    <a href="<?php echo site_url('user/hapus_admin/' . $u->id_user) ?>" class="btn btn-outline-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin hapus data ini?')"><i class="material-icons">
                        delete
                      </i></a>
                  </td>
                <?php } ?>

              </tr>
            <?php } ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>

</div>
</div>