<?php
include "../../config/koneksi.php"; //include file koneksi
date_default_timezone_set('Asia/Jakarta');

//inisiasi modul dan act
$module = $_GET['module'];
$act = $_GET['act'];

// bagian insert data
if ($module == 'pinjam' and $act == 'insert') :
    // inisiasi nama fieled ke dalam variabel
    $isbn = $_POST['isbn'];
    $nisn = $_POST['nisn'];
    $kembali = $_POST['tanggal_kembali'];
    $id = date('dmyHis');
    $pinjam = date('Y-m-d');
    $status = 'pinjam';

    // query ambil data stock
    $query = "SELECT isbn,stok FROM muda_buku WHERE isbn = $isbn";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    // masukkan jumlah stok ke variabel
    $stok = $row['stok'];
    // lakukan pengurangan stok (-1)
    $newStok = $stok - 1;

    // query insert peminjaman
    $query_pinjam = "INSERT INTO muda_peminjaman (id_peminjaman, nisn, isbn, tanggal_pinjam, tanggal_kembali, status) 
    VALUES ('$id', '$nisn', '$isbn', '$pinjam', '$kembali', '$status')";

    // query update stok buku
    $query_stok = "UPDATE muda_buku SET stok = $newStok WHERE isbn = '$isbn'";

    //kondisi pengecekan apakah data berhasil dimasukkan atau tidak
    if ($connection->query($query_pinjam)) {

        //munculkan alert sukses simpan data dengan session
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Siswa Berhasil Disimpan.
        </div>
        ";

        // jalankan query update stok
        $connection->query($query_stok);

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal insert data
        echo "Data Gagal Disimpan!";
    }

//bagian edit siswa
elseif ($module == 'siswa' and $act == 'update') :

    //inisiasi data yang dikirim ke dalam variabel
    $id = $_POST['nisn'];
    $nama = $_POST['nama_siswa'];
    $jurusan = $_POST['jurusan'];
    $jekel = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    //query update data
    $query = "UPDATE muda_siswa SET
                nama_siswa = '$nama',
                jurusan = '$jurusan',
                jenis_kelamin = '$jekel',
                no_hp = '$no_hp',
                alamat = '$alamat'
                WHERE nisn = $id";

    //kondisi pengecekan data berhasil di update
    if ($connection->query($query)) {

        //munculkan alert sukses diupdate
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Siswa Berhasil Diupdate.
        </div>
        ";

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal update data
        echo "Data Gagal Diupdate!";
    }

// bagian hapus data peminjaman
elseif ($module == 'pinjam' and $act == 'delete') :

    // ambil id peminjaman
    $id = $_GET['id'];
    $isbn = $_GET['isbn'];

    // query ambil data stock
    $query = "SELECT isbn,stok FROM muda_buku WHERE isbn = $isbn";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);
    // masukkan jumlah stok ke variabel
    $stok = $row['stok'];
    // lakukan pengurangan stok (-1)
    $newStok = $stok + 1;

    // query delete peminjaman
    $query_pinjam = "DELETE FROM muda_peminjaman WHERE id_peminjaman = $id";

    // query update stok
    $query_stok = "UPDATE muda_buku SET stok = $newStok WHERE isbn = '$isbn'";

    //kondisi pengecekan apakah data berhasil dihapus
    if ($connection->query($query_pinjam)) {

        //munculkan alert sukses hapus
        session_start();
        $_SESSION["alert"] = "
        <div class='alert alert-success' role='alert'>
        Data Siswa Berhasil Dihapus.
        </div>
        ";

        // jalankan query update stok
        $connection->query($query_stok);

        //redirect ke halaman awal
        header("location: ../../media.php?module=" . $module);
    } else {

        //pesan error gagal hapus data
        echo "Data Gagal Dihapus!";
    }

endif;
