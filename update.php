<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: Login.php");
}

require "regis.php";

$id = $_GET["id"];

$list = makingQuery("SELECT * FROM todolist where nomor = $id")[0];

if (isset($_POST["submit"])) {
    if (changeTodo($_POST) > 0) {
        echo "<script> 
           alert('data berhasil diubah!');
           document.location.href = 'index.php';
         </script>";
    } else {
        echo "<script> 
    alert('data gagal diubah!');    
  </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.rtl.min.css" 
    integrity="sha384-DOXMLfHhQkvFFp+rWTZwVlPVqdIhpDVYT9csOnHSgWQWPX0v5MCGtjCJbY6ERspU" crossorigin="anonymous">
    <title>Update To Do list</title>
</head>
 
<body id="text-center" style="background-color:steelwhite">
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <h2>Update To Do List</h2> 

    <div class="container">
    <form action="" method="post">             
        <input type="hidden" name="id" value="<?= $list["nomor"];?>">
        <input type="text" name="list" id="list" required value="<?= $list["todo"];?>">
        <button type="submit" name="submit" class="btn btn-primary">update</button>       
        <a href="index.php"><button type="button" class="btn btn-primary">Back</button></a>
    </form>
    </div>  
    
    </body>
    
    </html>