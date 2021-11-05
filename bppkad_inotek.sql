-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 09:34 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bppkad_inotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_tim`
--

CREATE TABLE `anggota_tim` (
  `id` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `nama_ketua` char(150) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara_pemenang`
--

CREATE TABLE `berita_acara_pemenang` (
  `id_berita_acara_pemenang` int(11) NOT NULL,
  `id_usulan` varchar(10) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `pemenang` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita_acara_pemenang`
--

INSERT INTO `berita_acara_pemenang` (`id_berita_acara_pemenang`, `id_usulan`, `id_subevent`, `pemenang`, `created_date`, `created_by`) VALUES
(11, '9651254', 40, 1, '2021-10-08 05:43:31', 'Admin Bappeda'),
(12, '9651252', 40, 2, '2021-10-08 05:43:31', 'Admin Bappeda'),
(13, '9651254', 40, 1, '2021-10-08 05:44:41', 'Admin Bappeda'),
(14, '9651252', 40, 2, '2021-10-08 05:44:41', 'Admin Bappeda'),
(15, '9651254', 40, 1, '2021-10-08 06:44:22', 'Admin Bappeda'),
(16, '9651252', 40, 2, '2021-10-08 06:44:22', 'Admin Bappeda'),
(17, '9651251', 40, 1, '2021-10-08 06:44:56', 'Admin Bappeda'),
(18, '9651253', 40, 2, '2021-10-08 06:44:56', 'Admin Bappeda'),
(19, '9651252', 40, 1, '2021-10-08 09:11:56', 'Admin Bappeda'),
(20, '9651254', 40, 2, '2021-10-08 09:11:56', 'Admin Bappeda'),
(21, '9651253', 40, 1, '2021-10-08 09:12:21', 'Admin Bappeda'),
(22, '9651251', 40, 2, '2021-10-08 09:12:21', 'Admin Bappeda');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `bidang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `bidang`) VALUES
(1, 'Pendidikan'),
(2, 'Kesehatan'),
(3, 'Lingkungan');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event`) VALUES
(40, 'Lomba Inovasi'),
(41, 'Inovasi Daerah');

-- --------------------------------------------------------

--
-- Table structure for table `indikator_penilaian`
--

CREATE TABLE `indikator_penilaian` (
  `id_indikator_penilaian` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `indikator` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indikator_penilaian`
--

INSERT INTO `indikator_penilaian` (`id_indikator_penilaian`, `id_subevent`, `indikator`) VALUES
(31, 40, 'Lingkup Inovasi Teknologi'),
(32, 40, 'Kemudahan Dideseminasikan dan Diadopsi');

-- --------------------------------------------------------

--
-- Table structure for table `indikator_penilaian_pemenang`
--

