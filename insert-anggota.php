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

// Query SQL untuk memeriksa ketersediaan username
$check_username_query = "SELECT * FROM data_anggota WHERE username = '$username'";
$check_username_result = mysqli_query($conn, $check_username_query);

// Memeriksa apakah username sudah ada
if (mysqli_num_rows($check_username_result) > 0) {
    // Jika username sudah ada, tampilkan pesan error
    echo "<script type='text/javascript'>
            alert('Username sudah digunakan. Silakan gunakan username lain.');
            window.location.href = 'daftar.php'; // Ganti dengan halaman pendaftaran Anda
          </script>";
} else {
    // Jika username belum digunakan, lakukan INSERT data
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
}

mysqli_close($conn); // Menutup koneksi database setelah selesai
?>
