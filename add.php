<?php
require 'process.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["add"])) {
        if (add($_POST) > 0) {
            header("Location: index.php");
        } else {
            echo mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
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
        <a href="index.php">Back to Home</a>
        <h1>Add Product</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" required>
            <label for="description">Description</label>
            <textarea style="width: 100%;" rows="4" name="description" id="description" placeholder="Description" required></textarea>
            <label for="picture">Picture</label>
            <input type="file" accept="image/*" name="picture" id="picture" placeholder="Picture" required>
            <labehl for="ckeditor">Content</labehl>
            <textarea class="ckeditor" name="content" id="ckeditor" placeholder="Content" required></textarea>
            <button type="submit" name="add" style="margin-top: 10px;">Add</button>
        </form>
    </div>
</body>
</html>
