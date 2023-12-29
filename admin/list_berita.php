<?php
    include "layout/header.php";
    if(!$_SESSION['login']){
        header('location:login.php');
    }

    // $tampil="SELECT * FROM berita ORDER BY id_berita DESC";

    $tampil="SELECT kategori.*, berita.* FROM berita LEFT JOIN kategori ON berita.id_kategori = kategori.id_kategori ORDER BY berita.id_berita DESC";

    $query=mysqli_query($koneksi,$tampil) or die ("gagal");
    $jumlah=mysqli_num_rows($query);
?>

    <div class="tambah">
        <a href="tambah.php">Tambah berita</a>
    </div>
    <table class="title-atas" border="0" align="center">
        <tr>
            <td align="center"><h1>List Berita</h1></td>
        </tr>
    </table>
    <table class="tengah" border="1" align="center">
        <tr class="title-satu" align="center" bgcolor="#006FF">
            <td width="5%">No</td>
            <td width="5%">editor</td>
            <td width="5%">Judul</td>
            <td width="25%">Isi</td>
            <td width="10%">Kategori</td>
            <td width="10%">Tanggal</td>
            <td width="20%">Gambar</td>
            <td width="10%" colspan="2">Action</td>
        </tr>
        <?php
        $no=1;
        while($row=mysqli_fetch_array($query))
        {
            $x       =$row['id_berita'];
            $editor   =$row['editor'];
            $judul   =$row['judul_berita'];
            $isi     =$row['isi_berita'];
            $kategori=$row['nama_kategori'];
            $tanggal=tanggal($row['tanggal_berita']);
            $gambar  =$row['gambar_berita'];
        ?>
        <tr align="center">
            <td><?php echo $no;?></td>
            <td><?php echo $editor;?></td>
            <td><?php echo $judul;?></td>
            <td><?php echo $isi;?></td>
            <td><?php echo $kategori;?></td>
            <td><?php echo $tanggal;?></td>
            <td ><img src="../gambar/<?php echo $gambar;?>" alt="" style="width:200px; "></td>
            <td class="hapus"><a href="hapus_berita.php?id=<?=$x;?>" onClick="return confirm ('Are you sure delete this item');">Hapus</a></td>
            <td class="edit"><a href="edit_berita.php?id=<?=$x;?>">Edit</a></td>
        </tr>
        <?php
        $no = $no+1;
        }
        ?>
    </table>

    <table class="bawah" border="0" align="center">
        <tr>
            <td>Jumlah Yang Tersimpan : <?php echo $jumlah; ?></td>
        </tr>
    </table>
