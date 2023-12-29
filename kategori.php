<?php
    require "layout/header.php";
    $a =$_GET['id'];

    $perintah="SELECT * FROM berita WHERE id_kategori = '$a' ORDER BY berita.id_berita DESC";
    $qry=mysqli_query($koneksi,$perintah);
    $data=mysqli_fetch_assoc($qry);
?>

    <?php 
    $no=1;
        do{ 
            if($no<7){
    ?>

    <div class="berita">
        <div class="cover-grid">
            <img src="gambar/<?=$data['gambar_berita'];?>" alt="" width="200px">
        </div>
        <div class="row">
            <?=tanggal($data['tanggal_berita']);?>
        </div>
        <div class="judul">
            <h5><a href="lihat_berita.php?id=<?=$data['id_berita']?>"><?=$data['judul_berita']?></a></h5>
        </div>
    </div>
    <?php 
    $no=$no + 1;
            }
    	}while($data=mysqli_fetch_assoc($qry)); 
    ?>

    <?php require "layout/footer.php"; ?>