CREATE TABLE `indikator_penilaian_pemenang` (
  `id` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `komponen` char(150) NOT NULL,
  `nilai_komponen_min` int(11) NOT NULL,
  `nilai_komponen_max` int(11) NOT NULL,
  `note` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indikator_penilaian_pemenang`
--

INSERT INTO `indikator_penilaian_pemenang` (`id`, `id_subevent`, `komponen`, `nilai_komponen_min`, `nilai_komponen_max`, `note`) VALUES
(30, 40, 'Tingkat Ketersiapterapan', 0, 20, 'Alat dapat dimanfaatkan & diimplementasikan'),
(31, 40, 'Kebaruan/Inovasi/Kreativitas', 0, 10, 'Terkait dengan kebaruan ide dari penemuan tersebut'),
(32, 40, 'Potensi keberlanjutan/ Komersialisasi', 0, 20, 'Terkait potensi dapat dikembangkan lebih lanjut'),
(33, 40, 'Keunikan daya jual', 0, 15, 'Kriteria berkaitan dengan keunikan'),
(34, 40, 'Tingkat Kemanfaatan', 0, 35, 'Terkait dengan daya ungkit potensi kemanfaatan');

-- --------------------------------------------------------

--
-- Table structure for table `keterangan_indikator`
--

CREATE TABLE `keterangan_indikator` (
  `id_keterangan_indikator` int(11) NOT NULL,
  `id_indikator_penilaian` int(11) NOT NULL,
  `keterangan` char(255) NOT NULL,
  `nilai_minimal_keterangan` char(3) NOT NULL,
  `nilai_maksimal_keterangan` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keterangan_indikator`
--

INSERT INTO `keterangan_indikator` (`id_keterangan_indikator`, `id_indikator_penilaian`, `keterangan`, `nilai_minimal_keterangan`, `nilai_maksimal_keterangan`) VALUES
(32, 31, 'Inovasi berskala lokal kecamatan/desa', '0', '10'),
(33, 31, 'Inovasi berskala lokal kabupaten/kota', '11', '20'),
(34, 31, 'Inovasi berskala provinsi', '31', '40'),
(35, 31, 'Inovasi berskala nasional', '41', '50'),
(36, 32, 'Sangat Sulit', '0', '10'),
(37, 32, 'Agak sulit', '11', '20'),
(38, 32, 'Agak mudah', '31', '40'),
(39, 32, 'Mudah', '41', '50');

-- --------------------------------------------------------

--
-- Table structure for table `nominator`
--

CREATE TABLE `nominator` (
  `id_nominator` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `tahun` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_pemenang`
--

CREATE TABLE `penilaian_pemenang` (
  `id` int(11) NOT NULL,
  `id_usulan` int(11) NOT NULL,
  `id_indikator` char(150) NOT NULL,
  `id_penilai` char(150) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` char(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_proposal`
--

CREATE TABLE `penilaian_proposal` (
  `id` int(11) NOT NULL,
  `id_usulan` char(150) NOT NULL,
  `nilai_proposal` int(11) NOT NULL,
  `id_penilai` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian_proposal`
--

INSERT INTO `penilaian_proposal` (`id`, `id_usulan`, `nilai_proposal`, `id_penilai`) VALUES
(84, '34', 54, '108');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_usulan`
--

CREATE TABLE `penilaian_usulan` (
  `id` int(11) NOT NULL,
  `usulan_id` char(150) NOT NULL,
  `id_indikator` char(150) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_penilai` char(150) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` char(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `id_usulan` char(150) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `interaksi` varchar(100) NOT NULL,
  `nama_ketua` char(255) NOT NULL,
  `email_ketua` char(150) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat_ketua` varchar(255) NOT NULL,
  `ktp` varchar(150) NOT NULL,
  `asal_sekolah` char(255) NOT NULL,
  `kategori_peserta` varchar(100) NOT NULL,
  `nama_tim` char(255) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_usulan`, `id_usr`, `id_bidang`, `interaksi`, `nama_ketua`, `email_ketua`, `no_hp`, `alamat_ketua`, `ktp`, `asal_sekolah`, `kategori_peserta`, `nama_tim`, `tahun`, `created_date`, `updated_date`) VALUES
(6775521, '9651257', 139, 2, 'Individu', 'a', 'a', 'a', 'aa', '587e0ab3a00ebe59595fb324db4d29c2.png', 'SMA 1 Magetan', 'pelajar', 'black kobra', '2021', '2021-10-14 18:36:34', '2021-10-25 10:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `setting_penilai`
--

CREATE TABLE `setting_penilai` (
  `id` int(11) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `id_usr` char(10) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` char(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting_penilai`
--

INSERT INTO `setting_penilai` (`id`, `id_subevent`, `id_usr`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(119, 40, '100', '2021-10-01 13:02:43', 'admin@gmail.com', '0000-00-00 00:00:00', ''),
(120, 40, '101', '2021-10-01 13:05:38', 'admin@gmail.com', '0000-00-00 00:00:00', ''),
(122, 40, '103', '2021-10-01 13:05:46', 'admin@gmail.com', '0000-00-00 00:00:00', ''),
(123, 40, '104', '2021-10-01 13:05:50', 'admin@gmail.com', '0000-00-00 00:00:00', ''),
(124, 40, '105', '2021-10-01 13:05:57', 'admin@gmail.com', '0000-00-00 00:00:00', ''),
(132, 40, '102', '2021-10-08 14:20:28', 'admin@gmail.com', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `subevent`
--

CREATE TABLE `subevent` (
  `id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL,
  `id_event` char(150) NOT NULL,
  `subevent` char(150) NOT NULL,
  `bidang` varchar(150) NOT NULL,
  `mulai` char(150) NOT NULL,
  `akhir` char(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subevent`
--

INSERT INTO `subevent` (`id`, `tahun`, `id_event`, `subevent`, `bidang`, `mulai`, `akhir`) VALUES
(40, '2021', '40', 'Lomba Inovasi A', 'Pendidikan', '2021-09-05', '2021-10-30'),
(41, '2021', '41', 'Inovasi Daerah A', 'Kesehatan', '2021-10-20', '2021-10-30');

-- --------------------------------------------------------

--
-- Table structure for table `total_nilai`
--

CREATE TABLE `total_nilai` (
  `id` int(11) NOT NULL,
  `id_usulan` char(150) NOT NULL,
  `nilai_verifikasi` varchar(20) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` char(100) NOT NULL,
  `updated_date` datetime NOT NULL,
  `updated_by` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_nilai`
--

INSERT INTO `total_nilai` (`id`, `id_usulan`, `nilai_verifikasi`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(67, '9651251', '37.00', '2021-10-08 08:24:40', 'Beni', '0000-00-00 00:00:00', ''),
(68, '9651252', '34.00', '2021-10-08 08:25:54', 'Beni', '0000-00-00 00:00:00', ''),
(69, '9651253', '52.00', '2021-10-08 08:26:18', 'Beni', '0000-00-00 00:00:00', ''),
(70, '9651254', '56.00', '2021-10-08 08:26:50', 'Beni', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `total_nilai_pemenang`
--

CREATE TABLE `total_nilai_pemenang` (
  `id_total_nilai_pemenang` int(11) NOT NULL,
  `id_usulan` int(15) NOT NULL,
  `nilai_nominator` varchar(100) NOT NULL,
  `id_penilai` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_nilai_pemenang`
--

INSERT INTO `total_nilai_pemenang` (`id_total_nilai_pemenang`, `id_usulan`, `nilai_nominator`, `id_penilai`, `created_date`, `created_by`) VALUES
(50, 9651254, '58', 102, '2021-10-08 09:09:58', 'Beni'),
(51, 9651252, '61', 102, '2021-10-08 09:10:33', 'Beni'),
(52, 9651253, '67', 102, '2021-10-08 09:10:58', 'Beni'),
(53, 9651251, '64', 102, '2021-10-08 09:11:30', 'Beni');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_usr` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `satuan_kerja` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `hak_akses` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_usr`, `nama`, `email`, `password`, `satuan_kerja`, `kecamatan`, `hak_akses`, `status`) VALUES
(1, 'Admin Bappeda', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Bappeda', 'Magetan', 'Admin_Bappeda', 'Aktif'),
(100, 'Deva', 'deva@gmail.com', '3d1938981e5cfdcd321e72484668cabb', 'Bappeda', 'Plaosan', 'Penilai', 'Aktif'),
(101, 'Arya', 'arya@gmail.com', '9cd618641f27b1af8a21cb68d7cc497f', 'Kominfo', 'Nguntoronadi', 'Penilai', 'Aktif'),
(102, 'Beni', 'beni@gmail.com', '5e1026596ce4872f5729caf6f600bf49', 'Bappeda', 'Magetan', 'Penilai', 'Aktif'),
(103, 'Bayu', 'bayu@gmail.com', '5e394ede5a9323f0f0472dc8bc129cc6', 'Bappeda', 'Kartoharjo', 'Penilai', 'Aktif'),
(104, 'Didik', 'didik@gmail.com', '0a75ff02a92a63a909a776b9ec7d0253', 'Bappeda', 'Karas', 'Penilai', 'Aktif'),
(105, 'Dody', 'dody@gmail.com', 'cd28d9ebb483f28832bef49f5f023400', 'Bappeda', 'Bendo', 'Penilai', 'Aktif'),
(106, 'Anggi', 'anggi@gmail.com', '12b9ccf6573676b39896ae51cf66210e', 'Bappeda', 'Takeran', 'Penilai', 'Aktif'),
(108, 'Dimas', 'dimas@gmail.com', 'bc3e806c4f220f431fd5759102276ea6', 'Bappeda', 'Bendo', 'Penilai', 'Aktif'),
(139, 'Kemo', 'kemo@gmail.com', '65cd9525c0ed9fcaf6d6fe8b0f4fffe1', '-', '-', 'Peserta', 'Aktif'),
(140, 'Peserta', 'peserta@gmail.com', 'db4d215a8db5106c8d818c07f564f244', '-', '-', 'Peserta', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
--

CREATE TABLE `usulan` (
  `id` int(11) NOT NULL,
  `user` char(150) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `subevent` char(150) NOT NULL,
  `id_subevent` int(11) NOT NULL,
  `judul` char(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `latar_belakang` text NOT NULL,
  `kondisi_sebelumnya` text NOT NULL,
  `sasaran_n_tujuan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `bahan_baku` text NOT NULL,
  `cara_kerja` text NOT NULL,
  `keunggulan` text NOT NULL,
  `hasil_yg_diharapkan` text NOT NULL,
  `manfaat` text NOT NULL,
  `rencana` text NOT NULL,
  `proposal` text NOT NULL,
  `link_video` char(255) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `jurnal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usulan`
--

INSERT INTO `usulan` (`id`, `user`, `id_usr`, `tahun`, `subevent`, `id_subevent`, `judul`, `status`, `latar_belakang`, `kondisi_sebelumnya`, `sasaran_n_tujuan`, `deskripsi`, `bahan_baku`, `cara_kerja`, `keunggulan`, `hasil_yg_diharapkan`, `manfaat`, `rencana`, `proposal`, `link_video`, `gambar`, `jurnal`) VALUES
(9651257, 'kemo', 139, '2021', 'Lomba Inovasi A', 40, 'ppp', '2', 'bb', 'a', 'a', 'a', 'aa', 'a', 'a', 'a', 'a', 'a', '09e6959fdcced16cd40cc33deb030206.pdf', 'https://www.youtube.com/watch?v=egG5WFacFeM', '09e6959fdcced16cd40cc33deb030206.jpg', '09e6959fdcced16cd40cc33deb0302061.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita_acara_pemenang`
--
ALTER TABLE `berita_acara_pemenang`
  ADD PRIMARY KEY (`id_berita_acara_pemenang`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indikator_penilaian`
--
ALTER TABLE `indikator_penilaian`
  ADD PRIMARY KEY (`id_indikator_penilaian`);

--
-- Indexes for table `indikator_penilaian_pemenang`
--
ALTER TABLE `indikator_penilaian_pemenang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keterangan_indikator`
--
ALTER TABLE `keterangan_indikator`
  ADD PRIMARY KEY (`id_keterangan_indikator`);

--
-- Indexes for table `nominator`
--
ALTER TABLE `nominator`
  ADD PRIMARY KEY (`id_nominator`);

--
-- Indexes for table `penilaian_pemenang`
--
ALTER TABLE `penilaian_pemenang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian_proposal`
--
ALTER TABLE `penilaian_proposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian_usulan`
--
ALTER TABLE `penilaian_usulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`);

--
-- Indexes for table `setting_penilai`
--
ALTER TABLE `setting_penilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subevent`
--
ALTER TABLE `subevent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_nilai`
--
ALTER TABLE `total_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_nilai_pemenang`
--
ALTER TABLE `total_nilai_pemenang`
  ADD PRIMARY KEY (`id_total_nilai_pemenang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_usr`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_tim`
--
ALTER TABLE `anggota_tim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `berita_acara_pemenang`
--
ALTER TABLE `berita_acara_pemenang`
  MODIFY `id_berita_acara_pemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `indikator_penilaian`
--
ALTER TABLE `indikator_penilaian`
  MODIFY `id_indikator_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `indikator_penilaian_pemenang`
--
ALTER TABLE `indikator_penilaian_pemenang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `keterangan_indikator`
--
ALTER TABLE `keterangan_indikator`
  MODIFY `id_keterangan_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `nominator`
--
ALTER TABLE `nominator`
  MODIFY `id_nominator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `penilaian_pemenang`
--
ALTER TABLE `penilaian_pemenang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `penilaian_proposal`
--
ALTER TABLE `penilaian_proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `penilaian_usulan`
--
ALTER TABLE `penilaian_usulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6775522;

--
-- AUTO_INCREMENT for table `setting_penilai`
--
ALTER TABLE `setting_penilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `subevent`
--
ALTER TABLE `subevent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `total_nilai`
--
ALTER TABLE `total_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `total_nilai_pemenang`
--
ALTER TABLE `total_nilai_pemenang`
  MODIFY `id_total_nilai_pemenang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9651258;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
