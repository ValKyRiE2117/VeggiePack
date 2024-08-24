<!DOCTYPE html>
<html lang="en">
`

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactus</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crete+Round&family=Quicksand:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
    <?php include "style.css"?>
    </style>
</head>

<body>

    <?php
        // Set warna teks sesuai dengan kebutuhan di halaman ini
        $contactus_text_color = '#198754'; // Ganti dengan warna yang diinginkan
    ?>

    <?php $this->load->view('partials/header-webpage', compact('contactus_text_color')); ?>

    <div class="container mt-5 cont-contactus">
        <h2 class="text-center display-6">Contact <span style="color: #EE7722;">Us</span> </h2>
        <br>
        <p class="mb-5">Thank you for your interest in contacting us. Whether you have a question, feedback, or a
            specific inquiry, we're here to help. Our dedicated team is committed to providing you with the best
            possible assistance. Please feel free to reach out to us using the contact form below, and we'll get back to
            you as soon as possible. Your input is valuable to us, and we look forward to hearing from you. If you
            prefer direct communication, you can also find our contact details listed below. We appreciate your time and
            trust in us.</p>

        <div class="row g-5 px-5 row-kartu">
            <div class="col-lg-4">
                <div class="kartu p-3">
                    <img src="<?= base_url('uploads/cont-1.png') ?>" alt="" class="img-contact">
                    <br>
                    <br>
                    <h4>Telephone</h4>
                    <br>
                    <h6><a href="https://wa.link/yzbgbn" target="_blank"
                            class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">+62-895-0186-8361</a>
                    </h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="kartu p-3">
                    <img src="<?= base_url('uploads/cont-2.png') ?>" alt="" class="img-contact">
                    <br>
                    <br>
                    <h4>Location</h4>
                    <br>
                    <h6>Jl. Nakula Barat No.9 Semarang</h6>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="kartu p-3">
                    <img src="<?= base_url('uploads/cont-3.png') ?>" alt="" class="img-contact">
                    <br>
                    <br>
                    <h4>Mail</h4>
                    <br>
                    <h6><a href="mailto: 1222202920@mhs.dinus.ac.id" target="_blank"
                            class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">VeggiePack@gmail.com</a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="contactus-form p-4">
            <form class="row g-3" method="POST" action="<?= base_url('contactus/tambah/') ?>">
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label text-white">Name</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Enter your Name" name="name"
                        required>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label text-white">Email</label>
                    <input type="email" class="form-control" id="inputPassword4"
                        placeholder="Enter a valid Email address" name="email" required>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label text-white">Comment or Ask us Anything</label>
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                        name="comment" required></textarea>
                </div>
                <div class="col-12">
                    <?php if ($this->session->login && isset($this->session->login['role']) && ($this->session->login['role'] == 'customer' || $this->session->login['role'] == 'admin')): ?>
                    <button type="submit" class="btn" style="background-color: #ee7722;color:#fff;">Submit</button>
                    <?php else: ?>
                    <button data-bs-toggle="modal" data-bs-target="#ModalLogin" class="btn"
                        style="background-color: #ee7722;color:#fff;">Submit</button>
                    <?php endif; ?>
                </div>
            </form>
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
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toastLiveExample = document.getElementById('liveToast');
        const toast = new bootstrap.Toast(toastLiveExample);

        <?php if ($this->session->flashdata('success')) : ?>
        // Show success toast
        document.querySelector('.toast-body').innerText = '<?= $this->session->flashdata('success') ?>';
        toast.show();
        <?php endif; ?>
    });
    </script>
</body>

</html>