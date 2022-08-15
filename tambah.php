<?php

require 'proses.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["tambah"])) {
        if (tambah($_POST) > 0) {
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
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" placeholder="Judul" required>
            <label for="deskripsi">Deskripsi</label>
            <textarea style="width: 100%;" rows="4" name="deskripsi" id="deskripsi" placeholder="Deskripsi" required></textarea>
            <label for="gambar">Gambar</label>
            <input type="file" accept="image/*" name="gambar" id="gambar" placeholder="gambar" required>
            <labehl for="ckeditor">Konten</labehl>
            <textarea class="ckeditor" name="konten" id="ckeditor" placeholder="Konten" required></textarea>
            <button type="submit" name="tambah" style="margin-top: 10px;">Tambah</button>
        </form>
    </div>

</body>

</html>
