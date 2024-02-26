<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <hr class="sidebar-divider my-0">
                <li class="sidebar-item pt-2 <?= $title == 'Dashboard' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Dashboard' ? 'active' : ''; ?>" href="<?= base_url('admin'); ?>"
                        aria-expanded="false">
                        <i class="far fa-clock" aria-hidden="true"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="sidebar-item <?= $title == 'Data User' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Data User' ? 'active' : ''; ?>" href="<?= base_url('admin/duser'); ?>"
                        aria-expanded="false">
                        <i class="fas fa-users" aria-hidden="true"></i>
                        <span class="hide-menu">Data User</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Data Produk' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Data Produk' ? 'active' : ''; ?>" href="<?= base_url('admin/dproduk'); ?>"
                        aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Produk</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Data Stok & Bahan' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Data Stok & Bahan' ? 'active' : ''; ?>" href="<?= base_url('admin/dstok'); ?>"
                        aria-expanded="false">
                        <i class="fa fa-font" aria-hidden="true"></i>
                        <span class="hide-menu">Data Stok & Bahan</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="sidebar-item <?= $title == 'Pesanan' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Pesanan' ? 'active' : ''; ?>" href="<?= base_url('admin/pesanan'); ?>"
                        aria-expanded="false">
                        <i class="fa fa-globe" aria-hidden="true"></i>
                        <span class="hide-menu">Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Pembayaran' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Pembayaran' ? 'active' : ''; ?>" href="<?= base_url('admin/pembayaran'); ?>"
                        aria-expanded="false">
                        <i class="fa fa-columns" aria-hidden="true"></i>
                        <span class="hide-menu">Pembayaran</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="sidebar-item <?= $title == 'Laporan' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Laporan' ? 'active' : ''; ?>" href="<?= base_url('admin/laporan'); ?>"
                        aria-expanded="false">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar ?')"
                        aria-expanded="false">
                        <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Logout</span>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->