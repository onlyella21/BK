-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 02:30 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tab_guru`
--

CREATE TABLE IF NOT EXISTS `tab_guru` (
  `id_guru` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(11) NOT NULL,
  `nama_guru` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `foto_guru` varchar(200) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tab_guru`
--

INSERT INTO `tab_guru` (`id_guru`, `nip`, `nama_guru`, `jenis_kelamin`, `alamat`, `no_tlp`, `foto_guru`) VALUES
(1, '2233001', 'Sony Rommy.Spd', 'Laki-Laki', 'Sukamanah', '0892345556', 'guru-1540900767.jpeg'),
(2, '23444056', 'Minah Sinta.Spd', 'Perempuan', 'Lengkong Besar', '085543322', 'guru-1540900779.jpeg'),
(5, '04950059', 'Ima Suarni.Spd', 'Perempuan', 'Cicadas', '08994050594', 'guru-1540900794.jpeg'),
(6, '2574849550', 'Holid Zaenudin.ST', 'Laki-Laki', 'Rancaekek', '08123457599', 'guru-1540900808.jpeg'),
(7, '6789000446', 'Lili Nirmala.Spd', 'Perempuan', 'Rancaloa', '0897389596', 'guru-1540900826.jpeg'),
(8, '2227689995', 'Nur Salimah.Spd', 'Perempuan', 'Cikaso', '08393905056', 'guru-1540900841.jpeg'),
(9, '3534785959', 'Didin Solih.Str', 'Laki-Laki', 'Lembang', '0879495005', 'guru-1540900860.jpeg'),
(10, '2227899', 'Sinar Utama', 'Perempuan', 'Panyawungan', '087654789654', 'guru-1540900879.jpeg'),
(11, '43562728', 'Fauzan R.ST', 'Laki-Laki', 'Ciparay', '089765675443', 'guru-1540900896.jpeg'),
(12, '156385444', 'Ulan.Spd', 'Perempuan', 'Sukamanah', '08999768239', 'guru-1540900916.jpeg'),
(13, '1930384445', 'khodir.SE', 'Laki-Laki', 'Ciparay', '089354647585', 'guru-1540900934.jpeg'),
(14, '3334488855', 'Vinaria.Spd', 'Perempuan', 'Saparako', '089777334556', 'guru-1540900964.jpeg'),
(15, '454673202', 'Cucun.Spd', 'Laki-Laki', 'Balendah', '0893774889', 'guru-1540900978.jpeg'),
(16, '1114353537', 'Bibin Lia.Spd', 'Perempuan', 'Balendah', '0897776665544', 'guru-1540900996.jpeg'),
(17, '1930349998', 'Pepen.Spd', 'Laki-Laki', 'Ciparay', '081222333456', 'guru-1540901013.jpeg'),
(18, '1930345222', 'Daus Uloh.SE', 'Laki-Laki', 'Cidawolong', '08976789765', 'guru-1540901049.jpeg'),
(19, '111445556', 'Sukma.Spd.', 'Perempuan', 'Majalaya', '08956738399', 'guru-1540901065.jpeg'),
(20, '124555567', 'Amirudin.Spd', 'Laki-Laki', 'Ciparay', '0897134567', 'guru-1540901036.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tab_jurusan`
--

CREATE TABLE IF NOT EXISTS `tab_jurusan` (
  `kode_jurusan` varchar(15) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_jurusan`
--

INSERT INTO `tab_jurusan` (`kode_jurusan`, `nama_jurusan`) VALUES
('PB', 'Perbankan'),
('TKJ', 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tab_kasus`
--

CREATE TABLE IF NOT EXISTS `tab_kasus` (
  `kode_kasus` varchar(8) NOT NULL,
  `tgl_kasus` date NOT NULL,
  `nis` varchar(12) NOT NULL,
  `id_pelanggaran` int(11) NOT NULL,
  PRIMARY KEY (`kode_kasus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_kasus`
--

INSERT INTO `tab_kasus` (`kode_kasus`, `tgl_kasus`, `nis`, `id_pelanggaran`) VALUES
('K00001', '2018-10-16', '170003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tab_kategoripelanggaran`
--

CREATE TABLE IF NOT EXISTS `tab_kategoripelanggaran` (
  `id_tipe` int(11) NOT NULL AUTO_INCREMENT,
  `tipe_pelanggaran` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tab_kategoripelanggaran`
--

INSERT INTO `tab_kategoripelanggaran` (`id_tipe`, `tipe_pelanggaran`) VALUES
(1, 'Ketertiban'),
(2, 'Rokok'),
(3, 'Buku, Majalah, CD (terlarang) dan HP'),
(4, 'Senjata'),
(5, 'Obat/Minuman Terlarang'),
(6, 'Perkelahian'),
(7, 'Keterlambatan'),
(8, 'Kehadiran'),
(9, 'Kerapihan Pakaian'),
(10, 'Rambut');

-- --------------------------------------------------------

--
-- Table structure for table `tab_kelas`
--

CREATE TABLE IF NOT EXISTS `tab_kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kelas` varchar(15) NOT NULL,
  `kode_jurusan` varchar(15) NOT NULL,
  `tingkat` varchar(3) NOT NULL,
  `huruf` varchar(1) NOT NULL,
  `tahun_pelajaran` year(4) NOT NULL,
  `id_guru` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tab_kelas`
--

INSERT INTO `tab_kelas` (`id_kelas`, `kode_kelas`, `kode_jurusan`, `tingkat`, `huruf`, `tahun_pelajaran`, `id_guru`) VALUES
(5, 'PB-X-A', 'PB', 'X', 'A', 2018, 1),
(6, 'PB-X-B', 'PB', 'X', 'B', 2018, 2),
(7, 'PB-X-C', 'PB', 'X', 'C', 2018, 5),
(8, 'PB-XI-A', 'PB', 'XI', 'A', 2018, 6),
(9, 'PB-XI-B', 'PB', 'XI', 'B', 2018, 7),
(10, 'PB-XI-C', 'PB', 'XI', 'C', 2018, 8),
(11, 'PB-XII-A', 'PB', 'XII', 'A', 2018, 9),
(12, 'PB-XII-B', 'PB', 'XII', 'B', 2018, 10),
(13, 'PB-XII-C', 'PB', 'XII', 'C', 2018, 11),
(14, 'TKJ-X-A', 'TKJ', 'X', 'A', 2018, 12),
(15, 'TKJ-X-B', 'TKJ', 'X', 'B', 2018, 13),
(16, 'TKJ-X-C', 'TKJ', 'X', 'C', 2018, 14),
(17, 'TKJ-XI-A', 'TKJ', 'XI', 'A', 2018, 15),
(18, 'TKJ-XI-B', 'TKJ', 'XI', 'B', 2018, 16),
(19, 'TKJ-XI-C', 'TKJ', 'XI', 'C', 2018, 17),
(20, 'TKJ-XII-A', 'TKJ', 'XII', 'A', 2018, 18),
(21, 'TKJ-XII-B', 'TKJ', 'XII', 'B', 2018, 19),
(22, 'TKJ-XII-C', 'TKJ', 'XII', 'C', 2018, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tab_konsultasi`
--

CREATE TABLE IF NOT EXISTS `tab_konsultasi` (
  `kode_konsultasi` varchar(8) NOT NULL,
  `tgl_konsultasi` date NOT NULL,
  `nis` varchar(12) NOT NULL,
  `keluhan` varchar(500) NOT NULL,
  `saran_bk` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_konsultasi`
--

INSERT INTO `tab_konsultasi` (`kode_konsultasi`, `tgl_konsultasi`, `nis`, `keluhan`, `saran_bk`) VALUES
('T00001', '2018-09-21', '170003', 'Sering diejek teman sekelas karena saya hitam.', 'Jangan dimasukinn hati, anggap aja becanda.');

-- --------------------------------------------------------

--
-- Table structure for table `tab_ortu`
--

CREATE TABLE IF NOT EXISTS `tab_ortu` (
  `id_ortu` varchar(12) NOT NULL,
  `nis` varchar(12) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `no_telpon_ortu` varchar(12) NOT NULL,
  `password` varchar(70) NOT NULL,
  PRIMARY KEY (`id_ortu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_ortu`
--

INSERT INTO `tab_ortu` (`id_ortu`, `nis`, `nama_ayah`, `no_telpon_ortu`, `password`) VALUES
('OT002', '170002', 'Irwan Darul', '08356478599', 'e1eb3bd2f367206c42b2697a8b34fb8f'),
('OT003', '170003', 'Aceng Budi', '08393993', '8aff233e4a437b2b8440c34f9ff938f6');

-- --------------------------------------------------------

--
-- Table structure for table `tab_pelanggaran`
--

CREATE TABLE IF NOT EXISTS `tab_pelanggaran` (
  `id_pelanggaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggaran` varchar(300) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `pengurangan_point` int(11) NOT NULL,
  PRIMARY KEY (`id_pelanggaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tab_pelanggaran`
--

INSERT INTO `tab_pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `id_tipe`, `pengurangan_point`) VALUES
(1, 'Membuat keributan/ kegaduhan dalam kelas saat berlangsung pelajaran', 1, 10),
(2, 'Masuk lingkungan sekolah dengan loncat pagar', 1, 5),
(3, 'Keluar dari lingkungan sekolah tanpa izin', 1, 10),
(4, 'Mengotori (mencoret-coret) benda milik sekolah, guru, pegawai dan teman', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tab_point_siswa`
--

CREATE TABLE IF NOT EXISTS `tab_point_siswa` (
  `id_point` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(12) NOT NULL,
  `point_awal` int(11) NOT NULL,
  `point_akhir` int(11) NOT NULL,
  `jumlah_kasus` int(11) NOT NULL,
  PRIMARY KEY (`id_point`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `tab_point_siswa`
--

INSERT INTO `tab_point_siswa` (`id_point`, `nis`, `point_awal`, `point_akhir`, `jumlah_kasus`) VALUES
(39, '170002', 100, 100, 0),
(49, '170003', 100, 90, 1),
(50, '180004', 100, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tab_siswa`
--

CREATE TABLE IF NOT EXISTS `tab_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(12) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `no_telp_siswa` varchar(15) NOT NULL,
  `angkatan` year(4) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `password` varchar(70) NOT NULL,
  `foto` varchar(200) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `tab_siswa`
--

INSERT INTO `tab_siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `alamat`, `no_telp_siswa`, `angkatan`, `id_kelas`, `password`, `foto`) VALUES
(2, '170002', 'Govinda Rico', 'Laki-Laki', 'Majalaya', '089490006', 2017, 18, 'd41d8cd98f00b204e9800998ecf8427e', 'siswa-1541438048.jpeg'),
(65, '170003', 'Puri Tina', 'Perempuan', 'Malaya', '0899304047', 2017, 17, 'd41d8cd98f00b204e9800998ecf8427e', 'siswa-1541440847.jpeg'),
(66, '180004', 'Fika Lia', 'Perempuan', 'Majalaya', '0814237474895', 2018, 5, 'd41d8cd98f00b204e9800998ecf8427e', 'siswa-1541481306.jpeg');

--
-- Triggers `tab_siswa`
--
DROP TRIGGER IF EXISTS `trigger_awal_point`;
DELIMITER //
CREATE TRIGGER `trigger_awal_point` AFTER INSERT ON `tab_siswa`
 FOR EACH ROW BEGIN
INSERT INTO `tab_point_siswa`(`id_point`, `nis`, `point_awal`, `point_akhir`, `jumlah_kasus`) VALUES ('',NEW.nis,'100','100','0');
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `trigger_saat_hapus`;
DELIMITER //
CREATE TRIGGER `trigger_saat_hapus` AFTER DELETE ON `tab_siswa`
 FOR EACH ROW BEGIN
DELETE FROM `tab_point_siswa` WHERE nis=OLD.nis;
DELETE FROM `tab_ortu`  WHERE nis=OLD.nis;
DELETE FROM `tab_kasus`  WHERE nis=OLD.nis;
DELETE FROM `tab_konsultasi`   WHERE nis=OLD.nis;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tab_user`
--

CREATE TABLE IF NOT EXISTS `tab_user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_user`
--

INSERT INTO `tab_user` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
