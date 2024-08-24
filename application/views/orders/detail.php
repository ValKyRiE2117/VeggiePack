<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('partials/head.php') ?>

</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        $total_harga = 0;
        ?>
        <!-- load sidebar -->
        <?php $this->load->view('partials/sidebar.php') ?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- load Topbar -->
                <?php $this->load->view('partials/topbar.php') ?>

                <div class="container-fluid">
                    <div class="clearfix">
                        <div class="float-left">
                            <h1 class="h3 m-0 text-gray-800"><?= $title ?></h1>
                        </div>
                        <div class="float-right">
                            <a href="<?= base_url('orders/lihat') ?>" class="btn btn-secondary btn-sm"><i
                                    class="fa fa-reply"></i>&nbsp;&nbsp;Kembali</a>
                        </div>
                    </div>
                    <hr>
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
                    <?php endif; ?>

                    <!-- <?php foreach ($orders as $detail) : ?>
                        <?php
                                $total_harga += $detail->total_harga;  
                                ?>
                    <?php endforeach; ?> -->
                    <div class="card shadow col-md-12">
                        <div class="card-header"><strong><?= $title ?> - #<?= $detail->invoice ?></strong>
                            &nbsp;&nbsp;
                            <span
                                class="badge text-white bg-<?= getStatusColor($detail->status); ?>"><?= $detail->status ?></span>
                        </div>
                        <div class="card-body">
                            <div class="row pb-0">
                                <div class=" col-lg-6">
                                    <div class="d-flex justify-content-between">
                                        <p style="font-size: 1rem !important;">Nama Customer</p>
                                        <strong>
                                            <p style="font-size: 1rem !important;" class="text-success">
                                                <?= $detail->nama?></p>
                                        </strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="font-size: 1rem !important;">Order Date</p>
                                        <strong>
                                            <p style="font-size: 1rem !important;">
                                                <?= $detail->tgl_order; ?>
                                            </p>
                                        </strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="font-size: 1rem !important;">Delivery</p>
                                        <strong>
                                            <p style="font-size: 1rem !important;"><?= $detail->courier?></p>
                                        </strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="font-size: 1rem !important;">Alamat</p>
                                        <strong>
                                            <p style="font-size: 1rem !important;"><?= $detail->address?></p>
                                        </strong>
                                    </div>

                                </div>
                                <div class=" col-lg-6">
                                    <div class="d-flex justify-content-between">
                                        <p style="font-size: 1rem !important;">Total Harga</p>
                                        <strong>
                                            <h5 class="text-success">Rp.
                                                <?= number_format($total_harga, 0, ',', '.') ?>
                                            </h5>
                                        </strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="font-size: 1rem !important;">Ongkos Kirim</p>
                                        <strong>
                                            <h5 class="text-success">Rp.
                                                <?= number_format($detail->cost_courier, 0, ',', '.') ?></h5>
                                        </strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="font-size: 1rem !important;">Diskon</p>
                                        <strong>
                                            <h5 class="text-success">Rp.
                                                <?= number_format($detail->discount, 0, ',', '.') ?></h5>
                                        </strong>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p style="font-size: 1rem !important;">Total Bayar</p>
                                        <strong>
                                            <h5 class="text-success">
                                                Rp.<?= number_format($total_bayar = $total_harga + $detail->cost_courier, 0, ',', '.') ?>
                                            </h5>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama Barang</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Harga</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $detail) : ?>
                                            <?php
                                            $total_harga += $detail->total_harga;  
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    <div class="d-flex align-items-center">
                                                        <img src="<?= base_url('./uploads/' . $detail->gambar) ?>"
                                                            class="img-fluid rounded" style="width: 120px;" alt="Book">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                        <div class="flex-column">
                                                            <p class=" mb-0 text-success">
                                                                <?= $detail->nama_barang; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="align-middle text-center">
                                                    <div class="d-flex flex-row">
                                                        <input min="0" name="quantity" value="<?= $detail->quantity; ?>"
                                                            type="number" class="form-control text-center" disabled
                                                            style="width: 50px;text-align:center" />
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
                        </div>


                        <div class="px-4 pb-4">
                            <form action="<?= base_url('orders/update_status') ?>" method="post">
                                <input type="hidden" name="order_id" value="<?= $detail->order_id ?>">
                                <label for="exampleFormControlSelect1">Order Status</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="status">
                                    <option value="Belum Dibayar"
                                        <?= $detail->status == 'Menunggu Pembayaran' ? 'selected' : '' ?>>
                                        Menunggu Pembayaran</option>
                                    <option value="Dibayar" <?= $detail->status == 'Dibayar' ? 'selected' : '' ?>>
                                        Dibayar
                                    </option>
                                    <option value="Diproses" <?= $detail->status == 'Diproses' ? 'selected' : '' ?>>
                                        Diproses
                                    </option>
                                    <option value="Dikirim" <?= $detail->status == 'Dikirim' ? 'selected' : '' ?>>
                                        Dikirim
                                    </option>
                                    <option value="Selesai" <?= $detail->status == 'Selesai' ? 'selected' : '' ?>>
                                        Selesai
                                    </option>
                                    <option value="Request Batal"
                                        <?= $detail->status == 'Request Batal' ? 'selected' : '' ?>>
                                        Request Batal
                                    </option>
                                    <option value="Batal" <?= $detail->status == 'Batal' ? 'selected' : '' ?>>
                                        Batal
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-success mt-3">Update Status</button>
                            </form>

                        </div>
                        <?php if (!empty($order_confirmation) && $detail->status !== 'Belum Dibayar'): ?>
                        <div class="modal-body">
                            <form class="row g-3" method="post" action="<?= base_url('myorder/confirmation/') ?>">
                                <input type="hidden" class="form-control" id="order_id" name="order_id"
                                    value="<?= $detail->order_id?>">
                                <div class="col-md-6">
                                    <label for="account_name" class="form-label">Account Name</label>
                                    <input type="text" class="form-control" id="account_name" name="account_name"
                                        value="<?= $order_confirmation->account_name ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" name="account_number"
                                        value="<?= $order_confirmation->account_number ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Evidence of Transfer</label>
                                    <img src="<?= base_url('./uploads/' . $order_confirmation->evidence) ?>"
                                        class="img-fluid rounded-3 mx-auto d-block" style="max-width:70%;" alt="Book">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea class="form-control" id="note" name="note"
                                        rows="8"><?= $order_confirmation->note ?></textarea>
                                </div>
                                <div class="col-md-6 pb-3">
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
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- load footer -->
                <?php $this->load->view('partials/footer.php') ?>

            </div>
        </div>
        <?php $this->load->view('partials/js.php') ?>
        <script src="<?= base_url('sb-admin/js/demo/datatables-demo.js') ?>"></script>
        <script src="<?= base_url('sb-admin') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    </div>
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