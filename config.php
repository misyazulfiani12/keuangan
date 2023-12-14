<?php

$servername = "localhost";
$database = "keuangan";
$username = "root";
$password = "";

$connect =mysqli_connect($servername, $username, $password, $database);

if ($connect) {
    return $connect;
}else {
    echo "koneksi database $database gagal";
}
