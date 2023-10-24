<?php
include "config/koneksi.php"; //koneksi database

// inisialisasi value yang di kirim ke variabel
$username = $_POST['username'];
$password = $_POST['password'];

// buat query untuk cek username
$query = "SELECT * FROM muda_user WHERE username = '$username'";
$conn  = mysqli_query($connection, $query);
$data  = mysqli_fetch_array($conn);

// verify password
$pass = password_verify($password, $data['password']);

// cek apakah username exist
if (mysqli_num_rows($conn) > 0) {
    // cek password
    if ($password == $pass) {
        // jika username dan password sesuai
        session_start();
        $_SESSION['namauser'] = $data['nama_user'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['level_user'] = $data['level'];

        // arahkan ke halaman dashboard
        header("location: media.php?module=home");

        

    } else {
        // pw salah
        session_start();
        $_SESSION["alert"] = "<div class='alert alert-danger' role='alert'>Kata sandi tidak sesuai</div>";
        header("location: index.php");
    }
} else {
    // pw salah
    session_start();
    $_SESSION["alert"] = "<div class='alert alert-danger' role='alert'>Username tidak ditemukan</div>";
    header("location: index.php");
}
