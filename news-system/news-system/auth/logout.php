<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>News System</title>

    <style>
        body{
            margin:0;
            font-family: Arial;
            background:#f4f4f4;
        }

        .header{
            background:#333;
            color:white;
            padding:15px;
        }

        .header a{
            color:white;
            margin-right:15px;
            text-decoration:none;
        }

        .container{
            padding:20px;
        }

        .footer{
            background:#333;
            color:white;
            text-align:center;
            padding:10px;
            position:fixed;
            bottom:0;
            width:100%;
        }
    </style>

</head>
<body>

<div class="header">
    <a href="dashboard.php">Dashboard</a>
    <a href="add-news.php">Add News</a>
    <a href="view-news.php">View News</a>
    <a href="logout.php">Logout</a>
</div>

<div class="container">