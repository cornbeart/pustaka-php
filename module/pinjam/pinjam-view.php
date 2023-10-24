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
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary px-3 mb-3" data-bs-toggle="modal" data-bs-target="#peminjamanModal">
            Tambah Data Peminjaman
        </button>

        <?php echo date('d-m-Y H:i:s'); //menampilkan tanggal hari ini
        ?>

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
                            <a onclick="return confirm('Apakah anda yakin menghapus <?= $data['judul_buku'] . '?' ?>')" href="module/pinjam/aksi.php?module=pinjam&act=delete&id=<?= $data["id_peminjaman"] ?>&isbn=<?= $data['isbn'] ?>" class="btn btn-danger">HAPUS</a>
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


<!-- Modal peminjaman buku -->
<div class="modal fade" id="peminjamanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Peminjaman Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="module/pinjam/aksi.php?module=pinjam&act=insert" method="post">
                    <!-- form input data peminjaman buku -->
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label">Nama Siswa</label>
                        <select name="nisn" class="form-select">
                            <option value="">Pilih Nama Siswa</option>
                            <?php
                            $query = "SELECT * FROM muda_siswa";
                            $conn = mysqli_query($connection, $query);
                            while ($data = mysqli_fetch_array($conn)) { ?>
                                <option value="<?= $data['nisn']; ?>"><?= $data['nama_siswa']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <select name="isbn" class="form-select">
                            <option value="">Pilih Judul Buku</option>
                            <?php
                            $query = "SELECT isbn, judul_buku FROM muda_buku WHERE stok > 0";
                            $conn = mysqli_query($connection, $query);
                            while ($data = mysqli_fetch_array($conn)) { ?>
                                <option value="<?= $data['isbn']; ?>"><?= $data['judul_buku']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggalKembali" class="form-label">Tanggal Pengembalian (3 Hari Kerja)</label>
                        <input type="date" name="tanggal_kembali" id="" class="form-control" required>
                    </div>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- modal hapus siswa -->
<div class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>