-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2021 pada 10.23
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kelurahan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dispensasi`
--

CREATE TABLE `data_dispensasi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nik_istri` varchar(150) DEFAULT NULL,
  `nama_istri` varchar(150) DEFAULT NULL,
  `pekerjaan_istri` varchar(150) DEFAULT NULL,
  `nik_suami` varchar(150) DEFAULT NULL,
  `nama_suami` varchar(150) DEFAULT NULL,
  `pekerjaan_suami` varchar(150) DEFAULT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') NOT NULL DEFAULT 'Diajukan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_dispensasi`
--

INSERT INTO `data_dispensasi` (`id`, `user_id`, `tanggal`, `keterangan`, `nik_istri`, `nama_istri`, `pekerjaan_istri`, `nik_suami`, `nama_suami`, `pekerjaan_suami`, `status_data`) VALUES
(2, 1, '2021-08-13', '123', '62', 'abc', 'irt', '63636', 'udin', 'swasta', 'Diajukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_domisili`
--

CREATE TABLE `data_domisili` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') NOT NULL DEFAULT 'Diajukan',
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `ayah` varchar(100) DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_domisili`
--

INSERT INTO `data_domisili` (`id`, `status_data`, `nama`, `tempat_lahir`, `tgl_lahir`, `agama`, `ayah`, `ibu`, `lama`, `alamat`, `kelurahan`, `kecamatan`, `user_id`) VALUES
(1, '', 'nama', 'tempat', '2021-09-02', 'Protestan', 'a', 'b', 2, 'bjm1', 'kel1', 'kec1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ghoib`
--

CREATE TABLE `data_ghoib` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') NOT NULL DEFAULT 'Diajukan',
  `nik` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tgl_berlaku` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_ghoib`
--

INSERT INTO `data_ghoib` (`id`, `status_data`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `keterangan`, `tgl_berlaku`, `user_id`) VALUES
(1, '', '787871', 'Ambul1', 'Banjarbaru', '2021-08-12', 'Pria', 'jl. banjarbaru', '<p>Bahwa orang tersebut pergi dari Desa Utara sejak tahun 2010 sampai sekarang dan tidak tahu keberadaannya.</p>', '2021-08-10', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_janda_duda`
--

CREATE TABLE `data_janda_duda` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') NOT NULL DEFAULT 'Diajukan',
  `tanggal` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nik_istri` varchar(150) DEFAULT NULL,
  `nama_istri` varchar(150) DEFAULT NULL,
  `pekerjaan_istri` varchar(150) DEFAULT NULL,
  `nik_suami` varchar(150) DEFAULT NULL,
  `nama_suami` varchar(150) DEFAULT NULL,
  `pekerjaan_suami` varchar(150) DEFAULT NULL,
  `status` enum('janda','duda') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_janda_duda`
--

INSERT INTO `data_janda_duda` (`id`, `status_data`, `tanggal`, `keterangan`, `nik_istri`, `nama_istri`, `pekerjaan_istri`, `nik_suami`, `nama_suami`, `pekerjaan_suami`, `status`, `user_id`) VALUES
(2, '', '2021-08-05', 'abc2', '442', '552', '662', '112', '222', '332', 'janda', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kedatangan`
--

CREATE TABLE `data_kedatangan` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'Diajukan',
  `NIK` varchar(16) NOT NULL,
  `No_Surat` varchar(16) NOT NULL,
  `Tanggal_Kedatangan` date NOT NULL,
  `Alamat_Asal` varchar(30) NOT NULL,
  `Alamat_Sekarang` varchar(30) NOT NULL,
  `Foto_Surat_Pengantar` varchar(250) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `agama` varchar(150) DEFAULT NULL,
  `pekerjaan` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kedatangan`
--

INSERT INTO `data_kedatangan` (`id`, `status_data`, `NIK`, `No_Surat`, `Tanggal_Kedatangan`, `Alamat_Asal`, `Alamat_Sekarang`, `Foto_Surat_Pengantar`, `user_id`, `nama`, `agama`, `pekerjaan`) VALUES
(4, '', '98', 'surat-k', '2021-08-14', 'bjm', 'bjb', '7138IMG.jpg', 1, 'udin', 'Protestan', 'swasta'),
(5, 'Diajukan', '123', '123', '2021-08-13', '123', '123', '10524Capture.PNG', 1, '123', 'Protestan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kelahiran`
--

CREATE TABLE `data_kelahiran` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'Diajukan',
  `NIKS` varchar(20) DEFAULT NULL,
  `No_Surat` varchar(20) NOT NULL,
  `No_KK` varchar(20) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `J_Kelamin` varchar(11) NOT NULL,
  `Hari_Lahir` varchar(8) NOT NULL,
  `Pukul` varchar(6) NOT NULL,
  `Tempat_Lahir` varchar(30) NOT NULL,
  `tgl_Lahir` date NOT NULL,
  `Anak_Ke` varchar(2) NOT NULL,
  `Agama` varchar(10) NOT NULL,
  `Tanggal_Pendaftaran` date NOT NULL,
  `Foto_KTP_Pengantar` varchar(250) NOT NULL,
  `Foto_KK_Melahirkan` varchar(250) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kelahiran`
--

INSERT INTO `data_kelahiran` (`id`, `status_data`, `NIKS`, `No_Surat`, `No_KK`, `Nama`, `J_Kelamin`, `Hari_Lahir`, `Pukul`, `Tempat_Lahir`, `tgl_Lahir`, `Anak_Ke`, `Agama`, `Tanggal_Pendaftaran`, `Foto_KTP_Pengantar`, `Foto_KK_Melahirkan`, `user_id`) VALUES
(2, '', '123', '123', '123', '123', 'Pria', 'Selasa', '22:04', '123', '2021-04-21', '1', 'Protestan', '2021-04-23', '35765IMG.jpg', '9359BASEs.jpg', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keluhan`
--

CREATE TABLE `data_keluhan` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') NOT NULL DEFAULT 'Diajukan',
  `no_laporan` varchar(150) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `detail_keluhan` text NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `status` enum('belum_selesai','sudah_selesai') DEFAULT NULL,
  `nama_pelapor` varchar(150) DEFAULT NULL,
  `no_hp` varchar(150) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_keluhan`
--

INSERT INTO `data_keluhan` (`id`, `status_data`, `no_laporan`, `tanggal`, `detail_keluhan`, `alamat`, `status`, `nama_pelapor`, `no_hp`, `user_id`) VALUES
(1, '', 'K0001', '2021-07-13', '123555', '1232223', 'belum_selesai', '12322', '123111', NULL),
(2, '', 'K0002', '2021-08-02', '123', '123', 'sudah_selesai', '123', '123', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kematian`
--

CREATE TABLE `data_kematian` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'Diajukan',
  `NIK` varchar(16) NOT NULL,
  `Hari_Meninggal` varchar(8) NOT NULL,
  `Tgl_Meninggal` date NOT NULL,
  `Tempat` varchar(30) NOT NULL,
  `Umur` varchar(8) NOT NULL,
  `Foto_Surat_Pengantar` varchar(250) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kematian`
--

INSERT INTO `data_kematian` (`id`, `status_data`, `NIK`, `Hari_Meninggal`, `Tgl_Meninggal`, `Tempat`, `Umur`, `Foto_Surat_Pengantar`, `user_id`, `nama`) VALUES
(1, '', '1122', 'Jumat', '2021-04-14', 'bjm', '12', '18594IMG.jpg', NULL, 'udin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kependudukan`
--

CREATE TABLE `data_kependudukan` (
  `id` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `No_KK` varchar(20) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `J_Kelamin` varchar(10) NOT NULL,
  `Tempat_Lahir` varchar(20) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Alamat` text DEFAULT NULL,
  `Agama` varchar(10) NOT NULL,
  `S_Kawin` varchar(100) NOT NULL,
  `Pekerjaan` varchar(15) NOT NULL,
  `Pen_Terakhir` varchar(10) NOT NULL,
  `Kewarganegaraan` varchar(15) NOT NULL,
  `Tgl_Pelaporan` date NOT NULL,
  `Keterangan` text DEFAULT NULL,
  `Foto_KTP` varchar(250) NOT NULL,
  `Foto_KK` varchar(250) NOT NULL,
  `ket_mampu` enum('tidak_mampu','mampu') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kependudukan`
--

INSERT INTO `data_kependudukan` (`id`, `NIK`, `No_KK`, `Nama`, `J_Kelamin`, `Tempat_Lahir`, `Tanggal_Lahir`, `Alamat`, `Agama`, `S_Kawin`, `Pekerjaan`, `Pen_Terakhir`, `Kewarganegaraan`, `Tgl_Pelaporan`, `Keterangan`, `Foto_KTP`, `Foto_KK`, `ket_mampu`) VALUES
(1, '33', 'agaehyrs', 'fwgae', 'Pria', 'WGAEH', '2021-04-15', 'Fga', 'Islam', 'Belum Kawin', 'twa', 'SD', 'WNI', '0000-00-00', 'wfgeA', '', '', 'tidak_mampu'),
(2, '11', '22', '33', 'Wanita', '44', '2021-04-15', '66', 'Hindu', 'Belum Kawin', 'hhhmmm', 'S2', 'WNA', '2021-04-22', '133', '52811a4.jpg', '69676122156938_10219398070845574_5069370434243946611_o.jpg', NULL),
(3, '22', '33', '11', 'Pria', '44', '2021-04-22', '663', '24', 'Belum Kawi', 'as', 'SMP', 'WNI', '2021-04-21', '234', '835home-md.png', '86733logo-masjid-hitam-putih.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kepindahan`
--

CREATE TABLE `data_kepindahan` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'Diajukan',
  `NIK` varchar(16) NOT NULL,
  `No_Surat` varchar(20) NOT NULL,
  `Alamat_Pindah` text NOT NULL,
  `Tanggal_Pindah` date NOT NULL,
  `Foto_Surat_Pengantar` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kepindahan`
--

INSERT INTO `data_kepindahan` (`id`, `status_data`, `NIK`, `No_Surat`, `Alamat_Pindah`, `Tanggal_Pindah`, `Foto_Surat_Pengantar`, `user_id`, `nama`) VALUES
(3, 'Proses', '1231231', 's01231', 'bjm1', '2021-08-27', '20256IMG.jpg', 1, 'udin1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keramaian`
--

CREATE TABLE `data_keramaian` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') NOT NULL DEFAULT 'Diajukan',
  `acara` varchar(150) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(150) DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `no_hp` varchar(150) DEFAULT NULL,
  `status` enum('diizinkan','tidak_diizinkan') DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `jumlah_keramaian` int(11) DEFAULT NULL,
  `nik` varchar(150) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `foto_ktp` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_keramaian`
--

INSERT INTO `data_keramaian` (`id`, `status_data`, `acara`, `tanggal`, `jam`, `lokasi`, `no_hp`, `status`, `user_id`, `jumlah_keramaian`, `nik`, `nama`, `foto_ktp`) VALUES
(2, '', '12', '2021-07-15', '19:00', '123', '12', 'diizinkan', NULL, NULL, NULL, NULL, NULL),
(3, '', 'abc1', '2021-08-19', '17:43', '11', '23421', 'diizinkan', 1, 201, '6451', 'bj1', '21766IMG.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keterangan_sama`
--

CREATE TABLE `data_keterangan_sama` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') NOT NULL DEFAULT 'Diajukan',
  `nik` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `nik_orang` varchar(150) NOT NULL,
  `nama_orang` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('org_sama','org_berbeda') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_keterangan_sama`
--

INSERT INTO `data_keterangan_sama` (`id`, `status_data`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `nik_orang`, `nama_orang`, `user_id`, `status`) VALUES
(1, '', '90901', 'Andi1', 'Banjarmasin', '2021-08-09', 'Pria', 'jl ayani', '123', 'andi S', 1, 'org_sama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kia`
--

CREATE TABLE `data_kia` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') NOT NULL DEFAULT 'Diajukan',
  `no_reg` varchar(100) NOT NULL,
  `no_kk` varchar(100) NOT NULL,
  `nik_anak` varchar(100) NOT NULL,
  `nama_anak` varchar(100) NOT NULL,
  `no_akta` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `gol_darah` varchar(100) NOT NULL,
  `ayah` varchar(100) NOT NULL,
  `ibu` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kia`
--

INSERT INTO `data_kia` (`id`, `status_data`, `no_reg`, `no_kk`, `nik_anak`, `nama_anak`, `no_akta`, `tempat_lahir`, `tgl_lahir`, `anak_ke`, `gol_darah`, `ayah`, `ibu`, `alamat`, `foto`, `user_id`) VALUES
(1, '', 'KIA-0001', '1232', '22', '12', '32', '42', '2021-09-02', 22, 'o2', '1232', '22', '1232', '37201bumi.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `nip` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  `Nama` varchar(20) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `Alamat` varchar(40) NOT NULL,
  `Tgl_Lahir` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `Foto_Pegawai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`nip`, `id`, `Nama`, `jk`, `Alamat`, `Tgl_Lahir`, `tgl_masuk`, `Foto_Pegawai`) VALUES
('P0001', 1, 'udin a', 'Wanita', 'aaa', '2020-03-04', '2021-04-07', '84025IMG.jpg'),
('P0003', 3, '123', 'Pria', '', '1991-04-06', '2021-03-31', '80035home-md.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pelapor`
--

CREATE TABLE `data_pelapor` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'Diajukan',
  `NIK` varchar(16) NOT NULL,
  `No_Surat` varchar(16) NOT NULL,
  `tgl_lapor` date DEFAULT NULL,
  `Foto_Surat_Pengantar` varchar(250) NOT NULL,
  `Foto_KTP` varchar(250) NOT NULL,
  `Foto_KK` varchar(250) NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pelapor`
--

INSERT INTO `data_pelapor` (`id`, `status_data`, `NIK`, `No_Surat`, `tgl_lapor`, `Foto_Surat_Pengantar`, `Foto_KTP`, `Foto_KK`, `keterangan`) VALUES
(1, '', '33', 'asiap1111', '2021-04-02', '58606result1.jpg', '58639background1.jpg', '65754result2.jpg', 'okkk1111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_skck`
--

CREATE TABLE `data_skck` (
  `id` int(11) NOT NULL,
  `status_data` enum('Diajukan','Proses','Selesai') NOT NULL DEFAULT 'Diajukan',
  `nik` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tempat_lahir` varchar(150) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_skck`
--

INSERT INTO `data_skck` (`id`, `status_data`, `nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `pekerjaan`, `user_id`) VALUES
(1, '', '991', 'adia', 'bjm', '2021-08-13', 'Pria', 'aaa', 'driver', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `hak_akses` enum('admin','pimpinan') DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `hak_akses`, `username`, `password`, `pegawai_id`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(3, 'pimpinan', 'pimpinan', 'pimpinan', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_penduduk`
--

CREATE TABLE `login_penduduk` (
  `id` int(11) NOT NULL,
  `nik` varchar(150) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `hp` varchar(18) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `validasi` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login_penduduk`
--

INSERT INTO `login_penduduk` (`id`, `nik`, `nama`, `alamat`, `hp`, `username`, `password`, `validasi`) VALUES
(1, '6363', 'penduduk nama', 'bjm', '8080', 'penduduk', 'penduduk', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_dispensasi`
--
ALTER TABLE `data_dispensasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_domisili`
--
ALTER TABLE `data_domisili`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_ghoib`
--
ALTER TABLE `data_ghoib`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_janda_duda`
--
ALTER TABLE `data_janda_duda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kedatangan`
--
ALTER TABLE `data_kedatangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kelahiran`
--
ALTER TABLE `data_kelahiran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_keluhan`
--
ALTER TABLE `data_keluhan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kematian`
--
ALTER TABLE `data_kematian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kependudukan`
--
ALTER TABLE `data_kependudukan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kepindahan`
--
ALTER TABLE `data_kepindahan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_keramaian`
--
ALTER TABLE `data_keramaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_keterangan_sama`
--
ALTER TABLE `data_keterangan_sama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_kia`
--
ALTER TABLE `data_kia`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pelapor`
--
ALTER TABLE `data_pelapor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_skck`
--
ALTER TABLE `data_skck`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`pegawai_id`);

--
-- Indeks untuk tabel `login_penduduk`
--
ALTER TABLE `login_penduduk`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_dispensasi`
--
ALTER TABLE `data_dispensasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_domisili`
--
ALTER TABLE `data_domisili`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_ghoib`
--
ALTER TABLE `data_ghoib`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_janda_duda`
--
ALTER TABLE `data_janda_duda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kedatangan`
--
ALTER TABLE `data_kedatangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_kelahiran`
--
ALTER TABLE `data_kelahiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_keluhan`
--
ALTER TABLE `data_keluhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kematian`
--
ALTER TABLE `data_kematian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_kependudukan`
--
ALTER TABLE `data_kependudukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_kepindahan`
--
ALTER TABLE `data_kepindahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_keramaian`
--
ALTER TABLE `data_keramaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_keterangan_sama`
--
ALTER TABLE `data_keterangan_sama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_kia`
--
ALTER TABLE `data_kia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_pelapor`
--
ALTER TABLE `data_pelapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_skck`
--
ALTER TABLE `data_skck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `login_penduduk`
--
ALTER TABLE `login_penduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`pegawai_id`) REFERENCES `data_pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
