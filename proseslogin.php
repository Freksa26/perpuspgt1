<?php
include("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

if (empty($username) && empty($password)) {
    echo "<script>alert('Username atau no_induk dan password tidak boleh kosong'); window.location.href='login.html?error=1';</script>";
} else if (empty($username)) {
    echo "<script>alert('Username atau no_induk tidak boleh kosong'); window.location.href='login.html?error=2';</script>";
} else if (empty($password)) {
    echo "<script>alert('Password tidak boleh kosong'); window.location.href='login.html?error=3';</script>";
} else {
    if ($level == 'admin') {
        $q = mysqli_query($conn, "SELECT * FROM admin WHERE (username='$username') AND password='$password'");
    } else {
        $q = mysqli_query($conn, "SELECT * FROM data_anggota WHERE (username='$username' OR no_induk='$username') AND password='$password'");
    }

    $row = mysqli_fetch_array($q);

    if (mysqli_num_rows($q) == 1) {
        if ($level == 'admin') {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['gambar'] = $row['gambar'];

            mysqli_query($conn, "REPLACE INTO user_sessions (user_id, login_status) VALUES ('" . $row['user_id'] . "', 1)");

            header('location:admin/index.php');
        } else {
            $_SESSION['id'] = $row['id'];
            $_SESSION['no_induk'] = $row['no_induk'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['username'] = $username;
            $_SESSION['jk'] = $row['jk'];
            $_SESSION['kelas'] = $row['kelas'];
            $_SESSION['ttl'] = $row['ttl'];
            $_SESSION['alamat'] = $row['alamat'];
            $_SESSION['foto'] = $row['gambar'];

            mysqli_query($conn, "REPLACE INTO user_sessions (user_id, login_status) VALUES ('" . $row['id'] . "', 1)");

            header('location:anggota/index.php');
        }
    } else {
        echo "<script>alert('Username, no_induk atau password salah'); window.location.href='login.html?error=4';</script>";
    }
}
?>
