<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$categories = mysqli_query($conn, "SELECT * FROM categories");

if(isset($_POST['submit'])){

    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $details = $_POST['details'];
    $user_id = $_SESSION['user_id'];

    $image = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_name, "../uploads/".$image);

    $query = "INSERT INTO news
    (category_id, title, details, image, user_id)
    VALUES
    ('$category_id','$title','$details','$image','$user_id')";

    if(mysqli_query($conn, $query)){
        $msg = "تم إضافة الخبر بنجاح";
    }else{
        $msg = "فشل إضافة الخبر";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add News</title>
</head>
<body>

<h2>إضافة خبر</h2>

<form method="POST" enctype="multipart/form-data">

    <label>الفئة:</label>
    <select name="category_id" required>
        <?php while($row = mysqli_fetch_assoc($categories)){ ?>
            <option value="<?php echo $row['id']; ?>">
                <?php echo $row['category_name']; ?>
            </option>
        <?php } ?>
    </select>

    <br><br>

    <label>عنوان الخبر:</label>
    <input type="text" name="title" required>

    <br><br>

    <label>تفاصيل الخبر:</label>
    <textarea name="details" required></textarea>

    <br><br>

    <label>صورة الخبر:</label>
    <input type="file" name="image" required>

    <br><br>

    <button type="submit" name="submit">إضافة الخبر</button>

</form>

<?php
if(isset($msg)){
    echo "<p>$msg</p>";
}
?>

<br>
<a href="../dashboard.php">رجوع للداشبورد</a>

</body>
</html>