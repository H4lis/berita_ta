<?php
    include "../config/db_koneksi.php";

    if(isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = md5($_POST['pass']);

        $qry="SELECT * FROM admin WHERE user_admin='$user' AND pass_admin='$pass'";
        $msk=mysqli_query($koneksi,$qry)or die ("gagal");
        $data=mysqli_fetch_assoc($msk);

        if($row=mysqli_num_rows($msk) > 0){
            session_start();

            $_SESSION['id_admin'] = $data['id_admin'];
            $_SESSION['login'] = true;
            header("location: index.php", true, 301);
        } else {
            // echo "Username atau Password Salah !!";
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Username atau Password Salah !!")'; 
            echo '</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="login-page">
        <form action="" method="post">
            <table border="0">
                <tr>
                    <td>
                        <h1>Berita.om</h1>
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="text" name="user" placeholder="Username"></td>
                </tr>
                <tr>
                    <td align="center"><input type="password" name="pass" placeholder="Password"></td>
                </tr>
                <tr>
                    <td align="center"><input type="submit" name="login" value="Masuk"></td>
                </tr>
            </table>
        </form>
    </div>

</body>

</html>