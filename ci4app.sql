-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2021 pada 02.36
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `comic`
--

CREATE TABLE `comic` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `volume` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `comic`
--

INSERT INTO `comic` (`id`, `title`, `slug`, `author`, `publisher`, `volume`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Black Clover', 'black-clover', 'Yuki Tabata', 'Shueisha', 'Volume 27', 'Volume_27.jpg', '2021-08-29 15:17:21', '2021-08-29 15:17:21'),
(2, 'Black Clover', 'black-clover', 'Yuki Tabata', 'Shueisha', 'Volume 28', 'Volume_28.jpg', '2021-08-29 15:20:38', '2021-08-29 15:20:38'),
(3, 'Comic3', 'comic3', 'aku', 'aku', 'aku', 'aku', '2021-09-02 18:16:28', '2021-09-02 18:16:28'),
(4, 'naruto', 'naruto', 'yuki tabata', 'k', 'k', 'k', '2021-09-02 19:19:43', '2021-09-02 19:19:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `comic`
--
ALTER TABLE `comic`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `comic`
--
ALTER TABLE `comic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
