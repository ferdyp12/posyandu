<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= route_to('Dashboard::index'); ?>">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div> -->
        <div class="sidebar-brand-text mx-3">Posyandu RW <sup>05</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item<?= current_url(true)->getSegment(1) == '' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= route_to('Dashboard::index'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Data
    </div>

    <!-- Nav Item - Pages Data Ayah -->
    <li class="nav-item<?= current_url(true)->getSegment(1) == 'ayah' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= route_to('Ayah::index'); ?>">
            <i class="fas fa-fw fa-male"></i>
            <span>Data Ayah</span>
        </a>
    </li>

    <!-- Nav Item - Pages Data Anak -->
    <li class="nav-item<?= current_url(true)->getSegment(1) == 'anak' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= route_to('Anak::index'); ?>">
            <i class="fas fa-fw fa-baby"></i>
            <span>Data Anak</span>
        </a>
    </li>

    <!-- Nav Item - Pages Data Ibu Hamil -->
    <li class="nav-item<?= current_url(true)->getSegment(1) == 'ibu-hamil' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= route_to('IbuHamil::index'); ?>">
            <i class="fas fa-fw fa-female"></i>
            <span>Data Ibu Hamil</span>
        </a>
    </li>

    <!-- Nav Item - Pages Data Imunisasi -->
    <li class="nav-item<?= current_url(true)->getSegment(1) == 'imunisasi' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= route_to('Imunisasi::index'); ?>">
            <i class="fas fa-fw fa-plus-square"></i>
            <span>Data Imunisasi</span>
        </a>
    </li>

    <!-- Nav Item - Pages Data Jenis Imunisasi -->
    <li class="nav-item<?= current_url(true)->getSegment(1) == 'jenis-imunisasi' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= route_to('JenisImunisasi::index'); ?>">
            <i class="fas fa-fw fa-book-medical"></i>
            <span>Data Jenis Imunisasi</span>
        </a>
    </li>

    <!-- Nav Item - Pages Data Keluarga Berencana -->
    <li class="nav-item<?= current_url(true)->getSegment(1) == 'kb' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= route_to('KeluargaBerencana::index'); ?>">
            <i class="fas fa-fw fa-user-friends"></i>
            <span>Data Keluarga Berencana</span>
        </a>
    </li>

    <!-- Nav Item - Pages Data Timbang -->
    <li class="nav-item<?= current_url(true)->getSegment(1) == 'imunisasi' ? ' active' : ''; ?>">
        <a class="nav-link" href="<?= route_to('Imunisasi::index'); ?>">
            <i class="fas fa-fw fa-balance-scale"></i>
            <span>Data Timbang</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
        Lain - Lain
    </div> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>