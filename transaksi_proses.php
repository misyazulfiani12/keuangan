<?php 
require "config.php";

session_start();

if (isset($_POST["create"])) {
    $id_akun =$_POST["id_akun"];
    $id_user =$_POST["id_user"];
    $tanggal =$_POST["tanggal"];
    $keterangan =$_POST["keterangan"];
    $jumlah =$_POST["jumlah"];
    $posisi =$_POST["posisi"];
    $created_at =$_POST["created_at"];
    $created_by =$_POST["created_by"];

    // var_dump($_POST["id_akun"],$_POST["id_user"],$_POST["tanggal"],$_POST["keterangan"],$_POST["jumlah"],$_POST["posisi"],$_POST["created_at"],$_POST["created_by"]);die();

        $connect->query("INSERT INTO transaksi SET
        id_akun='$id_akun',
        id_user='$id_user',
        tanggal='$tanggal',
        keterangan='$keterangan',
        jumlah='$jumlah',
        posisi='$posisi',
        created_at='$created_at',
        created_by='$created_by'
        ");

$_SESSION["pesan_berhasil"] = "transaksi berhasil disimpan!";
    
         header("location:transaksi.php");    

   
}

if (isset($_POST["update"])) {
    $id_transaksi =$_POST["id_transaksi"];
    $id_transaksi_now =$_POST["id_transaksi_now"];
    $id_akun =$_POST["id_akun"];
    $id_user =$_POST["id_user"];
    $tanggal =$_POST["tanggal"];
    $keterangan =$_POST["keterangan"];
    $jumlah =$_POST["jumlah"];
    $posisi =$_POST["posisi"];
    $created_at =$_POST["created_at"];
    $created_by =$_POST["created_by"];


    $cek_id_akun = $connect->query("SELECT * FROM transaksi WHERE
    id_akun='$id_akun';
    ");

// var_dump($cek_idakun);die();
if($id_akun==$id_transaksi_now){
    $connect->query("UPDATE transaksi SET
    id_akun='$id_akun',
    id_user='$id_user',
    tanggal='$tanggal',
    keterangan='$keterangan',
    jumlah='$jumlah',
    posisi='$posisi',
    created_at='$created_at',
    created_by='$created_by' WHERE id_akun='$id_akun';
    ");

$_SESSION["pesan_berhasil"] = "transaksi berhasil diperbaharui!";

     header("location:transaksi.php");
}else{
    if ($cek_id_akun->num_rows == 1) {


        $_SESSION["pesan_error"] = "id akun sudah digunakan!";

        header("location:transaksi_edit.php?id_transaksi=$id_transaksi");
    }else {
        $connect->query("UPDATE transaksi SET
        id_akun='$id_akun',
        id_user='$id_user',
        tanggal='$tanggal',
        keterangan='$keterangan',
        jumlah='$jumlah',
        posisi='$posisi',
        created_at='$created_at',
        created_by='$created_by' WHERE id_akun='$id_akun';
        ");

$_SESSION["pesan_berhasil"] = "transaksi berhasil diperbaharui!";
    
         header("location:transaksi.php");
    }
}
    

   
}
 ?>
