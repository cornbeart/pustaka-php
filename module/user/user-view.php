<div class='card'>
    <div class='card-header'>
        <h3>Data User</h3>
    </div>
    <div class='card-body'>
        <!-- tombol tambah data siswa  -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary px-5 mb-3" data-bs-toggle="modal" data-bs-target="#userModal">
            Tambah Data User
        </button>

        <!-- table user -->
        <table class="table table-striped">
            <thead>
                <th>No.</th>
                <th>Nama User</th>
                <th>Username</th>
                <th>Level</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php
                $no = 1;
                // query select data siswa 
                $query = "SELECT * FROM muda_user";
                $conn = mysqli_query($connection, $query);
                while ($data = mysqli_fetch_array($conn)) {
                ?>
                    <!-- fetch data user -->
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $data['nama_user']; ?></td>
                        <td><?= $data['username']; ?></td>
                        <td><?= $data['level']; ?></td>
                        <td>
                            <a href="" class="btn btn-danger">Hapus</a>
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

<!-- Modal User -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- form input data user -->
                <div class="mb-3">
                    <form action="module/user/aksi.php?module=user&act=insert" method="post">
                        <label for="nama-user" clas="form-label">Nama Lengkap User</label>
                        <input type="text" name="nama_user" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="username" clas="form-label">Username</label>
                    <input type="text" name="username" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" clas="form-label">Password</label>
                    <input type="text" name="pass" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="level" clas="form-label">Level</label>
                    <select name="level" class="form-select">
                        <option value="">Pilih Level</option>
                        <option value="admin">Administrator</option>
                        <option value="user">User</option>
                    </select>
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