<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Payment</title>

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

    <div class="container cont-orders-payment mt-5">
        <div class="success-cont">
            <img src="<?= base_url('uploads/success.png') ?>" alt="" class="">
            <h2 class="text-center display-6 mt-3"><span style="color: #198754;">Checkout </span><span
                    style="color: #EE7722;">Successful</span></h2>
        </div>
        <div class="row mt-3">
            <div class="col-lg-3">
                <div class="card pb-0 mb-0">
                    <div class="d-flex justify-content-between p-3 pb-0 mb-0">
                        <p style="font-size:1rem !important;">Harga Barang</p>
                        <h5 class="text-success">Rp. <?= number_format($content->total_checkout, 0, ',', '.') ?></h4>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="d-flex justify-content-between p-3 pb-0 mb-0">
                        <p style="font-size:1rem !important;">Ongkos Kirim</p>
                        <h5 class="text-success">Rp. <?= number_format($content->cost_courier, 0, ',', '.') ?></h4>
                    </div>
                    <?php if ($content->discount > 0): ?>
                    <hr class="p-0 m-0">
                    <div class="d-flex justify-content-between p-3 pb-0 mb-0">
                        <p style="font-size:1rem !important;">Total_harga</p>
                        <h5 class="text-success">Rp.
                            <?= number_format($content->total_checkout + $content->cost_courier, 0, ',', '.') ?>
                            </h4>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="d-flex justify-content-between p-3 pb-0 mb-0">
                        <p style="font-size:1rem !important;">Diskon</p>
                        <h5 class="text-success">Rp. <?= number_format($content->discount, 0, ',', '.') ?></h4>
                    </div>
                    <hr class="p-0 m-0">
                    <?php endif; ?>
                    <div class="bg-success d-flex justify-content-between p-3 pb-0 mb-0"
                        style="border-radius: 0 0 0.25rem 0.25rem;">
                        <p class="text-white" style="font-size:1rem !important;">Total Bayar</p>
                        <h5 class="text-white">
                            Rp. <?= number_format($content->total_bayar, 0, ',', '.') ?>
                            </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-2">THANK YOU FOR YOUR PURCHASE</h5>
                        <p class="card-text mb-2">Please Make a payment with one of our virtual Bank Account according
                            to the
                            <strong>Total Bayar</strong>
                        </p>
                        <ul class="list-group list-group-horizontal-xl text-center mb-2">
                            <li class="list-group-item ">Mandiri - <strong>45156209123123</strong></li>
                            <li class="list-group-item ">BCA - <strong>3209123123 </strong></li>
                            <li class="list-group-item ">BRI - <strong>1010320123123</strong></li>
                            <li class="list-group-item ">BNI - <strong>45103209123123</strong></li>
                        </ul>
                        <a class="text-success" href="<?= base_url('orders/') ?>"><strong>Please Confirm the Payment
                                Here!</strong> </a>
                        <hr>
                        <a href="<?= base_url('Shopping_cart')?>" class="btn btn-success"><i
                                class="bi bi-chevron-left"></i>&nbsp;&nbsp;Go Back</a>
                    </div>
                </div>
            </div>
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