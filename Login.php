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
if (isset($_POST["Login"])) {
    // Jika sudah ada data username di session, redirect ke halaman index
    header("Location: index.php");
    exit();
}

// Koneksi ke database
$servername = "127.0.0.1";
$username_db = "nama_pengguna";
$password_db = "kata_sandi";
$database = "mahasiswa";

$conn = mysqli_connect("localhost", "root", "", 
"mahasiswa");


// Periksa apakah form login sudah disubmit
if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari pengguna dengan username yang sesuai
    $query = "SELECT * FROM `users` ORDER BY `users`.`username` ASC";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $users['password'])) {
            // Jika login berhasil, simpan data username di session
            $_SESSION['username'] = $username;
            header('Location: index.php');
            exit();
        }
    }
    $error = 'Username atau password salah!';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login</h1>
    
    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    
    <form action="Login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        
        <button type="submit" name="login">Login</button>
    </form>
   
</body>


</html>
