-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jun 2023 pada 10.53
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rpl_pustaka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `muda_buku`
--

CREATE TABLE `muda_buku` (
  `isbn` varchar(25) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `jenis_buku` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `muda_buku`
--

INSERT INTO `muda_buku` (`isbn`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `jenis_buku`, `stok`) VALUES
('12201533', 'The Begining', 'Qiqi', 'PT. Bersama Kita Maju', 2023, 'Novel', 500),
('767853986', 'Start', 'Vania', 'PT.  Maju', 2019, 'Komik', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `muda_peminjaman`
--

CREATE TABLE `muda_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` enum('pinjam','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `muda_siswa`
--

CREATE TABLE `muda_siswa` (
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `muda_siswa`
--

INSERT INTO `muda_siswa` (`nisn`, `nama_siswa`, `jurusan`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
('123456789', 'Fathur', 'TJKT', 'L', 'Jl. Melati', '083315202015'),
('987654321', 'Raisa', 'PPLG', 'P', 'Jl. Medang Bakar IV No. 5', '082283751499');

-- --------------------------------------------------------

--
-- Struktur dari tabel `muda_user`
--

CREATE TABLE `muda_user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `muda_user`
--

INSERT INTO `muda_user` (`id`, `nama_user`, `username`, `password`, `level`, `is_active`) VALUES
(2, 'Aqila', 'Qiqi', '$2y$10$iJ2/gnIJMmLplI4kX5hb9uvYUtqQG.4/RKzpMtEbisjhSEKCIXcTq', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `muda_buku`
--
ALTER TABLE `muda_buku`
  ADD PRIMARY KEY (`isbn`);

--
-- Indeks untuk tabel `muda_peminjaman`
--
ALTER TABLE `muda_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `muda_siswa`
--
ALTER TABLE `muda_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `muda_user`
--
ALTER TABLE `muda_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `muda_user`
--
ALTER TABLE `muda_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
