<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="">Ganti Password</a>
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
				<h6 class="m-0 font-weight-bold text-white">Ganti Password</h6>
			</div>
            <form action="<?= base_url(); ?>user/gantipassword" method="post">
            <?= $this->session->flashdata('info'); ?>
					<div class="row mt-3">
						<div class="col-sm-3 offset-1">
							<label for="passwordLama">Password Lama:</label>
						</div>
						<div class="col-sm-7">
							<input type="password" name="passwordLama" id="passwordLama" class="form-control"   required="required" autofocus="">
							<?= form_error('passwordLama'); ?>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-sm-3 offset-1">
							<label for="passwordBaru">Password Baru:</label>
						</div>
						<div class="col-sm-7">
							<input type="password" name="passwordBaru" id="passwordBaru" class="form-control" required="required">
							<?= form_error('passwordBaru'); ?>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-sm-3 offset-1">
							<label for="passwordBaru1">Masukan Kembali Password:</label>
						</div>
						<div class="col-sm-7">
							<input type="password" name="passwordBaru1" id="passwordBaru1" class="form-control"  required="required">
							<?= form_error('passwordBaru1'); ?>
						</div>
					</div>

					<div class="row mt-5">
						<div class="col-sm-7 offset-1">
							<a href="<?php echo site_url('user') ?>" class="btn btn-outline-success btn-xs"><i class="fas fa-chevron-left">
									Kembali
								</i></a>
						</div>
						<div>
							<button type="submit" class="btn btn-outline-primary float-sm-right"><i class="fas fa-save">&nbsp;Ganti Password</i></button>
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
