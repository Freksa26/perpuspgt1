<?php
$namafolder = "gambar_anggota/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"])) {
    $jenis_gambar = $_FILES['nama_file']['type'];
    $id = $_POST['id'];
    $no_induk = $_POST['no_induk'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $jk = $_POST['jk'];
    $kelas = $_POST['kelas'];
    $ttl = $_POST['ttl'];
    $alamat = $_POST['alamat'];

    if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/x-png") {
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql = "INSERT INTO data_anggota(id,no_induk,nama,username,password,jk,kelas,ttl,alamat,foto) VALUES
            ('$id','$no_induk','$nama','$username','$password','$jk','$kelas','$ttl','$alamat','$gambar')";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            echo "<script>
                    alert('pendaftaran berhasil  berhasil');
                    window.location.href = 'input-anggota.php';
                  </script>";
        } else {
            echo "<script>
                    alert('pendaftaran gagal');
                    window.history.back();
                  </script>";
        }
    } else {
        echo "<script>
                alert('Jenis gambar yang anda kirim salah. Harus .jpg .gif .png');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('Anda belum memilih gambar');
            window.history.back();
          </script>";
}
?>
