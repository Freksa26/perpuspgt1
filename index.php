    <?php include "conn.php"; ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>PerpustakaanPGT || Membaca menjadi lebih mudah!</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Perpustakaan Berbasis Web">
        <meta name="keywords" content="Perpustakaan, perpus, online, website">
        <meta name="perpustakaanku" content="PerpustakaanKU" />
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <head>
          <!-- Link to Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!-- Theme style -->
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript">
            // 1 detik = 1000
            window.setTimeout("waktu()", 1000);

            function waktu() {
                var tanggal = new Date();
                setTimeout("waktu()", 1000);
                document.getElementById("output").innerHTML = tanggal.getHours() + ":" + tanggal.getMinutes() + ":" + tanggal.getSeconds();
            }
        </script>
        <script language="JavaScript">
            var tanggallengkap = new String();
            var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
            namahari = namahari.split(" ");
            var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
            namabulan = namabulan.split(" ");
            var tgl = new Date();
            var hari = tgl.getDay();
            var tanggal = tgl.getDate();
            var bulan = tgl.getMonth();
            var tahun = tgl.getFullYear();
            tanggallengkap = namahari[hari] + ", " + tanggal + " " + namabulan[bulan] + " " + tahun;

            var popupWindow = null;

            function centeredPopup(url, winName, w, h, scroll) {
                LeftPosition = (screen.width) ? (screen.width - w) / 2 : 0;
                TopPosition = (screen.height) ? (screen.height - h) / 2 : 0;
                settings = 'height=' + h + ',width=' + w + ',top=' + TopPosition + ',left=' + LeftPosition + ',scrollbars=' + scroll + ',resizable'
                popupWindow = window.open(url, winName, settings)
            }
        </script>

    </head>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
        <a href="index.php" class="logo">
    <i class="fas fa-book" style="margin-right: 5px;"></i>
    PerpustakaanPGT
</a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="messages-menu">
                    <table width="1000">
                        <tr>
                            <td width="200">
                                <div class="Tanggal">
                                    <h4>
                                        <script language="JavaScript">
                                            document.write(tanggallengkap);
                                        </script>
                                    </h4>
                                </div>
                            </td>
                            <td align="left" width="30"> - </td>
                            <td align="left" width="620">
                                <h4>
                                    <div id="output" class="jam"></div>
                                </h4>
                            </td>
                        </tr>
                    </table>
                </li>
                <li class="dropdown messages-menu">
                    <a href="#" data-toggle="modal" data-target="#contact">
                        <i class="fa fa-envelope"></i>
                        <!--<span class="label label-success">4</span>-->
                    </a>
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="login.html" data-placement="bottom" data-toggle="tooltip" title="Login">
                        <i class="fa fa-user"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->

            <aside>

                <!-- Main content -->
                <section class="content">

                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <!--<marquee behavior="alternate" direction="left" onmouseover="this.stop();" onmouseout="this.start();">-->
                                <b>Selamat Datang di PerpustakaanPGT, Untuk Login silahkan klik Icon User atau klik <a href="login.html">disini</a></b>
                            </div>
                        </div>
                        <style>
        .panel {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        .panel:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }
        .panel-heading {
            background-color: #3498db; /* Warna latar belakang header panel */
            color: #ffffff; /* Warna teks pada header panel */
            padding: 10px 15px;
            border-radius: 10px 10px 0 0;
        }
        .panel-title {
            margin: 0;
        }
        .panel-body {
            padding: 15px;
            background-color: #fff;
            border-radius: 0 0 10px 10px;
        }
        .panel-body table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }
        .panel-body table th,
        .panel-body table td {
            padding: 8px; /* Mengurangi padding untuk ukuran lebih kecil */
            text-align: left;
            border-bottom: 1px solid #ddd; /* Garis bawah untuk setiap baris */
        }
        .panel-body table th {
            background-color: #f2f2f2; /* Warna latar belakang header kolom */
        }
        .panel-body table tbody tr:hover {
            background-color: #f9f9f9; /* Warna latar belakang saat dihover */
        }
        .panel-body .total-visitors {
            margin-top: 10px;
            font-weight: bold;
        }
        .panel-body .total-visitors span {
            color: #3498db; /* Warna teks untuk jumlah pengunjung */
        }
    </style>
