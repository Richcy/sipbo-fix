-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 08:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'richcy', 'richcy', 'richcy dian sukma');

-- --------------------------------------------------------

--
-- Table structure for table `histori_pembelian`
--

CREATE TABLE `histori_pembelian` (
  `id_histori` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `kode_transaksi` varchar(8) NOT NULL,
  `jumlah_pembelian` int(11) NOT NULL,
  `jumlah_liter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `isi_saldo`
--

CREATE TABLE `isi_saldo` (
  `id_isisaldo` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pengisian` date NOT NULL,
  `jumlah_isisaldo` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_saldo`
--

INSERT INTO `isi_saldo` (`id_isisaldo`, `id_pelanggan`, `tanggal_pengisian`, `jumlah_isisaldo`, `total_harga`) VALUES
(1, 4, '0000-00-00', 12000, 12600),
(2, 4, '0000-00-00', 45000, 47250),
(3, 4, '0000-00-00', 800000, 804000),
(4, 4, '0000-00-00', 700000, 703500),
(5, 4, '0000-00-00', 800000, 804000),
(6, 4, '2019-01-03', 1000000, 1005000),
(7, 4, '2019-01-03', 0, 0),
(8, 4, '2019-01-03', 80000, 80400),
(9, 4, '2019-01-03', 15000, 15075);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 50000),
(2, 'Bandung', 25000),
(3, 'Cianjur', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `saldo` int(11) NOT NULL,
  `foto_pelanggan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `saldo`, `foto_pelanggan`) VALUES
