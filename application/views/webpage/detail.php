<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product-Detail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round&family=Quicksand:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
    <?php include "style.css"?>
    </style>

    <style>

    </style>
</head>

<body>

    <?php $this->load->view('partials/header-webpage'); ?>

    <div class="container detail-cont">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb ">
                <li class="breadcrumb-item "><a href="<?= base_url('allproduct') ?>" class="text-success">All
                        Products</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#" class="text-secondary">Detail</a>
                </li>
            </ol>
        </nav>
        <!-- <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('success') ?>

        </div>
        <?php elseif($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('error') ?>

        </div>
        <?php endif ?> -->
        <form action="<?= base_url('shopping_cart/add_to_cart') ?>" method="post" class="row">
            <input type="hidden" name="kode_barang" value="<?= $barang->kode_barang ?>">
            <input type="hidden" name="gambar" value="<?= $barang->gambar ?>">
            <input type="hidden" name="harga_barang" value="<?= $barang->harga_barang ?>">
            <div class="col-lg-4">
                <img src="<?= base_url('./uploads/' . $barang->gambar) ?>" alt="Gambar Barang" class="card-img rounded">
            </div>
            <div class="col-lg-1">

            </div>
            <div class="col-lg-7">
                <div class="d-flex justify-content-between align-items-center">
                    <h3>Pack <?= $barang->nama_barang ?></h3>
                    <h3 style="font-size:2.2rem;color:#ee7722">Rp.
                        <b><?= number_format($barang->harga_barang, 0, ',', '.') ?></b>
                    </h3>
                </div>

                <hr>
                <p class="text-secondary"><?php echo htmlspecialchars( $barang->deskripsi_barang); ?></p>

                <div class="row d-flex align-items-center">
                    <div class="col-lg-3">
                        <div class="input-group">
                            <button type="button" class="btn btn-success quantity-btn" onclick="decreaseQuantity()"><i
                                    class="bi bi-dash-lg"></i></button>
                            <input type="number" name="quantity" id="quantity"
                                class="form-control quantity-input col-auto" value="1" min="1"
                                style="text-align:center">
                            <button type="button" class="btn btn-success quantity-btn" onclick="increaseQuantity()"><i
                                    class="bi bi-plus-lg"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-8 pt-3">
                        <p>Stok Tersisa: <?= $barang->stok ?></p>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="d-grid gap-4 d-md-block">
                        <button type="submit" class="btn btn-lg btn-success me-2">
                            <i class="bi bi-cart-plus" style="font-size: 1.3rem;"></i>&nbsp;Add to Cart
                        </button>
                        <a class="btn btn-lg btn-outline-success" href="<?= base_url('Shopping_cart')?>">
                            <i class="bi bi-cart2" style="font-size: 1.3rem;"></i>&nbsp;Go to
                            My Cart
                        </a>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- Load Footer -->

    <?php $this->load->view('partials/footer-webpage.php') ?>

    <!-- Load Modal Login Page -->

    <?php $this->load->view('partials/modal-login.php') ?>

    <!-- Load Modal Min Stok -->

    <?php $this->load->view('partials/modal-min-stok.php') ?>

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

<script>
function increaseQuantity() {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
}

function decreaseQuantity() {
    var quantityInput = document.getElementById('quantity');
    var currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
    }
}
</script>

<style>
.btn-outline-success {
    font-weight: 500 !important;
}
</style>