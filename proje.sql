-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Haz 2020, 01:18:21
-- Sunucu sürümü: 5.7.30-log
-- PHP Sürümü: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dosyalars`
--

CREATE TABLE `dosyalars` (
  `id` int(11) NOT NULL,
  `sahaid` int(10) NOT NULL,
  `dosyaadi` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kamerano` int(10) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `dosyalars`
--

INSERT INTO `dosyalars` (`id`, `sahaid`, `dosyaadi`, `kamerano`, `updated_at`, `created_at`) VALUES
(1, 1, '1_1_22062020184522.mp4', 1, '2020-06-22 19:02:19', '2020-06-22 19:02:19'),
(2, 1, '1_2_22062020184522.mp4', 2, '2020-06-22 19:02:20', '2020-06-22 19:02:20'),
(3, 1, '1_1_220620201845.mp4', 1, '2020-06-22 19:11:29', '2020-06-22 19:11:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kameralars`
--

CREATE TABLE `kameralars` (
  `id` int(11) NOT NULL,
  `sahaid` int(10) NOT NULL,
  `kamerano` int(10) NOT NULL,
  `kameraip` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kameraport` int(10) NOT NULL,
  `kamerausername` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kamerapassword` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kameralars`
--

INSERT INTO `kameralars` (`id`, `sahaid`, `kamerano`, `kameraip`, `kameraport`, `kamerausername`, `kamerapassword`) VALUES
(1, 1, 1, '0', 0, '0', '0'),
(2, 1, 2, '0', 0, '0', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sahalars`
--

CREATE TABLE `sahalars` (
  `id` int(11) NOT NULL,
  `sahaadi` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `il` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ilçe` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `sahalars`
--

INSERT INTO `sahalars` (`id`, `sahaadi`, `il`, `ilçe`) VALUES
(1, 'maraton', 'mersin', 'erdemli'),
(2, 'yildiz', 'istanbul', 'kadıköy'),
(3, 'yiğitto', 'istanbul', 'bakırköy');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `dosyalars`
--
ALTER TABLE `dosyalars`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kameralars`
--
ALTER TABLE `kameralars`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sahalars`
--
ALTER TABLE `sahalars`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `dosyalars`
--
ALTER TABLE `dosyalars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `kameralars`
--
ALTER TABLE `kameralars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `sahalars`
--
ALTER TABLE `sahalars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
