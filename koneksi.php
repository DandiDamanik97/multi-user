<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "AnginTornado";
$db_name = "payroll_staff";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$koneksi) {
    die("Koneksi Gagal");
} 