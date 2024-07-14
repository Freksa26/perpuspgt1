<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
<style type="text/css">
            body {
                font-family: 'Poppins', sans-serif;
                background-image: url('path/to/your/background.jpg'); /* Ganti dengan path gambar latar belakang */
                background-size: cover;
                background-position: center;
                background-attachment: fixed;
                color: #333;
            }

            .panel-heading {
                background: linear-gradient(45deg, #3498db, #2980b9);
                color: #fff;
                padding: 10px 15px;
                border-bottom: 1px solid transparent;
                border-top-left-radius: 3px;
                border-top-right-radius: 3px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
            }

            .form-horizontal .form-group label {
                color: #3498db;
            }

            .form-control {
                border-radius: 4px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
            }

            .form-control:focus {
                border-color: #3498db;
                box-shadow: 0 0 8px rgba(52, 152, 219, 0.6);
            }

            .btn-primary {
                background-color: #3498db;
                border-color: #3498db;
                transition: all 0.3s ease;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .btn-primary:hover {
                background-color: #2980b9;
                border-color: #2980b9;
                box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
            }

            .btn-danger {
                background-color: #e74c3c;
                border-color: #e74c3c;
                transition: all 0.3s ease;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            .btn-danger:hover {
                background-color: #c0392b;
                border-color: #c0392b;
                box-shadow: 0 6px 8px rgba(0, 0, 0, 0.1);
            }

            .footer-main {
                text-align: center;
                padding: 10px;
                background: rgba(0, 0, 0, 0.7);
                color: #fff;
                border-top-left-radius: 3px;
                border-top-right-radius: 3px;
                box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
            }

            .img-circle {
                border: 3px solid white;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
            <i class="bi bi-person"></i> <span>Data Anggota</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="anggota.php"><i class="bi bi-chevron-double-right"></i> Data Anggota</a></li>
            <li><a href="input-anggota.php"><i class="bi bi-chevron-double-right"></i> Tambah Anggota</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="bi bi-book"></i> <span>Data Buku</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="buku.php"><i class="bi bi-chevron-double-right"></i> Data Buku</a></li>
            <li><a href="input-buku.php"><i class="bi bi-chevron-double-right"></i> Tambah Buku</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="bi bi-key"></i> <span>Data Admin</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="admin.php"><i class="bi bi-chevron-double-right"></i> Data Admin</a></li>
            <li><a href="input-admin.php"><i class="bi bi-chevron-double-right"></i> Tambah Admin</a></li>
        </ul>
    </li>

    <li>
        <a href="backup.php">
            <i class="bi bi-file-check"></i> <span>Backup Data</span>
        </a>
    </li>
    <li>
        <a href="tentang.php">
            <i class="bi bi-envelope"></i> <span>Tentang PerpustakaanPGT</span>
        </a>
    </li>
</ul>
