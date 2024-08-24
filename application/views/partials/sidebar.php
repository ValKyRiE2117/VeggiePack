		<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#198754">
		    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
		        <div class="sidebar-brand-icon">
		            <img src="<?= base_url('/uploads/LogoVeggiePack.png') ?>" alt="" class="img-fluid">
		        </div>
		        <div class="sidebar-brand-text mx-3">VeggiePack</div>
		    </a>
		    <hr class="sidebar-divider my-0">
		    <li class="nav-item <?= $aktif == 'dashboard' ? 'active' : '' ?>">
		        <a class="nav-link" href="<?= base_url('dashboard') ?>">
		            <i class="fas fa-fw fa-tachometer-alt text-gray-100"></i>
		            <span class="text-gray-100">Dashboard</span></a>
		    </li>
		    <hr class="sidebar-divider">

		    <div class="sidebar-heading text-gray-100">
		        Master
		    </div>

		    <li class="nav-item <?= $aktif == 'barang' ? 'active' : '' ?>">
		        <a class="nav-link" href="<?= base_url('barang') ?>">
		            <i class="fas fa-fw fa-box text-gray-100"></i>
		            <span class="text-gray-100"><?php if ($this->session->login['role'] == 'admin'): ?>Master<?php endif; ?>
		                Barang</span></a>
		    </li>

		    <?php if ($this->session->login['role'] == 'admin'): ?>
		    <li class="nav-item <?= $aktif == 'customer' ? 'active' : '' ?>">
		        <a class="nav-link" href="<?= base_url('customer') ?>">
		            <i class="fas fa-fw fa-users text-gray-100"></i>
		            <span class="text-gray-100">Master Customer</span></a>
		    </li>
		    <?php endif; ?>


		    <!-- Divider -->
		    <hr class="sidebar-divider">

		    <div class="sidebar-heading text-gray-100">
		        Transaksi
		    </div>

		    <li class="nav-item <?= $aktif == 'orders' ? 'active' : '' ?>">
		        <a class="nav-link" href="<?= base_url('orders/lihat') ?>">
		            <i class="fas fa-fw fa-file-invoice text-gray-100"></i>
		            <span class="text-gray-100">Master Orders</span></a>
		    </li>

		    <hr class="sidebar-divider">
		    <div class="sidebar-heading text-gray-100">
		        Comment
		    </div>

		    <li class="nav-item <?= $aktif == 'Comment' ? 'active' : '' ?>">
		        <a class="nav-link" href="<?= base_url('comment') ?>">
		            <i class="fas fa-fw fa-comments text-gray-100"></i>
		            <span class="text-gray-100">Comment</span></a>
		    </li>
		    <hr class="sidebar-divider">

		    <!-- <div class="sidebar-heading text-gray-100">
		        Pengaturan
		    </div> -->
		    <!-- <li class="nav-item <?= $aktif == 'toko' ? 'active' : '' ?>">
		        <a class="nav-link" href="<?= base_url('toko') ?>">
		            <i class="fas fa-fw fa-home text-gray-100"></i>
		            <span class="text-gray-100">Profil Toko</span></a>
		    </li>
		    Divider -->
		    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

		    <!-- Sidebar Toggler (Sidebar) -->
		    <div class="text-center d-none d-md-inline">
		        <button class="rounded-circle border-0" id="sidebarToggle"></button>
		    </div>
		</ul>