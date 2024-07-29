<?php
include("header.php");

// agar tidak bisa lompat ke url lain
if(!in_array("manager",$_SESSION['admin_akses'])){
    echo "Anda tidak memiliki akses ke halaman ini";
    include("footer.php");
    exit();
}

?>

<h1>Halaman Manager</h1>
Selamat datang dihalaman Manager

<?php
include("footer.php");
?>