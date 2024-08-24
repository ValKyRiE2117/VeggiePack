<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>

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
    <div class="container cont-shop-chart">
        <main class="container">
            <div class="row gx-4">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table">
                            <?php if (empty($shopping_cart_data)) : ?>
                            <div class="col-lg-12 text-center mt-3">
                                <h6 style="font-family:'Quicksand'" class="text-secondary">Your Cart is Empty</h6>
                                <img src="<?= base_url('./uploads/Empty-amico.png') ?>" alt=""
                                    style="width:50%;margin-top:-2rem">
                            </div>

                            <?php elseif($shopping_cart_data) : ?>
                            <thead>
                                <tr>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($shopping_cart_data as $cart_item) : ?>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('./uploads/' . $cart_item['gambar']) ?>"
                                                class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2 text-success"><?= $cart_item['nama_barang']; ?></p>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-row">
                                            <input min="0" name="quantity" value="<?= $cart_item['quantity']; ?>"
                                                type="number" class="form-control text-center" style="width: 50px;" />
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="mb-0" style="font-weight: 500;">Rp.
                                            <?= number_format($cart_item['total_harga'], 0, ',', '.') ?></p>
                                    </td>
                                    <td class="align-middle ">
                                        &nbsp;&nbsp;<a class="btn btn-close"
                                            onclick="return confirm('apakah anda ingin menghapus barang ini?')"
                                            href="<?= base_url('Shopping_cart/hapus/' . $cart_item['id_cart']); ?>"></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>

                            </tbody>
                            <?php endif ?>

                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="<?= base_url('orders/checkout/') ?>" method="post" id="checkoutForm">
                        <input name="sub_total" value="<?= $sub_total ?>" type="hidden"
                            class="form-control text-center" />
                        <div class="card pb-0 mb-0">
                            <div class="d-flex justify-content-between p-3 pb-0 mb-0">
                                <p>Total harga</p>
                                <h4 class="text-success"> Rp.
                                    <?= number_format($sub_total, 0, ',', '.') ?></h4>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="accordion accordion-flush pt-0" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            <i class="bi bi-pin-map"
                                                style="font-size:1.3rem; color:#ee7722"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Destination
                                        </button>
                                    </h3>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <!-- <label for="address" class="form-label">Alamat Tujuan</label> -->
                                            <textarea class="form-control" placeholder="Masukkan Alamat" name="address"
                                                id="address"></textarea>
                                            <hr>
                                            <label for="province" class="form-label">Provinsi</label>
                                            <select name="province" id="province" class="form-control" required>
                                                <option value="" selected>-- Pilih Provinsi --</option>
                                                <?php for($i=0; $i<count($provinces['rajaongkir']['results']); $i++) { ?>
                                                <option
                                                    value=" <?= $provinces['rajaongkir']['results'][$i]['province_id'] ?>">
                                                    <?= $provinces['rajaongkir']['results'][$i]['province'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <label for="city" class="form-label mt-1">Kota</label>
                                            <select name="city" id="city" class="form-control" required>
                                                <option value="">-- Pilih Kota --</option>
                                                <?php for($i=0; $i<count($cities['rajaongkir']['results']); $i++) { ?>
                                                <option value="<?= $cities['rajaongkir']['results'][$i]['city_id'] ?>">
                                                    <?= $cities['rajaongkir']['results'][$i]['city_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            <i class="bi bi-truck"
                                                style="font-size:1.4rem; color:#ee7722"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delivery
                                            Method
                                        </button>
                                    </h3>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <select name="courier" id="" class="form-control" required>
                                                <option value="">-- Pilih Jasa Pengiriman --</option>
                                                <option value="jne">JNE</option>
                                                <option value="tiki">Tiki</option>
                                                <option value="pos">POS Indonesia</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="#" style="text-decoration:none" id="checkoutLink"
                                <?php if (empty($shopping_cart_data)) echo 'disabled'; ?>>
                                <div class="bg-success d-flex justify-content-center mb-0 text-white p-2"
                                    style="border-radius: 0 0 0.35rem 0.35rem; font-size:1.2rem">
                                    Checkout
                                </div>
                            </a>
                        </div>
                    </form>

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

    <!-- Add this JavaScript code to your existing view -->

    <script>
    document.getElementById('checkoutLink').addEventListener('click', function() {
        document.getElementById('checkoutForm').submit();
    });
    </script>
</body>

<style>
#checkoutLink[disabled] {
    pointer-events: none;
    opacity: 0.5;
}
</style>

</html>