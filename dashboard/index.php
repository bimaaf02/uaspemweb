<?php
require '../header.php';
?>
<main>
    <div class="container-fluid px-4">
        <h1>Deskripsi</h1>
        <p>
            Aplikasi Perpustakaan kami merupakan solusi terdepan untuk mengelola dan meningkatkan efisiensi operasional perpustakaan. Menggabungkan kecanggihan teknologi dengan antarmuka yang ramah pengguna, aplikasi ini dirancang untuk memenuhi kebutuhan perpustakaan modern dengan fokus pada aksesibilitas, keamanan data, dan pengalaman pengguna yang ditingkatkan
        </p>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Peminjaman & Pengembalian
            </div>
            <div class="card-body">
            <?php
include '../config/koneksi.php';
$sql = "SELECT peminjaman.peminjaman_id, buku.judul, anggota.nama, peminjaman.tanggal_peminjaman, peminjaman.tanggal_kembali, peminjaman.status FROM `peminjaman` INNER JOIN `buku` ON peminjaman.buku_id=buku.buku_id INNER JOIN `anggota` ON peminjaman.anggota_id=anggota.anggota_id";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
 echo "<table border='1'>";
 echo "<tr><th>ID</th><th>Judul</th><th>Nama Peminjam</th><th>Tanggal Peminjaman</th><th>Tanggal Kembali</th><th>Status</th></tr>";
 while ($row = $result->fetch_array()) {
 echo "<tr>";
 echo "<td>".$row["peminjaman_id"]."</td>";
 echo "<td>".$row["judul"]."</td>";
 echo "<td>".$row["nama"]."</td>";
 echo "<td>".$row["tanggal_peminjaman"]."</td>";
 echo "<td>".$row["tanggal_kembali"]."</td>";
 $status = $row["status"];
 echo  "<td>".$status."</td>";
 echo "</tr>";
 }
 echo "</table>";
} else {
 echo "Tidak ada data buku.";
}
$mysqli->close();
?>
            </div>
        </div>
    </div>
</main>
<?php
require '../footer.php';
?>