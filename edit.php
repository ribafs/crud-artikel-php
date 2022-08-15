<?php

require 'proses.php';

if (!isset($_GET["id"])) {
    header("location: index.php");
}

$id = $_GET['id'];

$edit = query("SELECT * FROM artikel WHERE id = '$id'")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["edit"])) {
        if (edit($_POST) > 0) {
            header("Location: index.php");
        } else {
            echo mysqli_error($conn);
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel</title>
    <style>
        label,
        button {
            display: block;
        }

        input {
            width: 100%;
            margin-bottom: 15px;
            height: 20px;
        }

        button {
            width: 100%;
            height: 40px;
            background-color: green;
            color: white;
        }
    </style>
    <script src="ckeditor/ckeditor.js"></script>
</head>

<body>

    <div class="container">
        <a href="index.php">Kembali ke Home</a>
        <h1>Tambah Produk</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <input type="hidden" name="gambar-lama" value="<?= $edit['gambar']; ?>">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" placeholder="Judul" value="<?= $edit['judul']; ?>" required>
            <label for="deskripsi">Deskripsi</label>
            <textarea style="width: 100%;" rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required><?= $edit['deskripsi']; ?></textarea>
            <label for="gambar">Gambar (Jika Perlu)</label>
            <input type="file" accept="image/*" name="gambar" id="gambar" placeholder="gambar">
            <labehl for="ckeditor">Konten</labehl>
            <textarea class="ckeditor" name="konten" id="ckeditor" placeholder="Konten" required><?= $edit['konten']; ?></textarea>
            <button type="submit" name="edit" style="margin-top: 10px;">Edit</button>
        </form>
    </div>

</body>

</html>
