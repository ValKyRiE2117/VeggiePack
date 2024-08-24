            <div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form class="user" method="POST" action="<?= base_url('login/proses_login') ?>">
                            <!-- <div class="modal-header">
                                <h1 class="modal-title text-success display-6" id="exampleModalLabel">Login</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div> -->
                            <div class="modal-body">
                                <div class="d-flex justify-content-between mt-2 mb-3">
                                    <div class="div"></div>
                                    <div class="div">
                                        <h3>Login</h3>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <?php if($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= $this->session->flashdata('error') ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <!-- <span aria-hidden="true">&times;</span> -->
                                    </button>
                                </div>
                                <?php endif ?>
                                <div class="form-row">
                                    <div class="form-group col-md-12 mb-4">
                                        <label for="username" class="form-label mb-2">Username :</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Masukkan Username" autocomplete="off" required name="username">
                                    </div>
                                    <div class="form-group col-md-12 mb-4">
                                        <label for="password" class="form-label mb-2">Password :</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Masukkan Password" required name="password">
                                    </div>
                                    <label for="role" class="form-label">Pilih Role Anda :</label>
                                    <div class="form-group col-md-12">

                                        <input class="form-check-input " type="radio" name="role" id="inlineRadio1"
                                            value="customer" checked>
                                        <label class="form-check-label me-2" for="inlineRadio1">&nbsp;Customer</label>
                                        <input class="form-check-input" type="radio" name="role" id="inlineRadio1"
                                            value="admin">
                                        <label class="form-check-label" for="inlineRadio1">&nbsp;Admin</label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>