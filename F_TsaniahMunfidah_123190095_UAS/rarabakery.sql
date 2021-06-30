-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2021 at 04:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rarabakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `jumlah`) VALUES
(29, 11, 23, 2),
(30, 11, 14, 1),
(32, 11, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `method` varchar(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `name`, `address`, `method`, `total`) VALUES
(3, 'Noah Beck', 'jln. Senopati No 10, kec keby baru, jakarta selatan, 55512', 'Tranfer Bank', 390000),
(7, 'Nailea Devora', 'Jl.Cangu No 12, Cangu, Bali, 43324', 'E-wallet', 240000),
(8, 'Vinnie Hacker', 'jl.District 8 No 17, Blok M, Jakarta Selatan, 55123', 'Tranfer Bank', 155000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(6) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `foto`, `category`) VALUES
(14, 'Oreo Cheese Cake', 'Cake dengan Toping Oreo dan dipadukan dengan Cream Cheese, menghasilkan kue yang manis untuk para pecinta oreo, selain itu cake ini memiliki tekstur yang sangat lembut.', 120000, '1951348063_ssdd.jpg', 'kue'),
(16, 'Cinnamon Roll', 'soft cinnamon rolls made with a simple homemade dough are super fluffy and light! coat them in a perfect cream cheese glaze and let the baking begin!', 25000, '1440494308_ssse.jpg', 'roti'),
(17, 'Lumpia Telur Puyuh', 'Lumpia dengan isian telur puyuh dengan isian lain berupa sayur-sayur yang bahan nya merupakan sayuran berkualitas tinggi.', 3000, '1609620657_lumipa.png', 'snack'),
(18, 'Pastel', 'Pastel isi ragout daging dan telur dengan tekstur isi yang lembut dan creamy.', 3500, '1861674246_pastek.jpg', 'snack'),
(19, 'Garlic Cheese Bread', 'Korean garlic bread merupakan roti street food korea yang kini menjadi populer', 6500, '2127482546_lalalaa.jpg', 'roti'),
(20, 'Mexican Bun', 'Mexican coffee memiliki  Tekstur empuk di dalam renyah di luar, rasanya manis beraroma kopi.', 4500, '1965718934_mbun.jpg', 'roti'),
(21, 'Pumkin Cake', 'Kue dengan bahan dasar labu ini memiliki tekstur yang lembut dan sweet saat di makan', 70000, '1485255795_kue.jpg', 'kue'),
(22, 'Tiramisu Cake', 'TiramisÃ¹ adalah kue keju khas Italia dengan taburan bubuk kakao di atasnya. Kue ini merupakan hidangan penutup yang dimakan dengan sendok, sehingga digolongkan ke dalam hidangan \"al cucchiaio\". Kue ini tidak dibuat dari adonan dan tidak dipanggang', 50000, '1873132705_tiramusi.jpg', 'kue'),
(23, 'Pie Buah', 'Pie Buah dengan buah buah segar dan pilihan membuat citarasa dari pie ini menjadi lebih enak dan fresh', 10000, '951549708_pie.jpg', 'snack');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `address`, `phone`) VALUES
(2, 'Tiara Andini', 'www.tiara@gmail.com', 'tiara123', 's', '0988'),
(4, 'Noah Beck', 'noahbeck@gmail.com', 'noah123', 'jln. Senopati No 10, kec keby baru, jakarta selatan, 55512', '083774123211'),
(6, 'Lola Alila', 'www.alila@gmail.com', 'lolala123', '', ''),
(7, 'tsaniah', 'www.tsaniah@gmail.com', 'tsan123', 'karang rt03/rw24, banyurejo, tempel, sleman, DIY, 55552', '09388483'),
(10, 'admin', 'Admin@gmail.com', 'admin123', '', ''),
(11, 'Vinnie Hacker', 'vinniehacker@gmail.com', 'vinnie', 'jl.District 8 No 17, Blok M, Jakarta Selatan, 55123', '0836727463'),
(12, 'Nailea Devora', 'nailea@gmail.com', 'nai123', 'Jl.Cangu No 12, Cangu, Bali, 43324', '08453411234'),
(13, 'Khaiba Malik', 'khaibamalik@gmail.com', 'khai123', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
