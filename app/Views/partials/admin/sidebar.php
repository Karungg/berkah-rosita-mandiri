<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="<?= base_url() ?>" class="brand-link"> <!--begin::Brand Image--> <img src="<?= base_url('AdminLTE/') ?>dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"> <!--end::Brand Image--> <!--begin::Brand Text--> <span class="brand-text fw-light">Berkah Rosita Mandiri</span> <!--end::Brand Text--> </a> <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <!-- Dashboard menu -->
                <li class="nav-item"> <a href="<?= base_url('admin') ?>" class="nav-link <?= uri_string() === 'admin' ? 'active' : '' ?>"> <i class="nav-icon bi bi-speedometer"></i>
                        <p>Dashboard</p>
                    </a> </li>

                <!-- Master menu -->
                <li class="nav-header">Master</li>
                <li class="nav-item"> <a href="" class="nav-link"> <i class="nav-icon bi bi-person"></i>
                        <p>User</p>
                    </a> </li>
                <li class="nav-item"> <a href="<?= base_url('admin/products') ?>" class="nav-link <?= str_contains(uri_string(), 'products') ? 'active' : '' ?>"> <i class="nav-icon bi bi-box2"></i>
                        <p>Produk</p>
                    </a> </li>

                <!-- Transaction menu -->
                <li class="nav-header">Transaksi</li>
                <li class="nav-item"> <a href="" class="nav-link"> <i class="nav-icon bi bi-cart"></i>
                        <p>Pembayaran</p>
                    </a> </li>

                <!-- Report menu -->
                <li class="nav-header">Laporan</li>
                <li class="nav-item"> <a href="" class="nav-link"> <i class="nav-icon bi bi-clipboard2-data"></i>
                        <p>Laporan User</p>
                    </a> </li>
                <li class="nav-item"> <a href="" class="nav-link"> <i class="nav-icon bi bi-clipboard2-data"></i>
                        <p>Laporan Produk</p>
                    </a> </li>
                <li class="nav-item"> <a href="" class="nav-link"> <i class="nav-icon bi bi-clipboard2-data"></i>
                        <p>Laporan Pembayaran</p>
                    </a> </li>

                <!-- Logout menu -->
                <li class="nav-header">Auth</li>
                <li class="nav-item"> <a href="" class="nav-link"> <i class="nav-icon bi bi-box-arrow-in-right"></i>
                        <p>Logout</p>
                    </a> </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->