<?php

include "conn.php";

// Ambil data dari form
$no_induk = $_POST['no_induk'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$jk = $_POST['jk'];
$kelas = $_POST['kelas'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];

// Periksa apakah username atau no_induk sudah ada di database
$check_sql = "SELECT * FROM data_anggota WHERE username='$username' OR no_induk='$no_induk'";
$check_res = mysqli_query($conn, $check_sql);
if (mysqli_num_rows($check_res) > 0) {
    echo "<script>alert('Username atau Nomor Induk sudah terdaftar!'); window.history.back();</script>";
    exit();
}

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
            if ($foto_size < 5000000) { // Ukuran file kurang dari 1MB
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
                    // Masukkan data ke tabel 'data_anggota' di database 'perpuspro'
                    $sql = "INSERT INTO data_anggota (no_induk, nama, username, password, jk, kelas, ttl, alamat, foto) 
                            VALUES ('$no_induk', '$nama', '$username', '$password', '$jk', '$kelas', '$ttl', '$alamat', '$foto_new_name')";
                    $res = mysqli_query($conn, $sql);

                    // Berikan pesan ke user berdasarkan hasil operasi SQL
                    if ($res) {
                        echo "<script>alert('Data anda telah berhasil diinput!'); window.location.href='login.html';</script>";
                    } else {
                        echo "<script>alert('Terjadi kesalahan dalam menginput data!'); window.history.back();</script>";
                    }
                } else {
                    echo "<script>alert('Gagal memindahkan file ke direktori tujuan!'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Ukuran file terlalu besar!'); window.history.back();</script>";
            }
        } else {
            echo "<script>alert('Ada kesalahan saat mengupload file!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Tipe file tidak diperbolehkan!'); window.history.back();</script>";
    }
} else {
    echo "<script>alert('Foto belum dipilih atau terjadi kesalahan saat upload!'); window.history.back();</script>";
}

?>
