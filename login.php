<?php

//session start,jika sudah login tidak perlu login ulang lagi
//contoh jika sudah berada di halmaan admin_depan.php ,tiak akan bisa masuk ke halmaan login.php
session_start();
if(isset($_SESSION['admin_username'])){
    header("location:admin_depan.php");
}

include("koneksi.php");

//default nya kosong
$username = '';
$password = '';
$err = '';

//melakukan pengecekan memastikan username dan password diisi
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($username == '' or $password == ''){
        $err .= "<li>Silahkan masukan username dan password </li>";
    }

    //setelah di cek jika mmeng tidka terjadi error
    if(empty($err)){
        $sql1 = "select * from admin where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);

    if($r1['password'] != md5($password)){
        $err .= "<li> Username dan Password Salah, Cek Kembali!</li>";
    }
    }
    //cek dlu apakah punya akses
    if(empty($err)){
        $id_login = $r1['id_login'];
        $sql1 ="select * from admin_akses where id_login = '$id_login'" ;
        $q1 = mysqli_query($koneksi, $sql1);

        while($r1 = mysqli_fetch_array($q1)){
            $akses[] = $r1['id_akses']; //keuangan, manager,absensi
        }
        //jika tidak punya akses
        if(empty($akses)){
            $err .= "<li> Anda tidak memiliki akses ke halaman ini</li>";        }
    }

    if(empty($err)){
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_akses'] = $akses; //jangan lupa tambahkan sessionnya
        header("location:admin_depan.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAYROLL STAFF</title>
        
    <!-- <title>Bootstrap</title> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
  

</head>
<body>
    <div id="app">
        <h1>HALAMAN LOGIN</h1>
        <?php
        if($err) {
            echo "<ul>$err</ul>";
        }
    ?>
        <form action="" method="post">
            <input type="text" value="<?php echo $username ?>" name="username" class="input" placeholder="Username"> <br> <br>
            <input type="password" name="password" class="input" placeholder="Password"> <br> <br>
            <input type="submit" name="login" value="LOGIN" class="btn btn-primary">
      </form>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>