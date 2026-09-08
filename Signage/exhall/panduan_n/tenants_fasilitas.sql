-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2019 at 10:32 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komersial_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `tenants_fasilitas`
--

CREATE TABLE `tenants_fasilitas` (
  `poss_id` varchar(250) NOT NULL,
  `name_tenant` varchar(250) NOT NULL,
  `lantai_1` tinyint(1) NOT NULL,
  `lantai_2` tinyint(1) NOT NULL,
  `mezanine` tinyint(1) NOT NULL,
  `deskripsi` text NOT NULL,
  `type` int(1) NOT NULL,
  `image` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenants_fasilitas`
--

INSERT INTO `tenants_fasilitas` (`poss_id`, `name_tenant`, `lantai_1`, `lantai_2`, `mezanine`, `deskripsi`, `type`, `image`, `status`) VALUES
('poss027', 'TRAC', 1, 0, 0, 'Layanan rental mobil, sewa bus pariwisata, airport transfer, penyewaan kendaraan dan pengemudi profesional dari TRAC Astra Rent Car Indonesia.', 1, 'trac.jpg', 1),
('poss031', 'Total Baggage Solution', 1, 0, 0, 'TBS (Total Baggage Solutions) adalah layanan yang menyediakan fasilitas seperti: Wrapping: Proses pembungkus material menggunakan plastik. Strapping: Proses pengikatan material, biasanya menggunakan media tali plastik. Packaging: Layanan penyediaan kotak untuk mengemas barang-barang dengan lebih banyak bantuan. Left luggage: Fasilitas Penyimpanan.', 1, '', 1),
('poss034', 'X-SIDE EAT Food Court', 1, 0, 0, 'Food court yang menyediakan makanan khas daerah magersari.', 2, 'xsideeat.jpg', 1),
('poss035', 'MAGERSARI Food Court', 0, 1, 0, 'Food court yang menyediakan makanan khas daerah magersari.', 2, 'magersari.jpg', 1),
('poss036', 'BREADBAKER - DOMESTIK', 0, 1, 0, 'Booth penjualan berbagai macam roti, minuman dan snack ringan.', 2, '', 1),
('poss037', 'CONCORDIA LOUNGE', 0, 0, 1, 'Lounge yang dapat digunakan untuk pertemuan.', 2, 'concordia.jpg', 1),
('poss038', 'KUKOMART 1', 1, 0, 0, 'Minimarket yang menyediakan makanan dan minuman ringan.', 1, 'Kukomart.jpg', 1),
('poss039', 'KUKOMART 2', 0, 1, 0, 'Minimarket yang menyediakan makanan dan minuman ringan.', 1, 'Kukomart.jpg', 1),
('poss041', 'BREADBAKER - INTERNASIONAL', 0, 0, 1, 'Food court yang menyediakan makanan khas daerah magersari.', 2, '', 1),
('poss046', 'MY INDONESIA', 0, 1, 0, 'Booth penjualan makanan dan minuman khas Indonesia', 1, 'indonesia.jpg', 1),
('poss047', 'BATIK KERIS', 0, 1, 0, 'Booth yang menjual berbagai koleksi produk batik modern dengan kualitas terbaik, kerajinan, dan oleh oleh khas Indonesia.', 1, 'batikkeris.jpg', 1),
('poss048', 'STARBUCKS', 0, 0, 1, 'Booth ternama yang menjual berbagai macam jenis kopi.', 2, 'starbucks.jpg', 1),
('poss049', 'EATON', 0, 0, 0, 'Eaton Bakery menyediakan berbagai kue, kue, roti, kue kering, gift set.', 2, 'eaton.jpg', 1),
('poss051', 'PERIPLUS ', 0, 1, 0, 'Booth penjualan buku-buku berbagai jenis untuk menemani perjalanan.', 1, 'periplus.jpg', 1),
('poss052', 'A&W', 0, 0, 0, 'Booth fast food yang menjual makanan cepat saji.', 2, 'aw.jpg', 1),
('poss053', 'POLO', 0, 1, 0, 'Booth penjualan pakaian berbagai macam.', 1, 'polo.jpg', 1),
('poss054', 'SOERABAJA CAFE', 0, 0, 0, 'Booth penjualan berbagai macam kopi dan snack ringan.', 2, 'soerabaja.jpg', 1),
('poss055', 'ROTI O', 0, 0, 0, 'Booth penjualan berbagai macam roti, minuman dan snack ringan.', 2, 'rotio.jpg', 1),
('poss057', 'IPORT', 0, 1, 0, 'Outlet penjualan resmi aksesoris berbagai macam.', 1, 'portshop.jpg', 1),
('poss058', 'INDOCEV MONEY CHANGER', 1, 0, 0, 'Booth yang melayani penukaran uang cash.', 1, 'moneychanger.jpg', 1),
('poss059', 'UMKM', 1, 0, 0, 'Booth yang menjual berbagai produk UMKM daerah.', 1, 'umkm.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tenants_fasilitas`
--
ALTER TABLE `tenants_fasilitas`
  ADD PRIMARY KEY (`poss_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
