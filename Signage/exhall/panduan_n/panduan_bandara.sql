-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 04:17 AM
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
-- Database: `gosemar`
--

-- --------------------------------------------------------

--
-- Table structure for table `panduan_bandara`
--

CREATE TABLE `panduan_bandara` (
  `post_id` varchar(5) NOT NULL,
  `post_title` varchar(35) NOT NULL,
  `post_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panduan_bandara`
--

INSERT INTO `panduan_bandara` (`post_id`, `post_title`, `post_desc`) VALUES
('p01', 'Panduan Kedatangan', '<br>1. Setibanya di terminal kedatangan, ikuti petunjuk \"kedatangan\" ke pengambilan bagasi.<br>\r\n2. Untuk pengambilan Bagasi, periksa layar informasi di conveyer belt sesuai penerbangan Anda.<br>\r\n3. Staf maskapai akan melakukan pemeriksaan sesuai dengan baggage claim tag.<br>\r\n4. Apabila kehilangan bagasi, Anda dapat menghubungi staf maskapai di konter Lost and Found.<br>\r\n5. Tersedia fasilitas trolley di area pengambilan bagasi.<br>\r\n6. Bila diperlukan, Anda dapat menggunakan jasa porter untuk membantu membawa barang bawaan.<br>\r\n7. Harap mengingat nomor petugas porter anda dan laporkan apabila terjadi hal-hal yang tidak diharapkan.<br><br>\r\n\r\n<b><i>Hall Kedatangan</i></b><br>\r\nArea ini diperuntukkan untuk proses penjemputan setelah penumpang keluar dari terminal kedatangan.<br>\r\n\r\n<br><b><i>Pick-up Zone</i></b></br>\r\nDisediakan bagi kendaran penjemput untuk menaikkan penumpang dan bagasi.<br> \r\n\r\n'),
('p02', 'Panduan Keberangkatan', '<p><br>Berikut ini tahapan - tahapan yang harus dilalui penumpang: <br><br>\r\n<b>Pemeriksaan Security</b><br>\r\nUntuk memasuki terminal keberangkatan, seluruh penumpang harus melalui pintu Pemeriksaan Security. Yang harus diperhatikan pada tahapan ini antara lain:<br><br>\r\n\r\n1. Siapkan dokumen perjalanan anda sebagai berikut: <br>\r\n&nbsp &nbsp - sesuai tanggal keberangkatan<br>\r\n&nbsp &nbsp - Kartu Identitas<br>\r\n2. Seluruh barang bawaan wajib diperiksa melalui mesin x-ray.<br>\r\n3. Untuk kelancaran proses pemeriksaan, agar seluruh benda logam seperti telepon genggam, kunci, dan lain sebagainya dimasukkan ke dalam tas.<br>\r\n4. Seluruh penumpang wajib melalui Walk Through Metal Detector (WTMD).<br>\r\n5. Apabila diperlukan, penumpang dan barang bawaan dapat diperiksa secara manual oleh Petugas Security Bandara.<br>\r\n6. Laporkan kepada Petugas Security Bandara apabila Anda <br>\r\n&nbsp &nbsp - Menggunakan alat pacu jantung<br>\r\n&nbsp &nbsp - Membawa senjata api<br>\r\n7. Tidak diperkenankan membawa benda tajam dan barang berbahaya seperti pisau, pisau lipat, alat pemotong kuku, cutter, korek api, korek gas, dan sebagainya.<br><br>\r\n\r\n<b>Pelaporan (check in)</b><br></br>\r\n1. Siapkan dokumen perjalanan anda, sebagai berikut: <br>\r\n&nbsp &nbsp - Tiket sesuai tanggal keberangkatan<br>\r\n&nbsp &nbsp - Kartu Identitas<br>\r\n2. Antrilah pada meja pelaporan (check in counter) yang sesuai dengan maskapai penerbangan Anda. Meja pelaporan dibuka 2 jam sebelum waktu keberangkatan.<br>\r\n3. Untuk keselamatan penerbangan, laporkan bagasi Anda yang beratnya lebih dari 7 Kg, dan hanya diperkenankan membawa 1 bagasi yang beratnya kurang dari 7 Kg ke dalam kabin pesawat.<br><br>\r\n<b>Scanning / Tapping Boarding Pass</b><br>\r\nSerahkan boarding pass Anda kepada petugas tapping.<br><br>\r\n\r\n<b>Pemeriksaan Security 2</b><br>\r\nPenumpang wajib melepaskan ikat pinggang, jam tangan, topi, jaket, kunci, koin dan mengosongkan isi kantung celana / baju.<br><br>\r\n\r\n<b>Ruang Keberangkatan</b><br>\r\nSetelah melaporkan keberangkatan Anda di meja pelaporan, Anda dapat menunggu waktu kebarangkatan di Ruang Keberangkatan sesuai dengan lokasi yang tertera pada Boarding Pass.\r\n</p>\r\n\r\n\r\n\r\n\r\n\r\n'),
('p03', 'Panduan Transit', '<br>1. Setibanya di terminal kedatangan, ikuti petunjuk \"kedatangan\" menuju konter transit dan transfer untuk melakukan pelaporan diri dan pemeriksaan dokumen penerbangan sesuai maskapai penerbangan Anda.<br>\r\n2. Penumpang transit dan transfer tidak perlu keluar untuk melakukan pemeriksaan Security (kecuali jika diperlukan)<br>\r\n3. Setelah pemeriksaan, Anda dapat langsung menuju ruang tunggu keberangkatan untuk menunggu waktu naik pesawat (boarding time)<br>'),
('p04', 'Panduan Keamanan', '<br> 1. Security Screening<br>\r\n&nbsp &nbsp - Persiapkan dokumen perjalanan anda (paspor yang masih berlaku, tiket pesawat atau konfirmasi pemesanan, dan visa (jika diperlukan))<br>\r\n&nbsp &nbsp - Letakkan barang-barang yang mengandung Cairan, Aerosol dan Gel kedalam tray <br>\r\n&nbsp &nbsp - Letakkan barang-barang elektronik (mis. laptop, mobile phones, tablets) dan metal (mis. kunci, coin) kedalam tray yang lain.<br>\r\n&nbsp &nbsp - Lepas jaket, sweater, topi dan sepatu kemudian letakan kedalam tray\r\n&nbsp &nbsp - Masukan barang bawaan anda ke dalam X-Ray conveyor belt<br>\r\n&nbsp &nbsp - Pemeriksaan secara fisik akan dilakukan dengan menggunakan walkthrough metal detectors.<br>\r\n2. Bagasi Terlarang<br>\r\nIndonesia memiliki peraturan yang ketat bagi penumpang yang membawa barang terlarang dalam penerbangan. Anda sangat disarankan untuk bertanya pada staf maskapai sebelum check-in jika tidak yakin dengan barang yang ada dalam tas tangan Anda, untuk mencegah penundaan yang tidak perlu.<br>\r\n3. Panduan untuk Cairan, Aerosol dan Gel dalam Tas Tangan <br>\r\n&nbsp &nbsp - Cairan, aerosol dan gel harus berada dalam wadah berkapasitas maksimal masing-masing 100ml.<br>\r\n&nbsp &nbsp - Wadah-wadah ini harus berada di dalam kantung transparan bersegel ukuran 1 liter.  <br>\r\n&nbsp &nbsp - Segel kantung plastik harus ditutup dengan rapat. <br>\r\n&nbsp &nbsp - Setiap orang hanya boleh membawa 1 kantung plastik bersegel. Kantung bersegel ini harus ditunjukkan kepada petugas di tempat pemeriksaan.<br>\r\n&nbsp &nbsp - Pengecualian diizinkan untuk obat-obatan, makanan bayi dan makanan spesial lainnya.<br>\r\n&nbsp &nbsp - Minuman keras atau cairan lainnya, produk aerosol, dan gel (lebih dari 100ml) yang dibeli dari bandara luar negeri harus tertutup rapat dalam kantung bersegel.<br>'),
('p05', 'Panduan Kedatangan', '<br><b>Visa On Arrival (VOA)</b>atau Visa Kunjungan Saat Kedatangan diberikan kepada Warga Negara Asing yang bermaksud mengadakan kunjungan ke Indonesia dalam rangka wisata, kunjungan sosial budaya, kunjungan usaha, atau tugas pemerintahan. <br><br>\r\n\r\n<b>Visa On Arrival</b> diberikan oleh pejabat imigrasi kepada Warga Negara Asing yang memenuhi persyaratan, pada saat tiba di wilayah Indonesia melalui tempat pemeriksaan Imigrasi tertentu.<br>\r\n\r\n<br>Persyaratan untuk mengajukan Visa On Arrival sebagai berikut : <br>\r\n1. Surat perjalanan atau paspor kebangsaan dengan masa berlaku minimal 6 (enam) bulan <br>\r\n2. Tidak terdaftar dalam daftar penangkalan <br>\r\n 3. Membayar biaya sesuai dengan ketentuan yang berlaku<br><br>\r\n\r\nVisa On Arrival diberikan untuk jangka waktu 30 (tiga puluh) hari dengan ketentuan :<br>\r\n\r\n1.	Dapat diperpanjang ijin keimigrasiannya paling lama 30 (tiga puluh) hari <br>\r\n2.	Tidak dapat dialihstatuskan menjadi Izin Keimigrasian lainnya<br>\r\n<p>Visa On Arrival diberikan dengan membubuhkan cap atau stiker visa pada Surat Perjalanan atau Paspor Kebangsaan yang sah dan masih berlaku.</p>'),
('p06', 'Panduan Keberangkatan', '<br> 1. Packing semua barang - barang anda, termasuk tas tangan yang anda bawa, sesuai dengan pedoman keamanan.<br> \r\n2. Ketika anda tiba di bandara, periksa  info penerbangan yang ada di layar informasi penerbangan untuk mengetahui konter check-in dan waktu keberangkatan maskapai penerbangan anda.<br> \r\n3. Antrilah pada meja pelaporan (check in counter) yang sesuai dengan maskapai penerbangan Anda dengan dokumen perjalan (paspor yang masih berlaku, tiket pesawat atau konfirmasi pemesanan, dan visa (jika diperkukan)). Meja pelaporan dibuka 2 jam sebelum waktu keberangkatan.<br> \r\n4. Periksa boarding pass dan dokumen perjalanan anda sebelum meninggalkan konter check-in <br> \r\n5. Menuju ke konter imigrasi dengan dokumen perjalan anda (paspor yang masih berlaku, tiket pesawat atau konfirmasi pemesanan, dan visa (jika diperkukan))<br> \r\n6. Masuk ke ruang tunggu keberangkatan sesuai yang tertera di boarding pass atau layar informasi penerbangan <br> '),
('p07', 'Panduan Transit', '<br> 1. Setibanya di terminal kedatangan, ikuti petunjuk \"kedatangan\" menuju konter transit dan transfer untuk melakukan pelaporan diri dan pemeriksaan dokumen penerbangan sesuai maskapai penerbangan Anda.\r\n<br> 2. Penumpang transit dan transfer tidak perlu keluar untuk mengurus kepabeanan (Custom, Imigration & Quarantine)\r\n<br> 3. Setelah pemeriksaan keamanan, Anda dapat langsung menuju ruang tunggu keberangkatan di lantai 3 (tiga) dengan menggunakan elevator untuk menunggu waktu naik pesawat (boarding time)\r\n<br>'),
('p08', 'Panduan Imigrasi', '<br> 1. Meja  imigrasi dibagi menjadi beberapa bagian untuk warga negara Indonesia dan pengunjung.\r\n<br> 2. Pengunjung yang masuk Indonesia diwajibkan untuk menyerahkan form declare.\r\n<br> 3. Pemegang  paspor Indonesia tidak diharuskan untuk mengisi form declare.\r\n<br> 4. Jika anda berasal dari Negara yang tanpa bebas VISA,  maka anda harus membayar biaya sesuai dengan ketentuan yang berlaku. \r\n<br> 5. Penumpang disarankan untuk antri di meja imigrasi dan menyiapkan dokumen perjalanan (paspor, kartu kedatangan dan dokumen lainnya). Petugas Imigrasi akan memverifikasi ID foto Anda dan mungkin bertanya beberapa pertanyaan sesuai dengan prosedur screening. kerjasama Anda sangat dihargai\r\n<br>'),
('p09', 'Panduan Karantina', '<br>Karantina dan sertifikasi untuk penumpang, hewan, dan tumbuhan akan diperiksa di sini. Silahkan memverifikasi persyaratan yang relevan sebelum bepergian.\r\n<br><br>\r\n \r\n\r\nCatatan: Prosedur Karantina harus diselesaikan sebelum check-in untuk mempercepat prosedur check-in<br>'),
('p10', 'Pendampingan Khusus', '<br>Jika Anda memiliki permintaan khusus atau memerlukan bentuk bantuan pada penerbangan Anda, mitra maskapai kami akan membantu Anda. Atau, hubungi telepon layanan 24-jam di +62 21 172.<br>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `panduan_bandara`
--
ALTER TABLE `panduan_bandara`
  ADD PRIMARY KEY (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
