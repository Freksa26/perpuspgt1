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
            // Prepare the SQL statement
            $stmt = $conn->prepare("UPDATE data_anggota SET no_induk=?, nama=?, username=?, password=?, jk=?, kelas=?, ttl=?, alamat=?, foto=? WHERE id=?");
            if ($stmt) {
                // Bind the parameters
                $stmt->bind_param('sssssssssi', $no_induk, $nama, $username, $password, $jk, $kelas, $ttl, $alamat, $gambar, $id);
                
                // Execute the statement
                if ($stmt->execute()) {
                    echo "<script>
                            alert('Gambar berhasil dikirim ke direktori $gambar');
                            window.location.href = 'anggota.php';
                          </script>";
                } else {
                    echo "<script>
                            alert('Gagal mengupdate data');
                            window.history.back();
                          </script>";
                }

                // Close the statement
                $stmt->close();
            } else {
                echo "<script>
                        alert('Gagal menyiapkan statement');
                        window.history.back();
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Gambar gagal dikirim');
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

// Close the connection
$conn->close();
?>
