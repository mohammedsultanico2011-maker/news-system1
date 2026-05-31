<?php
session_start();
include "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
    exit();
}

$id = $_GET['id'];

// جلب الخبر الحالي
$query = "SELECT * FROM news WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// جلب الفئات
$categories = mysqli_query($conn, "SELECT * FROM categories");

if(isset($_POST['update'])){

    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $details = $_POST['details'];

    if($_FILES['image']['name'] != ""){
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        move_uploaded_file($tmp, "../uploads/".$image);

        $update = "UPDATE news SET 
        category_id='$category_id',
        title='$title',
        details='$details',
        image='$image'
        WHERE id=$id";
    } else {
        $update = "UPDATE news SET 
        category_id='$category_id',
        title='$title',
        details='$details'
        WHERE id=$id";
    }

    if(mysqli_query($conn, $update)){
        header("Location: view-news.php");
        exit();
    } else {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit News</title>
</head>
<body>

<h2>تعديل الخبر</h2>

<form method="POST" enctype="multipart/form-data">

    <label>الفئة:</label>
    <select name="category_id">
        <?php while($c = mysqli_fetch_assoc($categories)){ ?>
            <option value="<?php echo $c['id']; ?>"
            <?php if($c['id'] == $row['category_id']) echo "selected"; ?>>
                <?php echo $c['category_name']; ?>
            </option>
        <?php } ?>
    </select>

    <br><br>

    <label>العنوان:</label>
    <input type="text" name="title" value="<?php echo $row['title']; ?>">

    <br><br>

    <label>التفاصيل:</label>
    <textarea name="details"><?php echo $row['details']; ?></textarea>

    <br><br>

    <label>تغيير الصورة:</label>
    <input type="file" name="image">

    <br><br>

    <button type="submit" name="update">تحديث</button>

</form>

<br>

<a href="view-news.php">رجوع</a>

</body>
</html>س