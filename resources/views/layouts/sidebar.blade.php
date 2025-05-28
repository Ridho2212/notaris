<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                </div>
                <div class="sidebar-brand-text mx-3">NOTARIS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->is('dashboard') ? 'active' : ''}}">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Mengelola Pemohonan -->
            <li class="nav-item">
                <a class="nav-link" href="/request-submissions">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>Pengelola Pemohonan</span></a>
            </li>

            <!-- Nav Item - Mengelola Pemohonan -->
            <li class="nav-item">
                <a class="nav-link" href="/clients">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Client</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Jenis Layanan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilih Layanan:</h6>
                        <a class="collapse-item" href="/ppat-services">Layanan PPAT</a>
                        <a class="collapse-item" href="/notary-services">Layanan Notaris</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Mengelola Pemohonan -->
            <li class="nav-item">
                <a class="nav-link" href="/service-fees">
                    <i class="fas fa-fw fa-money-bill-wave"></i>
                    <span>Biaya Layanan</span></a>
            </li>

            <!-- Nav Item - Mengelola Pemohonan -->
            <li class="nav-item">
                <a class="nav-link" href="/documents">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Arsip Dokumen</span></a>
            </li>

            <!-- Nav Item - Mengelola Pemohonan -->
            <li class="nav-item">
                <a class="nav-link" href="/users">
                    <i class="fas fa-fw fa-user-cog"></i>
                    <span>User Management</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>