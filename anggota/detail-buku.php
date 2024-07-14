<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../conn.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PerpustakaanKU</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Hakko Bio Richard">
    <meta name="keywords" content="Perpus, Website, Aplikasi, Perpustakaan, Online">
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
        .table {
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
            background-color: #f9f9f9;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f2f2f2;
            text-align: left;
            color: #333;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #ddd;
        }

        .table img {
            border: 3px solid #333;
            border-radius: 8px;
        }

        .table .btn {
            padding: 5px 10px;
            margin: 5px;
        }

        .text-right {
            text-align: right;
        }
        .panel-heading {
        background: linear-gradient(45deg, #3498db, #2980b9); /* Ganti dengan warna yang Anda inginkan */
        color: #fff; /* Warna teks putih agar kontras dengan background */
        padding: 10px 15px; /* Padding untuk memberi ruang di sekitar teks */
        border-bottom: 1px solid transparent;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
</head>

<body class="skin-black">
    <!-- header logo: style can be found in header.less -->
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
                            <span><?php echo $_SESSION['nama']; ?> <i class="caret"></i></span>
                        </a>
                        <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                            <li class="dropdown-header text-center">Account</li>
                            <li>
                                <a href="detail-anggota.php?hal=edit&kd=<?php echo $_SESSION['id']; ?>">
                                    <i class="fa fa-user fa-fw pull-right"></i>
                                    Profile
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
    <?php
    $timeout = 10; // Set timeout minutes
    $logout_redirect_url = "../login.html"; // Set logout URL

    $timeout = $timeout * 60; // Converts minutes to seconds
    if (isset($_SESSION['start_time'])) {
        $elapsed_time = time() - $_SESSION['start_time'];
        if ($elapsed_time >= $timeout) {
            session_destroy();
            echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
        }
    }
    $_SESSION['start_time'] = time();
    ?>
<?php } ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
           
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php include "menu.php"; ?>
        </section>
        <!-- /.sidebar -->
    </aside>

    <aside class="right-side">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <header class="panel-heading">
                            <b>Detail Buku</b>
                        </header>
                        <?php
                        $query = mysqli_query($conn, "SELECT * FROM data_buku WHERE id='$_GET[kd]'");
                        $data  = mysqli_fetch_array($query);
                        ?>
                        <div class="panel-body">
                            <table id="example" class="table table-hover table-bordered">
                                <tr>
                                    <td>ID Anggota</td>
                                    <td><?php echo $data['id']; ?></td>
                                    <td rowspan="9">
                                        <div class="pull-right image">
                                            <img src="<?php echo $data['gambar']; ?>" class="img-rounded" height="300" width="250" alt="User Image" />
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="250">Judul</td>
                                    <td width="550"><?php echo $data['judul']; ?></td>
                                </tr>
                                <tr>
                                    <td>Pengarang</td>
                                    <td><?php echo $data['pengarang']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tahun Terbit</td>
                                    <td><?php echo $data['th_terbit']; ?></td>
                                </tr>
                                <tr>
                                    <td>Penerbit</td>
                                    <td><?php echo $data['penerbit']; ?></td>
                                </tr>
                                <tr>
                                    <td>ISBN</td>
                                    <td><?php echo $data['isbn']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kategori</td>
                                    <td><?php echo $data['kategori']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Buku</td>
                                    <td><?php echo $data['jumlah_buku']; ?></td>
                                </tr>
                                <tr>
                                    <td>Asal</td>
                                    <td colspan="2"><?php echo $data['asal']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td colspan="2"><?php echo $data['tgl_input']; ?></td>
                                </tr>
                            </table>
                            <div class="text-right">
                                <a href="buku.php" class="btn btn-sm btn-primary">Kembali <i class="fa fa-arrow-circle-right"></i></a>
                                <a href="edit-buku.php?hal=edit&kd=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">Edit Buku <i class="fa fa-edit"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="../js/jquery.min.js" type="text/javascript"></script>

<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>

<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            "bLengthChange": false,
            "bFilter": false,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>

</body>
</html>
