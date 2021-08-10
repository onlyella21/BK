-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2018 at 08:10 AM
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
('K00001', '2018-10-16', '170003', 1),
('K00002', '2018-10-09', '170002', 2),
('K00003', '2018-01-01', '170010', 1),
('K00004', '2018-01-23', '170002', 18),
('K00005', '2018-02-14', '170002', 1),
('K00006', '2018-03-15', '170010', 13),
('K00007', '2018-04-10', '170002', 5),
('K00008', '2018-04-18', '170017', 3),
('K00009', '2018-05-15', '160005', 7),
('K00010', '2018-05-22', '170002', 16),
('K00011', '2018-07-26', '170003', 31),
('K00012', '2018-08-16', '170002', 18),
('K00013', '2018-09-19', '180004', 18),
('K00014', '2018-10-17', '180009', 27),
('K00015', '2018-10-18', '180061', 5),
('K00016', '2018-09-19', '180060', 2),
('K00017', '2018-01-10', '180308', 18),
('K00018', '2018-12-26', '180208', 4),
('K00019', '2018-11-21', '180087', 6),
('K00020', '2018-02-07', '160899', 8),
('K00021', '2018-04-10', '1601455', 10),
('K00022', '2018-12-11', '180089', 15),
('K00023', '2018-10-23', '180065', 8),
('K00024', '2018-12-19', '180087', 18),
('K00025', '2018-06-11', '160190', 5);

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
('T00001', '2018-09-21', '170003', 'Sering diejek teman sekelas karena saya hitam.', 'Jangan dimasukinn hati, anggap aja becanda.'),
('T00002', '2018-09-18', '170002', 'Bagaimana agar saya tidak sering terlambat kesekolah?', 'Siap-siap nya lebih awal, jangan begadang.'),
('T00003', '2018-01-02', '170017', 'Merasa tertekan dirumah, karena orang tua sering berantem', 'coba bilang pada orangtua, klo mereka bertengkar terus kamu juga merasa sedih'),
('T00004', '2018-02-13', '170017', 'sedih karena orang tua bercerai ', 'Jangan bersedih , mungkin ini jalan terbaik buat orangtua mu'),
('T00005', '2018-03-21', '180004', 'tidak bisa bangun pagi', 'tidur nya jangan kemalen, pasang alarm dan suruh ibu buat bangunin juga'),
('T00006', '2018-06-13', '160005', 'Merasa sedih karena sering dibully dikelas karena saya hitam', 'jangan merasa sedih, semua manusia berbeda, diemin aja nanti juga cape sendiri'),
('T00007', '2018-01-16', '180308', 'Merasa tertekan karena biaya sekolah', 'Ajukan Surat Tidak mampu, nanti sekolah akan meringankan biayanya'),
('T00008', '2018-12-11', '180084', 'Sering di contek oleh teman ', 'kasih pengertian temannya, ajak belajar bersama'),
('T00009', '2018-10-24', '180065', 'Sulit mendapatkan teman', 'Cobalah Bergaul dengan yang lain, janga menyendiri'),
('T00010', '2018-09-19', '180102', 'sering merasa sedih dan tak bisa mengendalikannya', 'Jangan memendam kesedihan sendiri, belajar lah berbagi biar ringan'),
('T00011', '2018-05-09', '180209', 'Bermusahan lama dengan teman dekat ', 'Cobalah untuk minta maaf duluan, jangan gensi'),
('T00012', '2018-12-19', '160565', 'ingin Jadi Juara kelas\r\n', 'Rajin belajar'),
('T00013', '2018-05-08', '160166', 'Diajak minum alkohol oleh teman kelas', 'Jangan diturutin, lalu kasih tau orang tua yang bersangkutan'),
('T00014', '2018-11-13', '160900', 'Diajak berantem oleh teman karena rebutan cewe', 'Jangan berantem apalagi karena cewe, baikan aja'),
('T00015', '2018-03-21', '180209', 'selalu dijauhi teman sekelas', 'coba tanya kenapa, dekati mereka perlahan'),
('T00016', '2018-11-20', '180102', 'sering terlambat ke sekolah', 'harus siap-siap lebih awal, jangan dibiasain mepet waktu'),
('T00017', '2018-05-22', '180082', 'Dikekang oleh orangtua, tidak boleh main sama sekali', 'bicarakan dengan orang tua, bahwa kamu bisa dipercaya ga akan macem2'),
('T00018', '2018-10-16', '180101', 'Merasa tertekan dengan nilai yang selalu kecil', 'belajar jangan jadi beban, lalu minta belajar bersama dengan teman'),
('T00019', '2018-08-15', '180082', 'Sering diejek oleh teman karena hitam', 'Jangan didengerin, semua orang punya kelebihan masing2'),
('T00020', '2018-07-18', '180083', 'Sulit untuk beradaptasi dengan teman sekelas', 'coba mendekat perlahan, ngobrol dulu, lalu main bersama'),
('T00021', '2018-12-04', '180084', 'merasa terbebai dengan harapan orang tua akan nilai', 'jangan dijadikan beban tapi jadikan motivasi'),
('T00022', '2018-06-12', '180085', 'sakit hati karena teman jadi berteman sama kelas lain', 'jangan sakit hati justru itu kesempatan menambah teman'),
('T00023', '2018-03-14', '180101', 'Diacuhkan teman karena saya miskin', 'yang mengacuhkan kamu berrati bukan teman sejati kamu'),
('T00024', '2018-12-05', '180102', 'Menjadi yang terkucilkan dikelas', 'coba dekati teman kmu, teru tanya kenapa kamu dikucilkan'),
('T00025', '2018-03-13', '180085', 'sering dipukuli oleh teman sekelas', 'siapa orangnya, nanti kita musyawarhkan'),
('T00026', '2018-05-15', '180086', 'merasa tertekan dengan pertengkaran orangtua', 'coba kamu bicara pada orangtua mu apa yang kamu rasakan'),
('T00027', '2018-02-27', '180088', 'dimarahi oleh orangtua karena minta uang buat sekolah', 'coba kasih liat bukti tagihannya, tpi kamu jangan maksa mintanya'),
('T00028', '2018-04-18', '180089', 'sulit untuk beradaptasi dengan teman sekelas', 'coba kamu dekati mereka perlahan');

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
('OT003', '170003', 'Aceng Budi', '0839399399', '8aff233e4a437b2b8440c34f9ff938f6'),
('OT004', '180004', 'Mahfud Supriadi', '0835647899', 'deac8456ea4f1c41ca9b49573947ea06'),
('OT005', '160005', 'Oling Sugih', '081422722882', '512cbce54140cd460ccf2afa9159f6f7'),
('OT006', '170010', 'Nana Kodir', '082436282929', '96f4153349cbd27e17b936cdef8fc854'),
('OT007', '170017', 'Yudi Wahyudi', '083627282992', '8b23930791513f4664ce74282b2490f9'),
('OT008', '180009', 'Boni Mulya', '0893030303', '512f24a5c7350f6834e9816dccc29212'),
('OT009', '160008', 'Ujang Wira', '089000849494', '292382c2a9e5aaaa060274fd20f7718e'),
('OT010', '180023', 'Kulo Gino', '083930404044', '9a4d9629c25b8057826d95291e38171b'),
('OT011', '180067', 'Furqon', '08930303033', '902de0a7b903403e4002841843f015ec'),
('OT012', '180061', 'Toni Ulas', '08332292929', '69fc9a7afcea52eb9c4b40b190323870'),
('OT013', '180060', 'Bumi Muja', '08393939393', '0d56c4add3e6c8c2ac25eb020c20f893'),
('OT014', '180065', 'Galih H', '081252626262', 'dd0d58e5db8dd09c95f52a673670b089'),
('OT015', '180089', 'Ulohu', '08292929222', '6eb14188681b17528977c215cd1eaf83'),
('OT016', '180088', 'Muhtar', '08292929211', '31e2fe37afd6823b651a3ba84769575b'),
('OT017', '180087', 'Ilyasa', '089191911911', '420dcc09ca712d1cc878d61c959cf85f'),
('OT018', '180086', 'Gege Udi', '08292229929', 'f8e90046df5984373a31ba28912c50b6'),
('OT019', '180085', 'Jamaludin', '087222263737', '53dc1539c704f2aaa6a2e792bf9f5ad2'),
('OT020', '180084', 'Ujik', '08292929292', 'b45903be688dda404fdd567f4c4fd476'),
('OT021', '180083', 'Irwan Juli', '082111199992', '689b5a6ecd1089ea59cae0f7eaa89a88'),
('OT022', '180082', 'Udin Muna', '089111738383', '0374ad6f1d3477b1287832809a6c9af5'),
('OT023', '180101', 'Yadi Mul', '087222667373', 'f6262c6c4a19c6182fbd8f93ec207092'),
('OT024', '180102', 'Mahfudinul', '082226338383', 'aaee5c1e7863aa99becc551a58094104'),
('OT025', '180106', 'Gumilang Jaya', '082929292277', 'a9a1b471fd55f7a5d0c2d3d5e11e26e6'),
('OT026', '180209', 'Popohudin', '082666282829', '34c52fea453b8c2f51f7a25bbfc4bca3'),
('OT027', '180208', 'Muliadi S', '08293339393', 'f316ceb0a7c32127b289659be538c481'),
('OT028', '180308', 'Mamat', '08191919192', 'fefb181a7a81537368a93d2586e7344b'),
('OT029', '160190', 'Jaja', '083373383899', '028b0905ec18205b6b274c032ac3b281'),
('OT030', '160789', 'Huda', '087339202000', '9c83e5e49905958f7190c7065b944265'),
('OT031', '160788', 'Julfi', '083930303022', '2aca290e5acb852521be46f6a2299678'),
('OT032', '160900', 'Sigit H', '08749499903', 'b3f7f4157d6928ff8c44854f81fbd1d4'),
('OT033', '160166', 'Farhan Roxi', '087383939393', 'c0806c0093886b944d2e64f404cf0c82'),
('OT034', '160578', 'Noval T', '084943030000', '5b6d4cf1ea7d20aca76e1ddb8b6513d9'),
('OT035', '160565', 'Hadi', '089494030033', 'dc235568968ef5009615d3d4e69dc2c6'),
('OT036', '1601455', 'Bakri H', '08393030202', 'f73586984df52142d5df5a12a53066ef');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tab_pelanggaran`
--

INSERT INTO `tab_pelanggaran` (`id_pelanggaran`, `nama_pelanggaran`, `id_tipe`, `pengurangan_point`) VALUES
(1, 'Membuat keributan/ kegaduhan dalam kelas saat berlangsung pelajaran', 1, 10),
(2, 'Masuk lingkungan sekolah dengan loncat pagar', 1, 5),
(3, 'Keluar dari lingkungan sekolah tanpa izin', 1, 10),
(4, 'Mengotori (mencoret-coret) benda milik sekolah, guru, pegawai dan teman', 1, 15),
(5, 'Membawa rokok', 2, 25),
(6, 'Merokok/ menghisap roko disekolah atau ditempat lain', 2, 50),
(7, 'Membawa buku, majalah, atau kaset (terlarang) dan HP', 3, 25),
(8, 'Menjual buku, Majalah atau kaset (terlarang) dan HP', 3, 25),
(9, 'Membawa senjata tajam tanpa izin', 4, 30),
(10, 'Memperjual belikan senjata tajam', 4, 50),
(11, 'Menggunakan senjata tajam untuk mengancam', 4, 75),
(12, 'Menggunakan senjata tajam untuk melukai', 4, 100),
(13, 'Membawa obat/ minuman terlarang', 5, 50),
(14, 'Menggunakan obat/ minuman terlarang', 5, 75),
(15, 'Memperjual belikan obat/ minuman terlarang', 5, 75),
(16, ' Berkelahi Disebabkan oleh siswa dalam sekolah (Intern)', 6, 15),
(17, 'Berkelahi Disebabkan oleh siswa sekolah lain', 6, 25),
(18, 'Terlambat', 7, 5),
(21, 'Terlambat lebih dari 3X', 7, 15),
(22, 'Pulang tanpa izin', 7, 25),
(23, 'Alfa', 8, 10),
(24, 'Tidak mengikuti kegiatan belajar (bolos)', 8, 20),
(25, 'Tidak masuk sekolah dengan membuat surat keterangan palsu', 8, 15),
(26, 'Memakai seragam tidak rapi/ tidak dimasukkan ', 9, 3),
(27, 'Memakai seragam yang ketat', 9, 3),
(28, 'Tidak berpakaian seragam lengkap beserta atribut (sesuai ketentuan)', 9, 10),
(29, 'Memanjangkan kuku/ mencatnya', 9, 5),
(30, 'Panjang melalui batas ketentuan (telinga, alis, dan krah baju)', 10, 5),
(31, 'Dicat/ warna-warnai (putra/putri)', 10, 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `tab_point_siswa`
--

INSERT INTO `tab_point_siswa` (`id_point`, `nis`, `point_awal`, `point_akhir`, `jumlah_kasus`) VALUES
(39, '170002', 100, 35, 6),
(49, '170003', 100, 80, 2),
(50, '180004', 100, 95, 1),
(54, '160005', 100, 75, 1),
(58, '170010', 100, 40, 2),
(59, '170017', 100, 90, 1),
(60, '180009', 100, 97, 1),
(61, '160008', 100, 100, 0),
(63, '180023', 100, 100, 0),
(64, '180067', 100, 100, 0),
(65, '180061', 100, 75, 1),
(66, '180060', 100, 95, 1),
(67, '180065', 100, 75, 1),
(68, '180089', 100, 25, 1),
(69, '180088', 100, 100, 0),
(70, '180087', 100, 45, 2),
(71, '180086', 100, 100, 0),
(72, '180085', 100, 100, 0),
(73, '180084', 100, 100, 0),
(74, '180083', 100, 100, 0),
(75, '180082', 100, 100, 0),
(76, '180101', 100, 100, 0),
(77, '180102', 100, 100, 0),
(79, '180106', 100, 100, 0),
(80, '180209', 100, 100, 0),
(81, '180208', 100, 85, 1),
(82, '180308', 100, 95, 1),
(83, '160190', 100, 75, 1),
(84, '160789', 100, 100, 0),
(85, '160788', 100, 100, 0),
(86, '160900', 100, 100, 0),
(87, '160166', 100, 100, 0),
(88, '160578', 100, 100, 0),
(89, '160565', 100, 100, 0),
(90, '1601455', 100, 50, 1),
(91, '160899', 100, 75, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `tab_siswa`
--

INSERT INTO `tab_siswa` (`id_siswa`, `nis`, `nama_siswa`, `jenis_kelamin`, `alamat`, `no_telp_siswa`, `angkatan`, `id_kelas`, `password`, `foto`) VALUES
(2, '170002', 'Govinda Rico', 'Laki-Laki', 'Kp.bakakan Cempaka Rt03/16  Majalaya', '089490006', 2017, 18, 'afa2328c1739488edb7f5efb9cd604a2', 'siswa-1542120552.jpeg'),
(65, '170003', 'Puri Tina', 'Perempuan', 'Cidawolong Rt.04/17 Ciparay', '0899304047', 2017, 17, 'd87dc2090f3a1c5f8a608da82af5e0db', 'siswa-1542120569.jpg'),
(66, '180004', 'Fika Lia', 'Perempuan', 'Saparako Rt.02/05 Majalaya', '0814237474895', 2018, 5, 'd9b436841a4857a3f0a5f6d647d5e283', 'siswa-1542120584.jpeg'),
(70, '160005', 'Dudi Amirudin', 'Laki-Laki', 'Cirees Rt.03/6 Banjaran', '08728292992', 2016, 22, '939fb09bdde2f6d8405495b80f3a6d58', 'siswa-1542120603.jpeg'),
(74, '170010', 'Giring Sugih', 'Laki-Laki', 'Cieunteung No.21 Balendah', '089393030303', 2017, 15, '4f8ebcbbfe229eb7b482b19930386329', 'siswa-1542120968.jpeg'),
(75, '170017', 'Hani Rosy', 'Perempuan', 'Rancakole', '08929202001', 2017, 8, 'e2ecdcb2c1c2c7026b98ab2f3faeaebb', 'siswa-1542121217.jpeg'),
(76, '180009', 'Yulia Safitri', 'Perempuan', 'Jelekong', '0829220202', 2018, 16, 'e677ed02abf474e204c214ae745a0c5e', 'siswa-1542123255.jpeg'),
(77, '160008', 'Nurdin Saeful', 'Laki-Laki', 'Cangkring', '08930303022', 2016, 20, '8ba68fa819aad94609f51fd176c9ffcd', 'siswa-1542167204.jpeg'),
(79, '180023', 'Shinta Rani', 'Perempuan', 'Majalaya', '08333394758', 2018, 14, 'c9abc6cd0a121fff217444c700440eb1', 'siswa-1542307674.jpeg'),
(80, '180067', 'Firdaus', 'Laki-Laki', 'Jelekong', '08792203004', 2018, 14, 'cddd343d7bfb79150a3be9d7fc8f58ea', 'siswa-1542307724.jpeg'),
(81, '180061', 'Xavier Dri', 'Laki-Laki', 'Balendah', '08123467888', 2018, 14, '09e9c4b94784352c3fa733be0f8e5323', 'siswa-1542307794.jpeg'),
(82, '180060', 'Guntur langit', 'Laki-Laki', 'Cidawolong', '08973333999', 2018, 14, '85dc4b985c0550b1f202694c615c42d2', 'siswa-1542307841.jpeg'),
(83, '180065', 'Juli Eslia', 'Perempuan', 'Rancakole', '08933374858', 2018, 14, 'd788eb88cf80890f7f93563d46ffde8c', 'siswa-1542307889.jpeg'),
(84, '180089', 'Gona Udih', 'Laki-Laki', 'Kp.Cilampeni Ciparay', '082922002', 2018, 5, 'bc64bce5f1c6f7b765be8ad02fb5b208', 'siswa-1543609076.jpeg'),
(85, '180088', 'Sila Ulia', 'Perempuan', 'Jl.Panyadap No.17 Majalaya', '082929202', 2018, 5, '0e6ed911d02223fd12ca9d585a2c3af1', 'siswa-1543609187.jpeg'),
(86, '180087', 'Hany Ros', 'Perempuan', 'Jl.Panyawungan No.100 Cileunyi', '089171818181', 2018, 5, '9508dfde731fcf464dda8580fc228204', 'siswa-1543609261.jpeg'),
(87, '180086', 'Kolid', 'Laki-Laki', 'Saparako No.7 Majalaya', '089110010101', 2018, 5, '49d9024964164807679e45e0a94403a8', 'siswa-1543609341.jpeg'),
(88, '180085', 'Nana jamal', 'Laki-Laki', 'Cangkring No.6 Ciparay', '0872222839393', 2018, 5, '95bcdde10cb32d17598a446f5f847c29', 'siswa-1543609421.jpeg'),
(89, '180084', 'Juni Uni', 'Perempuan', 'Ciparay No.283', '08292929292', 2018, 5, 'a85dd38d86f607705f0d7208e60ae553', 'siswa-1543609513.jpeg'),
(90, '180083', 'Mila Uli', 'Perempuan', 'Balendah No.72', '08292929211', 2018, 5, '04829d6ebe10f840c4629732f8728f2c', 'siswa-1543609595.jpeg'),
(91, '180082', 'Munir', 'Laki-Laki', 'Cipendey Rt.1/17 Ciparay', '08191919191', 2018, 5, 'efd2a2cdc8cee01afb77dddc742ba1d2', 'siswa-1543609706.jpeg'),
(92, '180101', 'Hilman', 'Laki-Laki', 'Ciparay No.13', '08919110101', 2018, 6, '1550effc0934cacfdbcd520ecee71a02', 'siswa-1543609790.jpeg'),
(93, '180102', 'Bila Hula', 'Perempuan', 'Kp.Cipeujeh rt09/18 ', '083939393922', 2018, 6, '5703de3548ff252d497ed77119eccccf', 'siswa-1543609877.jpeg'),
(95, '180106', 'Gugun Gumi', 'Laki-Laki', 'Cikopo No.90 Ciparay', '0876372828288', 2018, 6, '8a9248ede4fe7905c206008baabe9d36', 'siswa-1543610150.jpeg'),
(96, '180209', 'Lala pon', 'Perempuan', 'Rancajigang No 110 Majalaya', '08292929294', 2018, 7, 'd27c7ca12f02d51a79c6f35429bcafa1', 'siswa-1543610257.jpeg'),
(97, '180208', 'Jika Muli', 'Laki-Laki', 'Babakan No.17 Majalaya', '08292200202', 2018, 7, 'b5a3f109244b04244b200c2852682451', 'siswa-1543610356.jpeg'),
(98, '180308', 'Halimah', 'Perempuan', 'Cipadaulun No.100 Majalaya', '089292939393', 2018, 7, 'c60f93287b6698cb449a64a76ed2c77a', 'siswa-1543610434.jpeg'),
(99, '160190', 'Nani', 'Perempuan', 'Cipeujeuh No.8 Lembur Awi', '08228225546478', 2016, 11, '3cba9e8a6133e9a938a8d31991c64e54', 'siswa-1543626914.jpeg'),
(100, '160789', 'Karin K', 'Perempuan', 'Balendah No.9', '08935758493', 2016, 12, 'add9aac6bfe899fd1da1e883c7b375aa', 'siswa-1543627020.jpg'),
(101, '160788', 'Bora H', 'Laki-Laki', 'Babakan Cempaka No 78 Majalaya', '083930303003', 2018, 12, '7b79baead0eaa59502fe94d692bc7bef', 'siswa-1543627153.jpeg'),
(102, '160900', 'GIfar', 'Laki-Laki', 'Bojong Soang No.78', '08743933030', 2018, 13, '17fc28341e44cce3984f02594e8bfdc5', 'siswa-1543627236.jpeg'),
(103, '160166', 'Fulki Mas', 'Laki-Laki', 'Ciparaya No.100 ', '0839394999', 2016, 20, '3e277d626ee105b6ab3074a6264cc306', 'siswa-1543627337.jpeg'),
(104, '160578', 'Holia', 'Perempuan', 'Cileunyi No.90', '084940303030', 2016, 21, '30287f1ecfebad61bf5dd979394534f0', 'siswa-1543627418.jpg'),
(105, '160565', 'Vino', 'Laki-Laki', 'Cangkring No.900', '0865848494030', 2016, 21, '6af22ab74d7c14c64550aa398a52af09', 'siswa-1543627489.jpeg'),
(106, '1601455', 'Jumiah', 'Perempuan', 'Saparako No.77 Majalaya', '0839393302', 2018, 21, '691bfd1074a9c74b42e4a7e3b3d342c5', 'siswa-1543627550.jpeg'),
(107, '160899', 'Jimi Ulya', 'Laki-Laki', 'Cangkring No.100', '084949303030', 2016, 22, '92bad7bcae8a16cb42809b4a62ab19d5', 'siswa-1543627619.jpeg');

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
  `nama` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_user`
--

INSERT INTO `tab_user` (`username`, `nama`, `password`) VALUES
('admin', 'Ari Juliana', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
