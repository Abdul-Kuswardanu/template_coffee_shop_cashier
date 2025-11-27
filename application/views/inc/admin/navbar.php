    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-exchange-alt"></i> Navigasi
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo site_url('admin'); ?>">
                        <i class="fas fa-user-shield text-primary"></i> Admin
                    </a>
                    <a class="dropdown-item" href="<?php echo site_url('manager'); ?>">
                        <i class="fas fa-user-tie text-info"></i> Manager
                    </a>
                    <a class="dropdown-item" href="<?php echo site_url('kasir'); ?>">
                        <i class="fas fa-cash-register text-success"></i> Kasir
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url('customer'); ?>">
                        <i class="fas fa-user text-warning"></i> Customer
                    </a>
                </div>
            </li>
            <li class="nav-item">
                <span class="nav-link">Mode Dummy • 24 Feb 2025</span>
            </li>
        </ul>
    </nav>

