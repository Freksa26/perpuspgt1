<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PerpustakaanKU">
    <meta name="perpustakaanku" content="PerpustakaanKU">
    <link rel="icon" href="../../favicon.ico">
    <title>PerpustakaanKU</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="style.css"> <!-- Reference to custom CSS file -->
    <style>
        body {
            background: url('img/ibrary-background.jpg') no-repeat center center fixed; 
            background-size: cover; 
        }
        .container {
            max-width: 400px; 
            margin: 0 auto; 
            background-color: #fff; 
            padding: 20px; 
            border-radius: 5px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
        }
        .form-group {
            margin-bottom: 15px; 
        }
        .form-group label {
            font-weight: bold; 
            display: block; 
            margin-bottom: 5px; 
        }
        .radio label {
            display: flex; 
            align-items: center; 
        }
        .radio label i {
            margin-left: 5px; 
            font-size: 1.2em; 
            vertical-align: middle; 
        }
        .input-group-addon {
            background-color: white; 
        }
        .right-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background-color: white; 
            padding: 5px;
            border-radius: 50%; 
            pointer-events: none;
        }
        .input-group {
            position: relative;
        }
        .form-control {
            padding-right: 45px; 
        }
        .small-icon {
            padding: 2px; 
            font-size: 0.8em; 
        }
    </style>
</head>
<body>
<div class="container">
    <form class="form-signin" action="insert-anggota.php" method="post" enctype="multipart/form-data">
        <div class="text-center">
            <h2 class="form-signin-heading"><i class="bi bi-book"></i> PerpustakaanPGT</h2>
        </div>

        <div class="form-group">
            <label for="no_induk"><i class="bi bi-envelope-open"></i> Email</label>
            <div class="input-group">
                <span class="input-group-addon right-icon"><i class="bi bi-envelope-open"></i></span>
                <input type="text" id="no_induk" name="no_induk" class="form-control" placeholder="Email" autocomplete="off" autofocus="on" required>
            </div>
        </div>

        <div class="form-group">
            <label for="nama"><i class="bi bi-person"></i> Full Name</label>
            <div class="input-group">
                <span class="input-group-addon right-icon"><i class="bi bi-person"></i></span>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Full Name" autocomplete="off" autofocus="on" required>
            </div>
        </div>

        <div class="form-group">
            <label for="username"><i class="bi bi-person"></i> Username</label>
            <div class="input-group">
                <span class="input-group-addon right-icon"><i class="bi bi-person"></i></span>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off" autofocus="on" required>
            </div>
        </div>

        <div class="form-group">
            <label for="password"><i class="bi bi-lock"></i> Password</label>
            <div class="input-group">
                <span class="input-group-addon right-icon small-icon"><i class="bi bi-lock"></i></span>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
            </div>
        </div>

        <div class="form-group">
            <label><i class="bi bi-gender-ambiguous"></i> Jenis Kelamin</label>
            <div class="radio">
                <label><input type="radio" name="jk" value="L"> Laki-laki <i class="bi bi-gender-male"></i></label>
                <label><input type="radio" name="jk" value="P"> Perempuan <i class="bi bi-gender-female"></i></label>
            </div>
        </div>

        <div class="form-group">
            <label for="kelas"><i class="bi bi-hourglass-split"></i> Usia</label>
            <div class="input-group">
                <span class="input-group-addon right-icon"><i class="bi bi-hourglass-split"></i></span>
                <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Usia" autocomplete="off" autofocus="on" required>
            </div>
        </div>

        <div class="form-group">
            <label for="ttl"><i class="bi bi-calendar4-week"></i> Tempat, Tanggal Lahir (DD MM YY)</label>
            <div class="input-group">
                <span class="input-group-addon right-icon"><i class="bi bi-calendar4-week"></i></span>
                <input type="text" id="ttl" name="ttl" class="form-control" placeholder="Tempat, Tanggal Lahir (DD MM YY)" autocomplete="off" autofocus="on" required>
            </div>
        </div>

        <div class="form-group">
            <label for="alamat"><i class="bi bi-house"></i> Alamat</label>
            <div class="input-group">
                <span class="input-group-addon right-icon"><i class="bi bi-house"></i></span>
                <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" autocomplete="off" autofocus="on" required>
            </div>
        </div>

       
    <!-- Formulir lainnya -->
    <div class="form-group">
        <label for="foto"><i class="bi bi-camera"></i> Foto</label>
        <div class="input-group">
            <span class="input-group-addon right-icon"><i class="bi bi-camera"></i></span>
            <input type="file" id="foto" name="foto" class="form-control" required>
        </div>
    </div>
    <!-- Tombol submit dan link batal -->



        <br>
        <input type="submit" value="Daftar" class="btn btn-sm btn-primary">&nbsp;
        <a href="login.html" class="btn btn-sm btn-danger">Batal</a>
        <p>Login? <a href="login.html">Klik disini</a></p>
    </form>
</div>

<h5 class="form-signin">Copyright &copy; <a href="#" data-toggle="modal" data-target="#contact">PerpustakaanPGT2024</a></h5>

<!-- Modal Dialog Contact -->
<?php include("modal.php")?>
<!-- end dialog modal -->

<script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
