<?php
include '../config/koneksi.php';
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $tanggal_kembali = $_POST['tanggal_kembali'];
 $sql = "UPDATE pengembalian SET tanggal_pengembalian='$tanggal_kembali' WHERE peminjaman_id='$id'";

 if ($mysqli->query($sql) === TRUE) {
 header("Location: ../pengembalian/"); // Redirect ke tampilan Read setelah berhasil edit data
 exit;
 } else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 $mysqli->close();
}
require '../header.php';

$id = $_GET['id']; // ID dari buku yang akan diupdate
$sql = "SELECT * FROM pengembalian WHERE pengembalian_id=$id";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
 $row = $result->fetch_array();
 ?>
 <form action="update.php" method="POST">
 Tanggal Kembali: <input type="date" name="tanggal_kembali" value="<?php echo $row['tanggal_pengembalian']; ?>">
 <input type="submit" value="Update">
 </form>
 <?php
} else {
 echo "Data tidak ditemukan.";
}
$mysqli->close();

require '../footer.php';
?>