-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 27 Sep 2015 pada 01.30
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `addressbook`
--

CREATE TABLE IF NOT EXISTS `addressbook` (
  `id_address` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `province` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `addressbook`
--

INSERT INTO `addressbook` (`id_address`, `customer_id`, `name`, `phone_number`, `address`, `province`, `city`) VALUES
(1, 1, 'zakky', '089663475666', 'kp.sawah', 'california', 'london'),
(2, 1, 'gjhack13', '089663475666', 'london', 'banten', 'jero sumur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `rule` varchar(25) NOT NULL,
  `last_login_time` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`, `rule`, `last_login_time`) VALUES
(10, 'zakkyfirdaus97@yahoo.co.id', 'gjhack13', '25d55ad283aa400af464c76d713c07ad', 'root', '2015-09-22 17:58:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `cart_code` varchar(555) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `qty`, `cart_code`) VALUES
(229, 6, 1, 'CC3RTIAS-PKVXQ9AN'),
(230, 4, 1, 'CC3RTIAS-PKVXQ9AN'),
(231, 4, 1, 'AGEVTHKM-Q3BYOTAU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(555) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Product 1'),
(2, 'Product 2'),
(3, 'Product 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `confirm_payment`
--

CREATE TABLE IF NOT EXISTS `confirm_payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_code` varchar(17) NOT NULL,
  `text_detail` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `confirm_payment`
--

INSERT INTO `confirm_payment` (`id`, `order_id`, `order_code`, `text_detail`) VALUES
(1, 0, '1022023', '666#gjhack13#MANDIRI 1234-5678-901 a.n onshop#5121222'),
(2, 0, '1442043', 'gjhack#whoami#MANDIRI 1234-5678-901 a.n onshop#5121222'),
(3, 0, '1054353', 'gjhack#whoami#BRI 12345-6789-012 a.n onshop#5121222'),
(4, 0, '1343454', 'gjhack#whoami#MANDIRI 1234-5678-901 a.n onshop#5121222'),
(5, 0, '1200544', 'gjhack#whoami#BRI 12345-6789-012 a.n onshop#5121222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(57) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `email`, `password`) VALUES
(1, 'g_jHACK13', 'zakkyfirdaus97@yahoo.co.id', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `id` int(11) NOT NULL,
  `order_code` varchar(13) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `order_code`, `order_id`, `product_id`, `qty`, `subtotal`) VALUES
(1, '1022023', 1, 4, 2, 300000),
(2, '1442043', 2, 4, 1, 150000),
(3, '1054353', 3, 9, 1, 500000),
(4, '1343454', 4, 4, 2, 300000),
(5, '1200544', 5, 4, 1, 150000),
(6, '1320255', 6, 4, 1, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `order_code` varchar(17) NOT NULL,
  `order_date` date NOT NULL,
  `id_address` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bank_transfer` varchar(50) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `order_date`, `id_address`, `customer_id`, `bank_transfer`, `payment_status`) VALUES
(1, '1022023', '2015-09-18', 1, 1, 'BRI 12345-6789-012 a.n gjhack13', 1),
(2, '1442043', '2015-09-18', 1, 1, 'MANDIRI 1234-5678-901 a.n gjhack13', 1),
(3, '1054353', '2015-09-19', 1, 1, 'BCA 1234-567-890 a.n gjhack13', 1),
(4, '1343454', '2015-09-22', 2, 1, 'MANDIRI 1234-5678-901 a.n onshop', 1),
(5, '1200544', '2015-09-22', 2, 1, 'MANDIRI 1234-5678-901 a.n onshop', 1),
(6, '1320255', '2015-09-22', 1, 1, 'BCA 1234-567-890 a.n onshop', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(555) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(555) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `product_name`, `category_id`, `price`, `description`, `image`) VALUES
(1, 'Product 1', 1, 500000, '<p>Silahkan anda masukkan teks disini.<br> Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>', 'ak.png'),
(2, 'Product 2', 2, 250000, '<p>Silahkan anda masukkan teks disini.<br> Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>', 'kawai.png'),
(3, 'Product 3', 3, 150000, '<p>Silahkan anda masukkan teks disini.<br> Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>', 'madaraobito.png'),
(4, 'Product 4', 1, 150000, '<p>Silahkan anda masukkan teks disini.<br> Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>', 'pn.png'),
(5, 'Product 5', 2, 250000, '<p>Silahkan anda masukkan teks disini.<br> Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>', 'pnh.png'),
(6, 'Product 6', 3, 350000, '<p>Silahkan anda masukkan teks disini.<br> Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>', 'vs.png'),
(7, 'Product 7', 3, 350000, '<p>Silahkan anda masukkan teks disini.<br> Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>', 'kawai.png'),
(8, 'Product 8', 2, 250000, '<p>Silahkan anda masukkan teks disini.<br> Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>', 'pn.png'),
(9, 'Product 9', 1, 500000, '<p>Silahkan anda masukkan teks disini.<br> Detail ataupun keterangan dari suatu produk yang akan anda jual pada website ini.</p>', 'ak.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addressbook`
--
ALTER TABLE `addressbook`
  ADD PRIMARY KEY (`id_address`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addressbook`
--
ALTER TABLE `addressbook`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
