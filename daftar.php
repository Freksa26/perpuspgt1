<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="PerpustakaanKU">
  <meta name="perpustakaanku" content="PerpustakaanKU">
  <link rel="icon" href="../../favicon.ico">

  <title>PerpustakaanKU</title>

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.0/font/bootstrap-icons.min.css" rel="stylesheet">



  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
  <script src="js/ie-emulation-modes-warning.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <link rel="stylesheet" href="style.css"> <!-- Rujukan ke file CSS -->
    <style>
        body {
            background-color: #f0f0f0; /* Warna latar belakang */
        }

        .container {
            max-width: 400px; /* Lebar maksimum container */
            margin: 0 auto; /* Posisi tengah */
            background-color: #fff; /* Warna latar belakang container */
            padding: 20px; /* Padding di dalam container */
            border-radius: 5px; /* Sudut bulat container */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Efek bayangan untuk tampilan lebih menarik */
        }

        .form-group {
            margin-bottom: 15px; /* Jarak antara setiap elemen form */
        }

        .form-group label {
            font-weight: bold; /* Memperjelas label */
            display: block; /* Memastikan label tetap pada baris yang sama */
            margin-bottom: 5px; /* Jarak antara label dan input */
        }

        .radio label {
            display: flex; /* Membuat radio button dan label sejajar */
            align-items: center; /* Menyatukan ikon dengan teks */
        }

        .radio label i {
            margin-left: 5px; /* Jarak antara ikon dan teks */
            font-size: 1.2em; /* Ukuran ikon */
            vertical-align: middle; /* Memposisikan ikon di tengah vertikal */
        }
    </style>

</head>

<body background="img/page-background.png">

<div class="container">
        <form class="form-signin" action="insert-anggota.php" method="post">
            <div class="text-center">
                <h2 class="form-signin-heading"><i class="bi bi-book"></i> PerpustakaanPGT</h2>
            </div>

            <div class="form-group">
                <label for="no_induk">Email</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="bi bi-envelope-open"></i></span>
                    <input type="text" id="no_induk" name="no_induk" class="form-control" placeholder="Email" autocomplete="off" autofocus="on" required>
                </div>
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" autocomplete="off" autofocus="on" required>
                </div>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off" autofocus="on" required>
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="radio">
                    <label><input type="radio" name="jk" value="L"> Laki-laki <i class="bi bi-gender-male"></i></label>
                    <label><input type="radio" name="jk" value="P"> Perempuan <i class="bi bi-gender-female"></i></label>
                </div>
            </div>

            <div class="form-group">
                <label for="kelas">Usia</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Usia" autocomplete="off" autofocus="on" required>
                </div>
            </div>

            <div class="form-group">
                <label for="ttl">Tempat, Tanggal Lahir (DD MM YY)</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id="ttl" name="ttl" class="form-control" placeholder="Tempat, Tanggal Lahir (DD MM YY)" autocomplete="off" autofocus="on" required>
                </div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" autocomplete="off" autofocus="on" required>
                </div>
            </div>

            <br>
            <input type="submit" value="Daftar" class="btn btn-sm btn-primary">&nbsp;
            <a href="login.html" class="btn btn-sm btn-danger">Batal</a>
            <p>Login? <a href="login.html">Klik disini</a></p>
        </form>
    </div>
 <!-- /container -->

  
    <h5 class="form-signin">Copyright &copy; <a href="#" data-toggle="modal" data-target="#contact">PerpustakaanPGT2024</a>
    </h5>
  

  <!-- Modal Dialog Contact -->
  <?php include("modal.php")?>
  <!-- end dialog modal -->


  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>