-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 09:21 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_bpd`
--

CREATE TABLE `anggota_bpd` (
  `id_anggota_bpd` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_anggota` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pangkat` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `tanggal_pengangkatan` date NOT NULL,
  `nomor_pengangkatan` int(11) NOT NULL,
  `tanggal_pemberhentian` date NOT NULL,
  `nomor_pemberhentian` int(11) NOT NULL,
  `keaktifan` enum('1','0') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_bpd`
--

INSERT INTO `anggota_bpd` (`id_anggota_bpd`, `nama`, `nomor_anggota`, `nip`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pangkat`, `jabatan`, `pendidikan_terakhir`, `tanggal_pengangkatan`, `nomor_pengangkatan`, `tanggal_pemberhentian`, `nomor_pemberhentian`, `keaktifan`, `keterangan`, `foto`, `tanggal_data`) VALUES
(1, 'anggota 1', 123, 1223, 'Laki - Laki', 'Jakarta', '2020-04-13', 'Islam', 'Pangkat 1', 'Jabatan 1', 'SMA', '2020-04-13', 123, '2020-04-13', 33543, '1', 'keterangan', '', '0000-00-00'),
(3, 'a', 2, 2, 'Laki - Laki', 'a', '2020-02-20', 'Islam', 'a', 'a', 'SD', '2020-02-20', 1, '2020-02-20', 1, '1', 'a', 'avatar.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `aparat`
--

CREATE TABLE `aparat` (
  `id_aparat` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `niap` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pangkat` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `tanggal_pengangkatan` date NOT NULL,
  `nomor_pengangkatan` int(11) NOT NULL,
  `tanggal_pemberhentian` date NOT NULL,
  `nomor_pemberhentian` int(11) NOT NULL,
  `keaktifan` enum('1','0') NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aparat`
--

INSERT INTO `aparat` (`id_aparat`, `nama_lengkap`, `niap`, `nip`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pangkat`, `jabatan`, `pendidikan_terakhir`, `tanggal_pengangkatan`, `nomor_pengangkatan`, `tanggal_pemberhentian`, `nomor_pemberhentian`, `keaktifan`, `keterangan`, `foto`, `tanggal_data`) VALUES
(1, 'Nunung', 234, 1212, '1', 'Cikarang', '2020-04-09', 'Islam', 'Satpam', 'Kepala Satpam', 'SMA', '2020-04-09', 45453, '2020-04-09', 33543, '1', 'terte', '', '0000-00-00'),
(4, 'a', 1, 1, '1', 'a', '2020-02-03', 'Islam', 'a', 'a', 'SD', '2020-01-25', 2, '2020-01-30', 1, '1', 'a', 'avatar.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nama_dusun` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `id_kelurahan`, `nama_dusun`, `tanggal_data`) VALUES
(1, 1, 'DUSUN KAB ACEH', '0000-00-00'),
(2, 2, 'dusun kota banten', '0000-00-00'),
(3, 1, 'dusun kota banten', '0000-00-00'),
(4, 1, 'dusun kota banten', '0000-00-00'),
(5, 2, 'dusun kota banten', '0000-00-00'),
(7, 8, 'Bogeg', '0000-00-00'),
(8, 9, 'Babakan', '0000-00-00'),
(9, 9, 'Kebon Gedang', '0000-00-00'),
(10, 10, 'Ciawi', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi`
--

CREATE TABLE `ekspedisi` (
  `id_ekspedisi` int(11) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `nomor_surat` int(11) NOT NULL,
  `isi_singkat` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_dokumen` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`id_ekspedisi`, `tanggal_surat`, `tanggal_pengiriman`, `nomor_surat`, `isi_singkat`, `tujuan`, `keterangan`, `file_dokumen`, `tanggal_data`) VALUES
(1, '2020-04-09', '2020-04-09', 2342341, 'Berkas Penduduk1', 'Jl. Raya Cikarang Cibarusah cikarang Selatan Bekasi1', 'ok1', '', '0000-00-00'),
(3, '2020-01-30', '2020-03-25', 1, 'a', 'a', 'a', 'avatar.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ekspedisi_bpd`
--

CREATE TABLE `ekspedisi_bpd` (
  `id_ekspedisi_bpd` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `isi_singkat` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_dokumen` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekspedisi_bpd`
--

INSERT INTO `ekspedisi_bpd` (`id_ekspedisi_bpd`, `tanggal_pengiriman`, `tanggal_surat`, `nomor_surat`, `isi_singkat`, `tujuan`, `keterangan`, `file_dokumen`, `tanggal_data`) VALUES
(1, '2020-04-13', '2020-04-14', '234234', 'Berkas Penduduk', 'Cikarang Selatan', 'keterangan', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_desa` varchar(100) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_fax` int(11) NOT NULL,
  `format_waktu` varchar(5) NOT NULL,
  `jenis_pemerintahan` varchar(100) NOT NULL,
  `jenis_pemerintahan_desa` varchar(100) NOT NULL,
  `kabupaten_kota` varchar(100) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kecamatan` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_desa`, `provinsi`, `no_telepon`, `website`, `logo`, `kecamatan`, `alamat`, `no_fax`, `format_waktu`, `jenis_pemerintahan`, `jenis_pemerintahan_desa`, `kabupaten_kota`, `kode_pos`, `email`, `jenis_kecamatan`, `lokasi`, `tanggal_data`) VALUES
(1, 'Sukamakmur', 'Jawa Barat', '02348888888', 'www.desasukamakmur.com', 'avatar.jpg', 'Sukamakmur', 'Jl. Sukamakmur', 234999999, 'WIB', 'Kota', 'Desa', 'Bogor', 16830, 'admin@sumurademtimur.com', 'Kecamatan', '//www.google.com/maps/d/embed?mid=1Wnpto9TH1rSsskb6OFJiBPOWlLtsyxXf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `asal_barang` varchar(100) NOT NULL,
  `keadaan_awal_tahun` varchar(10) NOT NULL,
  `jumlah_kondisi_baik` int(11) NOT NULL,
  `jumlah_kondisi_rusak` int(11) NOT NULL,
  `jumlah_penghapusan_rusak` int(11) NOT NULL,
  `jumlah_penghapusan_dijual` int(11) NOT NULL,
  `jumlah_penghapusan_disumbangkan` int(11) NOT NULL,
  `tanggal_penghapusan` date NOT NULL,
  `keadaan_barang_akhir_tahun` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama_barang`, `asal_barang`, `keadaan_awal_tahun`, `jumlah_kondisi_baik`, `jumlah_kondisi_rusak`, `jumlah_penghapusan_rusak`, `jumlah_penghapusan_dijual`, `jumlah_penghapusan_disumbangkan`, `tanggal_penghapusan`, `keadaan_barang_akhir_tahun`, `keterangan`, `tanggal_data`) VALUES
(1, 'Mesin Pompa Air', 'Hibah Kecamatan Palimanan', 'Rusak', 2, 1, 1, 2, 1, '2020-04-09', 'Rusak', 'Keterangan', '0000-00-00'),
(5, 'a', 'a', 'Baik', 1, 1, 1, 1, 1, '2020-02-25', 'Baik', 'a', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_proyek`
--

CREATE TABLE `inventaris_proyek` (
  `id_inventaris_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `biaya` int(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris_proyek`
--

INSERT INTO `inventaris_proyek` (`id_inventaris_proyek`, `nama_proyek`, `volume`, `lokasi`, `biaya`, `keterangan`, `tanggal_data`) VALUES
(1, 'Pembangunan Jalan', '30', 'Kendron', 1000000, 'ok', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kader_pembangunan`
--

CREATE TABLE `kader_pembangunan` (
  `id_kader_pembangunan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kader_pembangunan`
--

INSERT INTO `kader_pembangunan` (`id_kader_pembangunan`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan_terakhir`, `pekerjaan`, `bidang`, `alamat`, `keterangan`, `foto`, `tanggal_data`) VALUES
(1, 'ZAENAL MTAQIEN', 'Laki - Laki', 'Cikarang', '2020-04-10', 'SD', 'a', 'Pembangunan', 'Jl. Hasibuan', 'OK keterangan', 'a', '0000-00-00'),
(4, 'a', 'Laki - Laki', 'a', '2020-06-09', 'SD', 'Kepala Proyek', 'a', 'a', 'a', 'avatar.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kota` int(50) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kota`, `nama_kecamatan`, `tanggal_data`) VALUES
(1, 1, 'KEC KAB ACEH', '0000-00-00'),
(2, 2, 'kec kota aceh', '0000-00-00'),
(3, 3, 'kec kab banten', '0000-00-00'),
(4, 4, 'kec kota banten', '0000-00-00'),
(6, 6, 'Sukra', '0000-00-00'),
(7, 6, 'Patrol', '0000-00-00'),
(8, 7, 'Palimanan', '0000-00-00'),
(9, 7, 'Ciwaringin', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_bpd`
--

CREATE TABLE `kegiatan_bpd` (
  `id_kegiatan_bpd` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tentang` varchar(100) NOT NULL,
  `pelaksana` varchar(100) NOT NULL,
  `pokok` varchar(100) NOT NULL,
  `hasil_kegiatan` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_dokumen` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_bpd`
--

INSERT INTO `kegiatan_bpd` (`id_kegiatan_bpd`, `tanggal`, `tentang`, `pelaksana`, `pokok`, `hasil_kegiatan`, `keterangan`, `file_dokumen`, `tanggal_data`) VALUES
(1, '2020-04-13', 'tentang', 'carli', 'pokok pokok', 'hasil kegiatan', 'keterangan', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_pembangunan`
--

CREATE TABLE `kegiatan_pembangunan` (
  `id_kegiatan_pembangunan` int(11) NOT NULL,
  `sifat_proyek` varchar(20) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `volume` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `sumber_dana_pemerintah` int(11) NOT NULL,
  `sumber_dana_provinsi` int(11) NOT NULL,
  `sumber_dana_kota` int(11) NOT NULL,
  `sumber_dana_swadaya` int(11) NOT NULL,
  `pelaksana` varchar(100) NOT NULL,
  `waktu_pelaksanaan` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_pembangunan`
--

INSERT INTO `kegiatan_pembangunan` (`id_kegiatan_pembangunan`, `sifat_proyek`, `nama_proyek`, `volume`, `lokasi`, `sumber_dana_pemerintah`, `sumber_dana_provinsi`, `sumber_dana_kota`, `sumber_dana_swadaya`, `pelaksana`, `waktu_pelaksanaan`, `keterangan`, `tanggal_data`) VALUES
(1, 'baru', 'Pembangunan Jalan', '30', 'Kendron', 1, 1, 1, 1, 'Dadang', '2020-04-10', 'a', '0000-00-00'),
(4, 'Lanjutan', 'a', 'a', 'a', 1, 1, 1, 1, 'a', '2020-02-20', 'a', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kelahiran`
--

CREATE TABLE `kelahiran` (
  `id_kelahiran` int(11) NOT NULL,
  `id_penduduk` int(20) NOT NULL,
  `no_akte` int(100) NOT NULL,
  `anak_ke_berapa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelahiran`
--

INSERT INTO `kelahiran` (`id_kelahiran`, `id_penduduk`, `no_akte`, `anak_ke_berapa`) VALUES
(13, 44, 2, 2),
(14, 45, 1, 1),
(16, 0, 1, 1),
(17, 49, 1, 1),
(18, 50, 2, 2),
(19, 54, 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(50) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`, `tanggal_data`) VALUES
(1, 1, 'KEL KEC KAB ACEH', '0000-00-00'),
(2, 2, 'kel kec kota banten', '0000-00-00'),
(3, 3, 'kel kec kab banten', '0000-00-00'),
(4, 4, 'kel kec kota banten', '0000-00-00'),
(5, 4, 'kel kec kota banten 2', '0000-00-00'),
(7, 6, 'Sumuradem Timur', '0000-00-00'),
(8, 6, 'Sumuradem', '0000-00-00'),
(9, 9, 'Ciwaringin', '0000-00-00'),
(10, 8, 'Palimanan', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `id_kematian` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `tanggal_meninggal` date NOT NULL,
  `tempat_meninggal` varchar(50) NOT NULL,
  `sebab` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal_pemakaman` date NOT NULL,
  `tempat_pemakaman` text NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `id_penduduk`, `umur`, `tanggal_meninggal`, `tempat_meninggal`, `sebab`, `keterangan`, `tanggal_pemakaman`, `tempat_pemakaman`, `tanggal_data`) VALUES
(8, 34, 0, '2020-11-11', 'Bandung', 'Sakit', 'tidak ada', '1111-11-11', 'bandung', '0000-00-00'),
(9, 50, 0, '2020-01-30', 'a', 'Sakit', 'a', '2020-01-30', 'a', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kepala_desa`
--

CREATE TABLE `kepala_desa` (
  `id_kepala_desa` int(11) NOT NULL,
  `nomor_kepala_desa` int(11) NOT NULL,
  `tentang` varchar(100) NOT NULL,
  `uraian_singkat` varchar(100) NOT NULL,
  `nomor_dilaporkan` int(11) NOT NULL,
  `tanggal_dilaporkan` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_dokumen` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepala_desa`
--

INSERT INTO `kepala_desa` (`id_kepala_desa`, `nomor_kepala_desa`, `tentang`, `uraian_singkat`, `nomor_dilaporkan`, `tanggal_dilaporkan`, `keterangan`, `file_dokumen`, `tanggal_data`) VALUES
(1, 22, 'tentang', 'uraian singkat', 123, '2020-04-09', 'tidak ada', '', '0000-00-00'),
(5, 1, 'a', 'a', 12122, '2020-03-31', 'a', 'avatar.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `keputusan_bpd`
--

CREATE TABLE `keputusan_bpd` (
  `id_keputusan_bpd` int(11) NOT NULL,
  `nomor_keputusan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tentang` varchar(100) NOT NULL,
  `uraian_singkat` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_dokumen` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keputusan_bpd`
--

INSERT INTO `keputusan_bpd` (`id_keputusan_bpd`, `nomor_keputusan`, `tanggal`, `tentang`, `uraian_singkat`, `keterangan`, `file_dokumen`, `tanggal_data`) VALUES
(1, 345341, '2020-04-13', 'perjalana1', 'urian', 'keterangan', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `keterangan`, `harga`, `tanggal`, `status`, `tanggal_data`) VALUES
(1, 'Pembelian Lampu Jalan', '356000', '2020-05-25', 'pemasukan', '0000-00-00'),
(2, 'Pembelian Peralatan Komputer', '5900000', '2020-05-25', 'pengeluaran', '0000-00-00'),
(23, 'a', '10000', '2020-04-20', 'pengeluaran', '0000-00-00'),
(24, 'a', '10000', '2020-04-20', 'pemasukan', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(10) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `nama_kota`, `tanggal_data`) VALUES
(1, 1, 'KABUPATEN ACEH', '0000-00-00'),
(2, 1, 'kota aceh', '0000-00-00'),
(3, 16, 'kabupaten banten', '0000-00-00'),
(4, 16, 'kota banten', '0000-00-00'),
(6, 12, 'Indramayu', '0000-00-00'),
(7, 12, 'Cirebon', '0000-00-00'),
(8, 13, 'Tegal', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `master_surat`
--

CREATE TABLE `master_surat` (
  `id_master_surat` int(11) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `nama_surat_dinas` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_surat`
--

INSERT INTO `master_surat` (`id_master_surat`, `kode_surat`, `nama_surat_dinas`, `tanggal_data`) VALUES
(1, 'SRT0000001', 'DOMISILI', '0000-00-00'),
(2, 'SRT0000002', ' BELUM MENIKAH', '0000-00-00'),
(3, 'SRT0000003', 'TIDAK MAMPU', '0000-00-00'),
(6, 'SRT0000004', 'USAHA', '0000-00-00'),
(7, 'SRT0000005', 'KTP SEDANG DI PROSES', '0000-00-00'),
(8, 'SRT0000006', 'KEMATIAN', '0000-00-00'),
(9, 'SRT0000007', 'BERKELAKUAN BAIK', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_nontifikasi` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_nontifikasi`, `keterangan`, `url`, `status`, `waktu`) VALUES
(84, 'edit data kepdes', 'kepdes', 0, '2020-06-08 23:27:42'),
(85, 'menambah data aparat', 'aparat', 0, '2020-06-08 23:41:09'),
(86, 'edit data aparat', 'aparat', 0, '2020-06-08 23:41:39'),
(87, 'menambah data ekspedisi', 'ekspedisi', 0, '2020-06-09 01:14:00'),
(88, 'edit data ekspedisi', 'ekspedisi', 0, '2020-06-09 01:14:19'),
(89, 'menambah data inventaris', 'inventaris', 0, '2020-06-09 02:36:10'),
(90, 'hapus data inventaris', 'inventaris', 0, '2020-06-09 02:37:54'),
(91, 'menambah data inventaris', 'inventaris', 0, '2020-06-09 02:38:11'),
(92, 'edit data inventaris', 'inventaris', 0, '2020-06-09 02:38:24'),
(93, 'menambah data tkd', 'tkd', 0, '2020-06-09 03:19:33'),
(94, 'edit data tkd', 'tkd', 0, '2020-06-09 03:22:02'),
(95, 'edit data rencana pembangunan', 'rencana_pembangunan', 0, '2020-06-09 04:25:00'),
(96, 'menambah data rencana pembangunan', 'rencana_pembangunan', 0, '2020-06-09 04:35:33'),
(97, 'edit data rencana pembangunan', 'rencana_pembangunan', 0, '2020-06-09 04:35:44'),
(98, 'menambah data anggota bpd', 'anggota_bpd', 0, '2020-06-09 05:40:32'),
(99, 'edit data kota', 'kota', 0, '2020-06-09 05:43:32'),
(100, 'edit data kota', 'kota', 0, '2020-06-09 05:43:36'),
(101, 'menambah data keuangan', 'keuangan', 0, '2020-06-09 06:16:02'),
(102, 'menambah data keuangan', 'keuangan', 0, '2020-06-09 06:16:19'),
(103, 'menambah data kegiatan pembangunan', 'kegiatan_pembangunan', 0, '2020-06-09 09:17:38'),
(104, 'edit data kegiatan pembangunan', 'kegiatan_pembangunan', 0, '2020-06-09 09:17:52'),
(105, 'menambah data kader pembangunan', 'kader_pembangunan', 0, '2020-06-09 09:19:11'),
(106, 'edit data kader pembangunan', 'kader_pembangunan', 0, '2020-06-09 09:20:26'),
(107, 'edit data kader pembangunan', 'kader_pembangunan', 0, '2020-06-09 09:20:46'),
(108, 'menambah data tanah desa', 'tanah_desa', 0, '2020-06-09 09:43:29'),
(109, 'edit data tanah desa', 'tanah_desa', 0, '2020-06-09 09:44:00'),
(110, 'hapus data user', 'users', 0, '2020-06-13 23:22:27'),
(111, 'menambah data penduduk', 'penduduk', 0, '2020-07-09 21:44:41'),
(112, 'menambah data penduduk', 'penduduk', 0, '2020-07-09 21:44:41'),
(113, 'menambah data penduduk', 'penduduk', 0, '2020-07-09 21:50:15'),
(114, 'edit data penduduk', 'penduduk', 0, '2020-07-09 21:52:30'),
(115, 'menambah data kelahiran', 'kelahiran', 0, '2020-07-09 21:57:21'),
(116, 'edit data kelahiran', 'kelahiran', 0, '2020-07-09 21:57:42'),
(117, 'menambah data penduduk', 'penduduk', 0, '2020-07-10 03:48:34'),
(118, 'menambah data penduduk', 'penduduk', 0, '2020-07-10 03:48:34'),
(119, 'hapus data penduduk', 'penduduk', 0, '2020-07-10 03:51:06'),
(120, 'hapus data penduduk', 'penduduk', 0, '2020-07-10 03:51:09'),
(121, 'menambah data penduduk', 'penduduk', 0, '2020-07-10 03:52:50'),
(122, 'hapus data penduduk', 'penduduk', 0, '2020-07-11 01:18:44'),
(123, 'hapus data penduduk', 'penduduk', 0, '2020-07-11 01:30:33'),
(124, 'hapus data penduduk', 'penduduk', 0, '2020-07-11 01:30:44'),
(125, 'hapus data penduduk', 'penduduk', 0, '2020-07-11 01:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki - Laki','Perempuan') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status_perkawinan` varchar(20) NOT NULL,
  `status_penduduk` varchar(20) NOT NULL,
  `status_dalam_keluarga` varchar(20) NOT NULL,
  `status_hidup` int(2) NOT NULL,
  `nik` int(100) NOT NULL,
  `no_kk` int(100) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `pendidikan_terakhir` varchar(20) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nama_bapak` varchar(100) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_data` date NOT NULL,
  `umur` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pekerjaan`, `status_perkawinan`, `status_penduduk`, `status_dalam_keluarga`, `status_hidup`, `nik`, `no_kk`, `kewarganegaraan`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `dusun`, `rt`, `rw`, `alamat`, `kode_pos`, `no_telepon`, `pendidikan_terakhir`, `foto`, `nama_ibu`, `nama_bapak`, `tanggal_input`, `tanggal_data`, `umur`) VALUES
(2, 'WAHID', 'SENGGIGI', '1998-01-01', 'Laki - Laki', 'Islam', 'WIRASWASTA', 'Belum Menikah', 'Pendatang', 'Ayah', 0, 5201140, 2147483647, 'indonesia', '1', '1', '1', '1', '3', '09', '09', 'Jl Adinegoro 1, Sumatera Utara', 15513, '08524685726', 'DIPLOMA 1', 'avatar53.png', 'mawar', 'budi', '2020-05-10', '0000-00-00', 22),
(4, 'ULFA WIDIAWATI', 'JOHAR PELITA', '1998-02-02', 'Perempuan', 'Islam', 'WIRASWASTA', 'Sudah Menikah', 'Tetap', 'Ibu', 0, 2147483647, 2147483647, 'indonesia', '1', '1', '1', '1', '3', '09', '09', 'Jl Ciledug Raya 61, Dki Jakarta', 14451, '0815647525', 'SARJANA 1', 'avatar53.png', 'SITIYAH', 'ZAMHARIN', '2020-05-10', '0000-00-00', 22),
(5, 'AHMAD', 'MANGSIT', '1998-01-01', 'Laki - Laki', 'Islam', 'BELUM', 'Cerai', 'Tetap', 'Ayah', 0, 2147483647, 2147483647, 'indonesia', '1', '1', '1', '1', '3', '09', '09', 'Jl Alkateri 23, Jawa Barat', 16551, '08547754525', 'DIPLOMA 1', 'avatar53.png', 'RUSDAH', 'AHLUL', '2020-05-01', '0000-00-00', 22),
(33, 'Budi', 'jakarta', '1999-02-01', 'Laki - Laki', 'Islam', 'belum bekerja', 'Belum Menikah', 'Pindah', 'Ayah', 0, 123, 123, 'indonesia', '1', '1', '1', '1', '1', '2', '3', 'jakarta', 112, '08124598', 'SD', 'avatar1.png', 'ibu budi', 'ayah budi', '2019-05-13', '0000-00-00', 21),
(34, 'Ridwan', 'Jakarta', '1998-01-02', 'Laki - Laki', 'Islam', 'Buruh', 'Belum Menikah', 'Tetap', 'Ayah', 1, 123, 223, 'Indonesia', '1', '1', '1', '1', '1', '2', '2', 'Jakarta', 112, '08142455', 'SD', 'avatar2.png', 'Ibu Ridwan', 'Bapak Ridwan', '2020-05-14', '0000-00-00', 22),
(50, 'a', 'a', '1999-03-11', 'Laki - Laki', 'Islam', '', 'Belum Menikah', 'Pindah', 'Anak', 1, 0, 2, 'indonesia', '1', '1', '1', '1', '3', '09', '09', 'Jl Ciledug Raya 61, Dki Jakarta', 14451, '', 'SMP', '', 'ULFA WIDIAWATI', 'WAHID', '2020-06-08', '0000-00-00', 21),
(54, 'bayi', 'a', '2020-01-06', 'Laki - Laki', 'Kristen', '', 'Belum Menikah', 'Tetap', 'Anak', 0, 0, 123, 'indonesia', '1', '1', '1', '1', '3', '09', '09', 'Jl Ciledug Raya 61, Dki Jakarta', 14451, '', '', '', 'ULFA WIDIAWATI', 'AHMAD', '2020-07-09', '0000-00-00', 0),
(74, 'baru', 'tangerang', '2020-02-01', 'Laki - Laki', 'Islam', 'Belum', 'Belum Menikah', 'Tetap', 'Anak', 0, 123, 123, 'Indonesia', '1', '1', '1', '1', '1', '2', '2', 'Tangerang', 123, '081317704466', 'SD', 'avatar.png', 'Ibu', 'Ayah', '2020-07-10', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peraturan_desa`
--

CREATE TABLE `peraturan_desa` (
  `id_peraturan_desa` int(11) NOT NULL,
  `nomor_peraturan_desa` int(11) NOT NULL,
  `tanggal_peraturan_desa` date NOT NULL,
  `tentang` text NOT NULL,
  `uraian_singkat` varchar(100) NOT NULL,
  `nomor_persetujuan_BPD` int(11) NOT NULL,
  `tanggal_persetujuan_BPD` date NOT NULL,
  `nomor_dilaporkan` int(11) NOT NULL,
  `tanggal_dilaporkan` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `file_dokumen` varchar(50) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peraturan_desa`
--

INSERT INTO `peraturan_desa` (`id_peraturan_desa`, `nomor_peraturan_desa`, `tanggal_peraturan_desa`, `tentang`, `uraian_singkat`, `nomor_persetujuan_BPD`, `tanggal_persetujuan_BPD`, `nomor_dilaporkan`, `tanggal_dilaporkan`, `keterangan`, `file_dokumen`, `tanggal_data`) VALUES
(1, 5446, '2020-04-08', 'ertert', 'erte', 123, '2020-04-08', 123, '2020-04-08', 'erte', 'erte', '0000-00-00'),
(4, 1, '2020-02-03', 'a', 'a', 1, '2020-01-30', 2, '2020-02-25', 'a', 'avatar.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `pindah_kependudukan`
--

CREATE TABLE `pindah_kependudukan` (
  `id_pindah_kependudukan` int(11) NOT NULL,
  `id_penduduk` int(11) NOT NULL,
  `tanggal_pindah` date DEFAULT NULL,
  `alamat_pindahan` text DEFAULT NULL,
  `alamat_sebelumnya` text DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pindah_kependudukan`
--

INSERT INTO `pindah_kependudukan` (`id_pindah_kependudukan`, `id_penduduk`, `tanggal_pindah`, `alamat_pindahan`, `alamat_sebelumnya`, `keterangan`, `tanggal_data`) VALUES
(9, 33, '2020-02-20', 'bandung', '0', 'tidak ada', '0000-00-00'),
(11, 34, NULL, NULL, '', '', '0000-00-00'),
(12, 36, NULL, NULL, '', '', '0000-00-00'),
(13, 37, NULL, NULL, '', '', '0000-00-00'),
(14, 38, NULL, NULL, '', '', '0000-00-00'),
(15, 39, NULL, NULL, '', '', '0000-00-00'),
(16, 40, NULL, NULL, '', '', '0000-00-00'),
(18, 14, NULL, NULL, NULL, NULL, '0000-00-00'),
(19, 46, NULL, NULL, NULL, NULL, '0000-00-00'),
(20, 47, NULL, NULL, NULL, NULL, '0000-00-00'),
(21, 48, NULL, NULL, NULL, NULL, '0000-00-00'),
(22, 49, NULL, NULL, NULL, NULL, '0000-00-00'),
(24, 51, '1970-01-01', NULL, '', '', '0000-00-00'),
(25, 52, '1970-01-01', NULL, '', '', '0000-00-00'),
(26, 53, '1970-01-01', NULL, '', '', '0000-00-00'),
(27, 54, NULL, NULL, NULL, NULL, '0000-00-00'),
(30, 57, NULL, NULL, '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` tinytext NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`, `tanggal_data`) VALUES
(1, 'ACEH', '0000-00-00'),
(2, 'Sumatera Utara', '0000-00-00'),
(3, 'Sumatera Barat', '0000-00-00'),
(4, 'Riau', '0000-00-00'),
(5, 'Jambi', '0000-00-00'),
(6, 'Sumatera Selatan', '0000-00-00'),
(7, 'Bengkulu', '0000-00-00'),
(8, 'Lampung', '0000-00-00'),
(9, 'Kepulauan Bangka Belitung', '0000-00-00'),
(10, 'Kepulauan Riau', '0000-00-00'),
(11, 'DKI Jakarta', '0000-00-00'),
(12, 'Jawa Barat', '0000-00-00'),
(13, 'Jawa Tengah', '0000-00-00'),
(14, 'DI Yogyakarta', '0000-00-00'),
(15, 'Jawa Timur', '0000-00-00'),
(16, 'Banten', '0000-00-00'),
(17, 'Bali', '0000-00-00'),
(18, 'Nusa Tenggara Barat', '0000-00-00'),
(19, 'Nusa Tenggara Timur', '0000-00-00'),
(20, 'Kalimantan Barat', '0000-00-00'),
(21, 'Kalimantan Tengah', '0000-00-00'),
(22, 'Kalimantan Selatan', '0000-00-00'),
(23, 'Kalimantan Timur', '0000-00-00'),
(24, 'Kalimantan Utara', '0000-00-00'),
(71, 'Sulawesi Utara', '0000-00-00'),
(72, 'Sulawesi Tengah', '0000-00-00'),
(73, 'Sulawesi Selatan', '0000-00-00'),
(74, 'Sulawesi Tenggara', '0000-00-00'),
(75, 'Gorontalo', '0000-00-00'),
(76, 'Sulawesi Barat', '0000-00-00'),
(81, 'Maluku', '0000-00-00'),
(82, 'Maluku Utara', '0000-00-00'),
(91, 'Papua Barat', '0000-00-00'),
(92, 'Papua', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `rencana_pembangunan`
--

CREATE TABLE `rencana_pembangunan` (
  `id_rencana_pembangunan` int(11) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `sumber_dana_pemerintah` int(50) NOT NULL,
  `sumber_dana_provinsi` int(50) NOT NULL,
  `sumber_dana_kota` int(50) NOT NULL,
  `sumber_dana_swadaya` int(50) NOT NULL,
  `pelaksana` varchar(100) NOT NULL,
  `manfaat` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rencana_pembangunan`
--

INSERT INTO `rencana_pembangunan` (`id_rencana_pembangunan`, `nama_proyek`, `lokasi`, `sumber_dana_pemerintah`, `sumber_dana_provinsi`, `sumber_dana_kota`, `sumber_dana_swadaya`, `pelaksana`, `manfaat`, `keterangan`, `tanggal_data`) VALUES
(1, 'Pembangunan Jalan', 'Kendron', 2000000000, 2000000000, 2000000000, 2000000000, 'Dadang', 'Untuk jalan umum', 'dilaksanakan tahun depan 2017', '0000-00-00'),
(3, 'a', 'a', 2, 2, 2, 2, 'a', 'a', 'a', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id_struktur_organisasi` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` bigint(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id_struktur_organisasi`, `nama_jabatan`, `nama`, `nip`, `tanggal_data`) VALUES
(1, 'KEPALA', 'FAKHRUDIN, S.Kom', 23445455656, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `id_master_surat` int(50) NOT NULL,
  `no_surat` int(14) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `id_penduduk` int(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `id_kematian` int(100) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `id_master_surat`, `no_surat`, `tanggal_surat`, `id_penduduk`, `url`, `id_kematian`, `keterangan`, `tanggal_data`) VALUES
(7, 1, 2147483647, '2020-05-26', 33, 'laporan_surat_domisili', 0, '', '0000-00-00'),
(10, 1, 2147483647, '2020-05-26', 2, 'laporan_surat_domisili', 0, '', '0000-00-00'),
(11, 7, 2147483647, '2020-05-26', 2, 'laporan_surat_KTP', 0, '', '0000-00-00'),
(16, 3, 2147483647, '2020-05-26', 2, 'laporan_surat_tidak_mampu', 0, '', '0000-00-00'),
(17, 9, 2147483647, '2020-05-26', 2, 'laporan_surat_berkelakuan_baik', 0, 'Daftar Sekolah', '0000-00-00'),
(18, 9, 2066075903, '2020-01-01', 2, 'laporan_surat_berkelakuan_baik', 0, 'masuk sekolah', '0000-00-00'),
(19, 1, 2067084431, '2011-01-01', 2, 'laporan_surat_domisili', 0, NULL, '0000-00-00'),
(20, 1, 2067112919, '2020-04-04', 2, 'laporan_surat_domisili', 0, NULL, '0000-00-00'),
(21, 9, 2068060433, '2020-02-20', 2, 'laporan_surat_berkelakuan_baik', 0, 'a', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tanah_desa`
--

CREATE TABLE `tanah_desa` (
  `id_tanah_desa` int(11) NOT NULL,
  `nama_perorangan` varchar(100) NOT NULL,
  `badan_hukum` varchar(100) NOT NULL,
  `jumlah_luas_tanah` varchar(100) NOT NULL,
  `sertifikasi` varchar(10) NOT NULL,
  `hm` int(11) NOT NULL,
  `hgb` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  `hgu` int(11) NOT NULL,
  `hpl` int(11) NOT NULL,
  `ma` int(11) NOT NULL,
  `vi` int(11) NOT NULL,
  `tn` int(11) NOT NULL,
  `tanah_rumah` int(11) NOT NULL,
  `tanah_perorangan` int(11) NOT NULL,
  `tanah_perdagangan` int(11) NOT NULL,
  `tanah_perkantoran` int(11) NOT NULL,
  `tanah_industri` int(11) NOT NULL,
  `tanah_fasilitas_umum` int(11) NOT NULL,
  `tanah_sawah` int(11) NOT NULL,
  `tanah_tegalan` int(11) NOT NULL,
  `tanah_perkebunan` int(11) NOT NULL,
  `tanah_pertenakan` int(11) NOT NULL,
  `tanah_hutan` int(11) NOT NULL,
  `tanah_kosong` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanah_desa`
--

INSERT INTO `tanah_desa` (`id_tanah_desa`, `nama_perorangan`, `badan_hukum`, `jumlah_luas_tanah`, `sertifikasi`, `hm`, `hgb`, `hp`, `hgu`, `hpl`, `ma`, `vi`, `tn`, `tanah_rumah`, `tanah_perorangan`, `tanah_perdagangan`, `tanah_perkantoran`, `tanah_industri`, `tanah_fasilitas_umum`, `tanah_sawah`, `tanah_tegalan`, `tanah_perkebunan`, `tanah_pertenakan`, `tanah_hutan`, `tanah_kosong`, `keterangan`, `tanggal_data`) VALUES
(1, 'Nunung', 'Badan Hukum A', '200', 'Ada', 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 'Tidak ada', '0000-00-00'),
(3, 'ab', 'ab', 'ab', 'Ada', 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 'aa', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tkd`
--

CREATE TABLE `tkd` (
  `id_tkd` int(11) NOT NULL,
  `asal_tkd` varchar(100) NOT NULL,
  `nomor_sertifikat` int(11) NOT NULL,
  `luas` int(11) NOT NULL,
  `klas` varchar(50) NOT NULL,
  `pemilik` varchar(50) NOT NULL,
  `tanggal_amd` date NOT NULL,
  `bantuan_pemerintah` varchar(100) NOT NULL,
  `tanggal_bantuan_pemerintah` date NOT NULL,
  `bantuan_provinsi` varchar(100) NOT NULL,
  `tanggal_bantuan_provinsi` date NOT NULL,
  `bantuan_kabupaten` varchar(100) NOT NULL,
  `tanggal_bantuan_kabupaten` date NOT NULL,
  `lain_lain` varchar(100) NOT NULL,
  `tanggal_bantuan_lain` date NOT NULL,
  `jumlah_tkd_sawah` int(11) NOT NULL,
  `jumlah_tkd_tegalan` int(11) NOT NULL,
  `jumlah_tkd_kebun` int(11) NOT NULL,
  `jumlah_tkd_tambak` int(11) NOT NULL,
  `jumlah_tkd_tanah` int(11) NOT NULL,
  `patok_tanda_batas` varchar(10) NOT NULL,
  `papan_nama` varchar(10) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `peruntukan` varchar(100) NOT NULL,
  `file_dokumen` varchar(100) NOT NULL,
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkd`
--

INSERT INTO `tkd` (`id_tkd`, `asal_tkd`, `nomor_sertifikat`, `luas`, `klas`, `pemilik`, `tanggal_amd`, `bantuan_pemerintah`, `tanggal_bantuan_pemerintah`, `bantuan_provinsi`, `tanggal_bantuan_provinsi`, `bantuan_kabupaten`, `tanggal_bantuan_kabupaten`, `lain_lain`, `tanggal_bantuan_lain`, `jumlah_tkd_sawah`, `jumlah_tkd_tegalan`, `jumlah_tkd_kebun`, `jumlah_tkd_tambak`, `jumlah_tkd_tanah`, `patok_tanda_batas`, `papan_nama`, `lokasi`, `peruntukan`, `file_dokumen`, `tanggal_data`) VALUES
(2, 'Asal TMD', 1, 1, '1', 'Pemilik Desa', '2020-04-10', 'Bantuan', '2020-04-15', 'Bantuan', '2020-04-23', 'Bantuan', '2020-04-09', 'a', '2020-04-09', 1, 1, 1, 1, 1, 'Ada', 'Ada', 'a', 'a', 'a', '0000-00-00'),
(4, 'a', 2, 2, '2', 'desa', '2020-02-20', 'a', '2020-02-20', 'a', '2020-02-20', 'a', '2020-02-20', 'a', '2020-02-20', 1, 1, 1, 1, 1, 'Ada', 'Ada', 'a', 'a', 'avatar.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `tanggal_data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `foto`, `level`, `status`, `tanggal_data`) VALUES
(1, 'admin', 'admin', '$2y$10$.J/pQ./HxJEhpyuZyGmzhuoCFKuwh1oCQIYvDgD4cwfPPkvhtU1sS', 'avatar.png', 'Admin', '1', '0000-00-00'),
(10, 'b', 'b', '$2y$10$qncNw2NqDbFxQjj6rTdHoeSfDxIDP3Ejc/QRWZBsM6uCnTqrsNmvm', 'avatar.jpg', 'Admin', '1', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_bpd`
--
ALTER TABLE `anggota_bpd`
  ADD PRIMARY KEY (`id_anggota_bpd`);

--
-- Indexes for table `aparat`
--
ALTER TABLE `aparat`
  ADD PRIMARY KEY (`id_aparat`);

--
-- Indexes for table `dusun`
--
ALTER TABLE `dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `ekspedisi_bpd`
--
ALTER TABLE `ekspedisi_bpd`
  ADD PRIMARY KEY (`id_ekspedisi_bpd`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `inventaris_proyek`
--
ALTER TABLE `inventaris_proyek`
  ADD PRIMARY KEY (`id_inventaris_proyek`);

--
-- Indexes for table `kader_pembangunan`
--
ALTER TABLE `kader_pembangunan`
  ADD PRIMARY KEY (`id_kader_pembangunan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kegiatan_bpd`
--
ALTER TABLE `kegiatan_bpd`
  ADD PRIMARY KEY (`id_kegiatan_bpd`);

--
-- Indexes for table `kegiatan_pembangunan`
--
ALTER TABLE `kegiatan_pembangunan`
  ADD PRIMARY KEY (`id_kegiatan_pembangunan`);

--
-- Indexes for table `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id_kematian`);

--
-- Indexes for table `kepala_desa`
--
ALTER TABLE `kepala_desa`
  ADD PRIMARY KEY (`id_kepala_desa`);

--
-- Indexes for table `keputusan_bpd`
--
ALTER TABLE `keputusan_bpd`
  ADD PRIMARY KEY (`id_keputusan_bpd`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `master_surat`
--
ALTER TABLE `master_surat`
  ADD PRIMARY KEY (`id_master_surat`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_nontifikasi`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
  ADD PRIMARY KEY (`id_peraturan_desa`);

--
-- Indexes for table `pindah_kependudukan`
--
ALTER TABLE `pindah_kependudukan`
  ADD PRIMARY KEY (`id_pindah_kependudukan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`) USING BTREE;

--
-- Indexes for table `rencana_pembangunan`
--
ALTER TABLE `rencana_pembangunan`
  ADD PRIMARY KEY (`id_rencana_pembangunan`);

--
-- Indexes for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`id_struktur_organisasi`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `tanah_desa`
--
ALTER TABLE `tanah_desa`
  ADD PRIMARY KEY (`id_tanah_desa`);

--
-- Indexes for table `tkd`
--
ALTER TABLE `tkd`
  ADD PRIMARY KEY (`id_tkd`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_bpd`
--
ALTER TABLE `anggota_bpd`
  MODIFY `id_anggota_bpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `aparat`
--
ALTER TABLE `aparat`
  MODIFY `id_aparat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ekspedisi_bpd`
--
ALTER TABLE `ekspedisi_bpd`
  MODIFY `id_ekspedisi_bpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventaris_proyek`
--
ALTER TABLE `inventaris_proyek`
  MODIFY `id_inventaris_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kader_pembangunan`
--
ALTER TABLE `kader_pembangunan`
  MODIFY `id_kader_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kegiatan_bpd`
--
ALTER TABLE `kegiatan_bpd`
  MODIFY `id_kegiatan_bpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kegiatan_pembangunan`
--
ALTER TABLE `kegiatan_pembangunan`
  MODIFY `id_kegiatan_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kepala_desa`
--
ALTER TABLE `kepala_desa`
  MODIFY `id_kepala_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keputusan_bpd`
--
ALTER TABLE `keputusan_bpd`
  MODIFY `id_keputusan_bpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_surat`
--
ALTER TABLE `master_surat`
  MODIFY `id_master_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_nontifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
  MODIFY `id_peraturan_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pindah_kependudukan`
--
ALTER TABLE `pindah_kependudukan`
  MODIFY `id_pindah_kependudukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `rencana_pembangunan`
--
ALTER TABLE `rencana_pembangunan`
  MODIFY `id_rencana_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id_struktur_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tanah_desa`
--
ALTER TABLE `tanah_desa`
  MODIFY `id_tanah_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tkd`
--
ALTER TABLE `tkd`
  MODIFY `id_tkd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
