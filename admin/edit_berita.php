<?php
    include "layout/header.php";
    if(!$_SESSION['login']){
        header('location:login.php');
    }

    $x=$_GET['id'];
    $tampil=("SELECT * FROM berita WHERE id_berita='$x'");
    $query=mysqli_query($koneksi, $tampil) or die ("Failed");
    $row=mysqli_fetch_array($query);

    $a        =$row['id_berita'];
    $editor    =$row['editor'];
    $judul    =$row['judul_berita'];
    $isi      =$row['isi_berita'];
    $kategori =$row['id_kategori'];
    $gambar   =$row['gambar_berita'];

    // kategori
    $perintah = "SELECT * FROM kategori ORDER BY nama_kategori ASC";
    $simpan=mysqli_query($koneksi,$perintah);
?>

<?php
    if(isset($_POST['update'])){
        $move = "../gambar/";
            $a2      =$_POST['id'];
            $editor2  =$_POST['editor'];
            $judul2  =$_POST['judul'];
            $isi2    =$_POST['isi'];
            $kategori2=$_POST['kategori'];
            $gambar2 =$_FILES["gambar"]['name'];
        
            if(!empty($gambar2)){
                move_uploaded_file($_FILES["gambar"]['tmp_name'], $move.$gambar2);
                $ubah="UPDATE berita SET gambar_berita='$gambar2' WHERE id_berita ='$a2'";
                mysqli_query($koneksi,$ubah);
            }

            $ubah="UPDATE berita SET editor='$editor2',judul_berita='$judul2', isi_berita='$isi2', id_kategori='$kategori2' WHERE id_berita='$a2' ";
            mysqli_query($koneksi,$ubah);
            if($ubah)
                header("location: list_berita.php", true, 301);
            else
                echo "Failed";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="">
        <table class="tambah_title" align="center">
            <tr>
                <td align="center">
                    <h1>Edit Berita</h1>
                </td>
            </tr>
        </table>

        <table class="tambah-tengah" border="0" align="center">
            <input type="hidden"  name="id" value="<?php echo $a;?>">
            <tr>
                <td width="20%">
                    editor <br>
                    <input type="text" name="editor" size="50" placeholder="editor" value="<?php echo $editor;?>">
                </td>
            </tr>
            <tr>
                <td width="20%">
                    Judul <br>
                    <input type="text" name="judul" size="50" placeholder="Judul Berita" value="<?php echo $judul;?>">
                </td>
            </tr>
            <tr>
                <td>
                    Isi <br>
                    <textarea name="isi" id="isi" cols="92" rows="5" vrap="hard" placeholder="Isi Berita"><?php echo $isi;?></textarea>
                </td>
            </tr>
            <tr>
                <td>Kategori <br>
                    <select required name="kategori">
                        <?php while($row=mysqli_fetch_array($simpan)){?>
                        <option value="<?=$row['id_kategori'] ?>" <?php if($kategori==$row['id_kategori']){echo 'selected';}?>><?=$row['nama_kategori'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Gambar <br>
                    <input type="file" name="gambar" value="<?php echo $gambar;?>">
                </td>
            </tr>
        </table>

        <table class="tambah-bawah" align="center">
            <tr>
                <td align="center">
                <input type="submit" value="Update" name="update">
                    <input type="reset" name="cancel" value="CANCEL">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>