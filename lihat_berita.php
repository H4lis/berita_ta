<?php
    require "layout/header.php";
    $a =$_GET['id'];

    $perintah="SELECT kategori.*,berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE berita.id_berita = '$a' ";
    $qry=mysqli_query($koneksi,$perintah);
    $data=mysqli_fetch_array($qry);
?>

    <div class="col-9">
        <h1><?=$data['judul_berita'];?> </h1>
        <p><?=$data['editor'];?></p>
        <div class="row">
            <img src="gambar/<?=$data['gambar_berita'];?>" alt="" width="98%" heigth="300px">
        </div>
        <div class="row">
            <p><?=tanggal($data['tanggal_berita']);?></p>
            <p> <b> Kategori : <a href="kategori.php?id=<?=$data['id_kategori'];?>"><?=$data['nama_kategori']?></a></b> </p>
        </div>
        <div class="row-isi">
            <p><?=$data['isi_berita'];?></p>
        </div>
    </div>
    <div class="col-3">
        <h2>Berita Terkait</h2>
        <?php
            $id_berita = $data['id_berita'];
            $id_kategori = $data['id_kategori'];
            $q_terkait = mysqli_query($koneksi, "SELECT kategori.*, berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE berita.id_kategori = '$id_kategori'");
            $terkait = mysqli_fetch_array($q_terkait);

            if(mysqli_num_rows($q_terkait)> 0){
            $no=1;
            do{
                if($no<6){
                if($terkait['id_berita'] != $id_berita){
        ?>

        <div class="sidebar">
            <div class="terkait">
                <div class="image">
                    <img src="gambar/<?=$terkait['gambar_berita']?>" alt=" ">
                </div>
                <div class="atribut">
                    <a href="lihat_berita.php?id=<?=$terkait['id_berita']?>"><h5><?=$terkait['judul_berita']?></h5></a>
                </div>
            </div>
        </div>
        <?php 
        $no= $no+1;
                }
                }
            }while($terkait = mysqli_fetch_array($q_terkait)); 
                }else{ echo "Tidak Ada Berita terkait"; } 
        ?>

    </div>

    <?php require "layout/footer.php"; ?>