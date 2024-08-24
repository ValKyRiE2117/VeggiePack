<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round&family=Quicksand:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
    <?php include "style.css"?>
    </style>
</head>

<body>
    <?php $this->load->view('partials/header-webpage'); ?>

    <div class="container mt-2 cont-profile">
        <main class="container" id="content" data-url="<?= base_url('profile') ?>">
            <div class="row gx-4">
                <div class="col-lg-3">
                    <div class="card p-3 pe-4 ps-4">
                        <div class="left">
                            <div class="d-flex justify-content-between align-items-baseline text-success">
                                <h5><a href="#" class="link-underline link-underline-opacity-0 text-success">Profile</a>
                                </h5>
                                <a href="#" class="text-success"><i class="bi bi-person-circle"
                                        style="font-size: 1.5rem; "></i></a>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h5><a href="<?= base_url('orders/') ?>"
                                        class="link-underline link-underline-opacity-0 text-dark">My Orders</a>
                                </h5>
                                <a href="<?= base_url('orders/') ?>" class="text-dark"><i class="bi bi-clipboard-check"
                                        style="font-size: 1.5rem; "></i></a>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h5><a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        class="link-underline link-underline-opacity-0 text-danger">Logout</a>
                                </h5>
                                <a type="button" class="text-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="bi bi-box-arrow-right text-danger"
                                        style="font-size: 1.5rem; "></i></a>
                            </div>
                            </h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="card p-4">
                        <form action="<?= base_url('profile/proses_ubah/'. $customer->kode) ?>" id="form-tambah"
                            method="POST">
                            <div class="row mb-3">
                                <input type="text" name="kode" placeholder="Masukkan Kode customer" autocomplete="off"
                                    class="form-control" required value="<?= $customer->kode ?>" maxlength="8" readonly
                                    style="display: none;">
                                <div class="form-group col-lg-12">
                                    <label for="nama" class="mb-2">Nama Lengkap</label>
                                    <input type="text" name="nama" autocomplete="off" class="form-control" required
                                        value="<?= $customer->nama ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-lg-6">
                                    <label for="email" class="mb-2"><strong>Email</strong></label>

                                    <input type="email" name="email" autocomplete="off" class="form-control" required
                                        value="<?= $customer->email ?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="telepon" class="mb-2"><strong>No. Telp</strong></label>
                                    <input type="number" name="telepon" autocomplete="off" class="form-control" required
                                        value="<?= $customer->telepon ?>">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="alamat" class="mb-2"><strong>Alamat</strong></label>
                                <textarea name="alamat" id="alamat" style="resize: none;"
                                    class="form-control"><?= $customer->alamat ?></textarea>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="username_customer" class="mb-2"><strong>Username
                                        </strong></label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i
                                                class="bi bi-person-circle"></i></span>
                                        <input type="text" name="username_customer" autocomplete="off"
                                            class="form-control" required value="<?= $customer->username_customer ?>">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password_customer" class="mb-2"><strong>Password
                                        </strong></label>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping"><i
                                                class="bi bi-key"></i></span>
                                        <input type="password" name="password_customer" autocomplete="off"
                                            class="form-control" required value="<?= $customer->password_customer ?>">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success me-2"><i
                                        class="bi bi-floppy"></i>&nbsp;&nbsp;Save</button>
                                <button type="reset" class="btn btn-danger"><i
                                        class="bi bi-x-lg"></i>&nbsp;&nbsp;Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Logout</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure want to Logout?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a class="btn btn-danger" href="<?= base_url('logout') ?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

        </main>

    </div>

    <!-- Load Footer -->

    <?php $this->load->view('partials/footer-webpage.php') ?>

    <!-- Load Modal Login Page -->

    <?php $this->load->view('partials/modal-login.php') ?>

    <!-- Load Modal Sign Up Page -->

    <?php $this->load->view('partials/modal-daftar.php') ?>

    <!-- Load Modal Privacy Page -->

    <?php $this->load->view('partials/modal-privacy.php') ?>

    <!-- Load Modal Terms of Use Page -->

    <?php $this->load->view('partials/modal-terms-of-use.php') ?>

    <!-- Load Modal Logout Page -->

    <?php $this->load->view('partials/modal-logout.php') ?>
</body>

</html>