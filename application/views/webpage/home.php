<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeggiePack</title>

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
</head>

<body>

    <!-- Load Header -->

    <?php
        // Set warna teks sesuai dengan kebutuhan di halaman ini
        $home_text_color = '#198754'; // Ganti dengan warna yang diinginkan
    ?>

    <?php $this->load->view('partials/header-webpage', compact('home_text_color')); ?>

    <div class="container mt-5">
        <div class="row banner">
            <div class="col-lg-6 d-flex banner-text">
                <h1 class="display-3 align-self-center">Make Healthy Eating <span
                        style="color: #EE7722; font-weight: 500;">Easier</span> With Us</h1>
                <br>
            </div>
            <div class="col-lg-6 d-flex">
                <img src="uploads/eating-vegan food-rafiki.svg" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <div class="container mt-5 ">
        <h2 class="text-center display-6">Why Choose <span style="color: #EE7722;">Us?</span> </h2>
        <br>
        <div class="row d-flex why-us">
            <div class="col-lg-3 why-us-card">
                <div class="text-center">
                    <img src="uploads/why-6.png" alt="" width="100" height="100" class="mx-auto d-block">
                    <br>
                    <h4>Affordable</h4>
                    <p>Enjoying fresh vegetables has never been more affordable. we offers a cost-effective solution to
                        eating healthily, and making every meal a delicious and nutritious experience.</p>
                </div>
            </div>
            <div class="col-lg-3 why-us-card">
                <div class="text-center">
                    <img src="uploads/why-5.png" alt="" width="100" height="100" class="mx-auto d-block">
                    <br>
                    <h4>Fresh</h4>
                    <p>We is dedicated to providing the freshest vegetables available. We carefully select and prepare
                        our produce to ensure that you get the highest quality, farm-fresh vegetables with every
                        package.</p>
                </div>
            </div>
            <div class="col-lg-3 why-us-card">
                <div class="text-center">
                    <img src="uploads/why-4.png" alt="" width="100" height="100" class="mx-auto d-block">
                    <br>
                    <h4>Convenience</h4>
                    <p>VeggiePack offers unparalleled convenience. We provides pre-cut, pre-washed, and ready-to-cook
                        vegetables, saving you time and effort in the kitchen. </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 guide">
        <div class="row">
            <div class="col-lg-6 left">
                <img src="uploads/checkout-rafiki.svg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 right mb-4">
                <h2 class="display-5 ">Shopping <span style="color: #EE7722;">Guide</span></h2>
                <br>
                <img src="uploads/guide.png" class="img-fluid img-guide" alt="">
            </div>
        </div>
    </div>
    <div class="mx-auto container mt-5">
        <h2 class="text-center display-6 mb-5">Our <span style="color: #EE7722;">Products</span> </h2>
        <div class="product-cont">
            <?php $counter = 0; ?>
            <?php foreach ($all_barang as $barang): ?>
            <?php if ($counter < 4): ?>
            <div class="product-card">
                <a href="<?= base_url('allproduct/detail/' . $barang->kode_barang) ?>" style="text-decoration:none;">
                    <div class="card">
                        <img src="<?= base_url('./uploads/' . $barang->gambar) ?>" alt="Gambar Barang"
                            class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-black" style="font-family:'Quicksand', san-serif;">
                                <?= $barang->nama_barang ?></h5>
                            <p class="card-text desc-barang text-black" style="margin-bottom:10px;">
                                <?php echo htmlspecialchars( $barang->deskripsi_barang); ?></p>

                            <a class="btn btn-success">Rp. <?= number_format($barang->harga_barang, 0, ',', '.') ?></a>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">Last Updated: <?= $barang->tgl_barang_dibuat ?></small>
                        </div>
                    </div>
                </a>
            </div>
            <?php $counter++; ?>
            <?php endif; ?>
            <?php endforeach ?>
        </div>

        <br>
        <div class="text-end">
            <a href="<?= base_url('allproduct') ?>" class="text-success" style="text-decoration:none">See All
                Products&nbsp;<i class="bi bi-chevron-right"></i></a>
        </div>

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