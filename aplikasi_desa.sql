-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 03:48 AM
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
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_bpd`
--

INSERT INTO `anggota_bpd` (`id_anggota_bpd`, `nama`, `nomor_anggota`, `nip`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pangkat`, `jabatan`, `pendidikan_terakhir`, `tanggal_pengangkatan`, `nomor_pengangkatan`, `tanggal_pemberhentian`, `nomor_pemberhentian`, `keaktifan`, `keterangan`, `foto`) VALUES
(1, 'anggota 1', 123, 1223, 'Laki - Laki', 'Jakarta', '2020-04-13', 'Islam', 'Pangkat 1', 'Jabatan 1', 'SMA', '2020-04-13', 123, '2020-04-13', 33543, '1', 'keterangan', '');

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
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aparat`
--

INSERT INTO `aparat` (`id_aparat`, `nama_lengkap`, `niap`, `nip`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `pangkat`, `jabatan`, `pendidikan_terakhir`, `tanggal_pengangkatan`, `nomor_pengangkatan`, `tanggal_pemberhentian`, `nomor_pemberhentian`, `keaktifan`, `keterangan`, `foto`) VALUES
(1, 'Nunung', 234, 1212, '1', 'Cikarang', '2020-04-09', 'Islam', 'Satpam', 'Kepala Satpam', 'SMA', '2020-04-09', 45453, '2020-04-09', 33543, '1', 'terte', '');

-- --------------------------------------------------------

--
-- Table structure for table `dusun`
--

CREATE TABLE `dusun` (
  `id_dusun` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nama_dusun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dusun`
--

INSERT INTO `dusun` (`id_dusun`, `id_kelurahan`, `nama_dusun`) VALUES
(1, 1, 'dusun kab aceh'),
(2, 2, 'dusun kota banten'),
(3, 1, 'dusun kota banten'),
(4, 1, 'dusun kota banten'),
(5, 2, 'dusun kota banten'),
(7, 8, 'Bogeg'),
(8, 9, 'Babakan'),
(9, 9, 'Kebon Gedang'),
(10, 10, 'Ciawi');

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
  `file_dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekspedisi`
--

INSERT INTO `ekspedisi` (`id_ekspedisi`, `tanggal_surat`, `tanggal_pengiriman`, `nomor_surat`, `isi_singkat`, `tujuan`, `keterangan`, `file_dokumen`) VALUES
(1, '2020-04-09', '2020-04-09', 2342341, 'Berkas Penduduk1', 'Jl. Raya Cikarang Cibarusah cikarang Selatan Bekasi1', 'ok1', '');

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
  `file_dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekspedisi_bpd`
--

INSERT INTO `ekspedisi_bpd` (`id_ekspedisi_bpd`, `tanggal_pengiriman`, `tanggal_surat`, `nomor_surat`, `isi_singkat`, `tujuan`, `keterangan`, `file_dokumen`) VALUES
(1, '2020-04-13', '2020-04-14', '234234', 'Berkas Penduduk', 'Cikarang Selatan', 'keterangan', '');

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
  `lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_desa`, `provinsi`, `no_telepon`, `website`, `logo`, `kecamatan`, `alamat`, `no_fax`, `format_waktu`, `jenis_pemerintahan`, `jenis_pemerintahan_desa`, `kabupaten_kota`, `kode_pos`, `email`, `jenis_kecamatan`, `lokasi`) VALUES
(1, 'Sukamakmur', 'Jawa Barat', '02348888888', 'www.desasukamakmur.com', 'avatar.jpg', 'Sukamakmur', 'Jl. Sukamakmur', 234999999, 'WIB', 'Kota', 'Desa', 'Bogor', 16830, 'admin@sumurademtimur.com', 'Kecamatan', '//www.google.com/maps/d/embed?mid=1Wnpto9TH1rSsskb6OFJiBPOWlLtsyxXf');

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
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama_barang`, `asal_barang`, `keadaan_awal_tahun`, `jumlah_kondisi_baik`, `jumlah_kondisi_rusak`, `jumlah_penghapusan_rusak`, `jumlah_penghapusan_dijual`, `jumlah_penghapusan_disumbangkan`, `tanggal_penghapusan`, `keadaan_barang_akhir_tahun`, `keterangan`) VALUES
(1, 'Mesin Pompa Air', 'Hibah Kecamatan Palimanan', 'Rusak', 2, 1, 1, 2, 1, '2020-04-09', 'Rusak', 'Keterangan');

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
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventaris_proyek`
--

