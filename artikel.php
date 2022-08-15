<?php

require 'proses.php';

$artikel = query("SELECT * FROM artikel");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel</title>
</head>

<body>

    <h1>Artikel</h1>

    <?php foreach ($artikel as $a) : ?>
        <ul>
            <li><img style="width: 70px;" src="gambar/<?= $a['gambar']; ?>" alt="<?= $a['judul']; ?>"></li>
            <li>Judul : <?= $a['judul']; ?></li>
            <li>Deskripsi : <?= $a['deskripsi']; ?></li>
            <li>Waktu : <?= date("d - M - Y", $a['waktu']); ?></li>
            <li><a href="detail-artikel.php?judul=<?= $a['url']; ?>">Lihat</a></li>
        </ul>
    <?php endforeach; ?>

</body>

</html>
