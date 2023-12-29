<?php
    include "layout/header.php";
    if(!$_SESSION['login']){
        header('location:login.php');
    }

    $tampil="SELECT * FROM kategori ORDER BY id_kategori DESC";
    $query=mysqli_query($koneksi,$tampil) or die ("gagal");
    $jumlah=mysqli_num_rows($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Berita</title>
</head>

<body>
    <div class="tambah">
        <a href="tambah_kategori.php">Tambah Kategori</a>
    </div>
    <table class="title-atas" border="0" align="center">
        <tr>
            <td align="center">
                <h1>List Kategori</h1>
            </td>
        </tr>
    </table>

    <table class="tengah" width="100%" border="1" align="center">
        <tr align="center" class="title-satu" bgcolor="#006FF">
            <td width="10%">No</td>
            <td width="60%">Nama Kategori</td>
            <td width="30%" colspan="2"><b>Action</b></td>
        </tr>
        <?php
        $no=1;
        while($row=mysqli_fetch_array($query))
        {
            $x       =$row['id_kategori'];
            $namak   =$row['nama_kategori'];
        ?>
        <tr align="center">
            <td><?php echo $no;?></td>
            <td><?php echo $namak;?></td>
            <td class="hapus"><a href="hapus_kategori.php?id=<?=$x;?>"
                    onClick="return confirm ('Are you sure delete this item');">Hapus</a></td>
            <td class="edit"><a href="edit_kategori.php?id=<?=$x;?>">Edit</a></td>
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
</body>

</html>