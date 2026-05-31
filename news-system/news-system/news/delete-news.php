<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $query = "UPDATE news
              SET deleted = 1
              WHERE id = $id";

    if(mysqli_query($conn, $query)){
        header("Location: view-news.php");
        exit();
    }else{
        echo "Error";
    }
}
?>