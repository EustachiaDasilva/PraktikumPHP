<?php
$host="localhost";
$user="root";
$pass="";
$database="mahasiswa";

$regis=mysqli_connect($host, $user, $pass);
if($regis){
    $buka=mysqli_select_db($regis, $database);
    echo "Database dapat terhubung";
    if(!$buka){
        echo "Database tidak dapat terhubung";
    }
}else{
    echo "MySQL tidak Terhubung";
}

function registrasi($database){
    global $regis;

    $username = strtolower(stripslashes($database["username"]));
    $password = mysqli_real_escape_string($regis, $database["password"]);
    $password2 = mysqli_real_escape_string($regis, $database["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($regis, "SELECT username FROM user WHERE username = '$username'");
    
    if( mysqli_fetch_assoc($result) ){
        echo "<script>
                alert('username sudah terdaftar!')
            </script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $password2 ){
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan userbaru ke dalan database
    mysqli_query($regis, "INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_affected_rows($regis);

}

?>