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
    <title>PerpustakaanPGT</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Hakko Bio Richard">
    <meta name="keywords" content="Perpus, Website, Aplikasi, Perpustakaan, Online">
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <style type="text/css">
        body {
            background: #f7f7f7;
        }
        .skin-black .wrapper {
            background: #fff;
            min-height: 100vh;
        }
        .panel {
            border-radius: 5px;
            border: 1px solid #ddd;
            overflow: hidden;
        }
        .panel-heading {
            background: #007bff;
            color: #fff;
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
        }
        .panel-body {
            background: #fff;
            padding: 15px;
        }
        .btn {
            border-radius: 4px;
            transition: all 0.3s;
        }
        .btn:hover {
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }
        .table {
            background-color: #e0e0e0; /* Abu-abu */
        }
        .table thead th {
            background: #007bff;
            color: #fff;
            text-align: center;
            border: none;
        }
        .table tbody tr:hover {
            background: #d3d3d3; /* Abu-abu lebih gelap */
        }
        .footer-main {
            background: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body class="skin-black">
    <?php include "header.php" ?>
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
    <aside class="left-side sidebar-offcanvas">
        <section class="sidebar">
            <div class="user-panel">
                <div>
                    <center><img src="<?php echo $_SESSION['gambar']; ?>" height="80" width="80" class="img-circle" alt="User Image" /></center>
                </div>
                <div class="info">
                    <center>
                        <p><?php echo $_SESSION['fullname']; ?></p>
                    </center>
                </div>
            </div>
            <?php include "menu.php"; ?>
        </section>
    </aside>

    <aside class="right-side">
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel">
                        <header class="panel-heading">
                            <b>Data Admin</b>
                        </header>
                        <div class="panel-body table-responsive">
                            <div class="box-tools m-b-15">
                                <form action="admin.php" method="POST">
                                    <div class="input-group">
                                        <input type='text' class="form-control input-sm pull-right" style="width: 150px;" name='qcari' placeholder='Cari berdasarkan User ID dan Username' required />
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <?php
                            $query1 = "select * from admin";

                            if (isset($_POST['qcari'])) {
                                $qcari = $_POST['qcari'];
                                $query1 = "SELECT * FROM admin WHERE fullname LIKE '%$qcari%' OR username LIKE '%$qcari%'";
                            }
                            $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                            ?>
                            <table id="example" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Fullname</th>
                                        <th>Foto</th>
                                        <th>Tools</th>
                                    </tr>
                                </thead>
                                <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $data['user_id']; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td><?php echo $data['password']; ?></td>
                                        <td><a href="detail-admin.php?hal=edit&kd=<?php echo $data['user_id']; ?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['fullname']; ?></a></td>
                                        <td><center><img src="<?php echo $data['gambar']; ?>" class="img-circle" height="80" width="75" /></center></td>
                                        <td>
                                            <center>
                                                <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Admin" href="edit-admin.php?hal=edit&kd=<?php echo $data['user_id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                                <a onclick="return confirm ('Yakin hapus <?php echo $data['fullname']; ?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Admin" href="hapus-admin.php?hal=hapus&kd=<?php echo $data['user_id']; ?>"><span class="glyphicon glyphicon-trash"></a>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>

                            <?php $tampil = mysqli_query($conn, "select * from admin order by user_id desc");
                            $user = mysqli_num_rows($tampil);
                            ?>
                            
                            <div class="text-right" style="margin-top: 10px;">
                                <a href="input-admin.php" class="btn btn-sm btn-warning">Tambah Admin <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="footer-main">
                Copyright &copyPerpustakaanPGT2024
            </div>
    </aside>   
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<script src="../js/AdminLTE/app.js" type="text/javascript"></script>

</body>

</html>
<?php  ?>
