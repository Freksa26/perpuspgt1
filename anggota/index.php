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
        <meta name="description" content="Sarjana Komedi">
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

        </style>
    </head>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php include "header.php"; ?>
        <!--end header-->
        <!--logout-->
   <?php include "logout.php"; ?>
   <!--destroy-->
    <?php } ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                
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

            <div class="row" style="margin-bottom: 20px;">
    <style>
        /* Style untuk memberikan efek 3D pada ikon */
        .sidebar-menu .treeview-menu > li > a {
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        }
        .sm-st-icon {
            display: inline-block;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            font-size: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Efek bayangan */
        }

        /* Style untuk informasi di dalam blok statistik */
        .sm-st-info {
            padding-left: 10px;
        }

        /* Style untuk clearfix */
        .sm-st.clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Warna dan tata letak sesuai kebutuhan */
        .st-red {
            background-color: #e74c3c;
            color: white;
        }

        .st-violet {
            background-color: #9b59b6;
            color: white;
        }
        .btn {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .st-blue {
            background-color: #3498db;
            color: white;
        }

        .st-green {
            background-color: #2ecc71;
            color: white;
        }
    </style>

    <div class="col-md-4">
        <div class="sm-st clearfix">
            <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
            <div class="sm-st-info">
                <?php
                $tampil = mysqli_query($conn, "SELECT * FROM data_anggota ORDER BY id DESC");
                $total = mysqli_num_rows($tampil);
                ?>
                <span><?php echo "$total"; ?></span>
                Total Anggota
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="sm-st clearfix">
            <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
            <div class="sm-st-info">
                <?php
                $tampil = mysqli_query($conn, "SELECT * FROM data_buku ORDER BY id DESC");
                $total1 = mysqli_num_rows($tampil);
                ?>
                <span><?php echo "$total1"; ?></span>
                Total Buku
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="sm-st clearfix">
            <span class="sm-st-icon st-blue"><i class="fa fa-user"></i></span>
            <div class="sm-st-info">
                <?php
                $tampil = mysqli_query($conn, "SELECT * FROM admin ORDER BY user_id DESC");
                $total2 = mysqli_num_rows($tampil);
                ?>
                <span><?php echo "$total2"; ?></span>
                Total Admin
            </div>
        </div>
    </div>

    <!-- Tambah blok untuk statistik pengunjung -->
    <div class="col-md-4">
        <div class="sm-st clearfix">
            <span class="sm-st-icon st-green"><i class="fa fa-group"></i></span>
            <div class="sm-st-info">
                <?php
                $tampil = mysqli_query($conn, "SELECT * FROM pengunjung ORDER BY id DESC");
                $total3 = mysqli_num_rows($tampil);
                ?>
                <span><?php echo "$total3"; ?></span>
                Total Pengunjung
            </div>
        </div>
    </div>
</div>


                <!-- Main row -->
                <div class="row">


                    <div class="col-lg-4">

                        <!--chat start-->
                        <section class="panel">
                            <header class="panel-heading">
                                Pemberitahuan
                            </header>
                            <div class="panel-body" id="noti-box">
                                <?php
                                $tampil = mysqli_query($conn, "select * from data_anggota order by id desc limit 1");
                                while ($data2 = mysqli_fetch_array($tampil)) {
                                ?>
                                    <div class="alert alert-block alert-danger">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <strong><?php echo $data2['nama']; ?></strong>, Telah terdaftar menjadi anggota perpustakaan.
                                    </div>
                                <?php } ?>

                                <?php
                                $tampil = mysqli_query($conn, "select * from admin order by user_id desc limit 1");
                                while ($data3 = mysqli_fetch_array($tampil)) {
                                ?>
                                    <div class="alert alert-success">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <strong><?php echo $data3['fullname']; ?></strong>, Telah ditambahkan menjadi admin PerPusWeb yang baru.
                                    </div>
                                <?php } ?>

                                <?php
                                $tampil = mysqli_query($conn, "select * from data_buku order by id desc limit 1");
                                while ($data4 = mysqli_fetch_array($tampil)) {
                                ?>
                                    <div class="alert alert-info">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <strong><?php echo $data4['judul']; ?></strong>, Buku bacaan baru yang ada di PerPusWeb.
                                    </div>
                                <?php } ?>

                                <?php
                                $tampil = mysqli_query($conn, "select * from pengunjung order by id desc limit 1");
                                while ($data5 = mysqli_fetch_array($tampil)) {
                                ?>
                                    <div class="alert alert-warning">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <strong><?php echo $data5['nama']; ?> </strong> Pengunjung baru di PerPusWeb.
                                    </div>
                                <?php } ?>
                            </div>
                        </section>



                    </div>


                </div>
                <div class="col-md-4">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="panel-title"><strong>Motto Perpustakaan PGT</strong></h3>
            </header>
            <div class="panel-body">
                <center>
                    <p><strong>"Tekun, Terampil, Kreatif"</strong></p>
                </center>
            </div>
        </section>
    </div>

    <div class="col-md-4">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="panel-title"><strong>Visi Perpustakaan PGT</strong></h3>
            </header>
            <div class="panel-body">
                <p align="justify">Terwujudnya Politeknik berkarakter dalam menghasilkan lulusan unggul yang memiliki keahlian dan kemampuan di bidangnya serta mampu bersaing di tingkat nasional maupun internasional.</p>
            </div>
        </section>
    </div>

    <div class="col-md-4">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="panel-title"><strong>Misi Perpustakaan PGT</strong></h3>
            </header>
            <div class="panel-body">
                <ol>
                    <li align="justify">Membentuk manusia yang beriman, bertaqwa dan berakhlak mulia.</li>
                    <li align="justify">Menghasilkan lulusan yang kompeten sesuai dengan bidang keahliannya.</li>
                    <li align="justify">Menyelenggarakan program pendidikan vokasi yang berkualitas sesuai dengan perkembangan ilmu pengetahuan dan teknologi.</li>
                </ol>
            </div>
        </section>
    </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="panel">
                            <header class="panel-heading">
                                Daftar Anggota
                            </header><?php
                                        $tampil = mysqli_query($conn, "select * from data_anggota order by id desc limit 3");
                                        while ($data1 = mysqli_fetch_array($tampil)) {
                                        ?>
                                <ul class="list-group teammates">
                                    <li class="list-group-item">
                                        <img src="<?php echo $data1['foto']; ?>" width="50" height="50" style="border: 3px solid #555555;">
                                        <?php echo $data1['nama']; ?>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!-- row end -->
            </section><!-- /.content -->
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