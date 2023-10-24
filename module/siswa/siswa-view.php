<div class='card'>
    <div class='card-header'>
        <h3>Data Siswa</h3>
    </div>
    <div class='card-body'>
        <!-- munculkan pesan alert  -->
        <?php

        if (!empty($_SESSION['alert'])) :
            echo $_SESSION['alert'];
        endif;
        unset($_SESSION['alert']);
        ?>
        <!-- tombol tambah data siswa  -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary px-5 mb-3" data-bs-toggle="modal" data-bs-target="#siswaModal">
            Tambah Data Siswa
        </button>
        <!-- bagian table siswa  -->
        <table class="table table-striped">
            <thead>
                <th>No.</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // query select data siswa 
                $query = "SELECT * FROM muda_siswa";
                $conn = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_array($conn)) {
                ?>
                    <!-- fatch data siswa -->
                    <tr>
                        <td><?= $no ?>.</td>
                        <td><?= $data['nisn']; ?></td>
                        <td><?= $data['nama_siswa']; ?></td>
                        <td><?= $data['jurusan']; ?></td>
                        <td><?= $data['jenis_kelamin']; ?></td>
                        <td>
                            <a href="?module=edit-siswa&id=<?= $data['nisn']; ?>" class="btn btn-warning">EDIT</a>
                            <a onclick="return confirm('Apakah anda yakin menghapus <?= $data['nama_siswa'] . '?' ?>')" href="module/siswa/aksi.php?module=siswa&act=delete&id=<?= $data["nisn"] ?>" class="btn btn-danger">HAPUS</a>
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

<!-- Modal -->
<div class="modal fade" id="siswaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form input data siswa -->
                <div class="mb-3">
                    <form action="module/siswa/aksi.php?module=siswa&act=insert" method="post">
                        <label for="NISN" clas="form-label">NISN</label>
                        <input type="text" name="nisn" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nama" clas="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jurusan" clas="form-label">Jurusan</label>
                    <select name="jurusan" class="form-select">
                        <option value="">Jurusan</option>
                        <option value="PPLG">PPLG</option>
                        <option value="TJKT">TJKT</option>
                        <option value="DKV">DKV</option>
                        <option value="AKL">AKL</option>
                        <option value="MPLB">MPLB</option>
                        <option value="Pemasaran">Pemasaran</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select">
                        <option value="">Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="no_hp" clas="form-label">No.Hp</label>
                    <input type="text" name="no_hp" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" clas="form-label">Alamat</label>
                    <textarea name="alamat" rows="5" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal hapus -->
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