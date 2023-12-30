<?php
include '../config/koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $judul = $_POST['judul'];
 $pengarang = $_POST['pengarang'];
 $penerbit = $_POST['penerbit'];
 $tahun_terbit = $_POST['tahun_terbit'];
 $sinopsis = $_POST['sinopsis'];
 $kategori_id = $_POST['kategori_id'];
 $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, sinopsis, kategori_id) 
        VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$sinopsis', '$kategori_id')";

 if ($mysqli->query($sql) === TRUE) {
 header("Location: ../buku"); // Redirect ke tampilan Read setelah berhasil tambah data
 exit;
 } else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 $mysqli->close();
}

require '../header.php';
?>
<?php 
$sql = "SELECT * FROM kategori";
$result = $mysqli->query($sql);
?>
<form action="create.php" method="POST">
 Judul: <input type="text" name="judul"><br>
 Pengarang: <input type="text" name="pengarang"><br>
 Penerbit: <input type="text" name="penerbit"><br>
 Tahun Terbit: <input type="text" name="tahun_terbit"><br>
 Sinopsis: <textarea type="text" name="sinopsis"></textarea><br>
 <?php 
       if ($result->num_rows > 0) { ?>
 Kategori: <select name="kategori_id">
       
              <?php while($row = $result->fetch_array()) {; ?>
              <option value="<?php echo $row['kategori_id']; ?>"><?php echo $row['nama_kategori']; ?></option>
       <?php }?>
 </select>
 <?php }?>
 <input type="submit" value="Tambah">
</form>

<?php 
require '../footer.php';
?>
 