<?php
require 'regis.php';

if( isset($_POST["register"]) ){

    if( registrasi($_POST) > 0 ){
        echo "<script>
                alert('user baru berhasil ditambahkan!');
            </script>";
    } else{
        echo mysqli_error($regis);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>

<h1>Halaman Registrasi</h1>

<form action="" method="post">

    <ul>
        <label for="username">username :</label>
        <input type="text" name="username" id="username">
    </ul>

    <ul>
        <label for="password">password :</label>
        <input type="password" name="password" id="password">
    </ul>

    <ul>
        <label for="password2">konfirmasi password :</label>
        <input type="password" name="password2" id="password2">
    </ul>

    <ul>
        <button type="submit" name="register">Register</button>
    </ul>

</form>

</body>
</html>