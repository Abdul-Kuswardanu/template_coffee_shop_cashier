    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <span class="brand-text font-weight-light">Coffee Manager</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <?php
                    $menuUserOpen = isset($active_menu) && $active_menu === 'users';
                    $userSub = isset($user_role_filter) ? $user_role_filter : (isset($active_user_submenu) ? $active_user_submenu : '');
                ?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php echo site_url('manager'); ?>" class="nav-link <?php echo (isset($active_menu) && $active_menu == 'dashboard') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview <?php echo $menuUserOpen ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo $menuUserOpen ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Kelola User <i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo site_url('manager/users/customer'); ?>" class="nav-link <?php echo ($menuUserOpen && $userSub === 'customer') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('manager/users/kasir'); ?>" class="nav-link <?php echo ($menuUserOpen && $userSub === 'kasir') ? 'active' : ''; ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kasir</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('manager/laporan'); ?>" class="nav-link <?php echo (isset($active_menu) && $active_menu == 'laporan') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>Laporan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('manager/profil'); ?>" class="nav-link <?php echo (isset($active_menu) && $active_menu == 'profil') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil Saya</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo site_url('manager/pengaturan'); ?>" class="nav-link <?php echo (isset($active_menu) && $active_menu == 'pengaturan') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Pengaturan</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

