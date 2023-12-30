<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../");
    exit(); // Terminate script execution after the redirect
 }
?>

<?php
include '../config/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $nama = $_POST['nama'];
 $alamat = $_POST['alamat'];
 $email = $_POST['email'];
 $telepon = $_POST['telepon'];
 $sql = "INSERT INTO anggota (nama, alamat, email, telepon) VALUES ('$nama',
'$alamat', '$email', '$telepon')";

 if ($mysqli->query($sql) === TRUE) {
 header("Location: ../anggota"); // Redirect ke tampilan Read setelah berhasil tambah data
 exit;
 } else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 $mysqli->close();
}
require '../header.php';
?>
<form action="create.php" method="POST">
 Nama: <input type="text" name="nama"><br>
 Alamat: <input type="text" name="alamat"><br>
 Email: <input type="text" name="email"><br>
 Telepon: <input type="text" name="telepon"><br>
 <input type="submit" value="Tambah">
</form>

<?php 
require '../footer.php';
?>
 