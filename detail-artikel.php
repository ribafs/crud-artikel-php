<?php

require 'proses.php';

if (!isset($_GET["judul"])) {
    header("location: index.php");
}

$url = $_GET['judul'];

$artikel = query("SELECT * FROM artikel WHERE url = '$url'")[0];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $artikel['judul']; ?></title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h1><?= $artikel['judul']; ?></h1>
    <p><?= $artikel['deskripsi']; ?></p>
    <p>Diposting pada : <?= date("d - M - Y", $artikel['waktu']); ?></p>

    <img style="width: 300px;" src="gambar/<?= $artikel['gambar']; ?>" alt="<?= $artikel['judul']; ?>">

    <div><?= $artikel['konten']; ?></div>


</body>

</html>
