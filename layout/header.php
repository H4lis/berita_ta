<?php
require "config/db_koneksi.php";
require "config/function.libs.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB Berita ta</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Berita.om</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Kontak</a></li>
                <li><a href="#">Tentang Kami</a></li>
            </ul>
            <form class="cari" action="cari.php" method="GET">
                <input type="text" name="txt_cari" placeholder="Cari">
                <button type="submit">&check;</button>
            </form>
        </header>
        <div class="clear"></div>
        <div class="content">