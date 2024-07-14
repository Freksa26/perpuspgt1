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
        <!-- Google Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

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
                        <center><img src="<?php echo $_SESSION['gambar']; ?>" height="80" width="80" class="img-circle" alt="User Image" /></center>
                    </div>
                    <div class="info">
                        <center>
                            <p><?php echo $_SESSION['fullname']; ?></p>
                        </center>

                    </div>
                </div>
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
                                <b>Input Buku</b>
                            </header>
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-buku.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Kode Buku</label>
                                        <div class="col-sm-8">
                                            <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu di isi" autofocus="on" readonly="readonly" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                        <div class="col-sm-8">
                                            <input name="judul" type="text" id="judul" class="form-control" autocomplete="off" placeholder="Judul Buku" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                        <div class="col-sm-8">
                                            <input name="pengarang" type="text" id="pengarang" class="form-control" autocomplete="off" placeholder="Pengarang" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                        <div class="col-sm-8">
                                            <input name="th_terbit" type="text" id="th_terbit" class="form-control" autocomplete="off" placeholder="Tahun Terbit" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <input name="penerbit" type="text" id="penerbit" class="form-control" autocomplete="off" placeholder="Penerbit" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Buku</label>
                                        <div class="col-sm-8">
                                            <input name="jumlah_buku" type="text" id="jumlah_buku" class="form-control" autocomplete="off" placeholder="Jumlah Buku" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Lokasi</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="lokasi" id="lokasi">
                                                <option>Rak 1</option>
                                                <option>Rak 2</option>
                                                <option>Rak 3</option>
                                                <option>Rak 4</option>
                                                <option>Rak 5</option>
                                                <option>Rak 6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Asal</label>
                                        <div class="col-sm-8">
                                            <input name="asal" type="text" id="asal" class="form-control" autocomplete="off" placeholder="Asal Buku" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal Input</label>
                                        <div class="col-sm-8">
                                            <input name="tgl_input" type="text" id="tgl_input" class="form-control" autocomplete="off" value="<?php echo "" . date("Y/m/d") . ""; ?>" readonly="readonly" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                        <div class="col-sm-8">
                                            <input name="nama_file" type="file" id="nama_file" class="form-control" placeholder="Pilih Gambar Buku" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-10">
                                            <button type="submit" name="input" class="btn btn-primary">Simpan</button>
                                            <a href="input-buku.php" class="btn btn-danger">Batal</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- col-lg-12-->
                </div><!-- /.row -->
            </section><!-- /.content -->

            <div class="footer-main">
                Copyright PerpustakaanKU 2021
            </div>
        </aside><!-- /.right-side -->

    </div><!-- ./wrapper -->

    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="../js/plugins/chart.js" type="text/javascript"></script>

    <!-- datepicker -->
    <script src="../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- calendar -->
    <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

    <!-- Director App -->
    <script src="../js/Director/app.js" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="../js/Director/dashboard.js" type="text/javascript"></script>

    <script>
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

        $("#check-all").click(function() {
            $("input[type='checkbox']", ".task-list").iCheck("check");
        });

        $("#uncheck-all").click(function() {
            $("input[type='checkbox']", ".task-list").iCheck("uncheck");
        });
    </script>

    </body>

    </html>
