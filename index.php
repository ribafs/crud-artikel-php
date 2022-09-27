<?php

require 'process.php';

$i = 1;
$article = query("SELECT * FROM article");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>

    <h1>Home</h1>

    <ul>
        <li><a href="article.php">List Article</a></li>
    </ul>

    <br>
    <a href="add.php">+ Add New Article</a>
    <br>
    <br>
    <br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Picture</th>
            <th>Upload Time</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Happy</th>
        </tr>
        <?php foreach ($article as $a) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $a['title']; ?></td>
                <td><?= $a['description']; ?></td>
                <td><img style="width: 40px;" src="picture/<?= $a['picture']; ?>" alt="<?= $a['title']; ?>"></td>
                <td><?= date("d- M - Y", $a['time']); ?></td>
                <td><a href="detail-article.php?title=<?= $a['url']; ?>" type="button">Detail</a></td>
                <td><a href="edit.php?id=<?= $a['id']; ?>" type="button">Edit</a></td>
                <td><a href="delete.php?id=<?= $a['id']; ?>" type="button">Delete</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
