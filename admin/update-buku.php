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
    $link_buku = $_POST['link_buku'];

    if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/x-png") {
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            // Prepare the SQL statement
            $stmt = $conn->prepare("UPDATE data_buku SET judul=?, pengarang=?, th_terbit=?, penerbit=?, isbn=?, kategori=?, jumlah_buku=?, asal=?, tgl_input=?, gambar=?, link_buku=? WHERE id=?");
            if ($stmt) {
                // Bind the parameters
                $stmt->bind_param('ssssssissssi', $judul, $pengarang, $th_terbit, $penerbit, $isbn, $kategori, $jumlah_buku, $asal, $tgl_input, $gambar, $link_buku, $id);
                
                // Execute the statement
                if ($stmt->execute()) {
                    echo "<script>
                            alert('Gambar berhasil dikirim ke direktori $gambar');
                            window.location.href = 'buku.php';
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
