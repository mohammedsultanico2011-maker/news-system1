<?php
session_start();
include "../config/db.php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];

        header("Location: ../dashboard.php");
        exit();

    } else {
        echo "الإيميل أو كلمة المرور غلط";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>تسجيل الدخول</h2>

<form method="POST">

    <input type="email" name="email" placeholder="الإيميل" required><br><br>

    <input type="password" name="password" placeholder="كلمة المرور" required><br><br>

    <button type="submit" name="login">دخول</button>

</form>

</body>
</html>