<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('users'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-store-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">My Store</div>
    </a>

    <!-- logika untuk mngecek user roles -->
    <?php if (in_groups('admin')) : ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Pages Collapse Menu Home -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuHome" aria-expanded="true" aria-controls="menuHome">
                <i class="fas fa-home"></i>
                <span>Home</span>
            </a>
            <div id="menuHome" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Detail Home :</h6>
                    <a class="collapse-item" href="<?= base_url('home'); ?>">Dashboard</a>
                    <a class="collapse-item" href="<?= base_url('admin'); ?>">User Access</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu Produk -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menuProduk" aria-expanded="true" aria-controls="menuProduk">
                <i class="fas fa-fw fa-shopping-cart"></i>
                <span>Produk</span>
            </a>
            <div id="menuProduk" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Detail Produk :</h6>
                    <a class="collapse-item" href="<?= base_url('product'); ?>">Produk</a>
                    <a class="collapse-item" href="<?= base_url('penjualan'); ?>">Penjualan</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - My Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('product'); ?>">
            <i class="fas fa-shopping-bag"></i>
            <span>List Produk</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Logout -->
    <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" href="<?= base_url('logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>