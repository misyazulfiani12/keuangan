<?php 
require "config.php";

session_start();

$id_akun = $_GET['id_akun'];
    $hapus = $connect->query("DELETE FROM akun WHERE
    id_akun='$id_akun';
    ");

    if ($hapus) {
        $_SESSION["pesan_berhasil"] = " akun berhasil dihapus!";

        header("location:akun.php");
    }else {
        $_SESSION["pesan_error"] = " akun tidak berhasil dihapus!";

        header("location:akun.php");
    }
 ?>