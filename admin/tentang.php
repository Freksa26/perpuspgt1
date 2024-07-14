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
<div class="container">
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                        <div class="panel-heading text-center"style="background: linear-gradient(45deg, #3498db, #2980b9);">
                            <b>Tentang Perpustakaan PGT</b>
                        </div>

                            <!-- <div class="box-header"> -->
                            <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                            <!-- </div> -->
                            <div class="container">
    <div class="panel-body table-responsive" style="max-width: 800px; margin: 0 auto;font-size: 20px;">
        <p><strong>PerpustakaanPGT: Menyemai Pengetahuan, Merajut Masa Depan</strong></p>
        <p><strong>Selamat datang di PerpustakaanPGT, pusat literasi dan pengetahuan di Politeknik Gajah Tunggal.</strong> Kami berdedikasi untuk menyediakan berbagai sumber daya informasi yang mendukung kebutuhan akademik, penelitian, dan pengembangan pribadi seluruh sivitas akademika.</p>

        <p><strong>Koleksi Buku yang Lengkap dan Terbaru</strong><br>
            PerpustakaanPGT memiliki koleksi buku yang lengkap, mencakup berbagai disiplin ilmu dari teknik, bisnis, komputer, hingga humaniora. Kami secara rutin memperbarui koleksi kami untuk memastikan bahwa setiap buku yang Anda butuhkan tersedia dan up-to-date.</p>

        <p><strong>Fasilitas Modern dan Nyaman</strong><br>
            Kami memahami pentingnya lingkungan yang kondusif untuk belajar. PerpustakaanPGT dilengkapi dengan fasilitas modern seperti ruang baca yang nyaman, area diskusi kelompok, dan akses internet cepat. Semua ini dirancang untuk mendukung pengalaman belajar yang optimal.</p>

        <p><strong>Layanan Digital dan Online</strong><br>
            Untuk memudahkan akses informasi, kami menyediakan layanan digital dan online. Melalui portal perpustakaan kami, Anda dapat mencari katalog buku, mengakses jurnal elektronik, dan memanfaatkan berbagai sumber daya digital lainnya dari mana saja dan kapan saja.</p>

        <p><strong>Program Literasi dan Pelatihan</strong><br>
            PerpustakaanPGT tidak hanya tempat untuk membaca buku, tetapi juga pusat kegiatan literasi dan pelatihan. Kami mengadakan berbagai program seperti workshop penulisan akademik, seminar literasi informasi, dan pelatihan penggunaan database penelitian. Ini semua bertujuan untuk meningkatkan keterampilan literasi dan penelitian mahasiswa.</p>

        <p><strong>Staf yang Ramah dan Profesional</strong><br>
            Tim kami terdiri dari pustakawan yang berpengalaman dan profesional, siap membantu Anda menemukan informasi yang Anda butuhkan. Kami berkomitmen untuk memberikan pelayanan terbaik dan mendukung kesuksesan akademik Anda.</p>

        <p>Kami mengundang Anda untuk menjelajahi PerpustakaanPGT dan memanfaatkan semua fasilitas yang kami tawarkan. Mari bersama-sama menyemai pengetahuan dan merajut masa depan yang lebih cerah.</p>

        <p><strong>Selamat datang di PerpustakaanPGT!</strong></p>
    </div>
</div>


                        <!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </div>
                <!-- row end -->
            </section>
            </div><!-- /.content -->
            <div class="footer-main">
                Copyright &copy PerpustakaanPGT2024
            </div>
        </aside>

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