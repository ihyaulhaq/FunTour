-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 11:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funtour`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `destination_id`, `title`, `content`, `author_id`, `publication_date`, `image_url`) VALUES
(3, 3, 'Pulau Seribu Tips', 'Tips Ke Pulau Seribu\r\n\r\nKepulauan Seribu merupakan salah satu destinasi wisata favorit di Jakarta. Gugusan pulau-pulau kecil di Teluk Jakarta ini menawarkan keindahan alam yang memukau, mulai dari pantai yang eksotis, pemandangan bawah laut yang menakjubkan, hingga beragam aktivitas wisata yang seru.\r\n\r\nJika Anda berencana untuk berlibur ke Pulau Seribu, berikut beberapa tips yang perlu Anda perhatikan:\r\n\r\n1. Pilih waktu yang tepat\r\n\r\nWaktu terbaik untuk berkunjung ke Pulau Seribu adalah pada musim kemarau, yaitu dari bulan Mei hingga Oktober. Pada musim ini, cuaca cerah dan tidak ada hujan, sehingga Anda dapat menikmati keindahan pulau dengan nyaman.\r\n\r\n2. Tentukan tujuan pulau\r\n\r\nKepulauan Seribu terdiri dari ratusan pulau, masing-masing memiliki keindahan dan pesonanya masing-masing. Sebelum berangkat, tentukan terlebih dahulu pulau mana yang ingin Anda kunjungi.\r\n\r\nBerikut beberapa pulau yang populer di Pulau Seribu:\r\n\r\n* Pulau Tidung: Pulau ini terkenal dengan pantainya yang indah dan pasirnya yang putih. Selain itu, Anda juga bisa menikmati aktivitas wisata seperti snorkeling dan diving.\r\n\r\n* Pulau Pramuka: Pulau ini merupakan pusat pemerintahan di Kepulauan Seribu. Selain itu, di pulau ini juga terdapat berbagai fasilitas wisata, seperti penginapan, restoran, dan pusat oleh-oleh.\r\n\r\n* Pulau Pari: Pulau ini terkenal dengan keindahan pantainya yang berpasir putih dan airnya yang jernih. Selain itu, di pulau ini juga terdapat berbagai fasilitas wisata, seperti penginapan, restoran, dan pusat oleh-oleh.\r\n\r\n* Pulau Harapan: Pulau ini terkenal dengan keindahan alamnya yang masih asri. Selain itu, di pulau ini juga terdapat berbagai fasilitas wisata, seperti penginapan, restoran, dan pusat oleh-oleh.\r\n\r\n\r\n**3. Pilih transportasi yang tepat**\r\n\r\nAda beberapa cara untuk menuju Pulau Seribu, yaitu:\r\n\r\n* Dengan kapal cepat: Kapal cepat merupakan cara yang paling cepat untuk menuju Pulau Seribu. Perjalanan dari Pelabuhan Muara Angke ke Pulau Tidung hanya memakan waktu sekitar 1 jam.\r\n\r\n* Dengan kapal tradisional: Kapal tradisional merupakan cara yang paling murah untuk menuju Pulau Seribu. Perjalanan dari Pelabuhan Muara Angke ke Pulau Tidung memakan waktu sekitar 2 jam.\r\n\r\n* Dengan sewa perahu: Jika Anda ingin berkunjung ke beberapa pulau sekaligus, Anda bisa menyewa perahu. Harga sewa perahu bervariasi, tergantung pada ukuran perahu dan jarak tempuh.\r\n\r\n**4. Siapkan perlengkapan yang dibutuhkan**\r\n\r\nBerikut beberapa perlengkapan yang perlu Anda siapkan untuk berlibur ke Pulau Seribu:\r\n\r\n* Pakaian renang: Jika Anda ingin berenang atau snorkeling, Anda perlu membawa pakaian renang.\r\n* Baju ganti: Setelah berenang atau snorkeling, Anda perlu mengganti pakaian dengan pakaian yang kering.\r\n* Perlengkapan mandi: Jangan lupa untuk membawa perlengkapan mandi, seperti sabun, sampo, dan handuk.\r\n* Obat-obatan pribadi: Jika Anda memiliki penyakit tertentu, bawalah obat-obatan pribadi yang Anda butuhkan.\r\n* Uang tunai: Di beberapa pulau di Kepulauan Seribu, Anda hanya bisa menggunakan uang tunai.\r\n\r\n**5. Patuhi peraturan yang berlaku**\r\n\r\nSaat berlibur ke Pulau Seribu, Anda harus mematuhi peraturan yang berlaku, seperti:\r\n\r\n* Menjaga kebersihan lingkungan\r\n* Tidak membuang sampah sembarangan\r\n* Tidak merusak fasilitas umum\r\n* Tidak mengganggu aktivitas warga setempat\r\n\r\nBerikut beberapa tips tambahan untuk berlibur ke Pulau Seribu:\r\n\r\n* Jika Anda ingin berhemat, Anda bisa membawa bekal makanan dan minuman dari rumah.\r\n* Jika Anda ingin menginap di Pulau Seribu, sebaiknya pesan penginapan terlebih dahulu, terutama jika Anda berlibur pada musim liburan.\r\n* Berhati-hatilah saat berenang atau snorkeling, terutama jika Anda tidak bisa berenang.\r\n\r\nSemoga tips-tips di atas dapat membantu Anda mempersiapkan liburan ke Pulau Seribu yang menyenangkan.', 3, '2023-07-01', '../assets/img_artikel/pulau-seribu.jpg'),
(12, 5, 'Memperkaya Pengalaman Wisata Anda: Tips Perjalanan ke Candi Borobudur', '\r\n\r\nCandi Borobudur, sebuah peninggalan sejarah yang megah di Indonesia, adalah destinasi yang menakjubkan bagi para pelancong dari seluruh penjuru dunia. Terletak di Magelang, Jawa Tengah, candi ini bukan hanya sekadar monumen bersejarah, tapi juga sebuah tempat yang sarat akan keindahan arsitektur dan spiritualitas.\r\n\r\nJika Anda merencanakan perjalanan ke Candi Borobudur, ada beberapa tips yang dapat memastikan Anda mendapatkan pengalaman wisata yang tak terlupakan:\r\n\r\n 1. Rencanakan Waktu Kunjungan yang Tepat\r\n\r\nMusim dan waktu kunjungan bisa memengaruhi pengalaman Anda di Candi Borobudur. Hindari kunjungan pada hari libur nasional atau akhir pekan yang ramai. Lebih baik memilih hari-hari biasa agar Anda dapat menikmati keindahan candi dengan lebih tenang.\r\n\r\n2. Pilih Waktu Matahari Terbit atau Terbenam\r\n\r\nSalah satu momen magis di Candi Borobudur adalah saat matahari terbit atau terbenam. Berada di sini saat matahari mulai terbit atau tenggelam memberikan pengalaman yang luar biasa. Keindahan siluet candi yang megah dengan latar belakang cahaya matahari memberikan pengalaman spiritual yang tak terlupakan.\r\n\r\n3. Kenali Sejarah dan Signifikansi Candi\r\n\r\nSebelum mengunjungi candi, pelajari sedikit tentang sejarah dan signifikansi budaya Candi Borobudur. Ini akan membuat pengalaman Anda jauh lebih kaya dan memberikan pemahaman yang lebih dalam tentang nilai sejarahnya.\r\n\r\n 4. Pakaian yang Tepat dan Kenyamanan\r\n\r\nBerpakaianlah dengan sopan dan nyaman. Candi Borobudur adalah tempat suci, jadi penting untuk menghormati aturan pakaian yang sesuai. Juga, sebaiknya memakai sepatu yang nyaman karena Anda akan banyak berjalan kaki.\r\n\r\n5. Bawa Perlengkapan Penting\r\n\r\nPastikan membawa perlengkapan seperti air minum, tabir surya, topi, dan kacamata hitam. Sinar matahari di Indonesia bisa sangat kuat, terutama saat berada di tempat terbuka seperti kompleks candi.\r\n\r\n### 6. **Manfaatkan Jasa Pemandu Lokal**\r\n\r\nMenggunakan jasa pemandu lokal dapat memberikan wawasan tambahan tentang sejarah dan makna simbolis di setiap bagian Candi Borobudur. Mereka biasanya memiliki pengetahuan mendalam dan cerita menarik tentang tempat tersebut.\r\n\r\n### 7. **Jelajahi Sekitarnya**\r\n\r\nJangan hanya fokus pada Candi Borobudur saja. Ada banyak tempat menarik di sekitarnya, seperti Candi Mendut, desa-desa tradisional, dan kebun-kebun buah lokal yang patut untuk dieksplorasi.\r\n\r\n 8. Hormati Aturan dan Lingkungan Sekitar\r\n\r\nJaga kebersihan lingkungan sekitar dan patuhi aturan yang berlaku di kompleks candi. Ini akan membantu menjaga keindahan dan kelestarian Candi Borobudur bagi generasi mendatang.\r\n\r\nDengan mengikuti tips ini, perjalanan Anda ke Candi Borobudur akan menjadi lebih berkesan dan bermakna. Nikmati keajaiban sejarah dan spiritualitas yang ditawarkan oleh salah satu keajaiban dunia ini, serta jangan lupa untuk merasakan keindahan budaya dan kealamian sekitarnya. Selamat menikmati perjalanan Anda!', 5, '2023-12-18', '../assets/img_artikel/borobudur artikel.jpg'),
(13, 9, 'Menemukan Surga Bawah Laut di Wakatobi: Pesona Wisata yang Memikat', 'Memahami Wakatobi\r\nIndonesia, negara kepulauan yang kaya akan keindahan alamnya, menyimpan sebuah surga bawah laut yang tak tertandingi kecantikannya: Wakatobi. Terletak di Provinsi Sulawesi Tenggara, Wakatobi adalah singkatan dari empat pulau utamanya: Wangi-wangi, Kaledupa, Tomia, dan Binongko. Destinasi ini telah menjadi magnet bagi para penyelam, pelancong, dan pecinta alam yang ingin menyaksikan keajaiban bawah laut yang luar biasa.\r\n\r\nKeindahan Bawah Laut yang Menakjubkan\r\nWakatobi dikenal dengan terumbu karangnya yang luar biasa. Airnya yang jernih dan kehidupan laut yang beragam menarik minat para penyelam dari seluruh dunia. Di sini, Anda dapat menyaksikan berbagai spesies ikan, terumbu karang yang memikat, dan kehidupan laut yang tak terlupakan. Salah satu situs penyelaman terkenal di Wakatobi adalah Karang Kaledupa, di mana Anda dapat menyelam di antara terumbu karang yang mengagumkan dan melihat berbagai jenis biota laut yang menakjubkan.\r\n\r\nKeanekaragaman Hayati yang Luar Biasa\r\nTidak hanya bawah lautnya yang memikat, tetapi juga kekayaan hayati di daratan Wakatobi. Taman Nasional Wakatobi merupakan tempat perlindungan bagi berbagai spesies laut, termasuk penyu, ikan hiu, dan berbagai spesies laut lainnya. Di sini, Anda dapat belajar tentang konservasi dan berinteraksi dengan lingkungan yang alami.\r\n\r\nPengalaman Budaya yang Autentik\r\nSelain alamnya yang menakjubkan, Wakatobi juga kaya akan budaya lokal yang menarik. Anda dapat berinteraksi dengan masyarakat lokal, mengunjungi desa-desa tradisional, dan menyaksikan upacara adat yang unik. Budaya ini memberikan pengalaman berharga tentang kehidupan lokal dan warisan budaya yang kaya.\r\n\r\nAktivitas Menarik di Daratan\r\nTak hanya menyelam, Wakatobi menawarkan berbagai kegiatan menarik di darat. Anda dapat menjelajahi hutan, trekking ke gunung, atau sekadar bersantai di pantai yang indah. Kegiatan lain seperti snorkeling, mengunjungi air terjun, dan mempelajari kehidupan lokal juga dapat menjadi pengalaman yang tak terlupakan.\r\n\r\nKesimpulan\r\nWakatobi adalah destinasi yang sempurna bagi para pecinta alam, penyelam, dan mereka yang ingin menjelajahi keindahan bawah laut yang luar biasa. Dengan kekayaan alamnya yang luar biasa, keanekaragaman hayati yang mempesona, dan budaya yang kaya, Wakatobi menawarkan pengalaman wisata yang tak terlupakan. Kesempurnaan alamnya menjadikannya destinasi yang wajib dikunjungi bagi siapa pun yang mencintai keindahan alam yang autentik.\r\n\r\nJadi, siap untuk menjelajahi keajaiban Wakatobi yang menakjubkan?', 7, '2023-12-20', '../assets/img_artikel/wakatobi.jpg'),
(14, 7, 'Merangkai Keajaiban Alam di Raja Ampat: Surga Tersembunyi di Indonesia Timur', 'Memahami Raja Ampat\r\nBersembunyi di ujung timur Indonesia, Raja Ampat telah menjadi destinasi impian bagi para pecinta alam dan penyelam. Terletak di Provinsi Papua Barat, gugusan pulau ini terdiri dari sekitar 1.500 pulau kecil yang tersebar di atas Laut Cenderawasih. Raja Ampat terkenal dengan keindahan alamnya yang luar biasa dan kekayaan bawah laut yang tak tertandingi.\r\n\r\nKeajaiban Bawah Laut yang Spektakuler\r\nPerairan Raja Ampat menjadi rumah bagi lebih dari 75% spesies karang yang ada di dunia. Dengan kekayaan biota laut yang luar biasa, tempat ini menjadi surganya para penyelam. Anda dapat menyelam di antara terumbu karang yang berwarna-warni, bertemu dengan hiu, pari, dan berbagai spesies ikan yang menakjubkan. Salah satu situs penyelaman terkenal di Raja Ampat adalah The Passage, di mana Anda dapat merasakan sensasi menyelam di antara tebing karang yang spektakuler.\r\n\r\nPesona Alam Daratan yang Menakjubkan\r\nTak hanya bawah lautnya, daratan Raja Ampat juga memukau dengan keindahan alamnya. Bukit-bukit hijau yang menjulang, laguna biru yang memikat, dan pantai pasir putih yang memesona menanti untuk dieksplorasi. Perjalanan ke Pianemo, dengan panorama bukit karst yang ikonik, akan memberikan pemandangan yang tak terlupakan.\r\n\r\nBudaya yang Kaya dan Ramah Tamu\r\nSelain alamnya yang luar biasa, keberagaman budaya di Raja Ampat juga memikat. Anda dapat mengunjungi desa-desa tradisional, berinteraksi dengan masyarakat lokal yang ramah, dan memahami kehidupan sehari-hari mereka. Pengalaman ini memberikan wawasan yang mendalam tentang budaya Papua yang kaya.\r\n\r\nKonservasi dan Keberlanjutan\r\nRaja Ampat sangat memperhatikan perlindungan lingkungan dan keberlanjutan. Berbagai upaya konservasi dilakukan untuk menjaga keanekaragaman hayati dan keindahan alamnya. Anda dapat terlibat dalam program konservasi sambil menikmati keindahan alamnya.\r\n\r\nKesimpulan\r\nRaja Ampat adalah surga tersembunyi yang menyimpan keindahan alam yang luar biasa di wilayah timur Indonesia. Dengan kekayaan bawah laut yang tak tertandingi, keindahan alam daratan yang memukau, budaya yang kaya, dan komitmen terhadap konservasi, Raja Ampat menawarkan pengalaman wisata yang mendalam dan tak terlupakan. Destinasi ini mengundang para petualang untuk mengeksplorasi keajaiban alam yang belum terjamah.\r\n\r\nApakah Anda siap untuk menyelami keindahan yang tak terlupakan di Raja Ampat?', 7, '2023-12-20', '../assets/img_artikel/raja_ampat.jpg'),
(15, 8, 'Menikmati Keindahan Candi Prambanan: Tips Berwisata yang Memuaskan', 'Candi Prambanan, sebagai salah satu situs warisan dunia yang menakjubkan, menawarkan pengalaman yang kaya akan sejarah, arsitektur megah, dan keindahan yang memukau. Terletak di Yogyakarta, Indonesia, kompleks candi ini adalah destinasi yang sangat populer bagi wisatawan lokal maupun mancanegara. Untuk memastikan perjalanan Anda menjadi pengalaman yang tak terlupakan, ada beberapa tips yang dapat Anda pertimbangkan sebelum mengunjungi Candi Prambanan.\r\n\r\n1. Rencanakan Kunjungan Anda\r\nSebelum berangkat, buatlah rencana perjalanan yang terperinci. Tentukan waktu yang tepat untuk mengunjungi candi ini. Pagi hari atau menjelang senja adalah waktu terbaik karena cuaca lebih sejuk dan cahaya matahari memberikan kilauan istimewa pada candi.\r\n\r\n2. Kenali Sejarah dan Mitologi\r\nMengenal sejarah dan mitologi di balik Candi Prambanan akan memberikan perspektif yang lebih dalam saat Anda menjelajahinya. Pemandu lokal atau audio guide bisa menjadi sumber informasi yang berharga untuk memahami makna simbolik di setiap relief dan struktur candi.\r\n\r\n3. Pilih Waktu yang Tepat\r\nHindari mengunjungi Prambanan pada hari-hari libur umum atau akhir pekan karena kemungkinan besar tempat ini akan ramai oleh pengunjung. Hari kerja atau saat di luar musim liburan adalah waktu yang lebih tenang untuk menikmati keindahan candi tanpa terlalu banyak kerumunan.\r\n\r\n4. Kenakan Pakaian yang Nyaman\r\nAnda akan berjalan cukup jauh saat menjelajahi kompleks candi. Pakaian yang nyaman seperti kaos, celana panjang, dan alas kaki yang cocok untuk berjalan adalah pilihan yang tepat. Jangan lupa membawa topi atau payung untuk melindungi diri dari sinar matahari.\r\n\r\n5. Jangan Lupa Kamera\r\nPastikan untuk membawa kamera atau smartphone Anda untuk menangkap momen-momen indah di Candi Prambanan. Pemandangan matahari terbenam atau detail arsitektur candi adalah pemandangan yang sayang untuk dilewatkan.\r\n\r\n6. Cicipi Kuliner Lokal\r\nDi sekitar kompleks candi, Anda akan menemukan banyak penjual makanan dan oleh-oleh khas Yogyakarta. Manfaatkan kesempatan ini untuk mencicipi makanan lokal yang lezat seperti gudeg, bakpia, atau makanan ringan khas lainnya.\r\n\r\n7. Hormati Lingkungan\r\nSaat menjelajahi Candi Prambanan, penting untuk menjaga kebersihan dan menghormati lingkungan sekitar. Jangan membuang sampah sembarangan dan ikuti aturan yang ditetapkan oleh pengelola situs.\r\n\r\n8. Nikmati Pertunjukan Ramayana\r\nSaat malam tiba, jangan lewatkan pertunjukan Ramayana yang spektakuler di area Candi Prambanan. Pertunjukan tari tradisional ini memperlihatkan cerita klasik Ramayana dengan latar belakang candi yang megah sebagai panggungnya.\r\n\r\n9. Jangan Terburu-buru\r\nNikmati setiap momen di Candi Prambanan. Jangan terburu-buru saat menjelajahi setiap sudutnya. Biarkan diri Anda meresapi keindahan dan keagungan warisan budaya ini.\r\n\r\n10. Berinteraksi dengan Penduduk Lokal\r\nBerbicara dengan penduduk lokal dapat memberikan perspektif yang berharga tentang kehidupan sehari-hari di sekitar Candi Prambanan. Mereka mungkin memiliki cerita menarik atau tips tambahan untuk pengalaman wisata Anda.\r\n\r\nDengan mempertimbangkan tips-tips ini, Anda akan bisa menghadapi pengalaman berwisata yang memuaskan di Candi Prambanan. Ingatlah, selalu hormati warisan budaya dan lingkungan di sekitarnya agar pengalaman wisata Anda berkesan dan berdampak positif bagi tempat yang Anda kunjungi.', 7, '2023-12-20', '../assets/img_artikel/agto-nugroho-eWhUCWeSTA0-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `destination_id` int(11) NOT NULL,
  `destination_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destination_id`, `destination_name`, `location`, `description`, `image_url`) VALUES
(1, 'bromo', 'jawa timur', 'Beautiful mountain in malang', './assets/bromo-bagus.jpg'),
(2, 'gili trawang', 'NTB', 'Visit the famous beach in lombok', './assets/gili.jpg\r\n'),
(3, 'kepulauan seribu', 'Jakarta', 'Experience the iconic archipelago in jakarta.', './assets/seribu.jpg'),
(4, 'Rinjani', 'NTB', 'gunung yang berlokasi di Pulau Lombok', './assets/rinjani.jpg'),
(5, 'Borobudur', 'Kec. Borobudur, Kabupaten Magelang, Jawa Tengah', 'the world\'s largest Buddhist temple.', './assets/borobudur2.jpg'),
(6, 'Bali', 'Bali', 'Surga tropis yang memukau dan kekayaan budaya yang memesona.', './assets/bali.jpg'),
(7, 'Raja Ampat', 'Papua Barat', 'surganya di bumi. Kepulauan Papua ini menawarkan keindahan bawah laut yang tak tertandingi.', './assets/raja_ampat.jpg'),
(8, 'Candi Prambanan', 'solo', 'Situs Hindu kuno mengagumkan dengan arsitektur memukau dan legenda yang kental', './assets/prambanan.jpg'),
(9, 'wakatobi', 'sulawesi tenggara', 'perairan ajaib Indonesia.Terumbu karang yang megah dan kehidupan bawah laut yang kaya ', './assets/wakatobi.jpg'),
(10, 'sabang', 'Aceh', 'serpihan surga di ujung barat Indonesia.tempat yang sempurna untuk menikmati pesona alam yang autentik.', './assets/sabang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review_text` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourists`
--

CREATE TABLE `tourists` (
  `tourist_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `jumlah_beli` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `tanggal_beli` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourists`
--

INSERT INTO `tourists` (`tourist_id`, `user_id`, `tour_id`, `jumlah_beli`, `total_harga`, `tanggal_beli`) VALUES
(5, 7, 12, 2, 24691356, '2023-12-16'),
(10, 7, 12, 2, 2469136, '2023-12-19'),
(11, 7, 12, 1, 1234568, '2023-12-19'),
(12, 7, 12, 1, 1234568, '2023-12-19'),
(14, 7, 12, 1, 1234568, '2023-12-19'),
(15, 7, 30, 1, 900000, '2023-12-19'),
(16, 7, 30, 1, 900000, '2023-12-19'),
(17, 5, 31, 2, 1200000, '2023-12-19'),
(19, 9, 16, 1, 12345678, '2023-12-19'),
(20, 7, 38, 1, 11000000, '2023-12-19'),
(21, 9, 41, 2, 10000000, '2023-12-20'),
(22, 7, 42, 1, 2900000, '2023-12-20'),
(23, 7, 42, 1, 2900000, '2023-12-20'),
(24, 7, 40, 1, 900000, '2023-12-20'),
(25, 7, 41, 1, 5000000, '2023-12-20'),
(26, 7, 42, 3, 8700000, '2023-12-20'),
(27, 9, 41, 2, 10000000, '2023-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `tour_id` int(11) NOT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `tour_name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `max_capacity` int(11) DEFAULT NULL,
  `current_capacity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`tour_id`, `destination_id`, `tour_name`, `start_date`, `end_date`, `max_capacity`, `current_capacity`, `price`, `image_url`, `description`, `author_id`) VALUES
(12, 5, 'Perjalanan Tak Terlupakan di Borobudur', '2023-12-28', '2023-12-13', 19, 5, 1234568.00, '../assets/img_tour/rinjani.jpg', 'Selamat datang dalam petualangan spiritual dan budaya yang membawa Anda ke Candi Borobudur, sebuah peninggalan sejarah yang megah dan suci. Bersiaplah untuk menggali kebijaksanaan kuno dan keindahan arsitektur yang menakjubkan dari salah satu situs paling terkenal di Indonesia.\n\nHighlight Tur:\n\nPengalaman Mendalam di Candi Borobudur: Jelajahi kisah dan kebijaksanaan yang tertulis dalam dinding-dinding Candi Borobudur sambil menikmati pemandangan alam sekitar.\nInteraksi dengan Budaya Lokal: Pelajari lebih lanjut tentang budaya dan kehidupan sehari-hari masyarakat sekitar candi melalui interaksi dengan penduduk setempat.\nMuseum di Sekitar Candi: Kunjungi museum terdekat untuk memahami lebih dalam konteks sejarah dan kebudayaan di kawasan sekitar.', 5),
(16, 1, 'bromo mantap', '2023-11-29', '2023-12-06', 12, 1, 12345678.00, '../assets/img_tour/brobudur.jpg', 'Selamat datang di petualangan mendebarkan menuju salah satu destinasi paling ikonik di Indonesia: Gunung Bromo! Bersiaplah untuk merasakan keindahan alam yang memukau dan pengalaman yang tak terlupakan bersama kami. Fasilitas yang Disediakan: Transportai i nyaman dari tempat keberangkatan menuju Bromo. Penginapan yang nyaman dan aman. Guide lokal berpengalaman yang akan membimbing selama perjalanan. Sarapan dan fasilitas makan. Tiket masuk dan izin ke kawasan Bromo. Aktivitas terkait, seperti jeep untuk menjelajahi Lautan Pasir.', 5),
(30, 4, 'Rinjani Summit Expedition: Mendaki Puncak Kejayaan', '2023-12-31', '2024-01-02', 9, 2, 900000.00, '../assets/img_tour/rinjani.jpg', 'Selamat datang dalam perjalanan epik ke Gunung Rinjani, keajaiban alam yang menantang dan memukau di Indonesia! Bersiaplah untuk menghadapi petualangan mendaki gunung yang akan menguji kekuatan fisik dan mempersembahkan pemandangan yang tak terlupakan di puncak tertinggi di Pulau Lombok.\r\nHighlight Tur:\r\n\r\nMendaki ke Puncak Rinjani: Nikmati perjalanan mendaki yang menantang namun memuaskan, melalui pemandangan indah dan beragam ekosistem.\r\nIstirahat di Danau Segara Anak: Beristirahat dan bersantai di tepi danau yang indah di ketinggian, dengan pemandangan Gunung Barujari di tengahnya.\r\nPanorama Puncak Gunung: Rasakan kepuasan tersendiri saat mencapai puncak dan menikmati pemandangan spektakuler yang memukau dari ketinggian.', 7),
(31, 1, 'Eksplorasi Keajaiban Alam ke Gunung Bromo ', '2023-12-30', '2024-01-01', 12, 2, 600000.00, '../assets/img_tour/bromo-bagus.jpg', 'Sambutlah petualangan yang memukau menuju Gunung Bromo, salah satu keajaiban alam Indonesia yang tak tertandingi! Bersiaplah untuk mengalami pemandangan yang memikat, kemegahan kawah aktif, dan pesona matahari terbit yang memukau di tengah pegunungan.\r\n\r\nHighlight Tur:\r\n\r\nMatahari Terbit di Puncak Bromo: Nikmati momen magis saat matahari naik di antara gunung-gunung, menciptakan pemandangan yang tidak terlupakan.\r\nPetualangan dengan Jeep di Lautan Pasir: Jelajahi Lautan Pasir yang luas dan megah dengan menggunakan jeep khas, menembus medan yang menakjubkan.\r\nKawah Bromo dan Pura Luhur Poten: Saksikan keindahan kawah aktif yang megah dan kunjungi Pura Luhur Poten yang memukau.', 5),
(32, 2, ' Gili Trawangan Surga Kecil di Lombok ', '2023-12-26', '2024-01-02', 20, 0, 3000000.00, '../assets/img_tour/gili.jpg', 'Selamat datang di perjalanan yang mengagumkan menuju keindahan tersembunyi di Gili Trawangan! Bersiaplah untuk menikmati pesona pantai yang memesona, aktivitas menyelam yang menakjubkan, dan kehidupan malam yang penuh kegembiraan di pulau ini.\r\nDestinasi Utama: Gili Trawangan dengan segala pesona pantainya, aktivitas menyelam, snorkeling, dan kegiatan air lainnya.\r\n\r\nHighlight Tur:\r\n\r\nSnorkeling di Perairan Berwarna-warni: Jelajahi keindahan bawah laut Gili Trawangan dengan snorkeling di tempat-tempat terbaik yang dipilih oleh ahli lokal.\r\nWisata Pantai: Nikmati keindahan pasir putih dan air kristal di tepian pantai, ideal untuk bersantai atau berbagai kegiatan air.\r\nSunset di Gili Trawangan: Saksikan matahari terbenam yang spektakuler dari salah satu tempat terbaik di pulau ini. ', 7),
(34, 2, ' Surga Pasir Putih  Gili Trawangan', '2023-12-30', '2024-01-02', 10, 0, 3000000.00, '../assets/img_tour/gili2.jpg', 'Saat senja tiba, warna langit berpadu dengan laut, menciptakan lukisan jingga yang memesona. Nikmati hidangan laut segar sambil menyaksikan matahari terbenam, biarkan debur ombak dan semilir angin pantai menemani momen romantis tak terlupa.\r\n\r\nGili Trawangan menawarkan kehidupan malam yang seru. Bersantailah di bar tepi pantai, dengarkan alunan musik reggae semalam suntuk, dan biarkan jiwa petualang Anda berdansa mengikuti irama ombak.\r\n\r\nJadi, tunggu apa lagi? Bersepakatlah dengan petualangan ini dan buat kenangan tak terlupa di Gili Trawangan!', 7),
(35, 3, ' Surga Tersembunyi di Jakarta', '2023-12-14', '2023-12-22', 12, 0, 1000000.00, '../assets/img_tour/seribu.jpg', 'Pada perjalanan tour ke Pulau Seribu, Anda akan diajak untuk mengunjungi berbagai pulau-pulau cantik yang tersebar di kawasan ini. Anda dapat menikmati berbagai aktivitas wisata, seperti snorkeling, diving, berenang, bermain pasir, atau sekadar bersantai di tepi pantai.\r\n\r\nPerjalanan tour ke Pulau Seribu akan memberikan Anda pengalaman liburan yang tak terlupakan. Anda akan disuguhkan dengan keindahan alam yang luar biasa dan aktivitas wisata yang seru.', 7),
(36, 3, 'Jelajah Surga Bawah Laut Pulau Seribu!', '2024-01-06', '2024-01-10', 11, 0, 1300000.00, '../assets/img_tour/seribu2.jpg', 'Ingin merasakan sensasi berenang bersama pari manta dan penyu hijau? Pulau Seribu menawarkan lebih dari sekadar pantai! Temukan dunia bawah laut yang spektakuler dalam tour petualangan ini.\r\n\r\nMenyelami keajaiban:\r\n\r\nSnorkeling di titik terbaik Pulau Pari, temukan formasi karang terumbu yang memukau dan berinteraksi dengan ikan-ikan tropis warna-warni.\r\nSaksikan kemegahan hiu tutul berenang tenang di Pulau Seahorse.\r\nBersantai di Pantai Pasir Panjang Pulau Kelapa, menikmati sunset sambil ikut pelepasan anak penyu menuju laut lepas.', 7),
(37, 6, 'Destinasi Wisata Favorit Dunia', '2023-12-19', '2023-12-26', 19, 0, 3000000.00, '../assets/img_tour/bali.jpg', 'ali adalah salah satu destinasi wisata favorit di dunia. Pulau ini menawarkan keindahan alam yang menakjubkan, budaya yang kaya, dan keramahan penduduknya.\r\n\r\nWisatawan yang berkunjung ke Bali dapat menikmati berbagai aktivitas, mulai dari bersantai di pantai, menjelajahi pura-pura kuno, hingga berbelanja oleh-oleh.', 7),
(38, 7, ' Surga Bawah Laut di Tanah Papua', '2023-12-22', '2023-12-25', 15, 1, 11000000.00, '../assets/img_tour/raja_ampat.jpg', 'Raja Ampat, sebuah kepulauan di Provinsi Papua Barat, Indonesia, telah lama dikenal sebagai salah satu tujuan wisata alam terbaik di dunia. Keindahan alam bawah laut Raja Ampat yang luar biasa, dengan kekayaan terumbu karang, ikan, dan fauna laut lainnya, telah memikat wisatawan dari berbagai penjuru dunia.\r\nBerikut adalah beberapa highlight tour Raja Ampat yang tidak boleh Anda lewatkan:\r\n\r\nKeindahan alam bawah laut: Raja Ampat memiliki kekayaan terumbu karang yang sangat beragam, dengan lebih dari 500 spesies terumbu karang dan 1.500 spesies ikan. Anda bisa melihat berbagai jenis ikan, seperti ikan pari manta, ikan napoleon, dan ikan badut.\r\n\r\nPulau-pulau eksotis: Raja Ampat memiliki banyak pulau eksotis dengan pemandangan yang menakjubkan. Beberapa pulau yang populer untuk dikunjungi antara lain Pulau Kri, Pulau Wayag, Pulau Piaynemo, dan Pulau Arborek.\r\n\r\nBudaya lokal yang unik: Raja Ampat memiliki budaya lokal yang unik dan menarik. Anda bisa belajar tentang budaya lokal ini dengan mengunjungi desa adat Waisai.', 7),
(39, 10, 'Pesona Wisata Bahari Sabang', '2023-12-21', '2023-12-23', 11, 0, 9000000.00, '../assets/img_tour/sabang.jpg', 'Sabang, Pulau Weh, merupakan salah satu destinasi wisata bahari terbaik di Indonesia. Dengan air laut yang jernih, pasir putih yang lembut, dan terumbu karang yang indah, Sabang menawarkan pengalaman wisata bahari yang tak terlupakan.\r\nAkomodasi\r\nPaket tour ini sudah termasuk akomodasi di hotel berbintang di Banda Aceh dan Sabang.\r\nTransportasi\r\nPaket tour ini sudah termasuk transportasi selama di Sabang.', 7),
(40, 8, 'Pesona Candi Prambanan, Mahakarya Arsitektur Hindu di Yogyakarta', '2023-12-16', '2023-12-17', 11, 1, 900000.00, '../assets/img_tour/prambanan.jpg', 'Candi Prambanan adalah salah satu destinasi wisata paling populer di Yogyakarta. Candi Hindu terbesar di Indonesia ini dibangun pada abad ke-9 Masehi dan merupakan salah satu warisan budaya dunia UNESCO. \r\nMenikmati pertunjukan Sendratari Ramayana\r\nPertunjukan Sendratari Ramayana adalah salah satu daya tarik utama Candi Prambanan. Pertunjukan ini menceritakan kisah Ramayana, salah satu epos Hindu yang terkenal. Pertunjukan ini biasanya diadakan di malam hari dan menampilkan berbagai tarian, musik, dan kostum yang indah.', 7),
(41, 9, 'Pesona Wakatobi, Surga Bawah Laut Indonesia ', '2024-01-06', '2024-01-09', 10, 5, 5000000.00, '../assets/img_tour/wakatobi.jpg', 'Wakatobi merupakan salah satu destinasi wisata bahari terbaik di Indonesia. Terletak di Provinsi Sulawesi Tenggara, Wakatobi memiliki kekayaan alam bawah laut yang luar biasa. Dengan 114 jenis terumbu karang, 850 jenis ikan, dan 10 jenis mamalia laut, Wakatobi merupakan surga bagi para penyelam dan pecinta alam.\r\nHighlight Tour:\r\nMenyelam di Taman Nasional Wakatobi\r\nBerkunjung ke Pulau Hoga\r\nMengunjungi Desa Bajo\r\nPaket tour ini sudah termasuk transportasi, akomodasi, makan, dan kegiatan wisata.', 7),
(42, 9, 'Menyelami Keajaiban Bawah Laut: Tour Mendalam ke Destinasi Eksotis Wakatobi', '2024-01-04', '2024-01-07', 8, 5, 2900000.00, '../assets/img_tour/francesco-ungaro-hqAGgNsMpEY-unsplash.jpg', 'Bergabunglah dalam petualangan tak terlupakan ke Wakatobi, destinasi magis yang terkenal dengan keindahan bawah lautnya yang memukau. Nikmati pengalaman yang mendalam dalam menjelajahi terumbu karang yang beragam, kehidupan laut yang mengagumkan, dan budaya lokal yang kaya di gugusan pulau yang memesona ini.', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `first_name`, `last_name`, `user_type`, `address`, `phone`) VALUES
(1, 'john_doe', 'john@example.com', '123', 'John', 'Doe', NULL, NULL, NULL),
(2, 'jane_smith', 'jane@example.com', '123', 'Jane', 'Smith', NULL, NULL, NULL),
(3, 'maria_garcia', 'maria@example.com', '123', 'Maria', 'Garcia', NULL, NULL, NULL),
(4, 'admin1', 'admin1@example.com', '123', 'Admin', 'Admin', NULL, NULL, NULL),
(5, 'tes', 'tes@test.com', '123', 'tes', 'tes`', NULL, NULL, NULL),
(7, 'admin', 'admin@gmail.com', '123', 'admin', 'admin', 'admin', NULL, 896123456),
(8, 'ihya', 'da123@gmail.com', '12345', 'bob', 'lo', NULL, 'ftcghvuihk,agiysvad,haod', 99999),
(9, 'budi', 'budi@gmail.com', '1234', 'budi', 'cahya', NULL, 'jawa barat', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`destination_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `reviews_icfk_1` (`tour_id`);

--
-- Indexes for table `tourists`
--
ALTER TABLE `tourists`
  ADD PRIMARY KEY (`tourist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`tour_id`),
  ADD KEY `destination_id` (`destination_id`),
  ADD KEY `fk_tours_users` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `destination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tourists`
--
ALTER TABLE `tourists`
  MODIFY `tourist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `reviews_icfk_1` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`) ON DELETE CASCADE;

--
-- Constraints for table `tourists`
--
ALTER TABLE `tourists`
  ADD CONSTRAINT `tourists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `tourists_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`tour_id`);

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `fk_tours_users` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destinations` (`destination_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
