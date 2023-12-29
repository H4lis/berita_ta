<?php
    include "layout/header.php";
    if(!$_SESSION['login']){
        header('location:login.php');
    }
    if(isset($_POST['submit'])){
        $move = "../gambar/";
        $editor      =$_POST['editor'];
        $judul      =$_POST['judul'];
        $isi        =$_POST['isi'];
        $kategori   =$_POST['kategori'];
        $gambar     =$_FILES["gambar"]['name'];
                    
        move_uploaded_file($_FILES["gambar"]['tmp_name'], $move.$_FILES["gambar"]['name']);
        
        $perintah="INSERT INTO berita (editor, judul_berita, isi_berita, id_kategori, gambar_berita) VALUE ('$editor','$judul','$isi','$kategori','$gambar')";

        $simpan=mysqli_query($koneksi, $perintah);
        if($simpan)
            header("location:list_berita.php", true, 301);
        else
            echo "Failed";
    }

    // kategori
    $perintah = "SELECT * FROM kategori ORDER BY nama_kategori ASC";
    $simpan=mysqli_query($koneksi,$perintah);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <table class="tambah_title" align="center">
        <tr>
            <td align="center">
                <h1>Tambah Berita</h1>
            </td>
        </tr>
    </table>
    <table class="tambah-tengah" border="0" align="center">
    <tr>
            <td width="20%">
                editor <br>
                <input type="text" name="editor" size="50" placeholder="editor" >
            </td>
        </tr>
        <tr>
            <td width="20%">
                Judul <br>
                <input type="text" name="judul" size="50" placeholder="Judul Berita" >
            </td>
        </tr>
        <tr>
            <td>
                Isi <br>
                <textarea name="isi" id="isi" cols="92" rows="5" vrap="hard" placeholder="Isi Berita"></textarea>
            </td>
        </tr>
        <tr>
            <td>Kategori <br>
                <select required name="kategori" id="kategori">
                    <option value="">Pilih Kategori</option>
                    <?php while($row=mysqli_fetch_array($simpan)){?>
                    <option value="<?=$row['id_kategori'] ?>"><?=$row['nama_kategori'] ?></option>
                    <?php
                        }
                        ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Gambar <br>
                <input type='file' name="gambar">
            </td>
        </tr>
    </table>

    <table class="tambah-bawah" align="center">
        <tr>
            <td align="center">
                <input type="submit" value="Submit" name="submit">
                <input type="reset" value="Cancel">
            </td>
        </tr>
    </table>
</form>
</body>
</html>