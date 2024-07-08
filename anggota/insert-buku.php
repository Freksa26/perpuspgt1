<?php
$namafolder = "gambar_buku/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"])) {
    $jenis_gambar = $_FILES['nama_file']['type'];
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $th_terbit = $_POST['th_terbit'];
    $penerbit = $_POST['penerbit'];
    $isbn = $_POST['isbn'];
    $kategori = $_POST['kategori'];
    $jumlah_buku = $_POST['jumlah_buku'];
    $asal = $_POST['asal'];
    $tgl_input = $_POST['tgl_input'];

    if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/x-png") {
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql = "INSERT INTO data_buku(id,judul,pengarang,th_terbit,penerbit,isbn,kategori,jumlah_buku,asal,tgl_input,gambar) VALUES
            ('$id','$judul','$pengarang','$th_terbit','$penerbit','$isbn','$kategori','$jumlah_buku','$asal','$tgl_input','$gambar')";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if ($res) {
                echo "<script>alert('Data buku berhasil ditambahkan'); window.location.href='input-buku.php';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan saat mengirim data'); window.location.href='input-buku.php';</script>";
            }
        } else {
            echo "<script>alert('Gambar gagal dikirim'); window.location.href='input-buku.php';</script>";
        }
    } else {
        echo "<script>alert('Jenis gambar yang Anda kirim salah. Harus .jpg .gif .png'); window.location.href='input-buku.php';</script>";
    }
} else {
    echo "<script>alert('Anda belum memilih gambar'); window.location.href='input-buku.php';</script>";
}
?>
