<?php

$conn = mysqli_connect("localhost", "root", "", "artikel");

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

function tambah($data)
{
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $konten = $data["konten"];
    $waktu = time();

    $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
    $trim = trim($string);
    $pre_url = strtolower(str_replace(" ", "-", $trim));
    $url = $pre_url . '';

    $error = $_FILES['gambar']['error'];
    if ($error === 4) {
        echo "Gambar belum dipilih!";
        return false;
    } else {
        $gambar = mengunggah_gambar();
    }

    if ($data == true) {

        $query = "INSERT INTO artikel (judul,deskripsi,gambar,konten,url,waktu ) VALUES('$judul', '$deskripsi', '$gambar', '$konten', '$url', '$waktu')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    } else {
        echo "Gagal menambahkan produk!";
    }
}


function edit($data)
{
    global $conn;

    $id = $data['id'];
    $judul = htmlspecialchars($data["judul"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    $konten = $data["konten"];

    $gambar_lama = $data['gambar-lama'];

    $string = preg_replace('/[^a-zA-Z0-9 \&%|{.}=,?!*()"-_+$@;<>\']/', '', $judul);
    $trim = trim($string);
    $pre_url = strtolower(str_replace(" ", "-", $trim));
    $url = $pre_url . '';

    $error = $_FILES['gambar']['error'];
    if ($error === 4) {
        $gambar = $gambar_lama;
    } else {
        $gambar = mengunggah_gambar();
    }

    $query = "UPDATE artikel SET judul = '$judul', deskripsi = '$deskripsi', gambar = '$gambar', konten = '$konten', url = '$url' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($data)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM artikel WHERE id = '$data'");

    return mysqli_affected_rows($conn);
}

function mengunggah_gambar()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $tmpNama = $_FILES['gambar']['tmp_name'];

    $ekstensiGambarSah = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarSah)) {
        echo "Yang anda Upload bukan gambar!";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "Ukuran gambar terlalu besar";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpNama, 'gambar/' . $namaFileBaru);

    return $namaFileBaru;
}
