<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PerpustakaanPGT</title>
    <link rel="stylesheet" href="style.css"> <!-- Pastikan untuk merujuk ke file CSS Anda -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .header .logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
        }

        .header .logo i {
            margin-right: 10px;
        }

        .navbar {
            background-color: #007BFF; /* Warna latar belakang navbar */
            border: none;
        }

        .navbar-btn {
            color: white;
            font-size: 18px;
        }

        .navbar-right {
            margin-right: 0;
        }

        .navbar-right .nav {
            display: flex;
            align-items: center;
        }

        .navbar-right .nav .dropdown-toggle {
            color: white;
            display: flex;
            align-items: center;
        }

        .navbar-right .nav .dropdown-toggle i {
            margin-right: 5px;
        }

        .navbar-right .nav .dropdown-toggle span {
            margin-left: 5px;
        }

        .user-dropdown {
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            width: 250px;
            padding: 10px;
        }

        .user-dropdown .user-header {
            padding: 10px;
            margin-bottom: 0;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .user-dropdown .user-header p {
            margin-bottom: 5px;
            color: #333;
        }

        .user-dropdown .dropdown-item {
            padding: 10px;
        }

        .user-dropdown .dropdown-item a {
            color: #333;
            font-size: 14px;
            text-decoration: none;
            display: block;
        }

        .user-dropdown .dropdown-item a:hover {
            background-color: #A9A9A9;
        }

        .user-dropdown .dropdown-item i {
            margin-right: 10px;
        }
        </style>
        <header class="header">
            <a href="index.php" class="logo">
                PerpustakaanKU
            </a>
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                <li>
                                    <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id']; ?>">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                        Profile
                                    </a>
                                    <a href="edit-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id']; ?>">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                        Settings
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

    <!-- Your content here -->

</body>
</html>
