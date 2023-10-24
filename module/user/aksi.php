<?php
include "../../config/koneksi.php"; //include file koneksi

//inisiasi modul dan act
$module = $_GET['module'];
$act = $_GET['act'];

// cek module dan act
if ($module == 'user' and $act == 'insert') :

    // inisialisasi data ke dalam variabel
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    // fungsi hash password
    $password = password_hash($pass, PASSWORD_DEFAULT);

    // query insert user
    $query = "INSERT INTO muda_user (nama_user, username, password, level,is_active)
              VALUES ('$nama', '$username', '$password', '$level', '1')";

    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
    if ($connection->query($query)) {

        //munculkan alert sukses simpan data dengan session
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Siswa Berhasil Disimpan.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    }
endif;
