<?php $module = !empty($_GET['module']) ? $_GET['module'] : '' ?>

<?php if ($module == '' or  $module == 'home') : ?>
    <div class='card'>
        <div class='card-header'>
            <h1>Selamat Datang di Sistem Informasi Perpustakaan</h1>
        </div>
        <div class='card-body'>
            <p>Your account type is: Administrator</p>
            <p>Silakan akses menu untuk menggunakan aplikasi</p>
        </div>
    </div>

<?php
// ------------- module Siswa -------------
elseif ($module == 'siswa') :

    include "module/siswa/siswa-view.php";

// ---------- module edit siswa ----------

elseif ($module == 'edit-siswa') :

    include "module/siswa/siswa-update.php";

// ---------- module user view ----------

elseif ($module == 'user') :

    include "module/user/user-view.php";
elseif ($module == 'buku') :

    include "module/buku/buku-view.php";
elseif ($module == 'edit-buku') :

    include "module/buku/buku-update.php";

// ------------- module pinjam buku -------------

elseif ($module == 'pinjam') :

    include "module/pinjam/pinjam-view.php";

// ------------- module pengembalian buku -------------

elseif ($module == 'pengembalian') :

    include "module/pengembalian/pengembalian-view.php";

elseif ($module == 'form-pengembalian') :

    include "module/pengembalian/form-pengembalian.php";
endif;
?>