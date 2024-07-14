<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.0/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
        }

        .sidebar-menu li a {
            text-decoration: none;
            color: #333;
            display: flex;
            align-items: center;
        }

        .sidebar-menu li a:hover {
            background-color: #007BFF;
            color: white;
        }

        .sidebar-menu li.active a {
            background-color: #007BFF;
            color: white;
        }

        .sidebar-menu li a i {
            margin-right: 10px;
            font-size: 18px;
        }

        .sidebar-menu li span {
            flex: 1;
        }

        .treeview-menu {
            display: none;
            list-style: none;
            padding-left: 20px;
        }

        .treeview-menu li a {
            color: #666;
            text-decoration: none;
            display: block;
            padding: 8px 0;
        }

        .treeview-menu li a:hover {
            color: #333;
        }
    </style>
<ul class="sidebar-menu">
        <li class="active">
            <a href="index.php">
                <i class="bi bi-house"></i> <span>Beranda</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="bi bi-book"></i>
                <span>Buku</span>
                <i class="bi bi-caret-down"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="buku.php"><i class="bi bi-chevron-right"></i> Data Buku</a></li>
            </ul>
        </li>
        <li>
            <a href="tentang.php">
                <i class="bi bi-envelope"></i> <span>Tentang PerpustakaanPGT</span>
            </a>
        </li>
    </ul>