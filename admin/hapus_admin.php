<?php
        include "layout/header.php";
        if(!$_SESSION['login']){
            header('location:login.php');
        }

        $a=$_GET['id'];
        
        $qry=mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$a'");
        if($qry)
            header("location: list_admin.php", true, 301);
        else
            echo "failed";
?>