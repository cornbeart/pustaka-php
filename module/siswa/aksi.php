<?php
include "../../config/koneksi.php"; //include file koneksi

//inisiasi modul dan act
$module = $_GET['module'];
$act = $_GET['act'];

// bagian insert data
if ($module == 'siswa' and $act == 'insert') :
    // inisiasi nama fieled ke dalam variabel
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    // query insert
    $query = "INSERT INTO muda_siswa (nisn, nama_siswa, jurusan, jenis_kelamin, alamat, no_hp) 
    VALUES ('$nisn', '$nama', '$jurusan', '$jekel', '$alamat', '$no_hp')";

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
    } else {

        //pesan error gagal insert data
        echo "Data Gagal Disimpan!";
    }


//bagian hapus data siswa
elseif ($module == 'siswa' and $act == 'delete') :

    //ambil id siswa
    $id = $_GET['id'];

    //query delete data
    $query = "DELETE FROM muda_siswa WHERE nisn = $id";

    //kondisi pengecekan apakah data berhasil dihapus
    if ($connection->query($query)) {

        //munculkan alert sukses hapus
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Siswa Berhasil Dihapus.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal hapus data
        echo "Data Gagal Dihapus!";
    }



// ---------- Bagian Edit Data Siswa ----------

elseif ($module == 'siswa' and $act == 'update') :

    // inisialisasi data yang dikirim ke dalam variabel
    $nisn = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    // query update data
    $query =  "UPDATE muda_siswa SET 
               nama_siswa = '$nama', 
               jurusan = '$jurusan', 
               jenis_kelamin = '$jekel', 
               no_hp = '$no_hp', 
               alamat = '$alamat'
               WHERE nisn = '$nisn' ";

    //kondisi pengecekan apakah data berhasil diupdate
    if ($connection->query($query)) {

        //munculkan alert sukses hapus
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Siswa Berhasil Update.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal update data
        echo "Data Gagal Update!";
    }










endif;
