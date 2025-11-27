    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Coffee Admin</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <?php
                    $menuProdukOpen   = isset($active_menu) && $active_menu === 'produk';
                    $menuUserOpen     = isset($active_menu) && $active_menu === 'users';
                    $menuLaporanOpen  = isset($active_menu) && $active_menu === 'laporan';
                    $produkSub        = isset($produk_category) ? $produk_category : (isset($active_produk_submenu) ? $active_produk_submenu : '');
                    $userSub          = isset($user_role_filter) ? $user_role_filter : (isset($active_user_submenu) ? $active_user_submenu : '');
                    $laporanSub       = isset($laporan_tipe) ? $laporan_tipe : (isset($active_laporan_submenu) ? $active_laporan_submenu : '');
                ?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin'); ?>" class="nav-link <?php echo (isset($active_menu) && $active_menu == 'dashboard') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/pembelian'); ?>" class="nav-link <?php echo (isset($active_menu) && $active_menu == 'pembelian') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Pembelian</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview <?php echo $menuProdukOpen ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo $menuProdukOpen ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-coffee"></i>
                            <p>Kelola Produk <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/produk/original'); ?>" class="nav-link <?php echo ($menuProdukOpen && $produkSub === 'original') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Original</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/produk/topping'); ?>" class="nav-link <?php echo ($menuProdukOpen && $produkSub === 'topping') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Topping</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/produk/extra'); ?>" class="nav-link <?php echo ($menuProdukOpen && $produkSub === 'extra') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Extra</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/produk/lainnya'); ?>" class="nav-link <?php echo ($menuProdukOpen && $produkSub === 'lainnya') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Lain-lain</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php echo $menuUserOpen ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo $menuUserOpen ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Kelola User <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/users/admin'); ?>" class="nav-link <?php echo ($menuUserOpen && $userSub === 'admin') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Admin</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/users/kasir'); ?>" class="nav-link <?php echo ($menuUserOpen && $userSub === 'kasir') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kasir</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/users/customer'); ?>" class="nav-link <?php echo ($menuUserOpen && $userSub === 'customer') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customer</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview <?php echo $menuLaporanOpen ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo $menuLaporanOpen ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>Laporan <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/laporan/penjualan'); ?>" class="nav-link <?php echo ($menuLaporanOpen && $laporanSub === 'penjualan') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Penjualan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('admin/laporan/pembelian'); ?>" class="nav-link <?php echo ($menuLaporanOpen && $laporanSub === 'pembelian') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Pembelian</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/profil'); ?>" class="nav-link <?php echo (isset($active_menu) && $active_menu == 'profil') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('admin/pengaturan'); ?>" class="nav-link <?php echo (isset($active_menu) && $active_menu == 'pengaturan') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