<div class="container">
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
    <div class="col-md-4">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="panel-title"><strong>Tujuan Perpustakaan PGT</strong></h3>
            </header>
            <div class="panel-body">
                <ol>
                    <li align="justify">Mewujudkan lembaga pendidikan tinggi yang profesional dan akuntabel.</li>
                    <li align="justify">Menghasilkan lulusan yang memiliki kemampuan akademik dan/atau profesional yang unggul di tingkat nasional maupun internasional.</li>
                    <li align="justify">Mengembangkan penelitian yang bermutu di bidang ilmu pengetahuan dan teknologi.</li>
                    <li align="justify">Mengembangkan program pengabdian kepada masyarakat yang berbasis pada kebutuhan masyarakat dan pembangunan nasional.</li>
                </ol>
            </div>
        </section>
    </div>
    <div class="col-md-4">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="panel-title"><strong>Kerjasama</strong></h3>
            </header>
            <div class="panel-body">
                <p align="justify">Politeknik Gajah Tunggal menjalin kerjasama dengan berbagai institusi, baik di dalam maupun luar negeri, dalam rangka meningkatkan kualitas pendidikan dan lulusan.</p>
            </div>
        </section>
    </div>
    <div class="col-md-4">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="panel-title"><strong>Team Perpustakaan PGT</strong></h3>
            </header>
            <div class="panel-body">
                <ul>
                    <li><strong>Fatchurrochman Reksa Pratama</strong> - Master</li>
                    <li><strong>Ananditio Aryogusti</strong> - Colaborator</li>
                    <li><strong>Fikri Ainur Ridho</strong> -  Colaborator</li>
                </ul>
            </div>
        </section>
    </div>
