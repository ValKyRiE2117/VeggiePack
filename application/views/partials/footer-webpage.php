            <div class="mt-5 bg-dark footer p-4">
                <div class="container">
                    <div class="row d-flex align-items-top">
                        <div class="col-lg-3 col-logo align-self-center">
                            <img src="<?= base_url('uploads/Logo VeggiePack Samping-white.png') ?>" alt="" class="">
                            <ul class="mt-3">
                                <li><a href="" class="text-secondary" data-bs-toggle="modal"
                                        data-bs-target="#ModalTermsOfUse">Terms of Use</a></li>
                                <li><a href="" class="text-secondary" data-bs-toggle="modal"
                                        data-bs-target="#ModalPrivacy">Privacy</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-6 footer-center">
                            <div class="d-flex justify-content-around">
                                <ul>
                                    <li class="mb-2">
                                        <p class="text-white">Webpage</p>
                                    </li>
                                    </li>
                                    <li><a href="<?= base_url('home') ?>" class="text-secondary nav-item">Home</a></li>
                                    <li><a href="<?= base_url('allproduct') ?>" class="text-secondary nav-item">All
                                            Products</a>
                                    </li>
                                    <li><a href="<?= base_url('contactus') ?>" class="text-secondary nav-item">Contact
                                            Us</a>
                                    </li>
                                </ul>
                                <ul>
                                    <?php if ($this->session->login && isset($this->session->login['role']) && $this->session->login['role'] == 'customer'): ?>
                                    <li class="mb-2">
                                        <p class="text-white">Account</p>
                                    </li>
                                    <li><a href="<?= base_url('profile/ubah/' . $this->session->login['kode']) ?>"
                                            class="text-secondary">Profile</a></li>
                                    <li><a href="<?= base_url('Shopping_cart')?>" class="text-secondary">Shopping
                                            Cart</a></li>
                                    <li><a href="<?= base_url('orders/') ?>" class="text-secondary">My Orders</a></li>
                                    <?php elseif ($this->session->login && isset($this->session->login['role']) && $this->session->login['role'] == 'admin'): ?>
                                    <li class="mb-2">
                                        <p class="text-white">Account</p>
                                    </li>
                                    <li><a href="<?= base_url('profile/ubah/' . $this->session->login['kode']) ?>">
                                            class="text-secondary">Profile</a></li>
                                    <li><a href="<?= base_url('Shopping_cart')?>" class="text-secondary">Shopping
                                            Cart</a>
                                    </li>
                                    <li><a href="<?= base_url('orders/') ?>" class="text-secondary">My Orders</a>
                                    </li>
                                    <!-- Add more admin-specific menu items as needed -->
                                    <?php else: ?>
                                    <li class="mb-3">
                                        <a class="text-white pb-4" style="text-decoration:none">Account</a>
                                    </li>
                                    <li><a href="" class="text-secondary" data-bs-toggle="modal"
                                            data-bs-target="#ModalLogin">Profile</a></li>
                                    <li><a href="" class="text-secondary" data-bs-toggle="modal"
                                            data-bs-target="#ModalLogin">Shopping Cart</a></li>
                                    <li><a href="" class="text-secondary" data-bs-toggle="modal"
                                            data-bs-target="#ModalLogin">My Orders</a></li>
                                    <?php endif; ?>
                                </ul>

                            </div>
                        </div>

                        <div class="col-lg-3 col-right">
                            <p class="text-white">Our Social Media</p>
                            <br>
                            <div class="col socmed text-end">
                                <a href="">
                                    <ion-icon name="logo-facebook"></ion-icon>
                                </a>
                                <a href="">
                                    <ion-icon name="logo-instagram"></ion-icon>
                                </a>
                                <a href="">
                                    <ion-icon name="logo-twitter"></ion-icon>
                                </a>
                                <a href="">
                                    <ion-icon name="logo-whatsapp"></ion-icon>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>