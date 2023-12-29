<?php
    include "layout/header.php";
    if(!$_SESSION['login']){
        header('location:login.php');
    }

    if(isset($_POST['tambah_admin'])){
        $nama_admin=$_POST['nama_admin'];
        $user   =$_POST['user'];
        $pass   =md5($_POST['pass']);

        $perintah = "INSERT INTO admin VALUES ('','$nama_admin', '$user', '$pass')";
        $simpan = mysqli_query($koneksi, $perintah);
        if($simpan)
            header("location: list_admin.php", true, 301);
        else
            echo "Failed";
    }
?>


    <div class="tambah-admin" align="center">
        <form action="" method="post">
            <table class="tambah-c" align="center">
                <tr>
                    <td><h1>Tambah Admin</h1></td>
                </tr>
            </table>
            <table class="tambah-a">
                <tr>
                    <td><input type="text" name="nama_admin" placeholder="Nama Pengguna"></td>
                </tr>
                <tr>
                    <td><input type="text" name="user" placeholder="Username"></td>
                </tr>
                <tr>
                    <td><input type="password" name="pass" placeholder="Password"></td>
                </tr>
            </table>
            <table class="tambah-b" align="center">
                <tr>
                    <td><input type="submit" na me="tambah_admin" value="Tambah"></td>
                </tr>
            </table>
        </form>
    </div>
