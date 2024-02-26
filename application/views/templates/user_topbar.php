<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="<?= base_url('user'); ?>">
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
                    <div class="nav-item dropdown" style="padding-right: 1rem;">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownProfile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="<?= $user['gambar'] == '' ? base_url('assets/img/default/profile.png') : 'data:image/jpeg;base64,'.base64_encode( $user['gambar'] ); ?>" alt="user-img" width="36" class="rounded-circle">
                            <span class="text-white" style="font-size: 1rem; padding-left: 5px;"><?= substr($user['nama_pelanggan'], 0, 7);?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownProfile" style="font-size: 1rem;">
                            <a class="dropdown-item" href="<?= base_url('user/profile'); ?>">
                            <i class="fas fa-user"> Profile</i>
                            </a>
                            <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                            <i class="fas fa-sign-out-alt"> Logout</i>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb bg-white">
        <div class="row align-items-center">
            <div class="col-lg col-md col-sm col-xs">
                <h4 class="page-title"><?= $title; ?></h4>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->