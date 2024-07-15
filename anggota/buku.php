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
    <!-- Bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    /* Tabel 3D */
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

    <!-- jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Chart.js -->
    <script src="../js/plugins/chart.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.treeview > a').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $treeview = $this.parent();

            // Toggle the treeview menu
            $treeview.toggleClass('active');
            $treeview.children('.treeview-menu').slideToggle();

            // Close other treeview menus
            $treeview.siblings('.treeview').removeClass('active');
            $treeview.siblings('.treeview').children('.treeview-menu').slideUp();
        });
    });
</script>

</head>

<body class="skin-black">
    <!-- Header -->
    <?php include "header.php"; ?>
    <!-- End Header -->

    <!-- Logout -->
    <?php include "logout.php"; ?>
    <!-- End Logout -->

    <?php } ?>

    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. Contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <!-- Sidebar menu -->
                <?php include "menu.php"; ?>
            </section><!-- /.sidebar -->
        </aside><!-- /.left-side -->

        <!-- Right side -->
        <aside class="right-side">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Buku</h3>
                            </div>
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

                                <!-- Table -->
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
                                            <th class="text-center">Judul</th>
                                            <th class="text-center">Pengarang</th>
                                            <th class="text-center">Tahun Terbit</th>
                                            <th class="text-center">Penerbit</th>
                                            <th class="text-center">Jumlah Halaman</th>
                                            <th class="text-center">Tools</th>
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
                                                <td class="text-center">
                                                    <div id="thanks">
                                                        <a class="btn btn-primary btn-sm" data-toggle="tooltip" title="Edit Buku" href="edit-buku.php?hal=edit&kd=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                                        <a onclick="return confirm('Yakin akan menghapus data ini?');" class="btn btn-danger btn-sm tooltips" data-toggle="tooltip" title="Hapus Buku" href="hapus-buku.php?hal=hapus&kd=<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-trash"></span></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <!-- Pagination -->
                                <?php
                                // Menampilkan navigasi halaman
                                $total_pages = ceil($total / $limit);

                                echo "<ul class='pagination pagination-sm'>";
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

                                <!-- Tombol Refresh dan Tambah Buku -->
                                <div class="text-right" style="margin-top: 10px;">
                                    <a href="buku.php" class="btn btn-info btn-sm">Refresh Buku <i class="fa fa-refresh"></i></a>
                                   
                                </div>
                            </div><!-- /.panel-body -->
                        </div><!-- /.panel -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->

            <!-- Footer -->
            <div class="footer-main">
                Copyright &copy; PerpustakaanPGT 2024
            </div><!-- /.footer-main -->
        </aside><!-- /.right-side -->
    </div><!-- /.wrapper -->

    <!-- Slimscroll -->
    <script src="../js/jquery.slimscroll.min.js" type="text/javascript"></script>

    <!-- Chart.js -->
    <script>
        
        $(function() {
            // Initiate tooltips
            $('[data-toggle="tooltip"]').tooltip();

            // Initiate slimscroll for notifications
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                borderRadius: '5px'
            });
        });
    </script>
    
       
</body>
</html>