(1, 'angela@gmail.com', 'angela', 'angela support', '085912345678', '', 500000, 'download (2).jpg'),
(2, 'gusion@gmail.com', 'gusion', 'gusion assassin mage', '08112345678', '', 780000, 'download (3).jpg'),
(3, 'dasd@sdfd.cedf', 'asd', 'ds', 'asd', 'asdas', 10000000, 'download.jpg'),
(4, 'richcyveliz@gmail.com', 'h312mant00051104', 'Richcy Dian Sukma', '085956697701', '                                                                                                        Jl.Teluk Buyung no. 3  RT. 003 RW. 003 \r\nKelurahan Arjuna\r\nKecamatan Cicendo\r\nKota Bandung                                                                                                        ', 1315000, 'product_8.jpg'),
(5, 'wefwef', 'asd', 'efef', 'wefewf', 'wefew', 0, ''),
(6, 'sdfds', '123', 'edf', 'sdfsdfdfd', 'dsdssf', 0, ''),
(7, 'richcyveliz@yahoo.com', 'password', 'richcy', '085956697701', 'cileunyi', 0, ''),
(8, 'anjanyrisqiati@gmail.com', 'anjany22', 'anjany', '08347242', '                          ahdjad                          ', 0, '4s.png'),
(9, 'apaweh@apaweh.com', 'apaweh', 'apaweh', '000011112222', '                                                    apaajaweh                                                    ', 0, 'banner022.jpg'),
(10, 'tester@tester.com', 'tester', 'tester', '12345678901', 'tester', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `kode_transaksi` varchar(8) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `total_liter` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_produk`, `tanggal_pembelian`, `kode_transaksi`, `total_pembelian`, `total_liter`) VALUES
(1, 1, 0, '2018-05-19', '', 600000, 0),
(2, 1, 0, '2018-05-20', '', 3300000, 0),
(3, 1, 0, '2018-05-23', '', 3325000, 0),
(4, 1, 0, '2018-05-23', '', 3325000, 0),
(5, 1, 0, '2018-05-23', '', 3325000, 0),
(6, 1, 0, '2018-05-23', '', 3325000, 0),
(7, 1, 0, '2018-05-23', '', 3325000, 0),
(8, 1, 0, '2018-05-23', '', 3325000, 0),
(9, 1, 0, '2018-05-23', '', 3325000, 0),
(10, 1, 0, '2018-05-23', '', 3325000, 0),
(11, 1, 0, '2018-05-24', '', 3350000, 0),
(12, 2, 0, '2018-05-24', '', 3775000, 0),
(13, 2, 0, '2018-05-24', '', 500000, 0),
(14, 2, 0, '2018-05-24', '', 3310000, 0),
(15, 2, 0, '2018-05-24', '', 3325000, 0),
(16, 2, 0, '2018-05-24', '', 3325000, 0),
(17, 2, 0, '2018-05-24', '', 3910000, 0),
(18, 2, 0, '2018-05-24', '', 650000, 0),
(19, 2, 0, '2018-05-24', '', 350000, 0),
(20, 4, 0, '2018-05-24', '', 3750000, 0),
(21, 0, 3, '2019-01-03', '87O95MUI', 4, 0),
(22, 4, 4, '2019-01-03', 'KqBsHqJp', 15, 0),
(23, 4, 2, '2019-01-03', 'SfG5uXEu', 45000, 0),
(24, 4, 1, '2019-01-03', 'QxYOPamd', 150000, 0),
(25, 9, 2, '2019-01-03', 'bZXqVPYc', 624000, 0),
(26, 9, 3, '2019-01-03', 'tm2buakj', 89500, 0),
(27, 9, 4, '2019-01-03', 'bxaDGDJy', 60000, 0),
(28, 4, 2, '2019-01-03', 'Mvxc6gpk', 360000, 45),
(29, 4, 3, '2019-01-03', 'e8FloU6M', 78000, 10),
(30, 4, 3, '2019-01-03', 'FZLFJPnH', 67897, 9.05293),
(31, 4, 0, '2019-01-03', 'iAtRzVh4', 100000, 12.5),
(32, 4, 0, '2019-01-03', 'Qgr47qNU', 235000, 29.375),
(33, 4, 0, '2019-01-03', '4oJLhIvj', 98000, 12.25),
(34, 4, 4, '2019-01-03', 'QD36BVX1', 12000, 2),
(35, 4, 1, '2019-01-03', 'H7HVnYuc', 100000, 10),
(36, 4, 3, '2019-01-03', 'snPpi4MR', 60000, 8),
(37, 4, 0, '2019-01-03', 'Lo36nNC1', 0, 0),
(38, 4, 0, '2019-01-03', 'rNzxoIO9', 0, 0),
(39, 4, 0, '2019-01-03', 'aSsjx16d', 0, 0),
(40, 4, 2, '2019-01-03', 'AFi3rwKG', 90000, 11.25),
(41, 4, 1, '2019-01-03', 'PbNVJQnR', 90000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 1, '', 0, 0, 0, 0),
(2, 1, 2, 1, '', 0, 0, 0, 0),
(9, 10, 1, 1, '', 0, 0, 0, 0),
(10, 10, 2, 1, '', 0, 0, 0, 0),
(11, 10, 4, 1, '', 0, 0, 0, 0),
(12, 11, 4, 2, '', 0, 0, 0, 0),
(13, 11, 3, 1, '', 0, 0, 0, 0),
(14, 11, 2, 1, '', 0, 0, 0, 0),
(15, 12, 1, 2, '', 0, 0, 0, 0),
(16, 12, 3, 1, '', 0, 0, 0, 0),
(17, 12, 4, 1, '', 0, 0, 0, 0),
(18, 12, 2, 1, '', 0, 0, 0, 0),
(19, 13, 1, 1, '', 0, 0, 0, 0),
(20, 13, 3, 1, '', 0, 0, 0, 0),
(21, 16, 1, 1, 'sepatu mantep', 250000, 300, 300, 250000),
(22, 16, 4, 1, 'sarung murah', 25000, 150, 150, 25000),
(23, 16, 2, 1, 'HP Oppo F1S', 3000000, 500, 500, 3000000),
(24, 17, 1, 2, 'sepatu mantep', 300000, 300, 600, 600000),
(25, 17, 4, 1, 'sarung murah', 25000, 150, 150, 25000),
(26, 17, 2, 1, 'HP Oppo F1S', 3000000, 500, 500, 3000000),
(27, 17, 3, 1, 'Kipas Angin Maspion', 250000, 1000, 1000, 250000),
(28, 18, 1, 2, 'sepatu mantep', 300000, 300, 600, 600000),
(29, 19, 1, 1, 'sepatu mantep', 300000, 300, 300, 300000),
(30, 19, 4, 1, 'sarung murah', 25000, 150, 150, 25000),
(31, 20, 2, 1, 'HP Oppo F1S', 3000000, 500, 500, 3000000),
(32, 20, 1, 2, 'sepatu mantep', 300000, 300, 600, 600000),
(33, 20, 4, 5, 'sarung murah', 25000, 150, 750, 125000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `kode_transaksi` varchar(8) NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `total_liter` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_produk`, `tanggal_pemesanan`, `kode_transaksi`, `total_pembelian`, `total_liter`) VALUES
(1, 0, '2019-01-03', 'aFx1nGSB', 0, 0),
(2, 0, '2019-01-03', 'vzRSdlEw', 0, 0),
(3, 2, '2019-01-03', '7PwMX9tp', 90000, 11),
(4, 4, '2019-01-03', 'cBRj1zDb', 70900, 11.8167);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 'Pertamax', 10000, 300, 'pertamax2.jpg', 'Pertamax'),
(2, 'Premium', 8000, 500, 'premiumm.jpg', 'premium'),
(3, 'Pertalite', 7500, 150, 'pertalite.jpg', 'pertalite	'),
(4, 'Solar', 6000, 200, 'solar.jpg', '		solar		');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `histori_pembelian`
--
ALTER TABLE `histori_pembelian`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indexes for table `isi_saldo`
--
ALTER TABLE `isi_saldo`
  ADD PRIMARY KEY (`id_isisaldo`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `histori_pembelian`
--
ALTER TABLE `histori_pembelian`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isi_saldo`
--
ALTER TABLE `isi_saldo`
  MODIFY `id_isisaldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
