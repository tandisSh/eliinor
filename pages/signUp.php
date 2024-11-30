<?php

 session_start();
 if(isset($_SESSION['users']))
 {
    header("Location:Dashboardd.php");
    exit();
 }
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>فرم ثبت‌نام</title>
  <link rel="stylesheet" href="../public/css/signUp.css">
</head>
<body>
    <div class="container">
        <h2>فرم ثبت‌نام</h2>
 

<form action="vendor/UserSignUp.php" method="post" id="signUpForm">
    <label for="username">نام کاربری:</label>
    <input type="text" id="username" name="username">
    <span class="error"></span>

    <label for="email">ایمیل:</label>
    <input type="email" id="email" name="email">
    <span class="error"></span>

    <label for="password">رمز عبور:</label>
    <input type="password" id="password" name="password">
    <span class="error"></span>

    <label for="phoneNumber">شماره تماس:</label>
    <input type="text" id="phoneNumber" name="phoneNumber">
    <span class="error"></span>

    <label for="nationalCode">کد ملی:</label>
    <input type="text" id="nationalCode" name="nationalCode">
    <span class="error"></span>

    <label for="degree">مدرک تحصیلی:</label>
    <select id="degree" name="degree">
        <option value="">انتخاب کنید</option>
        <option value="دیپلم">دیپلم</option>
        <option value="کارشناسی">کارشناسی</option>
        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
        <option value="دکتری">دکتری</option>
    </select>
    <span class="error"></span>

    <input type="submit" value="ثبت‌نام">
</form>
<a style=" color:black; " href="login.php">حساب کاربری دارید؟ وارد شوید</a>
    </div>
    <script src="../public/js/signUp.js"></script>
</body>
</html>