INSERT INTO `inventaris_proyek` (`id_inventaris_proyek`, `nama_proyek`, `volume`, `lokasi`, `biaya`, `keterangan`) VALUES
(1, 'Pembangunan Jalan', '30', 'Kendron', 1000000, 'ok');

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
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kader_pembangunan`
--

INSERT INTO `kader_pembangunan` (`id_kader_pembangunan`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `pendidikan_terakhir`, `pekerjaan`, `bidang`, `alamat`, `keterangan`, `foto`) VALUES
(1, 'ZAENAL MTAQIEN', 'Laki - Laki', 'Cikarang', '2020-04-10', 'SD', 'a', 'Pembangunan', 'Jl. Hasibuan', 'OK keterangan', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kota` int(50) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kota`, `nama_kecamatan`) VALUES
(1, 1, 'kec kab aceh'),
(2, 2, 'kec kota aceh'),
(3, 3, 'kec kab banten'),
(4, 4, 'kec kota banten'),
(6, 6, 'Sukra'),
(7, 6, 'Patrol'),
(8, 7, 'Palimanan'),
(9, 7, 'Ciwaringin');

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
  `file_dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_bpd`
--

INSERT INTO `kegiatan_bpd` (`id_kegiatan_bpd`, `tanggal`, `tentang`, `pelaksana`, `pokok`, `hasil_kegiatan`, `keterangan`, `file_dokumen`) VALUES
(1, '2020-04-13', 'tentang', 'carli', 'pokok pokok', 'hasil kegiatan', 'keterangan', '');

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
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_pembangunan`
--

INSERT INTO `kegiatan_pembangunan` (`id_kegiatan_pembangunan`, `sifat_proyek`, `nama_proyek`, `volume`, `lokasi`, `sumber_dana_pemerintah`, `sumber_dana_provinsi`, `sumber_dana_kota`, `sumber_dana_swadaya`, `pelaksana`, `waktu_pelaksanaan`, `keterangan`) VALUES
(1, 'baru', 'Pembangunan Jalan', '30', 'Kendron', 1, 1, 1, 1, 'Dadang', '2020-04-10', 'a');

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
(10, 35, 123, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(50) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`) VALUES
(1, 1, 'kel kec kab aceh'),
(2, 2, 'kel kec kota banten'),
(3, 3, 'kel kec kab banten'),
(4, 4, 'kel kec kota banten'),
(5, 4, 'kel kec kota banten 2'),
(7, 6, 'Sumuradem Timur'),
(8, 6, 'Sumuradem'),
(9, 9, 'Ciwaringin'),
(10, 8, 'Palimanan');

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
  `tempat_pemakaman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `id_penduduk`, `umur`, `tanggal_meninggal`, `tempat_meninggal`, `sebab`, `keterangan`, `tanggal_pemakaman`, `tempat_pemakaman`) VALUES
(8, 34, 0, '1111-11-11', 'Bandung', 'Sakit', 'tidak ada', '1111-11-11', 'bandung');

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
  `file_dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepala_desa`
--

INSERT INTO `kepala_desa` (`id_kepala_desa`, `nomor_kepala_desa`, `tentang`, `uraian_singkat`, `nomor_dilaporkan`, `tanggal_dilaporkan`, `keterangan`, `file_dokumen`) VALUES
(1, 22, 'tentang', 'uraian singkat', 123, '2020-04-09', 'tidak ada', '');

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
  `file_dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keputusan_bpd`
--

