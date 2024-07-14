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
    <!-- Morris chart -->
    <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Custom CSS -->
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

</head>

<body class="skin-black">
    <?php include "header.php" ?>
    <?php
    $timeout = 10;
    $logout_redirect_url = "../login.html";
    $timeout = $timeout * 60;
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
                    <center><img src="<?php echo $_SESSION['gambar']; ?>" height="80" width="80" class="img-circle" alt="User Image" style="border: 3px solid white;" /></center>
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
                            <b>Input Admin</b>
                        </header>
                        <div class="panel-body">
                            <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-admin.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">User ID</label>
                                    <div class="col-sm-8">
                                        <input name="user_id" type="text" id="user_id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                    <div class="col-sm-8">
                                        <input name="username" type="text" id="username" class="form-control" placeholder="Ex: xxx.@gmail.com" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                    <div class="col-sm-8">
                                        <input name="password" type="text" id="password" class="form-control" placeholder="password" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Fullname</label>
                                    <div class="col-sm-8">
                                        <input name="fullname" class="form-control" id="fullname" type="text" placeholder="Fullname" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Gambar</label>
                                    <div class="col-sm-8">
                                        <input name="nama_file" id="nama_file" type="file" />
                                    </div>
                                </div>
                                <div class="form-group" style="margin-bottom: 20px;">
                                    <label class="col-sm-2 col-sm-2 control-label"></label>
                                    <div class="col-sm-8">
                                        <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                        <a href="admin.php" class="btn btn-sm btn-danger">Batal </a>
                                    </div>
                                </div>
                                <div style="margin-top: 20px;"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="footer-main">
            Copyright &copy PerpustakaanPGT2024
        </div>
    </aside>
</div>

<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="../js/jquery.min.js" type="text/javascript"></script>

<!-- jQuery UI 1.10.3 -->
<script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- Chart.js -->
<script src="../js/plugins/chart.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- Director App -->
<script src="../js/Director/app.js" type="text/javascript"></script>
<!-- Director dashboard demo (This is only for demo purposes) -->
<script src="../js/Director/dashboard.js" type="text/javascript"></script>

<script type="text/javascript">
    $('input').on('ifChecked', function(event) {
        $(this).parents('li').addClass("task-done");
        console.log('ok');
    });
    $('input').on('ifUnchecked', function(event) {
        $(this).parents('li').removeClass("task-done");
        console.log('not');
    });
</script>
<script>
    $('#noti-box').slimScroll({
        height: '400px',
        size: '5px',
        BorderRadius: '5px'
    });

    $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
        checkboxClass: 'icheckbox_flat-grey',
        radioClass: 'iradio_flat-grey'
    });
</script>
<script type="text/javascript">
    $(function() {
        "use strict";
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 80, 81, 56, 55, 40]
                },
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [28, 48, 40, 19, 86, 27, 90]
                }
            ]
        };
        new Chart(document.getElementById("linechart").getContext("2d")).Line(data, {
            responsive: true,
            maintainAspectRatio: false,
        });
    });
</script>
</body>

</html>
<?php  ?>
