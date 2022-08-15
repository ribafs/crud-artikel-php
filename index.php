<?php

require 'proses.php';

$i = 1;
$artikel = query("SELECT * FROM artikel");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h1>Home</h1>

    <ul>
        <li><a href="artikel.php">Daftar Artikel</a></li>
    </ul>

    <br>
    <a href="tambah.php">+ Tambah Artikel Baru</a>
    <br>
    <br>

    <br>

    <table>
        <tr>
            <th>#</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Gambar</th>
            <th>Waktu Upload</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        <?php foreach ($artikel as $a) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $a['judul']; ?></td>
                <td><?= $a['deskripsi']; ?></td>
                <td><img style="width: 40px;" src="gambar/<?= $a['gambar']; ?>" alt="<?= $a['judul']; ?>"></td>
                <td><?= date("d- M - Y", $a['waktu']); ?></td>
                <td><a href="detail-artikel.php?judul=<?= $a['url']; ?>" type="button">Detail</a></td>
                <td><a href="edit.php?id=<?= $a['id']; ?>" type="button">Edit</a></td>
                <td><a href="hapus.php?id=<?= $a['id']; ?>" type="button">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </table>


</body>

</html>
