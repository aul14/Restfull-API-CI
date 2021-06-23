<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Pengaduan</a>
    </li>
    <li class="breadcrumb-item active">Aplikasi Pengaduan Masyarakat</li>
  </ol>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?= $this->session->flashdata('addLapor'); ?>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" id="dataTable" width="130%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Isi</th>
              <th>Lokasi</th>
              <th>Instansi</th>
              <th>Id Pengguna</th>
              <th>Saran</th>
              <th>File Gambar</th>
              <th>Tanggal Pengaduan</th>
              <th>Aksi</th>

            </tr>
          </thead>

          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($tbl_pengaduan as $u) { ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $u->judul_pengaduan ?></td>
                <td><?php echo $u->isi_pengaduan ?></td>
                <td><?php echo $u->lokasi_pengaduan ?></td>
                <td><?php echo $u->nama_instansi ?></td>
                <td><?php echo $u->id_user ?></td>
                <td><?php echo $u->saran_pengaduan ?></td>
                <td><?php echo $u->gambar_pengaduan ?></td>
                <td><?php echo $u->tanggal_pengaduan ?></td>

                <td>
                  <a href="<?php echo site_url('tampil_pengaduan/tambah_tanggapan/' . $u->id_pengaduan) ?>" class="btn btn-outline-success btn-xs"><i class="material-icons">
                      comment
                    </i></a>
                  <a href="<?php echo site_url('beranda/hapus_pengaduan/' . $u->id_pengaduan); ?>" class="btn btn-outline-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin hapus data ini?')"><i class="material-icons">
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
</div>