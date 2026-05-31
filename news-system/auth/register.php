<?php
include "../config/db.php";

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // حماية بسيطة
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // إدخال البيانات في قاعدة البيانات
    $query = "INSERT INTO users (name, email, password) 
              VALUES ('$name', '$email', '$password')";

    $result = mysqli_query($conn, $query);

    if($result){
        echo "تم التسجيل بنجاح!";
    } else {
        echo "خطأ في التسجيل";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>تسجيل مستخدم جديد</h2>

<form method="POST">

    <input type="text" name="name" placeholder="الاسم" required><br><br>

    <input type="email" name="email" placeholder="الإيميل" required><br><br>

    <input type="password" name="password" placeholder="كلمة المرور" required><br><br>

    <button type="submit" name="register">تسجيل</button>

</form>

</body>
</html>