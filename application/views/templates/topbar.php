<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="<?= base_url('admin'); ?>">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!-- Dark Logo icon -->
                    <img src="<?= base_url('assets/img/icon/'); ?>logo-icon.png" alt="homepage" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="<?= base_url('assets/img/icon/'); ?>logo-text.png" alt="homepage" />
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav ms-auto sidebar d-flex align-items-center">

                <li>
                    <a href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                        <span class="text-white text-topbar"  style="font-size: 1rem;">Keluar</span>
                    </a>
                </li>
                <li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                </li>
                <li>
                    <a style="padding-right:14px;" href="<?= base_url('admin'); ?>">
                        <span class="text-white" style="font-size: 1rem;">Admin</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->