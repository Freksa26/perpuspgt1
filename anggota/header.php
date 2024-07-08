<header class="header">
    <a href="index.php" class="logo"><i class="bi bi-book"></i> PerpustakaanPGT</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="bi bi-person"></i> 
                        <span class="d-none d-md-inline"><?= $_SESSION['nama'] ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                        <li class="user-header text-bg-primary">
                            <img src="<?php echo $_SESSION['foto']; ?>" class="user-image rounded-circle shadow" alt="User Image">
                            <p>
                          
                                <span class="d-none d-md-inline"><?= $_SESSION['nama'] ?></span>
                                <small>Selamat datang<br>
                                    <span class="d-none d-md-inline"><?= $_SESSION['no_induk'] ?></span>
                                </small>
                            </p>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item">
                            <a href="detail-anggota.php?hal=edit&kd=<?= $_SESSION['id'] ?>">
                                <i class="fa fa-user fa-fw"></i> Profile
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a href="../logout.php">
                            <i class="bi bi-box-arrow-left"></i>&nbsp&nbsp &nbsp&nbsp  Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