</div>
                    <div class="row">
    <!-- Buku Pengunjung -->
    <div class="col-md-8">
        <section class="panel">
            <header class="panel-heading">
                <b>Buku Pengunjung</b>
            </header>
            <div class="panel-body">
                <div class="twt-area">
                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="insert-pengunjung.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">No</label>
                            <div class="col-sm-10">
                                <input name="id" type="text" id="id" class="form-control" placeholder="Tidak perlu diisi" readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Anda" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="jk_l" value="L">
                                    <label class="form-check-label" for="jk_l">Laki - Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="jk_p" value="P">
                                    <label class="form-check-label" for="jk_p">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Usia</label>
                            <div class="col-sm-10">
                                <input name="kelas" type="number" id="kelas" class="form-control" placeholder="Usia Anda" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Keperluan</label>
                            <div class="col-sm-10">
                                <input name="perlu1" type="text" id="perlu1" class="form-control" placeholder="Keperluan" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Buku yang Anda Cari</label>
                            <div class="col-sm-10">
                                <input name="cari" type="text" id="cari" class="form-control" placeholder="Apa yang Anda cari?" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Saran</label>
                            <div class="col-sm-10">
                                <textarea rows="4" name="saran" id="saran" class="form-control" placeholder="Saran Anda Untuk Kami"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input name="tgl_kunjung" type="text" class="form-control" id="tgl_kunjung" value="<?php echo date('Y/m/d'); ?>" readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Jam</label>
                            <div class="col-sm-10">
                                <input name="jam_kunjung" type="text" class="form-control" id="jam_kunjung" value="<?php echo date('G:i:s'); ?>" readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                <a href="#" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>    <!-- Data Pengunjung Hari Ini -->
    <div class="col-md-4">
        <section class="panel">
            <header class="panel-heading">
                <h3 class="panel-title"><strong>Data Pengunjung Hari Ini</strong></h3>
            </header>
            <div class="panel-body table-responsive">
                <?php
                $tanggal = date("Y/m/d");
                $limit = 5;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $start = ($page - 1) * $limit;
                $query1 = "SELECT * FROM pengunjung WHERE tgl_kunjung='$tanggal' LIMIT $start, $limit";
                $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                $query_total = "SELECT COUNT(*) AS total FROM pengunjung WHERE tgl_kunjung='$tanggal'";
                $result_total = mysqli_query($conn, $query_total);
                $row_total = mysqli_fetch_assoc($result_total);
                $total_records = $row_total['total'];
                $total_pages = ceil($total_records / $limit);
                ?>
                <table class="table table-bordered table-hover" style="width: 100%; margin: auto;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Keperluan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                            <tr>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['tgl_kunjung']; ?></td>
                                <td><?php echo $data['jam_kunjung']; ?></td>
                                <td><?php echo $data['perlu1']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                $user = mysqli_num_rows($tampil);
                ?>
                <ul class='pagination justify-content-center'>
                    <?php if ($page > 1) { ?>
                        <li class='page-item'><a class='page-link' href='index.php?page=<?php echo $page - 1; ?>'>Previous</a></li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <li class='page-item <?php if ($i == $page) echo "active"; ?>'><a class='page-link' href='index.php?page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
                    <?php } ?>
                    <?php if ($page < $total_pages) { ?>
                        <li class='page-item'><a class='page-link' href='index.php?page=<?php echo $page + 1; ?>'>Next</a></li>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
</div>
                            </section>
                        </div>
                    </div>
                </section>
                <div class="col-md-12">
    <section class="panel">
        <header class="panel-heading">
            <b>Data Akumulasi Pengunjung</b>
        </header>
        <div class="panel-body table-responsive">
            <?php
            $limit = 5; // Jumlah data per halaman
            $page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini, default halaman 1
            $start = ($page - 1) * $limit; // Perhitungan offset data
            $query = "SELECT * FROM pengunjung ORDER BY id DESC LIMIT $start, $limit";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($result) > 0) {
                ?>
                <table class="table table-hover table-bordered" style="table-layout: fixed; word-wrap: break-word; border-width: 2px;">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Usia</th>
                            <th>Tanggal</th>
                            <th>Jam Berkunjung</th>
                            <th>Keperluan</th>
                            <th>Buku Yang di Cari</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($data1 = mysqli_fetch_array($result)) { ?>
                            <tr>
                                <td><?php echo $data1['nama']; ?></td>
                                <td><?php echo $data1['jk']; ?></td>
                                <td><?php echo $data1['kelas']; ?></td>
                                <td><?php echo $data1['tgl_kunjung']; ?></td>
                                <td><?php echo $data1['jam_kunjung']; ?></td>
                                <td><?php echo $data1['perlu1']; ?></td>
                                <td><?php echo $data1['cari']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo "<p>Tidak ada data pengunjung.</p>";
            }
            // Pagination
            $query_total = "SELECT COUNT(*) AS total FROM pengunjung";
            $result_total = mysqli_query($conn, $query_total);
            $row_total = mysqli_fetch_assoc($result_total);
            $total_records = $row_total['total'];
            $total_pages = ceil($total_records / $limit);

            echo "<ul class='pagination justify-content-center'>"; // Menggunakan justify-content-center untuk membuat tombol berada di tengah
            if ($page > 1) {
                echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($page - 1) . "'>Previous</a></li>";
            }
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<li class='page-item " . ($i == $page ? "active" : "") . "'><a class='page-link' href='index.php?page=" . $i . "'>" . $i . "</a></li>";
            }
            if ($page < $total_pages) {
                echo "<li class='page-item'><a class='page-link' href='index.php?page=" . ($page + 1) . "'>Next</a></li>";
            }
            echo "</ul>";
            ?>
        </div>
    </section>
</div>
            Copyright &copy; PerpustakaanPGT2024
        </div>
        </aside>
        </div>
        <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">PerpustakaanKU</h4>
                    </div>
                    <div class="modal-body">
                        <p> PerpustakaanPGT adalah salah satu layanan bagi pengguna untuk dapat mengakses berbagai buku bacaan yang dan dilakukan kapan saja dan dari mana saja, dengan menggunakan jaringan internet.</p>
                        <p> PerpustakaanPGT memiliki koleksi buku dalam bentuk format digital dan bisa diakses dengan komputer. koleksi bacaan dari PerpustakaanKu dapat diakses dengan cepat dan mudah lewat jaringan komputer.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="js/plugins/chart.js" type="text/javascript"></script>
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>
        <script src="js/Director/app.js" type="text/javascript"></script>
        <script src="js/Director/dashboard.js" type="text/javascript"></script>
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