<?php
    include "layout/header.php";
    if(!$_SESSION['login']){
        header('location:login.php');
    }

    $x=$_GET['id'];
    $tampil=("SELECT * FROM admin WHERE id_admin='$x'");
    $query=mysqli_query($koneksi, $tampil) or die ("Failed");
    $row=mysqli_fetch_array($query);
    $a          =$row['id_admin'];
    $nama_admin =$row['nama_admin'];
    $user       =$row['user_admin'];
    $pass       =$row['pass_admin'];

?>

<?php
if(isset($_POST['edit_admin'])){
    $cond = "";
    $a2   =$_POST['id'];
    $nama_admin2=$_POST['nama_admin'];
    $user2   =$_POST['user'];
    $cond .= "nama_admin='$nama_admin2', user_admin='$user2'";

    if(!empty(($_POST['pass']))){
        $pass2   =md5($_POST['pass']);
        $cond .= ", pass_admin='$pass2'";
    }

    $ubah="UPDATE admin SET $cond WHERE id_admin='$a2' ";
    mysqli_query($koneksi,$ubah);
    if($ubah)
        header("location: list_admin.php", true, 301);
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
        <table>
            <input type="hidden" name="id" value="<?php echo $a;?>">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama_admin" value="<?php echo $nama_admin;?>"></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="user" value="<?php echo $user;?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" value=""></td>
            </tr>
            <tr>
                <td><input type="submit" name="edit_admin" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>