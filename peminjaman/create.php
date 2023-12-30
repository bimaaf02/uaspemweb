<?php


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
 header("Location: ../peminjaman/"); // Redirect ke tampilan Read setelah berhasil tambah data
 exit;
 } else {
 echo "Error: " . $sql . "<br>" . $mysqli->error;
 }
 $mysqli->close();
}

require '../header.php';
?>

                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tambah Anggota</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-columns me-1"></i>
                                Form Input
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="mb-3">
                                    <label for="id_bk" class="form-label">ID  Buku : </label>
                                        <select type="text" class="form-control" name="buku_id">
                                            <option disabled selected value="">ID Buku</option>
                                                <?php 
                                                $sql = "SELECT * FROM buku";
                                                $result = $mysqli->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_array()) {;
                                                ?>
                                                <option value="<?php echo $row['buku_id']; ?>"><?php echo $row['buku_id']; ?> - <?php echo $row['judul']; ?></option>
                                                <?php }} ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3">
                                    <label for="id_pmj" class="form-label">ID Peminjam: </label>
                                        <select type="text" class="form-control" id="id_pjm" name="anggota_id">
                                            <option disabled selected value="">ID Peminjam</option>
                                                <?php 
                                                $sql = "SELECT * FROM anggota";
                                                $result = $mysqli->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_array()) {;
                                                ?>
                                                <option value="<?php echo $row['anggota_id']; ?>"><?php echo $row['anggota_id']; ?> - <?php echo $row['nama']; ?></option>
                                                <?php }} ?>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3 mt-3">
                                        <label for="tgl_pjm" class="form-label">Tanggal Peminjaman: </label>
                                        <input type="date" name="tanggal_peminjaman" id="tgl_pjm" class="form-control">
                                    </div>
                                    <div class="mb-3 mt-3">
                                        <label for="tgl_kbl" class="form-label">Tanggal Kembali: </label>
                                        <input type="date" name="tanggal_kembali" id="tgl_kbl" class="form-control">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success"><i class="fas fa-save me-1"></i> Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
<?php 
require '../footer.php';
?>
 