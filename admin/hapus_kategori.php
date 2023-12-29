<?php
        include "layout/header.php";
        if(!$_SESSION['login']){
            header('location:login.php');
        }

        $a=$_GET['id'];
        
        $qry=mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori = '$a'");
        if($qry)
            header("location: list_kategori.php", true, 301);
        else
            echo "failed";
?>