<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: auth/login.php");
    exit();
}

$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body{
            font-family: Arial;
            background:#f4f6f9;
            text-align:center;
        }

        .box{
            background:white;
            width:350px;
            margin:40px auto;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px #ccc;
        }

        h2{
            margin-bottom:5px;
        }

        .user{
            color:gray;
            margin-bottom:20px;
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

        a:hover{
            background:#0056b3;
        }

        .logout{
            background:red;
        }

        .logout:hover{
            background:darkred;
        }
    </style>
</head>
<body>

<div class="box">

    <h2>News System Dashboard</h2>

    <div class="user">
        Welcome, <?php echo $name; ?>
    </div>

    <a href="categories/add-category.php">Add Category</a>
    <a href="categories/view-categories.php">View Categories</a>

    <a href="news/add-news.php">Add News</a>
    <a href="news/view-news.php">View News</a>
    <a href="news/deleted-news.php">Deleted News</a>

    <a class="logout" href="auth/logout.php">Logout</a>

</div>

</body>
</html>