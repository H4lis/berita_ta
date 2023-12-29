<?php
    require '../config/db_koneksi.php';
    require "../config/function.libs.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/style-header.css">
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="title">
                <h1>Berita.om</h1>
            </div>
        </div>
        <div class="panel">
            <ul>
                <li><a href="list_berita.php">List Berita</a></li>
                <li><a href="list_kategori.php">List Kategori</a></li>
                <li><a href="list_admin.php">List Admin</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="content">

