<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

if(isset($_POST['submit'])){
    $category_name = $_POST['category_name'];

    $query = "INSERT INTO categories (category_name) 
              VALUES ('$category_name')";

    if(mysqli_query($conn, $query)){
        $msg = "تمت إضافة الفئة بنجاح";
    } else {
        $msg = "خطأ في الإضافة";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>

<h2>إضافة فئة</h2>

<form method="POST">
    <input type="text" name="category_name" placeholder="اسم الفئة" required>
    <button type="submit" name="submit">إضافة</button>
</form>

<p><?php if(isset($msg)) echo $msg; ?></p>

<br>

<a href="../dashboard.php">رجوع للداشبورد</a>

</body>
</html>