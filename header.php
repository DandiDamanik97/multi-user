<?php
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}

// print_r($_SESSION['admin_akses']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app">
        <nav>
            <ul>
                <li><a href="admin_depan.php">Halaman Depan</a></li>
                <!-- validasi setiap user ke halaman masing masing -->
                <?php if(in_array("keuangan",$_SESSION['admin_akses'])){?>
                    <li><a href="admin_keuangan.php">Halaman Keuangan</a></li>
                <?php } ?>
                <?php if(in_array("manager",$_SESSION['admin_akses'])){?>
                    <li><a href="admin_manager.php">Halaman Manager</a></li>
                <?php } ?>
                <?php if(in_array("absensi",$_SESSION['admin_akses'])){?>
                    <li><a href="admin_absensi.php">Halaman Absensi</a></li>
                <?php } ?>
                <li><a href="logout.php">Logout >></a></li>
            </ul>
        </nav>
    