<?php
        $koneksi=mysqli_connect("localhost", "root", "") or die('Gagal');
        $db=mysqli_select_db($koneksi,"berita_ta");
        if(!$db){
            echo "koneksi gagal";
        }
?>