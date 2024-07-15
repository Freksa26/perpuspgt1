<?php
include "../conn.php";

$user_id  = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];

$query = mysqli_query($conn, "UPDATE admin SET username='$username', password='$password', fullname='$fullname' WHERE user_id='$user_id'") or die(mysqli_error($conn));

if ($query) {
    echo "<script>
            alert('Data berhasil diupdate');
            window.location.href = 'admin.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal mengupdate data');
            window.history.back();
          </script>";
}
?>
