<!DOCTYPE html>
<html lang="en">
`

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product</title>

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

    <?php
        // Set warna teks sesuai dengan kebutuhan di halaman ini
        $allproducts_text_color = '#198754'; // Ganti dengan warna yang diinginkan
    ?>

    <?php $this->load->view('partials/header-webpage', compact('allproducts_text_color')); ?>

    <div class="container all-product" data-url="<?= base_url('barang') ?>">
        <h2 class="text-center display-6">Our <span style="color: #EE7722;">Product</span> </h2>
        <br>
        <p class="mb-5">Unlock the ease of healthy cooking with VeggiePack! Our pre-cut, fresh vegetable packs bring
            convenience to your kitchen. Packed with nutrition and a step-by-step cooking guide, VeggiePack ensures a
            delicious and hassle-free culinary experience. Affordable and wholesome – redefine your meals with
            VeggiePack today!</p>

        <div class="product-cont">
            <?php foreach ($all_barang as $barang): ?>
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
            <?php endforeach ?>
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