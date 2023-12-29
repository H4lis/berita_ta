<?php
    require "layout/header.php";

    $key= '%'.$_GET['txt_cari'].'%';
    $qry= mysqli_query($koneksi, "SELECT kategori.*, berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE judul_berita LIKE '$key' ORDER BY berita.id_berita DESC ");
    $data=mysqli_fetch_array($qry);
    $row=mysqli_num_rows($qry);
?>

    <p>Terdapat <?=$row?> Berita dari Keyword "<?=$_GET['txt_cari'];?>"</p>
    <?php 
    if(mysqli_num_rows($qry)> 0){
    $no=1;
    do{ 
        if($no<7){
    ?>
    <div class="berita">
        <div class="cover-grid">
            <img src="gambar/<?=$data['gambar_berita'];?>" alt="">
        </div>
        <div class="kategori">
            <p>
                <a href="kategori.php?id=<?=$data['id_kategori'];?>"><?=$data['nama_kategori']?></a>
                <?=tanggal($data['tanggal_berita']);?>
            </p>
        </div>
        <div class="judul">
            <h5><a href="lihat_berita.php?id=<?=$data['id_berita']?>"><?=$data['judul_berita']?></a></h5>
        </div>
    </div>
    <?php
    $no= $no+1;
            }
        }while($data=mysqli_fetch_array($qry)); }?>
    <?php require "layout/footer.php"; ?>