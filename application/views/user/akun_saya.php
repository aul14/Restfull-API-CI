<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"></h1>

    <div class="row">
        <div class="col-lg-6">
            
        </div>
    </div>
    <ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="">Akun Saya</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">Aplikasi Pengaduan Masyarakat</li>
</ol>
    <div class="row mb-3 col-lg-6">
        <a class="nav-link btn btn-info bg-lawrence mr-3" href="<?= base_url('user/edit/') . $user['id_user']; ?>">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profil</span></a>
        <a class="nav-link btn btn-info bg-lawrence mr-3" href="<?= base_url(); ?>user/gantipassword">
            <i class="fas fa-fw fa-key"></i>
            <span>Ganti Password</span></a>
    </div>
      <?= $this->session->flashdata('notifUser'); ?>

    <div class="card mb-3 col-lg-4">
        <div class="row no-gutters">
           
            <div class="col-md">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['user_nama']; ?></h5>
                    <p class="card-text">Email : <?= $user['user_email']; ?></p>
                    <p class="card-text">No Hp : <?= $user['user_hp']; ?></p>
                    <p class="card-text"><small class="text-muted">Tanggal Pendaftaran:  <?= $user['user_register']; ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->