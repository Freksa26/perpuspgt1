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



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
          <style type="text/css">
    /* Tabel 3D */
    .panel-heading {
            background: linear-gradient(45deg, #3498db, #2980b9);
            color: #fff;
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
        box-shadow: 0px 0px 10px rgba(10, 1, 1, 0.5);
    }

    table th, table td {
        padding: 8px;
        text-align: center;
    }

    table th {
        background-color: #f2f2f2;
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }

    table td {
        background-color: #ffffff;
        border: 1px solid #ddd;
    }
</style>
    </head>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
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
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
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
                <!-- search form -->
                <!--<form action="#" method="get" class="sidebar-form">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form> -->
                <!-- /.search form -->
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
                    <b>Data Buku</b>
                </header>
                <div class="panel-body table-responsive">
                    <div class="box-tools m-b-15">
                        <form action="buku.php" method="POST">
                            <div class="input-group">
                                <input type='text' class="form-control input-sm pull-right" style="width: 150px;" name='qcari' placeholder='Cari berdasarkan Judul' required />
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <?php
                    // Konfigurasi untuk halaman
                    $limit = 10; // Jumlah data per halaman
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $limit;

                    $query1 = "SELECT * FROM data_buku";
                    $countQuery = "SELECT COUNT(*) AS count FROM data_buku";

                    if (isset($_POST['qcari'])) {
                        $qcari = $_POST['qcari'];
                        $query1 = "SELECT * FROM data_buku 
                                   WHERE judul LIKE '%$qcari%' OR pengarang LIKE '%$qcari%'";
                        $countQuery = "SELECT COUNT(*) AS count FROM data_buku 
                                       WHERE judul LIKE '%$qcari%' OR pengarang LIKE '%$qcari%'";
                    }

                    // Menghitung jumlah total data
                    $resultCount = mysqli_query($conn, $countQuery);
                    $row = mysqli_fetch_assoc($resultCount);
                    $total = $row['count'];

                    // Query untuk menampilkan data sesuai halaman
                    $query1 .= " LIMIT $start, $limit";
                    $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                    ?>

                    <table id="example" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th><center>Judul</center></th>
                                <th><center>Pengarang</center></th>
                                <th><center>Tahun Terbit</center></th>
                                <th><center>Penerbit</center></th>
                                <th><center>Jumlah Halaman</center></th>
                                <th><center>Tools</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                                <tr>
                                    <td><a href="detail-buku.php?hal=edit&kd=<?php echo $data['id']; ?>"><span class="fa fa-book"></span> <?php echo $data['judul']; ?></a></td>
                                    <td><?php echo $data['pengarang']; ?></td>
                                    <td><?php echo $data['th_terbit']; ?></td>
                                    <td><?php echo $data['penerbit']; ?></td>
                                    <td><?php echo $data['jumlah_buku']; ?></td>
                                    <td>
                                        <center>
                                            <div id="thanks">
                                                <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Buku" href="edit-buku.php?hal=edit&kd=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                                <a onclick="return confirm ('Yakin hapus <?php echo $data['judul']; ?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Buku" href="hapus-buku.php?hal=hapus&kd=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                            </div>
                                        </center>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <?php
                    // Menampilkan navigasi halaman
                    $total_pages = ceil($total / $limit);

                    echo "<ul class='pagination'>";
                    if ($page > 1) {
                        echo "<li><a href='buku.php?page=".($page - 1)."'>Previous</a></li>";
                    }

                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li ".($page == $i ? "class='active'" : "")."><a href='buku.php?page=".$i."'>$i</a></li>";
                    }

                    if ($page < $total_pages) {
                        echo "<li><a href='buku.php?page=".($page + 1)."'>Next</a></li>";
                    }

                    echo "</ul>";
                    ?>

                   

                    <div class="text-right" style="margin-top: 10px;">
                        <a href="buku.php" class="btn btn-sm btn-info">Refresh Buku <i class="fa fa-refresh"></i></a>
                        <a href="input-buku.php" class="btn btn-sm btn-warning">Tambah Buku <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
<!-- /.content -->
    <div class="footer-main">
        Copyright PerpustakaanPGT2024
    </div>
    </aside><!-- /.right-side -->

    </div><!-- ./wrapper -->


    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>

    <!-- jQuery UI 1.10.3 -->
    <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="../js/plugins/chart.js" type="text/javascript"></script>

    <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
    <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
    <!-- iCheck -->
    <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- calendar -->
    <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

    <!-- Director App -->
    <script src="../js/Director/app.js" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="../js/Director/dashboard.js" type="text/javascript"></script>

    <!-- Director for demo purposes -->
    <script type="text/javascript">
        $('input').on('ifChecked', function(event) {
            // var element = $(this).parent().find('input:checkbox:first');
            // element.parent().parent().parent().addClass('highlight');
            $(this).parents('li').addClass("task-done");
            console.log('ok');
        });
        $('input').on('ifUnchecked', function(event) {
            // var element = $(this).parent().find('input:checkbox:first');
            // element.parent().parent().parent().removeClass('highlight');
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
            //BAR CHART
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
        // Chart.defaults.global.responsive = true;
    </script>
    </body>

    </html>