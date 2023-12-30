<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location: ../");
    exit(); // Terminate script execution after the redirect
 }
include '../config/koneksi.php';
$status = 'dipinjam';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $buku_id = $_POST['buku_id'];
 $anggota_id = $_POST['anggota_id'];
 $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
 $tanggal_kembali = $_POST['tanggal_kembali'];
 $sql = "INSERT INTO peminjaman (buku_id, anggota_id, tanggal_peminjaman, tanggal_kembali, status) VALUES ('$buku_id',
'$anggota_id', '$tanggal_peminjaman', '$tanggal_kembali', '$status')";

 if ($mysqli->query($sql) === TRUE) {
 header("Location: ../peminjaman"); // Redirect ke tampilan Read setelah berhasil tambah data
 exit;
 } else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 $mysqli->close();
}
?>
<form action="create.php" method="POST">
 ID Buku: <input type="text" name="buku_id"><br>
 ID Peminjam: <input type="text" name="anggota_id"><br>
 Tanggal Meminjam: <input type="date" name="tanggal_peminjaman"><br>
 Tanggal Kembali: <input type="date" name="tanggal_kembali"><br>
 <input type="submit" value="Tambah">
</form>