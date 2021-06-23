<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Detail Tanggapan</a>
    </li>
    <li class="breadcrumb-item active">Aplikasi Pengaduan Masyarakat</li>
  </ol>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Judul Pengaduan</th>
              <th>Isi Pengaduan</th>
              <th>Lokasi Pengaduan</th>
              <th>Tanggal Pengaduan</th>
              <th>Nama Pelapor</th>
              <th>Nama Menanggapi</th>
              <th>Tanggal Tanggapan</th>
              <th>Isi Tanggapan</th>


            </tr>
          </thead>

          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($detail as $u) { ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $u->judul_pengaduan ?></td>
                <td><?php echo $u->isi_pengaduan ?></td>
                <td><?php echo $u->lokasi_pengaduan ?></td>
                <td><?php echo $u->tanggal_pengaduan ?></td>
                <td><?php echo $u->user_nama ?></td>
                <td><?php echo $u->nama_menanggapi ?></td>
                <td><?php echo $u->tanggal_tanggapan ?></td>
                <td><?php echo $u->isi_tanggapan ?></td>




              </tr>
            <?php } ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>

</div>
</div>