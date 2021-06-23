<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Aktivitas Login</a>
          </li>
          <li class="breadcrumb-item active">Aplikasi Pengaduan Masyarakat</li>
        </ol>
        <?= $this->session->flashdata('notifSesi'); ?>

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
            <th>Nama User</th>
            <th>Status Login</th>
            <th>Waktu Login</th>
            <th>Waktu Logout</th>
            <th>Aksi</th>
            
          </tr>
        </thead>
       
        <tbody>
        <?php $no = 1; ?>
        <?php foreach ($sesi as $u){ ?>
          <tr>
           <td><?php echo  $no++; ?></td>
            <td><?php echo $u->id_user ?></td>
            <td><?php echo $u->sesi_status ?></td>
            <td><?php echo $u->sesi_time ?></td>
            <td><?php echo $u->sesi_logout ?></td>
           
           <td>
            
             <a href="<?php echo site_url('user/hapus_sesi/'. $u->id_sesi) ?>" class="btn btn-outline-danger btn-xs" onclick="return confirm('Apakah Anda yakin ingin hapus data ini?')"><i class="material-icons">
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

