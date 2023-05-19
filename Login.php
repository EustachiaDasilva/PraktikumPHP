<?php
require 'regis.php';

if( isset($_POST["login"]) ){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($regis, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if( mysqli_num_rows($result) === 1 ){

        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ){
            header("Location: index.html");
            exit;
        }
    }

    $error = true;

}

?>

<!DOCTYPE html>
<html>
<head>
<style>
      body {
        background-image: url('Wow.jpg');
        background-size: cover;
      }
      p {
        color: white;
      }

      .Button {
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        transition: background-color 0.3s ease;
      }

      .Button:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      }

      .Button a {
        text-decoration: none;
        color: white;
      }

      .Button:hover a {
        color: black;
      }

      form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 50px;
      }

      h1 {
        color: white;
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
      }

      .profil-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
      }

      .box {
        width: 200px;
        height: 200px;
        border: 1px solid black;
        border-radius: 10px;
      }
    <title>Halaman Login</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>

<h1>Halaman Login</h1>

<?php if( isset($error) ) : ?>
    <p style="color: red; font-style: italic;">username atau password salah</p>
<?php endif; ?>

<form action="" method="post">

    <ul>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username">
    </ul>

    <ul>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password">
    </ul>

    <ul>
        <button type="submit" name="login">Login</button>
    </ul>


</form>

</body>
</html>

      