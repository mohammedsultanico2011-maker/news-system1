<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$query = "SELECT * FROM categories";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Categories</title>
</head>
<body>

<h2>جميع الفئات</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>اسم الفئة</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)){ ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['category_name']; ?></td>
    </tr>
    <?php } ?>

</table>

<br>

<a href="../dashboard.php">رجوع للداشبورد</a>

</body>
</html>