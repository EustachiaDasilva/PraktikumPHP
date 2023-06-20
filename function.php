<?php
require 'todo.php';

function createList($database){
    $bedauser = $_SESSION["userid"];
    global $conn;
    $kegiatan = $database["kegiatan"];
    $status = "Belum Selesai";

    $query = "INSERT INTO index (userId, kegiatan, status) VALUE ('$bedauser', '$kegiatan', '$status')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function deleteList($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM index WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function updateList($id){
    global $conn;
    $query = "UPDATE index SET status = 'Selesai' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

?>