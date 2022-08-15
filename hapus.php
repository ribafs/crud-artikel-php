<?php

require 'proses.php';

if (!isset($_GET["id"])) {
    header("location: index.php");
}

$id = $_GET['id'];

if (hapus($id) > 0) {
    header("Location: index.php");
} else {
    echo mysqli_error($conn);
}
