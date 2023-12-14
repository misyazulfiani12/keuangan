<?php 
require "config.php";

session_start();

$id_transaksi = $_GET['id_transaksi'];
    $hapus = $connect->query("DELETE FROM transaksi WHERE
    id_transaksi='$id_transaksi';
    ");

    if ($hapus) {
        $_SESSION["pesan_berhasil"] = " transaksi berhasil dihapus!";

        header("location:transaksi.php");
    }else {
        $_SESSION["pesan_error"] = " transaksi tidak berhasil dihapus!";

        header("location:transaksi.php");
    }
 ?>
