<div class="modal fade" id="ModalDaftar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= base_url('Daftar/proses_tambah') ?>" id="form-tambah" method="POST">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <h1 class="modal-title text-success" id="exampleModalLabel">Sign Up</h1> -->
                    <?php if($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <!-- <span aria-hidden="true">&times;</span> -->
                        </button>
                    </div>
                    <?php endif ?>
                    <div class="mb-3 mt-2 p-2 text-center rounded text-light"
                        style="background-color:#F58025; font-family:'Quicksand', san-serif; font-weight:  500;">Data
                        Pribadi</div>
                    <div class="row">
                        <div class="form-group col-md-12" style="display:none">
                            <input type="text" name="kode" placeholder="Masukkan Kode" autocomplete="off"
                                class="form-control" required value="CST<?= mt_rand(100, 999) ?>" maxlength="8"
                                readonly>
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="nama" class="form-label mb-2">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap"
                                autocomplete="off" required name="nama">
                        </div>
                        <div class="form-group col-md-12 mb-3">
                            <label for="alamat" class="form-label mb-2">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" required
                                name="alamat">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="email" class="form-label mb-2">E-mail</label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan E-Mail"
                                autocomplete="off" required name="email">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <label for="No. Telp" class="form-label mb-2">No. Telp</label>
                            <input type="text" class="form-control" id="No. Telp" placeholder="Masukkan No. Telp"
                                required name="telepon">
                        </div>
                    </div>
                    <div class="mb-3 mt-2 p-2 text-center rounded text-light"
                        style="background-color:#F58025; font-family:'Quicksand', san-serif; font-weight:  500;">Data
                        Login</div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="username" class="form-label mb-2">Username</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i
                                        class="bi bi-person-circle"></i></span>
                                <input type="text" name="username_customer" autocomplete="off" class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password" class="form-label mb-2">Password</label>
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping"><i class="bi bi-key"></i></span>
                                <input type="text" name="password_customer" autocomplete="off" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 text-end">
                        <button type="button" class="btn btn-outline-success me-2"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-block" name="daftar">Sign Up</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>