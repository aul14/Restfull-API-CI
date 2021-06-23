<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="">Sukses Ganti Password</a>
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
				<h6 class="m-0 font-weight-bold text-white">Sukses Ganti Password</h6>
			</div>
            <form action="" method="post">
            <?= $this->session->flashdata('info'); ?>
					<div class="row mt-3">
                        <div class="col-sm offset-1">
						<h3>Tekan "Keluar" Jika Anda Ingin Login Kembali</h3>

                        </div>
					</div>

					<div class="row mt-5">
						<div class="col-sm-7 offset-1">
						
							<a href="<?php echo site_url('user') ?>" class="btn btn-outline-primary float-sm-right">&nbsp;Tetap Login</a>
							<a  href="<?php echo site_url('auth/logout') ?>" class="btn btn-outline-danger float-sm-right mr-2"><i class="fas fa-times-circle">&nbsp;Keluar</i></a>
						</div>
					</div>

				</form>
			</div>
		</div>
    </div>
    
</div>

<!-- /.container-fluid -->

<!-- End of Main Content -->
