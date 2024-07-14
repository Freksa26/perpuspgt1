<?php
session_start();
include "../conn.php"; // Sesuaikan dengan lokasi dan nama file koneksi database Anda

if (isset($_GET['link_buku']) && !empty($_GET['link_buku'])) {
    $link_buku = $_GET['link_buku'];

    // Query untuk mendapatkan informasi file buku berdasarkan link_buku
    $query = "SELECT id, file_path FROM data_buku WHERE link_buku = '$link_buku'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Mengambil ID dari buku pertama yang cocok dengan link_buku
            $row = mysqli_fetch_assoc($result);
            $id_buku = $row['id'];
            $file_path = $row['file_path'];

            // Mendefinisikan header untuk mengirim file ke browser
            header("Content-Type: application/pdf"); // Sesuaikan tipe file jika bukan PDF
            header("Content-Disposition: attachment; filename='nama_buku.pdf'"); // Sesuaikan nama file

            // Baca file dan kirimkan ke browser
            readfile($file_path);
            exit;
        } else {
            echo "Buku dengan link_buku '$link_buku' tidak ditemukan.";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "Link buku tidak valid atau tidak diberikan.";
}

// Tutup koneksi ke database jika sudah selesai
mysqli_close($conn);
?>
