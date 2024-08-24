<header class="mb-5">
    <div class="container fixed-top">
        <nav class="navbar navbar-expand-lg  bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="<?= base_url('uploads/Logo VeggiePack Samping-01.png') ?>"
                        alt="Logo" class="d-inline-block align-text-top" width="220" height="50"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="justify-content-between collapse navbar-collapse" id="navbarScroll">
                    <div class="d-flex">
                    </div>
                    <div class="d-flex">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('home') ?>"
                                    style="color: <?= isset($home_text_color) ? $home_text_color : 'black' ?>;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('allproduct') ?>"
                                    style="color: <?= isset($allproducts_text_color) ? $allproducts_text_color : 'black' ?>;">All
                                    Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('contactus') ?>"
                                    style="color: <?= isset($contactus_text_color) ? $contactus_text_color : 'black' ?>;">Contact
                                    Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="d-flex cont-tombol">
                        <?php if ($this->session->login && isset($this->session->login['role']) && ($this->session->login['role'] == 'customer' || $this->session->login['role'] == 'admin')): ?>
                        <div class="dropdown center">
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="dropdown"
                                aria-expanded="false" aria-expanded="false" data-bs-offset="20,20">
                                <?= $this->session->login['nama'] ?> &nbsp;<i class="bi bi-chevron-down"></i>
                            </button>
                            <ul class="dropdown-menu ">

                                <?php if ($this->session->login['role'] == 'customer'): ?>
                                <li><a class="dropdown-item"
                                        href="<?= base_url('profile/ubah/' . $this->session->login['kode']) ?>"><i
                                            class="bi bi-person-circle"
                                            style="font-size: 1.1rem;"></i>&nbsp;&nbsp;Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('Shopping_cart')?>"><i
                                            class="bi bi-cart-check" style="font-size: 1.1rem;"></i>&nbsp;&nbsp;Shopping
                                        Chart</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('orders/') ?>"><i
                                            class="bi bi-clipboard-check" style="font-size: 1.1rem;"></i>&nbsp;&nbsp;My
                                        Orders</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <?php endif; ?>
                                <?php if ($this->session->login['role'] == 'admin'): ?>
                                <li><a class="dropdown-item" href="<?= base_url('dashboard') ?>"><i
                                            class="bi bi-box-arrow-up-right"></i> Dashboard</a></li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <?php endif; ?>
                                <li><a type="button" class="dropdown-item text-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="bi bi-box-arrow-right" style="font-size: 1.1rem;"></i> Logout</a></li>
                            </ul>
                        </div>

                        <?php else:  ?>
                        <a class="btn btn-outline-success me-3 tombol" data-bs-toggle="modal"
                            data-bs-target="#ModalLogin">Login</a>
                        <a class="btn btn-success tombol" data-bs-toggle="modal" data-bs-target="#ModalDaftar">Sign
                            Up</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</header>