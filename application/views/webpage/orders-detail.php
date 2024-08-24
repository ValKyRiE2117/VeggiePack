<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>

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

    <?php
    $total_harga = 0;
    $total_bayar = 0;
    $discount = 0;
    ?>
    <div class="container mt-5 cont-myorders">
        <main class="container">

            <div class="row gx-4">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order_detail as $detail) : ?>
                                <?php
                                $total_harga += $detail->total_harga;  
                                $discount += $detail->discount; // Increment the total_bayar
                                $total_bayar += $detail->total_bayar; // Increment the total_bayar
                                ?>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= base_url('./uploads/' . $detail->gambar) ?>"
                                                class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                                            <div class="flex-column ms-4">
                                                <p class="mb-2 text-success"><?= $detail->nama_barang; ?></p>
                                            </div>
                                        </div>
                                    </th>
                                    <td class="align-middle text-center">
                                        <div class="d-flex flex-row">
                                            <input min="0" name="quantity" value="<?= $detail->quantity; ?>"
                                                type="number" class="form-control text-center" style="width: 50px;" />
                                        </div>
                                    </td>

                                    <td class="align-middle">
                                        <p class="mb-0" style="font-weight: 500;">Rp.
                                            <?= number_format($detail->total_harga, 0, ',', '.') ?></p>
                                    </td>

                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card pb-0 mb-0">
                        <div class="d-flex justify-content-between p-3 pb-0 mb-0">
                            <p style="font-size: 1rem !important;">Invoice</p>
                            <p style="font-size: 1rem !important;">#<?= $detail->invoice?></p>
                        </div>
                        <div class="d-flex justify-content-between p-3 pb-0 pt-0 mb-0">
                            <p style="font-size: 1rem !important;">Order Date</p>
                            <p style="font-size: 1rem !important;">
                                <?= date('d-m-Y', strtotime($detail->tgl_order)); ?></p>
                        </div>
                        <div class="d-flex justify-content-between p-3 pb-0 pt-0 mb-0">
                            <p style="font-size: 1rem !important;">Delivery</p>
                            <p style="font-size: 1rem !important;"><?= $detail->courier?></p>
                        </div>
                        <div class="d-flex justify-content-between p-3 pb-0 pt-0 mb-0">
                            <p style="font-size: 1rem !important;">Alamat</p>
                            <p style="font-size: 1rem !important;"><?= $detail->address?></p>
                        </div>
                        <div class="d-flex justify-content-between p-3 pb-0 pt-0 mb-0">
                            <p style="font-size: 1rem !important;">Status</p>
                            <p style="font-size: 1rem !important;"><span
                                    class="badge bg-<?= getStatusColor($detail->status); ?>"><?= $detail->status ?></span>
                            </p>
                        </div>
                        <hr class="p-0 m-0">
                        <div class="d-flex justify-content-between p-3 pb-0 pt-3 mb-0">
                            <p style="font-size: 1rem !important;">Total harga</p>
                            <h5 class="text-success">Rp. <?= number_format($total_harga, 0, ',', '.') ?></h4>
                        </div>
                        <hr class="p-0 m-0">
                        <div class="d-flex justify-content-between p-3 pb-0 pt-3 mb-0">
                            <p style="font-size: 1rem !important;">Ongkos Kirim</p>
                            <h5 class="text-success">Rp. <?= number_format($detail->cost_courier, 0, ',', '.') ?></h4>
                        </div>
                        <hr class="p-0 m-0">
                        <div class="d-flex justify-content-between p-3 pb-0 pt-3 mb-0">
                            <p style="font-size: 1rem !important;">Diskon</p>
                            <h5 class="text-success">Rp. <?= number_format($detail->discount, 0, ',', '.') ?></h4>
                        </div>
                        <hr class="p-0 m-0">
                        <div class=" d-flex justify-content-between p-3 pt-3 pb-0 mb-0">
                            <p style="font-size: 1.1rem !important;">Total Bayar</p>
                            <h5 class="text-success">Rp.
                                <?= number_format($total_bayar, 0, ',', '.') ?>
                                </h4>
                        </div>
                        <?php if ($detail->status === 'Belum Dibayar'): ?>
                        <a href="" style="text-decoration:none" data-bs-toggle="modal" data-bs-target="#ModalBayar">
                            <div class="bg-success d-flex justify-content-center mb-0 text-white p-2"
                                style="border-radius: 0 0 0.35rem 0.35rem; font-size:1.2rem">
                                Bayar
                            </div>
                        </a>
                        <?php elseif ($detail->status === 'Dikirim'): ?>
                        <a href="" style="text-decoration:none" data-bs-toggle="modal" data-bs-target="#ModalConfirm">
                            <div class="bg-success d-flex justify-content-center mb-0 text-white p-2"
                                style="border-radius: 0 0 0.35rem 0.35rem; font-size:1.2rem">
                                Konfirmasi
                            </div>
                        </a>
                        <?php else: ?>
                        <a href="" style="text-decoration:none" data-bs-toggle="modal"
                            data-bs-target="#ModalLihatPembayaran">
                            <div class="bg-success d-flex justify-content-center mb-0 text-white p-2"
                                style="border-radius: 0 0 0.35rem 0.35rem; font-size:1.2rem">
                                Lihat Pembayaran
                            </div>
                        </a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>

            <!-- Modal Bayar -->

            <div class="modal fade modal-lg" id="ModalBayar" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="ModalBayarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalBayarLabel">Payment Confirmation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" method="post" action="<?= base_url('myorder/confirmation/') ?>"
                                enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="order_id" name="order_id"
                                    value="<?= $detail->order_id?>">
                                <div class="col-md-6">
                                    <label for="account_name" class="form-label">Account Name</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea class="form-control" id="note" name="note">-</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <input type="number" class="form-control" id="nominal" name="nominal" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="evidence" class="form-label">
                                        Evidence of Transfer</label>
                                    <input type="file" class="form-control" id="evidence" name="evidence" required>
                                    <div id="" class="form-text">
                                        Only JPG/JPEG/PNG With Maximum file 10MB
                                    </div>
                                </div>

                                <label for="" class="form-label">Payment Method</label>
                                <div class="col-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="inlineRadio1"
                                            value="Mandiri" checked>
                                        <label class="form-check-label" for="inlineRadio1">Mandiri</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="inlineRadio2"
                                            value="BCA">
                                        <label class="form-check-label" for="inlineRadio2">BCA</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="inlineRadio2"
                                            value="BRI">
                                        <label class="form-check-label" for="inlineRadio2">BRI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="method" id="inlineRadio2"
                                            value="BNI">
                                        <label class="form-check-label" for="inlineRadio2">BNI</label>
                                    </div>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Confirm</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php if ($detail->status !== 'Belum Dibayar'): ?>
            <!-- Modal Lihat Pembayaran -->

            <div class="modal fade modal-lg" id="ModalLihatPembayaran" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="ModalBayarLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalBayarLabel">Payment Confirmation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" method="post" action="<?= base_url('myorder/confirmation/') ?>">
                                <input type="hidden" class="form-control" id="order_id" name="order_id"
                                    value="<?= $detail->order_id?>">
                                <div class="col-md-6">
                                    <label for="account_name" class="form-label">Account Name</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name"
                                        value="<?= $order_confirmation->account_name ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number"
                                        value="<?= $order_confirmation->account_number ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="form-label">Evidence of Transfer</label>
                                    <img src="<?= base_url('./uploads/' . $order_confirmation->evidence) ?>"
                                        class="img-fluid rounded-3 mx-auto d-block" style="max-width:70%;" alt="Book">
                                </div>
                                <div class="col-md-6">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea class="form-control" id="note" name="note"
                                        rows="8"><?= $order_confirmation->note ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <input type="number" class="form-control" id="nominal" name="nominal"
                                        value="<?= $order_confirmation->nominal ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="method" class="form-label">Payment Method</label>
                                    <input type="text" class="form-control" id="method" name="method"
                                        value="<?= $order_confirmation->method ?>">
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <?php endif; ?>

            <!-- Modal Confirm Arrival -->

            <div class="modal fade modal-sm" id="ModalConfirm" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="ModalConfirmLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="ModalConfirmLabel">Konfirmasi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body ">
                            <p class="text-center">Apakah Pesanan anda sudah sampai?</p>
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="<?= base_url('myorder/update_status_selesai/') ?>">
                                <input type="hidden" class="form-control" id="order_id" name="order_id"
                                    value="<?= $detail->order_id?>">
                                <div class="d-grid gap-2 col-12 mx-auto">
                                    <button type="submit" class="btn btn-success" type="button">Sudah</button>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

            <!-- Modal Logout -->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Logout</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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

<?php
function getStatusColor($status)
{
    switch ($status) {
        case 'Belum Dibayar':
            return 'secondary';
        case 'Dibayar':
            return 'info';
        case 'Diproses':
            return 'primary';
        case 'Dikirim':
            return 'success';
        case 'Request Batal':
            return 'warning';
        case 'Batal':
            return 'danger';
        default:
            return 'light'; // Default to light color for unknown status
    }
}
?>