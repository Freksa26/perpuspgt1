<?php
include "conn.php"; // Memasukkan file koneksi database

// Mengambil nilai dari form
$no_induk = $_POST['no_induk'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$jk = $_POST['jk'];
$kelas = $_POST['kelas'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];

// Query SQL untuk memasukkan data ke dalam tabel
$sql = "INSERT INTO data_anggota (no_induk, nama, username, password, jk, kelas, ttl, alamat, foto) 
        VALUES ('$no_induk', '$nama', '$username', '$password', '$jk', '$kelas', '$ttl', '$alamat', '')";

// Menjalankan query dan menangani hasilnya
if (mysqli_query($conn, $sql)) {
    echo "<script type='text/javascript'>
            alert('Data anda telah berhasil diinput.');
            window.location.href = 'login.html';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn); // Menampilkan pesan error jika query tidak berhasil
}

mysqli_close($conn); // Menutup koneksi database setelah selesai
?>
