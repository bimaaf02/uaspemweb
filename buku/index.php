<?php
require '../header.php';
?>


 <main>
 <div class="container-fluid px-4">
    <div class="card mb-4 mt-4">
        <div class="card-header">
            <div class="row">
                <div class="col-lg">
                    <h4>Daftar Buku</h4>
                </div>
                <div class="col-lg d-flex justify-content-end">
                    <a href='create.php'><button class="btn btn-danger">TAMBAH</button></a>
                </div>
            </div>
             
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead> 
                    <tr>
                        <th>ID Buku</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>TahunTerbit</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                <?php
                include '../config/koneksi.php';
                $sql = "SELECT buku.*, kategori.* FROM buku LEFT JOIN kategori ON buku.kategori_id=kategori.kategori_id";
                $result = $mysqli->query($sql);
                if ($result->num_rows > 0) {
                 while ($row = $result->fetch_assoc()) { ?>


                
                    <tr>
                        <td><?php echo $row["buku_id"];?></td>
                        <td><?php echo $row["judul"];?></td>
                        <td><?php echo $row["pengarang"];?></td>
                        <td><?php echo $row["penerbit"];?></td>
                        <td><?php echo $row["tahun_terbit"];?></td>
                        <td><?php echo $row["nama_kategori"];?></td>
                        <td><a href='update.php?id=<?php echo $row["buku_id"]; ?>'>Edit</a> | <a href='delete.php?id=<?php echo $row["buku_id"];?>'>Hapus</a></td>
                    </tr>
                
                
                <?php
                } }
                $mysqli->close();
                ?>

                
                </tbody>
            </table>    
       </div>
    </div>
</div>
</main>

<?php 
require '../footer.php';
?>
 