<?php
$conn = mysqli_connect("localhost", "root", "root", "testes");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function add($data)
{
    global $conn;

    $title = htmlspecialchars($data["title"]);
    $description = htmlspecialchars($data["description"]);
    $content = $data["content"];
    $time = time();

    $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $title);
    $trim = trim($string);
    $pre_url = strtolower(str_replace(" ", "-", $trim));
    $url = $pre_url . '';

    $error = $_FILES['picture']['error'];
    if ($error === 4) {
        echo "Image not selected!";
        return false;
    } else {
        $picture = upload_image();
    }

    if ($data == true) {
        $query = "INSERT INTO article (title,description,picture,content,url,time ) VALUES('$title', '$description', '$picture', '$content', '$url', '$time')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    } else {
        echo "Failed to add product!";
    }
}

function edit($data)
{
    global $conn;

    $id = $data['id'];
    $title = htmlspecialchars($data["title"]);
    $description = htmlspecialchars($data["description"]);
    $content = $data["content"];

    $old_picture = $data['old_picture'];

    $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $title);
    $trim = trim($string);
    $pre_url = strtolower(str_replace(" ", "-", $trim));
    $url = $pre_url . '';

    $error = $_FILES['picture']['error'];
    if ($error === 4) {
        $picture = $old_picture;
    } else {
        $picture = upload_image();
    }

    $query = "UPDATE article SET title = '$title', description = '$description', picture = '$picture', content = '$content', url = '$url' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function happy($data)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM article WHERE id = '$data'");
    return mysqli_affected_rows($conn);
}

function upload_image()
{
    $nameFile = $_FILES['picture']['name'];
    $sizeFile = $_FILES['picture']['size'];
    $tmpName = $_FILES['picture']['tmp_name'];

    $validImage_extension = ['jpg', 'jpeg', 'png'];
    $extensionImage = explode('.', $nameFile);
    $extensionImage = strtolower(end($extensionImage));

    if (!in_array($extensionImage, $validImage_extension)) {
        echo "What you upload is not a picture!";
        return false;
    }

    if ($sizeFile > 1000000) {
        echo "Image size is too big";
        return false;
    }

    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $extensionImage;

    move_uploaded_file($tmpNama, 'picture/' . $newFileName);

    return $newFileName;
}
