<?php
session_start();

if(isset($_SESSION['user_id'])){
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>News System</title>
    <style>
        body{
            font-family: Arial;
            background: linear-gradient(to right, #007bff, #00c6ff);
            color:white;
            text-align:center;
            padding-top:100px;
        }

        .box{
            background:white;
            color:black;
            width:300px;
            margin:auto;
            padding:30px;
            border-radius:10px;
        }

        a{
            display:block;
            margin:10px;
            padding:10px;
            background:#007bff;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>News System</h2>
    <p>Welcome to the system</p>

    <a href="auth/login.php">Login</a>
    <a href="auth/register.php">Register</a>
</div>

</body>
</html>