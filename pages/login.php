<?php

 session_start();
 if(isset($_SESSION['users']))
 {
    header("Location:Dashboardd.php");
    exit();
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ورود</title>
    <link rel="stylesheet" href="../public/css/signUp.css">
</head>
<body>
<div class="container">
<h2>فرم ورود</h2>

            <form action="vendor/UserLogin.php"  method="post">

            <label for="email">ایمیل:</label>
            <input type="email" id="email" name="email" >
            <span class="error"></span>

            <label for="password">رمز عبور:</label>
            <input type="password" id="password" name="password">
            <span class="error"></span>
            
            <br><br>
            <input type="submit" value="ورود">
        </form>
        <a style=" color:black; " href="signUp.php" >حساب کاربری ندارید؟ ثبت نام کنید</a>
    </div>
    <script src="../public/js/login.js"></script>
</body>
</html>