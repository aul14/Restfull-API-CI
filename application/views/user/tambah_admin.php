<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="">Tambah Admin</a>
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
				<h6 class="m-0 font-weight-bold text-white">Tambah Admin</h6>
			</div>
			<form action="" method="post">
				<div class="row mt-3">
					<div class="col-sm-3 offset-1">
						<label for="nama">Nama Lengkap</label>
					</div>
					<div class="col-sm-7">
						<input type="text" name="nama_lengkap" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required="required" autofocus="">
						<?= form_error('nama_lengkap'); ?>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-sm-3 offset-1">
						<label for="useremail">Email</label>
					</div>
					<div class="col-sm-7">
						<input type="text" name="email" id="useremail" class="form-control" class="calendar" placeholder="Masukkan Email" required="required">
						<?= form_error('email'); ?>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-sm-3 offset-1">
						<label for="userhp">No Handphone</label>
					</div>
					<div class="col-sm-7">
						<input type="number" name="hp" id="userhp" class="form-control" placeholder="Masukkan No Handphone" required="required">
						<?= form_error('userhp'); ?>
					</div>
				</div>

				<div class="row mt-3">
					<div class="col-sm-3 offset-1">
						<label for="password">Password</label>
					</div>
					<div class="col-sm-7">
						<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required="required">
						<?= form_error('password'); ?>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-sm-3 offset-1">
						<label for="password2">Masukan Kembali Password</label>
					</div>
					<div class="col-sm-7">
						<input type="password" name="password2" id="password2" class="form-control" placeholder="Tulis Kembali Password" required="required">
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-sm-3  offset-1 ">
						<a href="<?php echo site_url('beranda/tampil_admin') ?>" class="btn btn-outline-success btn-xs"><i class="fas fa-chevron-left">
								Kembali
							</i></a>

					</div>
					<div class="col-sm-7">
						<button type="submit" class="btn btn-outline-primary float-sm-right"><i class="fas fa-save">&nbsp;Simpan</i></button>
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