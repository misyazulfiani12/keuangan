<?php 
require "config.php";

session_start();

if (isset($_POST["create"])) {
    $nama_akun =$_POST["nama_akun"];
    $kode_akun =$_POST["kode_akun"];
    $normal =$_POST["normal"];

    $cek_kodeakun = $connect->query("SELECT * FROM akun WHERE
    kode_akun='$kode_akun';
    ");

// var_dump($cek_kodeakun);die();
    if ($cek_kodeakun->num_rows == 1) {


        $_SESSION["pesan_error"] = "kode akun sudah digunakan!";

        header("location:akun_tambah.php");
    }else {
        $connect->query("INSERT INTO akun SET
        nama_akun='$nama_akun',
        kode_akun='$kode_akun',
        normal='$normal'
        ");

$_SESSION["pesan_berhasil"] = "akun berhasil disimpan!";
    
         header("location:akun.php");
    }

   
}

if (isset($_POST["update"])) {
    $id_akun =$_POST["id_akun"];
    $id_akun_now =$_POST["id_akun_now"];
    $nama_akun =$_POST["nama_akun"];
    $kode_akun =$_POST["kode_akun"];
    $normal =$_POST["normal"];


    $cek_kodeakun = $connect->query("SELECT * FROM akun WHERE
    kode_akun='$kode_akun';
    ");

// var_dump($cek_kodeakun);die();
if($kode_akun==$id_akun_now){
    $connect->query("UPDATE akun SET
    nama_akun='$nama_akun',
    kode_akun='$kode_akun',
    normal='$normal' WHERE kode_akun='$kode_akun';
    ");

$_SESSION["pesan_berhasil"] = "akun berhasil diperbaharui!";

     header("location:akun.php");
}else{
    if ($cek_kodeakun->num_rows == 1) {


        $_SESSION["pesan_error"] = "kode akun sudah digunakan!";

        header("location:akun_edit.php?id_akun=$id_akun");
    }else {
        $connect->query("UPDATE akun SET
        nama_akun='$nama_akun',
        kode_akun='$kode_akun',
        normal='$normal' WHERE kode_akun='$kode_akun';
        ");

$_SESSION["pesan_berhasil"] = "akun berhasil diperbaharui!";
    
         header("location:akun.php");
    }
}
    

   
}
 ?>
