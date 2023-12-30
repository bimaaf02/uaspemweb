<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../");
    exit(); // Terminate script execution after the redirect
 }
include '../config/koneksi.php';
$id = $_GET['id']; // ID dari anggota yang akan dihapus
$sql = "DELETE FROM anggota WHERE anggota_id=$id";
if ($mysqli->query($sql) === TRUE) {
 header("Location: ../anggota"); // Redirect ke tampilan Read setelah berhasil hapus data
 exit;
} else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
}
$mysqli->close();
?>