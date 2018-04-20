-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 04:30 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poltekkes`
--
CREATE DATABASE IF NOT EXISTS `poltekkes` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `poltekkes`;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kat` int(8) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status_kat` int(1) NOT NULL,
  PRIMARY KEY (`id_kat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kategori`, `deskripsi`, `status_kat`) VALUES
(6, 'the Sahira Bogor ', 'Kumpulan Materi Sahira Bogor 12-14 April 2016', 1),
(7, 'data pegawai', 'data pegawai poltekkes Palembang', 1),
(8, 'PETA JABATAN', 'USUL PETA JABATAN', 1),
(9, 'data pegawai pensiun', 'pegawai yang telah pensiun', 1),
(11, ' SKP', ' Surat Kepegawaian Poltekkes', 1),
(12, ' KESEPAKATAN PETA JABATAN', ' Usulan Peta Jabatan Pegawai\r\n', 1),
(13, 'coba1', 'coba lagi', 1),
(14, 'coba2', 'ccccc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id_login` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_login`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `email`) VALUES
(12, 'Methamahmuda', 'e10adc3949ba59abbe56e057f20f883e', 'methamahmuda@gmail.com'),
(13, 'HASBIAH', 'e10adc3949ba59abbe56e057f20f883e', 'Hasbiahmuhayan28@gmail.com'),
(14, 'Okta', 'e10adc3949ba59abbe56e057f20f883e', 'oktavianusbarkah@gmail.com'),
(15, 'imawan', 'e10adc3949ba59abbe56e057f20f883e', 'Imawan123@gmail.com'),
(16, 'ade', 'e10adc3949ba59abbe56e057f20f883e', 'Adeagus@gmail.com'),
(17, 'lega', 'e10adc3949ba59abbe56e057f20f883e', 'legabisa14@gmail.com'),
(18, 'meta1', '81dc9bdb52d04dc20036dbd8313ed055', 'miftah@gmai.com');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `notif_by` varchar(50) NOT NULL,
  `notif_pos` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `tanggal`, `notif_by`, `notif_pos`) VALUES
(3, '2018-03-19', 'lega', 34),
(4, '2018-03-19', 'meta1', 34),
(5, '2018-03-19', 'meta1', 34),
(6, '2018-03-19', 'ade', 31),
(7, '2018-03-19', 'imawan', 31),
(8, '2018-03-19', 'ade', 34);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(8) NOT NULL AUTO_INCREMENT,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `post_topik` int(8) NOT NULL,
  `post_by` varchar(50) NOT NULL,
  `link_attachment` text,
  `status_pos` int(1) NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `post_by` (`post_by`),
  KEY `post_topik` (`post_topik`),
  KEY `post_topik_2` (`post_topik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `konten`, `tanggal`, `post_topik`, `post_by`, `link_attachment`, `status_pos`) VALUES
