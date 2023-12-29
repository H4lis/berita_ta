<?php
        include "layout/header.php";
        if(!$_SESSION['login']){
            header('location:login.php');
        }

        $a=$_GET['id'];
        // print_r($a);
        $qry=mysqli_query($koneksi, "DELETE FROM berita WHERE id_berita = '$a'");
        if($qry)
            header("location: list_berita.php", true, 301);
        else
            echo "failed";
?>