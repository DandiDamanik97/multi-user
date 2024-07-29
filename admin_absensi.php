<?php
include("header.php");

// agar tidak bisa lompat ke url lain
if(!in_array("absensi",$_SESSION['admin_akses'])){
    echo "Anda tidak memiliki akses ke halaman ini";
    include("footer.php");
    exit();
}

?>

<h1>Halaman Absensi</h1>
Selamat datang dihalaman Absensi

<?php
include("footer.php");
?>