<?php

require 'proses.php';

$article = query("SELECT * FROM article");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
</head>

<body>
    <h1>Article</h1>

    <?php foreach ($article as $a) : ?>
        <ul>
            <li><img style="width: 70px;" src="picture/<?= $a['picture']; ?>" alt="<?= $a['title']; ?>"></li>
            <li>Title : <?= $a['title']; ?></li>
            <li>Description : <?= $a['description']; ?></li>
            <li>Waktu : <?= date("d - M - Y", $a['time']); ?></li>
            <li><a href="detail-article.php?title=<?= $a['url']; ?>">Look</a></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>
