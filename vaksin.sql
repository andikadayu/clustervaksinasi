-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 10:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vaksin`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_target`
--

CREATE TABLE `data_target` (
  `id_target` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `zona` varchar(10) NOT NULL,
  `lansia` int(11) NOT NULL,
  `tlansia` double(255,0) NOT NULL,
  `vaksin_lansia` int(11) NOT NULL,
  `odgj` int(11) NOT NULL,
  `todgj` double(255,0) NOT NULL,
  `vaksin_odgj` int(11) NOT NULL,
  `disabilitas` int(11) NOT NULL,
  `tdisabilitas` double(255,0) NOT NULL,
  `vaksin_disabilitas` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `svaksin` double(255,0) NOT NULL,
  `bvaksin` double(255,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_target`
--

INSERT INTO `data_target` (`id_target`, `id_kec`, `id_kab`, `zona`, `lansia`, `tlansia`, `vaksin_lansia`, `odgj`, `todgj`, `vaksin_odgj`, `disabilitas`, `tdisabilitas`, `vaksin_disabilitas`, `tanggal`, `svaksin`, `bvaksin`) VALUES
(102, 1, 1, 'hijau', 150, 33, 100, 170, 53, 80, 120, 21, 95, '2021-07-15', 62, 37),
(103, 4, 1, 'hijau', 100, 30, 70, 200, 87, 25, 100, 25, 75, '2021-07-16', 42, 57),
(104, 56, 5, 'hijau', 300, 33, 200, 150, 87, 20, 10, 0, 10, '2021-07-19', 50, 60),
(105, 122, 10, 'kuning', 30, 17, 25, 15, 33, 10, 2, 50, 1, '2021-07-26', 77, 23);

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kab` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `geojson_kabupaten` varchar(50) NOT NULL,
  `warna_kabupaten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kab`, `nama`, `geojson_kabupaten`, `warna_kabupaten`) VALUES
(1, 'Bengkulu Selatan', 'KabBengkuluSelatan.geojson', '#000080'),
(2, 'Bengkulu Tengah', 'KabBengkuluTengah.geojson', '#50C878'),
(3, 'Bengkulu Utara', 'KabBengkuluUtara.geojson', '#008080'),
(4, 'Kaur', 'KabKaur.geojson', '#DDA0DD'),
(5, 'Kepahiang', 'KabKepahiang.geojson', '#FF00FF'),
(6, 'Lebong', 'KabLebong.geojson', '#808080'),
(7, 'Mukomuko', 'KabMuko.geojson', '#A52A2A'),
(8, 'Rejang Lebong', 'KabRejanglebong.geojson', '#C19A6B'),
(9, 'Seluma', 'KabSeluma.geojson', '#E3DAC9'),
(10, 'Kota Bengkulu', 'KotaBengkulu.geojson', '#FF7800');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `id_kab` int(11) NOT NULL,
  `nama_kec` varchar(100) NOT NULL,
  `lng` float(9,6) NOT NULL,
  `lat` float(9,6) NOT NULL,
  `marker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `id_kab`, `nama_kec`, `lng`, `lat`, `marker`) VALUES
(1, 1, 'Manna', 102.902954, -4.477413, ''),
(2, 1, 'Kota Manna', 102.909431, -4.437583, ''),
(3, 1, 'Kedurang', 103.163864, -4.372076, ''),
(4, 1, 'Bunga Mas', 102.990662, -4.491063, ''),
(5, 1, 'Pasar Manna', 102.917709, -4.469956, ''),
(6, 1, 'Kedurang Hilir', 103.046959, -4.515424, ''),
(7, 1, 'Seginim', 103.024910, -4.435586, ''),
(8, 1, 'Air Nipis', 103.102814, -4.343819, ''),
(9, 1, 'Pino', 102.964058, -4.383278, ''),
(10, 1, 'Pino Raya', 102.871635, -4.348736, ''),
(11, 1, 'Ulu Manna', 102.970566, -4.262929, ''),
(12, 2, 'Talang Empat', 102.380699, -3.826195, ''),
(13, 2, 'Karang Tinggi', 102.457146, -3.803586, ''),
(14, 2, 'Taba Penanjung', 102.496246, -3.704435, ''),
(15, 2, 'Merigi Kelindang', 102.470200, -3.605328, ''),
(16, 2, 'Pagar Jati', 102.381508, -3.605496, ''),
(17, 2, 'Merigi Sakti', 102.426498, -3.626741, ''),
(18, 2, 'Pondok Kelapa', 102.267700, -3.688919, ''),
(19, 2, 'Pondok Kubang', 102.356712, -3.706226, ''),
(20, 2, 'Pematang Tiga', 102.312225, -3.563039, ''),
(21, 2, 'Bang Haji', 102.311745, -3.608669, ''),
(22, 3, 'Enggano', 102.232002, -5.380006, ''),
(23, 3, 'Kerkap', 102.311638, -3.532686, ''),
(24, 3, 'Air Napal', 102.157166, -3.588815, ''),
(25, 3, 'Air Besi', 102.152687, -3.510343, ''),
(26, 3, 'Hulu Palik', 102.341576, -3.414802, ''),
(27, 3, 'Tanjung Agung Palik', 102.228706, -3.552355, ''),
(28, 3, 'Kota Arga Makmur', 102.220436, -3.393068, ''),
(29, 3, 'Arma Jaya', 102.219383, -3.452628, ''),
(30, 3, 'Lais', 102.064407, -3.511405, ''),
(31, 3, 'Batik Nau', 102.002968, -3.403344, ''),
(32, 3, 'Giri Mulya', 102.082649, -3.233825, ''),
(33, 3, 'Air Padang', 102.082649, -3.434125, ''),
(34, 3, 'Padang Jaya', 102.188889, -3.284134, ''),
(35, 3, 'Ketahun', 101.840065, -3.306397, ''),
(36, 3, 'Napal Putih', 102.026680, -3.069573, ''),
(37, 3, 'Uluk Kupai', 101.866936, -3.167912, ''),
(38, 3, 'Pinang Raya', 101.906181, -3.400035, ''),
(39, 3, 'Putri Hijau', 101.682678, -3.168726, ''),
(40, 3, 'Marga Sakti Sebelet', 102.243729, -3.312230, ''),
(41, 4, 'Nasal', 103.637497, -4.680565, ''),
(42, 4, 'Maje', 103.495934, -4.720683, ''),
(43, 4, 'Kaur Selatan', 103.340843, -4.787107, ''),
(44, 4, 'Tetap', 103.370506, -4.711084, ''),
(45, 4, 'Kaur Tengah', 103.300499, -4.711979, ''),
(46, 4, 'Luas', 103.333313, -4.659329, ''),
(47, 4, 'Muara Sahung', 103.378624, -4.460920, ''),
(48, 4, 'Kinal', 103.300583, -4.525958, ''),
(49, 4, 'Semidang Gumai', 103.248497, -4.658178, ''),
(50, 4, 'Tanjung Kemuning', 103.207115, -4.611294, ''),
(51, 4, 'Kelam Tengah', 103.208260, -4.572411, ''),
(52, 4, 'Kaur Utara', 103.208344, -4.489250, ''),
(53, 4, 'Padang Guci Hilir', 103.150795, -4.503474, ''),
(54, 4, 'Lungkang Kule', 103.248665, -4.566709, ''),
(55, 4, 'Padang Guci Hulu', 103.287148, -4.377946, ''),
(56, 5, 'Muara Kemumu', 102.735771, -3.590930, ''),
(57, 5, 'Bermani Ilir', 102.701645, -3.701712, ''),
(58, 5, 'Seberang Musi', 102.632828, -3.737961, ''),
(59, 5, 'Tebat Karai', 102.624283, -3.674420, ''),
(60, 5, 'Kepahiang', 102.543266, -3.651345, ''),
(61, 5, 'Kaba Wetan', 102.609100, -3.560892, ''),
(62, 5, 'Ujan Mas', 102.540512, -3.539113, ''),
(63, 5, 'Merigi', 102.511978, -3.508726, ''),
(64, 6, 'Topos', 102.390221, -3.136823, ''),
(65, 6, 'Lebong Selatan', 102.323135, -3.279359, ''),
(66, 6, 'Bingin Kuning', 102.289108, -3.172521, ''),
(67, 6, 'Lebong Tengah', 102.232140, -3.201682, ''),
(68, 6, 'Lebong Sakti', 102.289818, -3.113583, ''),
(69, 6, 'Lebong Atas', 102.174294, -3.173957, ''),
(70, 6, 'Padang Bano', 102.157333, -3.208543, ''),
(71, 6, 'Pelabai', 102.151810, -3.134598, ''),
(72, 6, 'Lebong Utara', 102.191589, -3.109596, ''),
(73, 6, 'Amen', 102.214592, -3.120327, ''),
(74, 6, 'Urum Jaya', 102.241058, -3.070703, ''),
(75, 6, 'Pinang Belapis', 102.089554, -2.880347, ''),
(76, 6, 'Rimbo Pengadang', 102.459854, -3.274274, ''),
(77, 7, 'Ipuh', 101.511253, -2.976465, ''),
(78, 7, 'Air Rami', 101.649033, -3.037352, ''),
(79, 7, 'Malin Deman', 101.749329, -2.824058, ''),
(80, 7, 'Pondok Suguh', 101.546524, -2.729879, ''),
(81, 7, 'Sungai Rumbai', 101.593063, -2.808767, ''),
(82, 7, 'Teramang Jaya', 101.451538, -2.643118, ''),
(83, 7, 'Teras Terunjam', 101.242065, -2.550000, ''),
(84, 7, 'Penarik', 101.265663, -2.612729, ''),
(85, 7, 'Selagan Raya', 101.408592, -2.454182, ''),
(86, 7, 'Kota Mukomuko', 101.153084, -2.552419, ''),
(87, 7, 'Air Dikit', 101.239334, -2.649052, ''),
(88, 7, 'XIV Koto', 101.082611, -2.479794, ''),
(89, 7, 'Lubuk Pinang', 101.136192, -2.428032, ''),
(90, 7, 'Air Manjunto', 101.172333, -2.493405, ''),
(91, 7, 'V Koto', 101.295387, -2.355853, ''),
(92, 8, 'Curup', 102.520844, -3.472464, ''),
(93, 8, 'Curup Utara', 102.511330, -3.438345, ''),
(94, 8, 'Curup Timur', 102.546204, -3.460538, ''),
(95, 8, 'Curup Selatan', 102.521431, -3.491365, ''),
(96, 8, 'Curup Tengah', 102.547035, -3.479617, ''),
(98, 8, 'Sidang Kelingi', 102.688538, -3.426926, ''),
(99, 8, 'Sidang Dataran', 102.699242, -3.518973, ''),
(100, 8, 'Kota Padang', 102.964798, -3.459542, ''),
(101, 8, 'Sidang Beliti Ilir', 102.871269, -3.462026, ''),
(102, 8, 'Bermani Ulu', 102.451668, -3.422495, ''),
(103, 8, 'Bermani Ulu Raya', 102.502838, -3.345565, ''),
(104, 8, 'Padang Ulak Tanding', 102.732819, -3.340707, ''),
(105, 8, 'Binduriang', 102.744057, -3.416765, ''),
(106, 8, 'Sidang Beliti Ulu', 102.777954, -3.466171, ''),
(107, 8, 'Selupu Rejang', 102.596115, -3.427845, ''),
(108, 9, 'Semidang Alas Maras', 102.779793, -4.300878, ''),
(109, 9, 'Semidang Alas', 102.863022, -4.130693, ''),
(110, 9, 'Talo', 102.688744, -4.147704, ''),
(111, 9, 'Ilir Talo', 102.630920, -4.195811, ''),
(112, 9, 'Talo Kecil', 102.735260, -4.222678, ''),
(113, 9, 'Ulu Talo', 102.756805, -3.988564, ''),
(114, 9, 'Seluma', 102.690529, -4.002833, ''),
(115, 9, 'Seluma Selatan', 102.537888, -4.119282, ''),
(116, 9, 'Seluma Barat', 102.488831, -4.035963, ''),
(117, 9, 'Seluma Timur', 102.608147, -4.095785, ''),
(118, 9, 'Seluma Utara', 102.640038, -3.938582, ''),
(119, 9, 'Sukaraja', 102.407913, -3.895956, ''),
(120, 9, 'Air Periukan', 102.423729, -3.993542, ''),
(121, 9, 'Lubuk Sandi', 102.549530, -3.865528, ''),
(122, 10, 'Selebar', 102.333626, -3.843676, ''),
(123, 10, 'Kampung Melayu', 102.317909, -3.898887, ''),
(124, 10, 'Gading Cempaka', 102.301872, -3.826727, ''),
(125, 10, 'Ratu Agung', 102.279648, -3.806027, ''),
(126, 10, 'Ratu Samban', 102.264336, -3.797519, ''),
(127, 10, 'Singaran Pati', 102.296761, -3.806916, ''),
(128, 10, 'Teluk Segara', 102.257179, -3.789203, ''),
(129, 10, 'Sungai Serut', 102.327576, -3.788449, ''),
(130, 10, 'Muara Bangka Hulu', 102.288101, -3.764692, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `username`, `password`, `role`) VALUES
(1, 'admin@gmail.com', 'Admin', '$2y$10$nzZKKeWCXX23nDqRaRx73.KjOVRDijZXlxkiEdI2kTO903NWaS3si', 'admin'),
(2, 'dayu@gmail.com', 'Dayu', '$2y$10$pvdAQfxtVySnByLRtSCxbux5pFnAzhvG2yffre0ty2tqFwu27f0Ke', 'user'),
(3, 'roni@gmail.com', 'Supplier', 'd78b154c99fe7f06ebc02ebd63d1c87c', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_target`
--
ALTER TABLE `data_target`
  ADD PRIMARY KEY (`id_target`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kab`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`),
  ADD KEY `id_kab` (`id_kab`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_target`
--
ALTER TABLE `data_target`
  MODIFY `id_target` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kab`) REFERENCES `kabupaten` (`id_kab`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