(46, 'PETA JABATAN BPPSJDMK', '2018-01-21', 31, 'Methamahmuda', 'file/PETAJABATANBPPSDMK.docx', 0),
(47, 'Penataan Jabatan UU ASN 12 April 2016', '2018-01-21', 32, 'Methamahmuda', 'file/PenataanJabatansesuaiUUASN12April2016(Net).ppt', 0),
(48, 'Rekap usulan jabatan fungsional', '2018-01-21', 32, 'Methamahmuda', 'file/Rekapusulanjabatanfungsional.xlsx', 0),
(50, 'MEI', '2018-01-22', 34, 'ade', 'file/MEI.xlsx', 0),
(52, 'pengusulan peta jabatan dilingkungan poltekkes palembang', '2018-01-22', 35, 'imawan', 'file/PETAJABATANDILINGKUNGANPOLTEKKESKEMENKESJAKARTAIIIUSULANbogor.docx', 0),
(53, 'revisi usulan peta jabatan ', '2018-01-22', 35, 'Okta', 'file/UsulPetaJabatanBBPK(revisi).xlsx', 0),
(54, 'maaf didata tersebut ada kesalahan penulisan tempat lahir', '2018-01-22', 34, 'lega', '', 0),
(55, 'maaf pak, pengesahan peta jabatan nya dilaksanakan kapan ya ?', '2018-01-22', 35, 'lega', '', 0),
(60, '', '2018-02-09', 38, 'Methamahmuda', 'file/SEHasilKesepakatan.pdf', 0),
(61, 'Rangkum Seluruh Resolusi_4 Apr 16', '2018-02-09', 33, 'Methamahmuda', 'file/RangkumSeluruhResolusi_4Apr16.pdf', 0),
(62, '', '2018-02-11', 38, 'ade', 'file/SuratEdaranHasilKesepakatanKegiatanPenyusunanBezettingdanFormasi2016.docx', 0),
(63, 'Info Jabatan infrastruktur', '2018-02-11', 31, 'ade', 'file/InfojabInstrukturJFU.doc', 0),
(64, 'Info jabatan PLP ahli', '2018-02-11', 31, 'imawan', 'file/InfojabPLPAhli310316.doc', 0),
(65, 'jablak Ex WI', '2018-02-11', 31, 'imawan', 'file/JablakExWI.xlsx', 0),
(67, 'Analis Kepegawaian', '2018-02-24', 40, 'ade', 'file/ANALISKEPEGAWAIAN.doc', 0),
(68, 'JABATAN 1 DIREKTUR', '2018-02-24', 41, 'ade', 'file/NAMAJABATA1DIREKTUR.doc', 0),
(69, 'daftar gaji', '2018-02-24', 42, 'ade', 'file/PEMBUATDAFTARGAJI.doc', 0),
(70, '', '2018-02-24', 43, 'ade', 'file/PENGEMUDI.doc', 0),
(71, 'evaluasi', '2018-02-24', 44, 'ade', 'file/PENGEVALUASI.doc', 0),
(72, 'perencana', '2018-02-24', 45, 'ade', 'file/PERENCANA.doc', 0),
(73, 'pustakawan', '2018-02-24', 46, 'ade', 'file/PUSTAKAWANPENYELIA.doc', 0),
(74, '', '2018-02-24', 47, 'ade', 'file/TEKNISIJARINGAN.doc', 0),
(75, 'DIREKTUR', '2018-02-24', 48, 'ade', 'file/1.DIREKTUR.doc', 0),
(76, 'KA ADAK', '2018-02-24', 48, 'Methamahmuda', 'file/2.KAADAK.doc', 0),
(77, 'KA ADUM', '2018-02-24', 48, 'Methamahmuda', 'file/3.KAADUM.doc', 0),
(78, 'ASISTEN AHLI', '2018-02-24', 48, 'Methamahmuda', 'file/4.ASISTENAHLI.doc', 0),
(79, 'LEKTOR', '2018-02-24', 48, 'Okta', 'file/5.LEKTOR.doc', 0),
(80, 'KEPALA LEKTOR', '2018-02-24', 48, 'Okta', 'file/6.LEKTORKEPALA.doc', 0),
(81, 'PUSTAKAWAN PENYELIA', '2018-02-24', 48, 'Okta', 'file/7.PUSTAKAWANPENYELIA.doc', 0),
(82, 'BENDAHARA', '2018-02-24', 48, 'imawan', 'file/8.BENDAHARA.doc', 0),
(83, 'INSTRUKTUR', '2018-02-24', 48, 'imawan', 'file/9.INSTRUKTUR.doc', 0),
(84, 'PENGOLAH DATA', '2018-02-24', 48, 'imawan', 'file/10.PENGOLAHDATA.doc', 0),
(85, 'CARAKA', '2018-02-24', 48, 'imawan', 'file/11.CARAKA.doc', 0),
(86, 'PENGEMUDI', '2018-02-24', 48, 'imawan', 'file/12.PENGEMUDI.doc', 0),
(87, 'PENGELOLA BMN', '2018-02-24', 48, 'HASBIAH', 'file/13.PENGELOLABMN.doc', 0),
(88, 'PENATA LAPORAN KEUANGAN', '2018-02-24', 48, 'HASBIAH', 'file/14.PENATALAPORANKEUANGAN.doc', 0),
(89, 'PETUGAS KEAMANAN', '2018-02-24', 48, 'HASBIAH', 'file/15.PETUGASKEAMANAN.doc', 0),
(90, 'ADMINISTRASI UMUM', '2018-02-24', 48, 'HASBIAH', 'file/16.ADMUMUM(ADUM).doc', 0),
(91, 'PRAMU', '2018-02-24', 48, 'HASBIAH', 'file/17.PRAMU.doc', 0),
(92, 'PEMBUAT DAFTAR GAJI', '2018-02-24', 48, 'HASBIAH', 'file/18.PEMBUATDAFTARGAJI.doc', 0),
(93, 'TEKNISI JARINGAN', '2018-02-24', 48, 'HASBIAH', 'file/19.TEKNISIJARINGAN.doc', 0),
(94, 'ANALIS KEPEGAWAIAN', '2018-02-24', 48, 'lega', 'file/20.ANALISKEPEGAWAIAN.doc', 0),
(95, 'STATISTISI', '2018-02-24', 48, 'lega', 'file/21.STATISTISI.doc', 0),
(96, 'PERENCANA ', '2018-02-24', 48, 'lega', 'file/22.PERENCANA.doc', 0),
(97, 'PENGEVALUASI', '2018-02-24', 48, 'lega', 'file/23.PENGEVALUASI.doc', 0),
(99, 'surat TL Peta jabatan dan ABK poltekkes', '2018-02-24', 49, 'Okta', 'file/SuratTLPetaJabatandanABKPoltekkes.pdf', 0),
(110, 'Usulan peta jabatan poltekkes palembang', '2018-02-24', 49, 'lega', 'file/USULANPETAJABATANPOLTEKKES(PROSESDGBUIKA11AGT16).docx', 0),
(111, 'kamis ', '2018-03-13', 50, 'meta1', 'file/Capture.JPG', 0),
(112, 'diskusi ', '2018-03-13', 50, 'meta1', 'file/MEI.xlsx', 0),
(113, 'uraian utama jabatan pranata tidak jelas', '2018-03-14', 45, 'meta1', '', 0),
(114, 'ccccc', '2018-03-17', 51, 'meta1', '', 0),
(115, 'file data baru', '2018-03-19', 34, 'ade', 'file/MEI2.xlsx', 0),
(121, 'notif', '2018-03-19', 34, 'lega', '', 0),
(122, 'notif 2', '2018-03-19', 34, 'meta1', '', 0),
(123, 'notif 3', '2018-03-19', 34, 'meta1', '', 0),
(124, 'komentar', '2018-03-19', 31, 'ade', '', 0),
(125, 'komentar 2', '2018-03-19', 31, 'imawan', '', 0),
(126, 'notif baru lg', '2018-03-19', 34, 'ade', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topik`
--

CREATE TABLE IF NOT EXISTS `topik` (
  `id_topik` int(8) NOT NULL AUTO_INCREMENT,
  `subyek` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `topik_kat` int(8) NOT NULL,
  `topik_by` varchar(50) NOT NULL,
  `status_top` int(1) NOT NULL,
  PRIMARY KEY (`id_topik`),
  KEY `topik_kat` (`topik_kat`),
  KEY `topik_by` (`topik_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `topik`
--

INSERT INTO `topik` (`id_topik`, `subyek`, `tanggal`, `topik_kat`, `topik_by`, `status_top`) VALUES
(31, 'Materi Hukormas Set Badan', '2018-01-21', 6, 'Methamahmuda', 1),
(32, 'Materi Kemen PAN dan RB', '2018-01-21', 6, 'Methamahmuda', 1),
(33, 'Materi PI', '2018-01-21', 6, 'Methamahmuda', 1),
(34, 'data pegawai yang telah diperbarui', '2018-01-22', 7, 'ade', 1),
(35, 'Pengusulan peta jabatan', '2018-01-22', 8, 'ade', 1),
(37, 'A.Sopiyan', '2018-01-22', 9, 'HASBIAH', 1),
(38, 'SE Hasil Kesepakatan', '2018-02-09', 6, 'Methamahmuda', 1),
(40, 'kompetensi jabatan potekkes Palembangl', '2018-02-24', 11, 'ade', 1),
(41, 'NAMA JABATAN 1 DIREKTUR', '2018-02-24', 11, 'ade', 1),
(42, 'PEMBUAT DAFTAR GAJI', '2018-02-24', 11, 'ade', 1),
(43, 'Pengemudi', '2018-02-24', 11, 'ade', 1),
(44, 'pengevaluasi', '2018-02-24', 11, 'ade', 1),
(45, 'perencanaan', '2018-02-24', 11, 'ade', 1),
(46, 'Pustakawan Penyelia', '2018-02-24', 11, 'ade', 1),
(47, 'Teknisi jaringan', '2018-02-24', 11, 'ade', 1),
(48, 'URJAB POLTEKKES PALEMBANG 2013', '2018-02-24', 11, 'ade', 1),
(49, 'Usulan peta jabatan poltekkes', '2018-02-24', 12, 'lega', 1),
(50, 'coba1', '2018-03-13', 13, 'meta1', 1),
(51, 'coba2', '2018-03-17', 14, 'meta1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(8) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jabatan` varchar(15) NOT NULL,
  `golongan` varchar(5) NOT NULL,
  `pendidikan` text NOT NULL,
  `ijazah` varchar(5) NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `foto` text,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id` (`id_user`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip`, `tanggal_lahir`, `jabatan`, `golongan`, `pendidikan`, `ijazah`, `kontak`, `username`, `foto`) VALUES
(12, 'metha mahmuda, A.Md', '198906182010122002', '1989-06-18', 'Analisis kepega', 'IId', 'DIII', 'DIII', '087897513158', 'Methamahmuda', 'foto/IMG-20180121-WA0000.jpg'),
(13, 'Hasbiah muhayan, S.Pd, M.Kes', '195007281972012001', '1950-07-28', 'Lektor Kepala', 'IVa', 'S2', 'S2', '08138765417', 'HASBIAH', 'foto/hasbiah.jpg'),
(14, 'Oktavianus Barkah Tri Harjoko, SKM', '197910122002121001', '1979-10-12', 'Kepala Sub kepe', 'IIIb', 'DIV', 'DIV', '081367734521', 'Okta', 'foto/octa.jpg'),
(15, 'Imawan Eko Setiyono, Amk', '197411132006041004', '1974-11-13', 'administrasi um', 'IId', 'DIII', 'DIII', '085267731298', 'imawan', 'foto/imawan.jpg'),
(16, 'Ade Agustianingsih, AMF', '198908172009122001', '1989-08-17', 'Infrastruktur', 'IId', 'DIII', 'DIII', '09878765467', 'ade', 'foto/ade.jpg'),
(17, 'Lega Bisa Diantara, A.Md,Kep', '198509142010121005', '1985-09-14', 'Infrastruktur', 'IId', 'DIII', 'DIII', '07896542625', 'lega', 'foto/lega.jpg'),
(18, 'meta', '123467800', '2018-03-06', 'staf', 'IIA', 'D3', 'D3', '08998796048', 'meta1', 'foto/IMG_1443copy.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE IF NOT EXISTS `user_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'root', '21232f297a57a5a743894a0e4a801fc3');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_topik`) REFERENCES `topik` (`id_topik`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`post_by`) REFERENCES `user` (`username`);

--
-- Constraints for table `topik`
--
ALTER TABLE `topik`
  ADD CONSTRAINT `topik_ibfk_1` FOREIGN KEY (`topik_kat`) REFERENCES `kategori` (`id_kat`),
  ADD CONSTRAINT `topik_ibfk_2` FOREIGN KEY (`topik_by`) REFERENCES `user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
