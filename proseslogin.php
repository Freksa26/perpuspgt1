<?php
include("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

if ($level == 'admin') {

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    if (empty($username) && empty($password)) {
        echo "<script>alert('Username dan password tidak boleh kosong'); window.location.href='login.html?error=1';</script>";
    } else if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong'); window.location.href='login.html?error=2';</script>";
    } else if (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong'); window.location.href='login.html?error=3';</script>";
    } else {
        $q = mysqli_query($conn, "select * from admin where username='$username' and password='$password'");
        $row = mysqli_fetch_array($q);

        if (mysqli_num_rows($q) == 1) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['gambar'] = $row['gambar'];

            header('location:admin/index.php');
        } else {
            echo "<script>alert('Username atau password salah'); window.location.href='login.html?error=4';</script>";
        }
    }
} else {
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    if (empty($username) && empty($password)) {
        echo "<script>alert('Username dan password tidak boleh kosong'); window.location.href='login.html?error=1';</script>";
    } else if (empty($username)) {
        echo "<script>alert('Username tidak boleh kosong'); window.location.href='login.html?error=2';</script>";
    } else if (empty($password)) {
        echo "<script>alert('Password tidak boleh kosong'); window.location.href='login.html?error=3';</script>";
    } else {
        $q = mysqli_query($conn, "select * from data_anggota where username='$username' and password='$password'");
        $row = mysqli_fetch_array($q);

        if (mysqli_num_rows($q) == 1) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['no_induk'] = $row['no_induk'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['username'] = $username;
            $_SESSION['jk'] = $row['jk'];
            $_SESSION['kelas'] = $row['kelas'];
            $_SESSION['ttl'] = $row['ttl'];
            $_SESSION['alamat'] = $row['alamat'];
            $_SESSION['foto'] = $row['gambar'];

            header('location:anggota/index.php');
        } else {
            echo "<script>alert('Username atau password salah'); window.location.href='login.html?error=4';</script>";
        }
    }
}
?>
