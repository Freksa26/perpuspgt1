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
                        <center><img src="<?php echo $_SESSION['gambar']; ?>" height="80" width="80" class="img-circle" alt="Foto Admin" style="border: 3px solid white;" /></center>
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

<div class="row" style="margin-bottom: 20px;">

<style type="text/css">
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
    transition: transform 0.3s ease; /* Efek transisi */
}
.sm-st-icon:hover {
    transform: scale(1.1); /* Efek skala saat hover */
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
/* Tambahan styling untuk panel */
.panel {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Efek bayangan */
    border-radius: 10px; /* Membuat sudut membulat */
    transition: transform 0.3s ease; /* Efek transisi */
}
.panel:hover {
    transform: translateY(-10px); /* Efek mengangkat saat hover */
}
/* Tambahan styling untuk header */
.panel-heading {
    background: linear-gradient(45deg, #3498db, #2980b9); /* Mengubah menjadi biru */
    color: white;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
/* Tambahan styling untuk footer */
.footer-main {
    background: #333;
    color: white;
    padding: 10px;
    text-align: center;
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.3); /* Efek bayangan */
}
.sm-st {
border: 1px solid #ddd;
border-radius: 8px;
padding: 20px;
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
transition: transform 0.3s, box-shadow 0.3s;
overflow: hidden;
position: relative;
}

.sm-st-icon {
font-size: 3em;
margin-bottom: 15px;
display: block;
text-align: center;
color: #fff;
}

.st-red { background: linear-gradient(45deg, #ff6b6b, #ff4757); }
.st-violet { background: linear-gradient(45deg, #9b59b6, #8e44ad); }
.st-blue { background: linear-gradient(45deg, #3498db, #2980b9); }
.st-green { background: linear-gradient(45deg, #2ecc71, #27ae60); }

.sm-st-info {
text-align: center;
color: #343a40;
}

.sm-st-info span {
font-size: 2em;
font-weight: bold;
display: block;
color: #343a40;
}

.sm-st-info span:last-child {
font-size: 1.2em;
color: #6c757d;
font-weight: 600;
}

.sm-st:hover {
transform: translateY(-10px);
box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

@keyframes backgroundMove {
0% { background-position: 0% 50%; }
50% { background-position: 100% 50%; }
100% { background-position: 0% 50%; }
}

.st-red, .st-violet, .st-blue, .st-green {
background-size: 200% 200%;
animation: backgroundMove 10s ease infinite;
}

</style>

<div class>
<div class="col-md-11">
    <div class="sm-st clearfix" style="background: linear-gradient(45deg, #3498db, #2980b9);">
        <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
        <div class="sm-st-info">
            <?php
            $tampil = mysqli_query($conn, "SELECT * FROM data_buku ORDER BY id DESC");
            $total1 = mysqli_num_rows($tampil);
            ?>
            <span><strong><?php echo "$total1"; ?></strong></span>
            <strong>Total Buku</strong>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="sm-st clearfix" style="background: linear-gradient(45deg, #3498db, #2980b9);">
        <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
        <div class="sm-st-info">
            <?php
            $tampil = mysqli_query($conn, "SELECT * FROM data_anggota ORDER BY id DESC");
            $total = mysqli_num_rows($tampil);
            ?>
            <span><strong><?php echo "$total"; ?></strong></span>
            <strong>Total Anggota</strong>
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="sm-st clearfix" style="background: linear-gradient(45deg, #3498db, #2980b9);">
        <span class="sm-st-icon st-blue"><i class="fa fa-user"></i></span>
        <div class="sm-st-info">
            <?php
            $tampil = mysqli_query($conn, "SELECT * FROM admin ORDER BY user_id DESC");
            $total2 = mysqli_num_rows($tampil);
            ?>
            <span><strong><?php echo "$total2"; ?></strong></span>
            <strong>Total Admin</strong>
        </div>
    </div>
</div>
</div>
<div class="col-md-3">
<div class="sm-st clearfix" style="background: linear-gradient(45deg, #3498db, #2980b9);">
<span class="sm-st-icon st-green"><i class="fa fa-group"></i></span>
<div class="sm-st-info">
<?php
$tampil = mysqli_query($conn, "SELECT COUNT(*) as total FROM user_sessions WHERE login_status = 1");
$row = mysqli_fetch_assoc($tampil);
$total3 = $row['total'];
?>
<span><strong><?php echo "$total3"; ?></strong></span>
<strong>Total Pengunjung Online</strong>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">     
<section class="panel tasks-widget">
                <header class="panel-heading">
                    Daftar Bacaan PerPusWeb
                </header>
                <div class="panel-body">

                    <div class="task-content">

                        <ul class="task-list">
                            <?php
                            $tampil = mysqli_query($conn, "select * from data_buku order by id desc limit 5");
                            while ($data6 = mysqli_fetch_array($tampil)) {
                            ?>
                                <li>
                                    <div class="task-checkbox">
                                        <!-- <input type="checkbox" class="list-child" value=""  /> -->
                                        <input type="checkbox" class="flat-grey list-child" />
                                        <!-- <input type="checkbox" class="square-grey"/> -->
                                    </div>
                                    <div class="task-title">
                                        <span class="task-title-sp"><?php echo $data6['judul']; ?></span>
                                        <span class="label label-primary"><?php echo $data6['tgl_input']; ?></span>
                                        <div class="pull-right hidden-phone">
                                           
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                    <div class=" add-task-row">
                        <a class="btn btn-warning btn-sm pull-left" href="buku.php">Lihat Buku Bacaan</a>
                        <!--<a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>-->
                    </div>
                </div>
            </section>
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
<section class="panel">
<header class="panel-heading">
    <h3 class="panel-title"><strong>Visi Perpustakaan PGT</strong></h3>
</header>
<div class="panel-body">
    <p align="justify">Terwujudnya Politeknik berkarakter dalam menghasilkan lulusan unggul yang memiliki keahlian dan kemampuan di bidangnya serta mampu bersaing di tingkat nasional maupun internasional.</p>
</div>

</section>
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