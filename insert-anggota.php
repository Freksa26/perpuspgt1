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

// Handle upload file foto
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $foto = $_FILES['foto'];
    $foto_name = $foto['name'];
    $foto_tmp_name = $foto['tmp_name'];
    $foto_size = $foto['size'];
    $foto_error = $foto['error'];
    $foto_type = $foto['type'];

    // Tentukan tipe file yang diperbolehkan
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    // Ambil ekstensi file
    $foto_ext = explode('.', $foto_name);
    $foto_actual_ext = strtolower(end($foto_ext));

    // Periksa apakah tipe file diperbolehkan
    if (in_array($foto_actual_ext, $allowed)) {
        if ($foto_error === 0) {
            if ($foto_size < 1000000) { // Ukuran file kurang dari 1MB
                // Generate nama unik untuk file
                $foto_new_name = uniqid('', true) . "." . $foto_actual_ext;
                $upload_dir = 'uploads/';
                $foto_destination = $upload_dir . $foto_new_name;

                // Create uploads directory if it doesn't exist
                if (!file_exists($upload_dir)) {
                    mkdir($upload_dir, 0777, true); // create directory with full permissions
                }

                // Pindahkan file ke direktori tujuan
                if (move_uploaded_file($foto_tmp_name, $foto_destination)) {
                    // Masukkan data ke tabel 'foto' di database 'perpuspro'
                    $sql = "INSERT INTO db_perpuspor(no_induk, nama, username, password, jk, kelas, ttl, alamat, foto) 
                            VALUES ('$no_induk', '$nama', '$username', '$password', '$jk', '$kelas', '$ttl', '$alamat', '$foto_new_name')";
                    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

                    // Berikan pesan ke user berdasarkan hasil operasi SQL
                    if ($res) {
                        echo "Data anda telah berhasil diinput, Masukkan Username dan password anda di <span><a href='login.html'><b> Disini </b></a></span>";
                        echo "<h3><a href='login.html'>Klik Disini</a> untuk Login </h3>";
                    } else {
                        echo "Terjadi kesalahan dalam menginput data!";
                    }
                } else {
                    echo "Gagal memindahkan file ke direktori tujuan!";
                }
            } else {
                echo "Ukuran file terlalu besar!";
            }
        } else {
            echo "Ada kesalahan saat mengupload file!";
        }
    } else {
        echo "Tipe file tidak diperbolehkan!";
    }
} else {
    echo "Foto belum dipilih atau terjadi kesalahan saat upload!";
}

?>
