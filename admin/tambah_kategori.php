<?php
    include "layout/header.php";
    if(!$_SESSION['login']){
        header('location:login.php');
    }

    if(isset($_POST['tambah_kategori'])){
        $namak=$_POST['namak'];

        $perintah = "INSERT INTO kategori (nama_kategori) VALUE ('$namak')";

        $simpan = mysqli_query($koneksi, $perintah);
        if($simpan)
            header("location: list_kategori.php", true, 301);
        else
            echo "Failed";
    }
?>


    <div class="tambah-admin" align="center">
        <form action="" method="post">
            <table class="tambah-c" align="center">
                <tr>
                    <td><h1>Tambah Kategori</h1></td>
                </tr>
            </table>
            <table class="tambah-a">
                <tr>
                    <td><input type="text" name="namak" placeholder="Nama Kategori"></td>
                </tr>
            </table>
            <table>
            <tr class="tambah-b">
                <td><input type="submit" name="tambah_kategori" value="Tambah"></td>
                </tr>
            </table>
        </form>
    </div>