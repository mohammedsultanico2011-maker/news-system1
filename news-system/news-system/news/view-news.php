<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$query = "SELECT news.*, categories.category_name
          FROM news
          INNER JOIN categories
          ON news.category_id = categories.id
          WHERE deleted = 0";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View News</title>
</head>
<body>

<h2>جميع الأخبار</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>الفئة</th>
    <th>العنوان</th>
    <th>التفاصيل</th>
    <th>الصورة</th>
    <th>العمليات</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['category_name']; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo $row['details']; ?></td>

    <td>
        <img src="../uploads/<?php echo $row['image']; ?>"
             width="100">
    </td>

    <td>
        <a href="edit-news.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        |

        <a href="delete-news.php?id=<?php echo $row['id']; ?>">
            Delete
        </a>
    </td>

</tr>

<?php } ?>

</table>

<br>

<a href="../dashboard.php">رجوع للداشبورد</a>

</body>
</html>