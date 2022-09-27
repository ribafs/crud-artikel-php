<?php
require 'process.php';

if (!isset($_GET["title"])) {
    header("location: index.php");
}

$url = $_GET['title'];

$article = query("SELECT * FROM article WHERE url = '$url'")[0];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article['title']; ?></title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <h1><?= $article['title']; ?></h1>
    <p><?= $article['description']; ?></p>
    <p>Description on : <?= date("d - M - Y", $article['time']); ?></p>

    <img style="width: 300px;" src="picture/<?= $article['picture']; ?>" alt="<?= $article['title']; ?>">

    <div><?= $article['content']; ?></div>
</body>
</html>
