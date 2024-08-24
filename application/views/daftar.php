<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>SB Admin 2 - Daftar</title>
	<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body class="">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-lg-8 my-5">

				<div class="card o-hidden border-0 shadow-lg">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
							
							<div class="col-lg-12">
								<div class="px-5 pt-4">
									<div class="text-center">
									<?php if ($this->session->flashdata('success')) : ?>
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<?= $this->session->flashdata('success') ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php elseif($this->session->flashdata('error')) : ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<?= $this->session->flashdata('error') ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php endif ?>
										
									<form  action="<?= base_url('Daftar/proses_tambah') ?>" id="form-tambah" method="POST">
										<div class="mb-3 mt-2 p-2 text-center rounded text-gray-100" style="background-color:#F58025">Data Pribadi</div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12" style="display:none">
												<input type="text" name="kode" placeholder="Masukkan Kode" autocomplete="off"  class="form-control" required value="CST<?= mt_rand(100, 999) ?>" maxlength="8" readonly>
                                            </div>
											<div class="form-group col-md-12">
                                                <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" autocomplete="off" required name="nama">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <input type="text" class="form-control" id="alamat" placeholder="Alamat" required name="alamat">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="email" class="form-control" id="email" placeholder="Email" autocomplete="off" required name="email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="alamat" placeholder="No. Telp" required name="telepon">
                                            </div>
										</div>
											<div class="mb-3 mt-2 p-2 text-center rounded text-gray-100" style="background-color:#F58025">Data Login</div>
										<div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="username" placeholder="Masukkan Username" autocomplete="off" required name="username_customer">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="password" class="form-control" id="password" placeholder="Masukkan Password" required name="password_customer">
                                            </div>
                                            <div class="form-group col-md-12">
												<button type="submit" class="btn btn-success btn-block" ></i>&nbsp;&nbsp;Simpan</button>
                                            </div>
                                            <div class="text-center form-group col-md-12 mt-2">
                                                <p><a href="<?= base_url('login') ?>" class="text-success text-center">Sudah Punya Akun? Login Disini</a></p>
                                            </div>
                                        </div>
									</form>
								</div>
							</div>
						
					</div>
				</div>

			</div>

		</div>

	</div>

	<script src="<?= base_url('sb-admin') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('sb-admin') ?>/js/sb-admin-2.min.js"></script>
</body>



</html>

