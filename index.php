<?php
$host="localhost";
$users="root";
$pass="";
$database="mahasiswa";

$regis=mysqli_connect($host, $users, $pass);
if($regis){
    $buka=mysqli_select_db($regis, $database);
    echo "Database dapat terhubung";
    if(!$buka){
        echo "Database tidak dapat terhubung";
    }
}else{
    echo "MySQL tidak Terhubung";
}
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika tidak ada data username di session, redirect ke halaman login
    header('Location: Login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama</title>
</head>
<body>
    <h1>Selamat datang di halaman utama, <?php echo $_SESSION['username']; ?>!</h1>
    
    <p>Ini adalah contoh halaman index.php.</p>
    
    <a href="logout.php">logout</a>
</body>
</html>
