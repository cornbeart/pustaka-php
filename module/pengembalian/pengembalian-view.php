<div class='card'>
    <div class='card-header'>
        <h3>Data Peminjaman</h3>
    </div>
    <div class='card-body'>
        <!-- munculkan pesan alert -->
        <?php
        if (!empty($_SESSION['alert'])) :
            echo $_SESSION['alert'];
        endif;
        unset($_SESSION['alert']);
        ?>

        <span class="badge text-bg-success mb-2">
            <?php echo date('d-m-Y H:i:s'); //menampilkan tanggal hari ini
            ?>
        </span>
        <!-- bagian table peminjaman -->
        <table class="table table-striped">
            <thead>
                <th>No.</th>
                <th>Tanggal Pinjam</th>
                <th>Judul Buku</th>
                <th>Nama Siswa</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // Query select data peminjaman
                $query = "SELECT * FROM muda_peminjaman
                JOIN muda_siswa 
                ON muda_peminjaman.nisn = muda_siswa.nisn
                JOIN muda_buku 
                ON muda_peminjaman.isbn = muda_buku.isbn";

                $conn = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_array($conn)) {
                ?>
                    <!-- fetch data peminjaman -->
                    <tr>
                        <td><?= $no; ?>.</td>
                        <td><?= $data['tanggal_pinjam']; ?></td>
                        <td><?= $data['judul_buku']; ?></td>
                        <td><?= $data['nama_siswa']; ?></td>
                        <td><?= $data['tanggal_kembali']; ?></td>
                        <td>
                            <a href="?module=form-pengembalian&id=<?= $data['id_peminjaman'] ?>" class="badge text-bg-info">Terima Pengembalian</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>