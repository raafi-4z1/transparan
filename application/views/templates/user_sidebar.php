<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <hr class="sidebar-divider mt-0">
                <li class="sidebar-item <?= $title == 'Home' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Home' ? 'active' : ''; ?>" href="<?= base_url('user'); ?>"
                        aria-expanded="false">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="sidebar-item <?= $title == 'Pemesanan' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Pemesanan' ? 'active' : ''; ?>" href="<?= base_url('user/pemesanan'); ?>"
                        aria-expanded="false">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>
                        <span class="hide-menu">Pemesanan</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Keranjang' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Keranjang' ? 'active' : ''; ?>" href="<?= base_url('user/keranjang'); ?>"
                        aria-expanded="false">
                        <i class="fas fa-cart-plus" aria-hidden="true"></i> 
                        <span class="hide-menu">Keranjang</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Pesanan' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Pesanan' ? 'active' : ''; ?>" href="<?= base_url('user/pesanan'); ?>"
                        aria-expanded="false">
                        <i class="fas fa-cart-arrow-down" aria-hidden="true"></i> 
                        <span class="hide-menu">Pesanan</span>
                    </a>
                </li>
                <li class="sidebar-item <?= $title == 'Pembayaran' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'Pembayaran' ? 'active' : ''; ?>" href="<?= base_url('user/pembayaran'); ?>"
                        aria-expanded="false">
                        <i class="fas fa-wallet" aria-hidden="true"></i>
                        <span class="hide-menu">Pembayaran</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="sidebar-item <?= $title == 'My Profile' ? 'selected' : ''; ?>">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link <?= $title == 'My Profile' ? 'active' : ''; ?>" href="<?= base_url('user/profile'); ?>"
                        aria-expanded="false">
                        <i class="fas fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">My Profile</span>
                    </a>
                </li>
                <hr class="sidebar-divider">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('auth/logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar ?')"
                        aria-expanded="false">
                        <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                        <span class="hide-menu">Keluar</span>
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