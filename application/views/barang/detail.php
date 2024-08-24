<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('partials/head.php') ?>
</head>

<body id="page-top">
    <div id="wrapper">
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

                            <a href="<?= base_url('barang') ?>" class="btn btn-secondary btn-sm"><i
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
                    <?php endif ?>
                    <div class="card shadow col-md-12">
                        <div class="card-header"><strong><?= $title ?> - <?= $barang->nama_barang ?></strong></div>
                        <div class="card-body row">
                            <div class="col-md-8">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Kode Barang</strong></td>
                                        <td>:</td>
                                        <td><?= $barang->kode_barang ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama Barang</strong></td>
                                        <td>:</td>
                                        <td><?= $barang->nama_barang ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Deskripsi Barang</strong></td>
                                        <td>:</td>
                                        <td><?php echo htmlspecialchars( $barang->deskripsi_barang); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Barang Dibuat</strong></td>
                                        <td>:</td>
                                        <td><?= $barang->tgl_barang_dibuat ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Stok Barang</strong></td>
                                        <td>:</td>
                                        <td><?= $barang->stok ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Harga Barang</strong></td>
                                        <td>:</td>
                                        <td><?= $barang->harga_barang ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-4 card-img">
                                <img src="<?= base_url('./uploads/' . $barang->gambar) ?>" alt="Gambar Barang"
                                    class="card-img rounded">
                            </div>
                        </div>
                    </div>

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
</body>

</html>