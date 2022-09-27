CREATE TABLE `artikel` (
  `id` int(11) primary key auto_increment NOT NULL ,
  `judul` varchar(150) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `konten` text NOT NULL,
  `url` varchar(150) NOT NULL,
  `waktu` int(11) NOT NULL
);
