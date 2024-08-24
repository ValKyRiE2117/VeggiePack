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

    <div class="container mt-5 cont-myorders">
        <main class="container">
            <div class="row gx-4">
                <div class="col-lg-3">
                    <div class="card p-3 pe-4 ps-4">
                        <div class="left">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h5><a href="<?= base_url('profile/ubah/' . $this->session->login['kode']) ?>"
                                        class="link-underline link-underline-opacity-0 text-dark">Profile</a>
                                </h5>
                                <a href="<?= base_url('profile/ubah/' . $this->session->login['kode']) ?>"
                                    class="text-dark"><i class="bi bi-person-circle"
                                        style="font-size: 1.5rem; "></i></a>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h5><a href="#" class="link-underline link-underline-opacity-0 text-success">My
                                        Orders</a>
                                </h5>
                                <a href="#" class="text-success"><i class="bi bi-clipboard-check"
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
                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Ordered</button>
                        </li>
                        <li class="nav-item ms-2" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">Canceled</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">No Invoice</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Total Bayar</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php foreach ($customer_orders as $orders) : ?>
                                        <?php if ($orders['status'] !== 'Batal') : ?>
                                        <tr class="align-items-center text-center">
                                            <form action="<?= base_url('myorder/update_status_batal') ?>" method="post"
                                                id="myForm">
                                                <input type="hidden" name="order_id"
                                                    value="<?= $orders['order_id']; ?>">
                                                <td>#<?= $orders['invoice']; ?></td>
                                                <td><?= $orders['tgl_order']; ?></td>
                                                <td>Rp.
                                                    <?= number_format($orders['total_bayar'], 0, ',', '.'); ?>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge bg-<?= getStatusColor($orders['status']); ?>"><?= $orders['status']; ?></span>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url("myorder/detail/". $orders['order_id']) ?>"
                                                        class="btn btn-sm btn-success">Detail</a>
                                                    <a class="btn btn-danger btn-sm"
                                                        onclick="return confirm('apakah anda ingin membatalkan order ini?')"
                                                        href="<?= base_url("myorder/update_status_batal?order_id=" . urlencode($orders['order_id'])) ?>">Batal</a>
                                                </td>
                                            </form>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">No Invoice</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Total Bayar</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php foreach ($customer_orders as $orders) : ?>
                                        <?php if ($orders['status'] == 'Batal') : ?>
                                        <tr class="align-items-center text-center">
                                            <td>#<?= $orders['invoice']; ?></td>
                                            <td><?= $orders['tgl_order']; ?></td>
                                            <td>Rp.
                                                <?= number_format($orders['total_checkout'] + $orders['cost_courier'], 0, ',', '.'); ?>
                                            </td>
                                            <td>
                                                <span
                                                    class="badge bg-<?= getStatusColor($orders['status']); ?>"><?= $orders['status']; ?></span>
                                            </td>
                                            <td>
                                                <a href="<?= base_url("myorder/detail/". $orders['order_id']) ?>"
                                                    class="btn btn-sm btn-success">Detail</a>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
            return 'dark';
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
        case 'Selesai':
            return 'secondary';
        default:
            return 'light'; // Default to light color for unknown status
    }
}
?>