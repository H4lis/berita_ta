<?php
    include "layout/header.php";
    if(!$_SESSION['login']){
        header('location:login.php');
    }

    $x=$_GET['id'];
    $tampil=("SELECT * FROM kategori WHERE id_kategori='$x'");
    $query=mysqli_query($koneksi, $tampil) or die ("Failed");
    $row=mysqli_fetch_array($query);

    $a        =$row['id_kategori'];
    $namak    =$row['nama_kategori'];
?>

<?php
    if(isset($_POST['update_kategori'])){
            $a2      =$_POST['id'];
            $namak2  =$_POST['namak2'];

            $ubah="UPDATE kategori SET nama_kategori='$namak2' WHERE id_kategori='$a2' ";
            mysqli_query($koneksi,$ubah);
            if($ubah)
                header("location: list_kategori.php", true, 301);
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
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <table align="center">
            <tr>
                <tr colspan="2"><h1 align="center">Edit Kategori</h1></tr>
            </tr>

            <input type="hidden" name="id" value="<?php echo $a;?>">

            <tr>
                <td>Nama kategori</td>
                <td><input type="text" name="namak2" value="<?php echo $namak;?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="update_kategori" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>