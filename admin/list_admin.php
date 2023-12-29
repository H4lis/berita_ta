<?php
    include "layout/header.php";
    if(!$_SESSION['login']){
        header('location:login.php');
    }

    $tampil="SELECT * FROM admin ORDER BY id_admin DESC";
    $query=mysqli_query($koneksi,$tampil) or die ("gagal");
    $jumlah=mysqli_num_rows($query);
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
    <div class="tambah">
        <a href="tambah_admin.php">Tambah Admin</a>
    </div>
    <table class="title-atas" width="100%" border="0" align="center">
        <tr>
            <td align="center">
                <h1>List Admin</h1>
            </td>
        </tr>
    </table>

    <table class="tengah" width="100%" border="1" align="center">
        <tr class="title-satu" align="center" bgcolor="#006FF">
            <td width="5%">No</td>
            <td width="30%">Nama Admin</td>
            <td width="25%">Username</td>
            <td width="30%">Password</td>
            <td width="10%" colspan="2"><b>Action</b></td>
        </tr>
        <?php
        $no=1;
        while($row=mysqli_fetch_array($query))
        {
            $x       =$row['id_admin'];
            $nama_admin   =$row['nama_admin'];
            $user   =$row['user_admin'];
            $pass   =$row['pass_admin'];
        ?>
        <tr align="center">
            <td><?php echo $no;?></td>
            <td><?php echo $nama_admin;?></td>
            <td><?php echo $user;?></td>
            <td><?php echo $pass;?></td>
            <td class="hapus"><a href="hapus_admin.php?id=<?=$x;?>"
                    onClick="return confirm ('Are you sure delete this item');">Hapus</a></td>
            <td class="edit"><a href="edit_admin.php?id=<?=$x;?>">Edit</a></td>
        </tr>
        <?php
        $no = $no+1;
        }
        ?>
    </table>

    <table class="bawah" width="100%" border="0" align="center">
        <tr>
            <td>Jumlah Yang Tersimpan : <?php echo $jumlah; ?></td>
        </tr>
    </table>
</body>

</html>