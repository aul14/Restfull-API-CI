<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="">Edit Profil</a>
	</li>
	<li class="breadcrumb-item active" aria-current="page">Aplikasi Pengaduan Masyarakat</li>
</ol>

<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
    <!-- Basic Card Example -->
	<div class="col-sm-10 offset-1">
		<div class="card shadow mb-4">
			<div class="card-header py-3 bg-primary">
				<h6 class="m-0 font-weight-bold text-white">Edit Profil</h6>
			</div>
			<form action="" method="post">
					<div class="row mt-3">
						<div class="col-sm-3 offset-1">
							<label for="nama">Nama Lengkap</label>
						</div>
						<div class="col-sm-7">
							<input type="text" name="nama" id="nama" class="form-control"  value="<?php echo $user['user_nama']; ?>" required="required" autofocus="">
							<?= form_error('nama'); ?>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-sm-3 offset-1">
							<label for="useremail">Email</label>
						</div>
						<div class="col-sm-7">
							<input type="text" name="useremail" id="useremail" class="form-control" value="<?php echo $user['user_email']; ?>" required="required" readonly>
							<?= form_error('useremail'); ?>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-sm-3 offset-1">
							<label for="userhp">No Handphone</label>
						</div>
						<div class="col-sm-7">
							<input type="number" name="userhp" id="userhp" class="form-control" value="<?php echo $user['user_hp']; ?>" required="required">
							<?= form_error('userhp'); ?>
						</div>
					</div>

					<div class="row mt-5">
						<div class="col-sm-7 offset-1">
							<a href="<?php echo site_url('user') ?>" class="btn btn-outline-success btn-xs"><i class="fas fa-chevron-left">
									Kembali
								</i></a>
						</div>
						<div>
							<button type="submit" name="edit" class="btn btn-outline-primary float-sm-right"><i class="fas fa-save">&nbsp;Simpan</i></button>
							<button type="reset" class="btn btn-outline-danger float-sm-right mr-2"><i class="fas fa-times-circle">&nbsp;Batal</i></button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>

<!-- /.container-fluid -->

<!-- End of Main Content -->
