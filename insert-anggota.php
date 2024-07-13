<?php

include "conn.php";
$no_induk = $_POST['no_induk'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$jk = $_POST['jk'];
$kelas = $_POST['kelas'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];

$sql = "INSERT INTO data_anggota(id,no_induk,nama,username,password,jk,kelas,ttl,alamat,foto) VALUES
            ('','$no_induk','$nama','$username','$password','$jk','$kelas','$ttl','$alamat','')";
$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
echo "<script type='text/javascript'>
alert('Data anda telah berhasil diinput.');
window.location.href = 'login.html';
</script>";
