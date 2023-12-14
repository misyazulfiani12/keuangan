<?php 
require "config.php";

session_start();


    $username =$_POST["username"];
    $password = md5($_POST["password"]);
   

    $cek_login = $connect->query("SELECT * FROM user WHERE
    username='$username' AND password='$password';
    ");
    
    if ($cek_login->num_rows == 1) {
    $data=mysqli_fetch_assoc($cek_login);
   
        $_SESSION["status_login"] = TRUE;
        $_SESSION["id_user"] = $data['id_user'];
        $_SESSION["username"] = $data['username'];
        $_SESSION["nama_user"] = $data['nama_user'];

        header("location:dashboard.php");
    }else {
        $_SESSION["pesan_error"] = "login gagal !";
         header("location:index.php");
    }

   



 ?>