INSERT INTO `keputusan_bpd` (`id_keputusan_bpd`, `nomor_keputusan`, `tanggal`, `tentang`, `uraian_singkat`, `keterangan`, `file_dokumen`) VALUES
(1, 345341, '2020-04-13', 'perjalana1', 'urian', 'keterangan', '');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `keterangan`, `harga`, `tanggal`) VALUES
(1, 'Pembelian Lampu Jalan', '356000', '2020-05-25'),
(2, 'Pembelian Peralatan Komputer', '5900000', '2020-05-25');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(10) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `nama_kota`) VALUES
(1, 1, 'kabupaten aceh'),
(2, 1, 'kota aceh'),
(3, 16, 'kabupaten banten'),
(4, 16, 'kota banten'),
(6, 12, 'Indramayu'),
(7, 12, 'Cirebon'),
(8, 13, 'Tegal');

-- --------------------------------------------------------

--
-- Table structure for table `master_surat`
--

CREATE TABLE `master_surat` (
  `id_master_surat` int(11) NOT NULL,
  `kode_surat` varchar(50) NOT NULL,
  `nama_surat_dinas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_surat`
--

INSERT INTO `master_surat` (`id_master_surat`, `kode_surat`, `nama_surat_dinas`) VALUES
(1, 'SRT0000001', 'DOMISILI'),
(2, 'SRT0000002', ' BELUM MENIKAH'),
(3, 'SRT0000003', ' TIDAK MAMPU /MISKIN'),
(6, 'SRT0000004', 'USAHA'),
(7, 'SRT0000005', 'KTP SEDANG DI PROSES'),
(8, 'SRT0000006', 'KEMATIAN'),
(9, 'SRT0000007', 'BERKELAKUAN BAIK');

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
  `tanggal_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`id_penduduk`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `pekerjaan`, `status_perkawinan`, `status_penduduk`, `status_dalam_keluarga`, `status_hidup`, `nik`, `no_kk`, `kewarganegaraan`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `dusun`, `rt`, `rw`, `alamat`, `kode_pos`, `no_telepon`, `pendidikan_terakhir`, `foto`, `nama_ibu`, `nama_bapak`, `tanggal_input`) VALUES
(2, 'WAHID ALIAS H. MAHSUN', 'SENGGIGI', '1999-01-01', 'Laki - Laki', 'Islam', 'WIRASWASTA', 'Belum Menikah', 'Pendatang', 'Ayah', 0, 5201140, 2147483647, 'indonesia', '1', '1', '1', '1', '3', '09', '09', 'Jl Adinegoro 1, Sumatera Utara', 15513, '08524685726', 'DIPLOMA', 'avatar53.png', 'mawar', 'budi', '2020-05-10'),
(4, 'ULFA WIDIAWATI', 'JOHAR PELITA', '1999-02-02', 'Perempuan', 'Islam', 'WIRASWASTA', 'Sudah Menikah', 'Tetap', 'Ibu', 0, 2147483647, 2147483647, 'indonesia', '1', '1', '1', '1', '3', '09', '09', 'Jl Ciledug Raya 61, Dki Jakarta', 14451, '0815647525', 'SARJANA', 'avatar53.png', 'SITIYAH', 'ZAMHARIN', '2020-05-10'),
(5, 'AHMAD ALLIF RIZKI', 'MANGSIT', '1999-02-15', 'Laki - Laki', 'Islam', 'BELUM/TIDAK BEKERJA', 'Cerai', 'Tetap', 'Ayah', 0, 2147483647, 2147483647, 'indonesia', '1', '1', '1', '1', '3', '09', '09', 'Jl Alkateri 23, Jawa Barat', 16551, '08547754525', 'DIPLOMA', 'avatar53.png', 'RUSDAH', 'AHLUL', '2020-05-01'),
(33, 'Budi', 'jakarta', '1111-11-11', 'Laki - Laki', 'Islam', 'belum bekerja', 'Belum Menikah', 'Pindah', 'Ayah', 0, 123, 123, 'indonesia', '1', '1', '1', '1', '1', '2', '3', 'jakarta', 112, '08124598', 'SD', 'avatar1.png', 'ibu budi', 'ayah budi', '2020-05-13'),
(34, 'Ridwan', 'Jakarta', '1111-11-11', 'Laki - Laki', 'Islam', 'Buruh', 'Belum Menikah', 'Tetap', 'Ayah', 1, 123, 223, 'Indonesia', '1', '1', '1', '1', '1', '2', '2', 'Jakarta', 112, '08142455', 'SD', 'avatar2.png', 'Ibu Ridwan', 'Bapak Ridwan', '2020-05-14'),
(35, 'Bayu', 'Jakarta', '2019-01-01', 'Laki - Laki', 'Islam', '', 'Belum Menikah', 'Tetap', 'Anak', 0, 0, 123, 'indonesia', '1', '1', '1', '1', '3', '09', '09', 'Jl Ciledug Raya 61, Dki Jakarta', 14451, '', '', '', 'ULFA WIDIAWATI', 'WAHID ALIAS H. MAHSUN', '2020-04-15');

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
  `file_dokumen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peraturan_desa`
--

INSERT INTO `peraturan_desa` (`id_peraturan_desa`, `nomor_peraturan_desa`, `tanggal_peraturan_desa`, `tentang`, `uraian_singkat`, `nomor_persetujuan_BPD`, `tanggal_persetujuan_BPD`, `nomor_dilaporkan`, `tanggal_dilaporkan`, `keterangan`, `file_dokumen`) VALUES
(1, 5446, '2020-04-08', 'ertert', 'erte', 123, '2020-04-08', 123, '2020-04-08', 'erte', 'erte');

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
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pindah_kependudukan`
--

INSERT INTO `pindah_kependudukan` (`id_pindah_kependudukan`, `id_penduduk`, `tanggal_pindah`, `alamat_pindahan`, `alamat_sebelumnya`, `keterangan`) VALUES
(9, 33, '2019-01-01', 'bandung', '0', 'tidak ada'),
(11, 34, '0000-00-00', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Riau'),
(5, 'Jambi'),
(6, 'Sumatera Selatan'),
(7, 'Bengkulu'),
(8, 'Lampung'),
(9, 'Kepulauan Bangka Belitung'),
(10, 'Kepulauan Riau'),
(11, 'DKI Jakarta'),
(12, 'Jawa Barat'),
(13, 'Jawa Tengah'),
(14, 'DI Yogyakarta'),
(15, 'Jawa Timur'),
(16, 'Banten'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(71, 'Sulawesi Utara'),
(72, 'Sulawesi Tengah'),
(73, 'Sulawesi Selatan'),
(74, 'Sulawesi Tenggara'),
(75, 'Gorontalo'),
(76, 'Sulawesi Barat'),
(81, 'Maluku'),
(82, 'Maluku Utara'),
(91, 'Papua Barat'),
(92, 'Papua');

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
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rencana_pembangunan`
--

INSERT INTO `rencana_pembangunan` (`id_rencana_pembangunan`, `nama_proyek`, `lokasi`, `sumber_dana_pemerintah`, `sumber_dana_provinsi`, `sumber_dana_kota`, `sumber_dana_swadaya`, `pelaksana`, `manfaat`, `keterangan`) VALUES
(1, 'Pembangunan Jalan', 'Kendron', 2000000000, 2000000000, 2000000000, 2000000000, 'Dadang', 'Untuk jalan umum', 'dilaksanakan tahun depan 2017');

-- --------------------------------------------------------

--
-- Table structure for table `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `id_struktur_organisasi` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nip` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`id_struktur_organisasi`, `nama_jabatan`, `nama`, `nip`) VALUES
(1, 'KEPALA', 'FAKHRUDIN, S.Kom', 23445455656);

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
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `id_master_surat`, `no_surat`, `tanggal_surat`, `id_penduduk`, `url`, `id_kematian`, `keterangan`) VALUES
(7, 1, 2147483647, '2019-01-01', 33, 'laporan_surat_domisili', 0, ''),
(10, 1, 2147483647, '2019-01-01', 2, 'laporan_surat_domisili', 0, ''),
(11, 7, 2147483647, '2021-01-01', 2, 'laporan_surat_KTP', 0, ''),
(16, 3, 2147483647, '2030-03-23', 2, 'laporan_surat_tidak_mampu', 0, ''),
(17, 9, 2147483647, '2019-01-02', 2, 'laporan_surat_berkelakuan_baik', 0, 'Daftar Sekolah');

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
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanah_desa`
--

INSERT INTO `tanah_desa` (`id_tanah_desa`, `nama_perorangan`, `badan_hukum`, `jumlah_luas_tanah`, `sertifikasi`, `hm`, `hgb`, `hp`, `hgu`, `hpl`, `ma`, `vi`, `tn`, `tanah_rumah`, `tanah_perorangan`, `tanah_perdagangan`, `tanah_perkantoran`, `tanah_industri`, `tanah_fasilitas_umum`, `tanah_sawah`, `tanah_tegalan`, `tanah_perkebunan`, `tanah_pertenakan`, `tanah_hutan`, `tanah_kosong`, `keterangan`) VALUES
(1, 'Nunung', 'Badan Hukum A', '200', 'Ada', 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 'Tidak ada');

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
  `file_dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkd`
--

INSERT INTO `tkd` (`id_tkd`, `asal_tkd`, `nomor_sertifikat`, `luas`, `klas`, `pemilik`, `tanggal_amd`, `bantuan_pemerintah`, `tanggal_bantuan_pemerintah`, `bantuan_provinsi`, `tanggal_bantuan_provinsi`, `bantuan_kabupaten`, `tanggal_bantuan_kabupaten`, `lain_lain`, `tanggal_bantuan_lain`, `jumlah_tkd_sawah`, `jumlah_tkd_tegalan`, `jumlah_tkd_kebun`, `jumlah_tkd_tambak`, `jumlah_tkd_tanah`, `patok_tanda_batas`, `papan_nama`, `lokasi`, `peruntukan`, `file_dokumen`) VALUES
(2, 'Asal TMD', 1, 1, '1', 'Pemilik Desa', '2020-04-10', 'Bantuan', '2020-04-15', 'Bantuan', '2020-04-23', 'Bantuan', '2020-04-09', 'a', '2020-04-09', 1, 1, 1, 1, 1, 'Ada', 'Ada', 'a', 'a', 'a');

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
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `foto`, `level`, `status`) VALUES
(1, 'admin', 'admin', '$2y$10$.J/pQ./HxJEhpyuZyGmzhuoCFKuwh1oCQIYvDgD4cwfPPkvhtU1sS', 'avatar.png', 'Admin', '1');

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
  MODIFY `id_anggota_bpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `aparat`
--
ALTER TABLE `aparat`
  MODIFY `id_aparat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dusun`
--
ALTER TABLE `dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ekspedisi`
--
ALTER TABLE `ekspedisi`
  MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventaris_proyek`
--
ALTER TABLE `inventaris_proyek`
  MODIFY `id_inventaris_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kader_pembangunan`
--
ALTER TABLE `kader_pembangunan`
  MODIFY `id_kader_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_kegiatan_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id_kematian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kepala_desa`
--
ALTER TABLE `kepala_desa`
  MODIFY `id_kepala_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keputusan_bpd`
--
ALTER TABLE `keputusan_bpd`
  MODIFY `id_keputusan_bpd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `penduduk`
--
ALTER TABLE `penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `peraturan_desa`
--
ALTER TABLE `peraturan_desa`
  MODIFY `id_peraturan_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pindah_kependudukan`
--
ALTER TABLE `pindah_kependudukan`
  MODIFY `id_pindah_kependudukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `rencana_pembangunan`
--
ALTER TABLE `rencana_pembangunan`
  MODIFY `id_rencana_pembangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `id_struktur_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tanah_desa`
--
ALTER TABLE `tanah_desa`
  MODIFY `id_tanah_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tkd`
--
ALTER TABLE `tkd`
  MODIFY `id_tkd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
