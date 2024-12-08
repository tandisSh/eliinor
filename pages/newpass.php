<?php
session_start();

include('vendor/dbConnection.php');

// چک کردن اینکه فرم ارسال شده است
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ابتدا بررسی کنیم که کاربر وارد سیستم شده است
    if (!isset($_SESSION['users'])) {
        echo "لطفاً وارد حساب کاربری خود شوید.";
        exit;
    }

    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // بررسی اینکه رمز عبور جدید و تایید شده مطابقت دارند
    if ($new_password !== $confirm_password) {
        echo "رمز عبور جدید و تایید شده مطابقت ندارند.";
        exit;
    }

    // گرفتن شناسه کاربری (این شناسه باید از قبل در سشن ذخیره شده باشد)
    $user_id = $_SESSION['users']['id'];

    // گرفتن رمز عبور فعلی کاربر از پایگاه داده
    $sql = "SELECT password FROM users WHERE id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "خطا در اجرای کوئری.";
        exit;
    }

    // بررسی اینکه رمز عبور فعلی صحیح است
    if (!$user || $current_password !== $user['password']) {
        echo "رمز عبور فعلی صحیح نیست.";
        exit;
    }

    // به روز رسانی رمز عبور در پایگاه داده
    $sql_update = "UPDATE users SET password = :new_password WHERE id = :user_id";
    $stmt_update = $pdo->prepare($sql_update);
    $stmt_update->bindParam(':new_password', $new_password, PDO::PARAM_STR);
    $stmt_update->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    if ($stmt_update->execute()) {
        echo "رمز عبور شما با موفقیت تغییر یافت.";
        header('./dashbord.php');
        exit;
    } else {
        echo "خطا در تغییر رمز عبور.";
    }

    // بستن ارتباطات
    $stmt->closeCursor();
    $stmt_update->closeCursor();
}
?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/newpass.css">
    <title>Document</title>
</head>
<body dir="rtl">
<form method="POST" action="">
    <label for="current_password">رمز عبور فعلی:</label>
    <input type="password" id="current_password" name="current_password" required><br>

    <label for="new_password">رمز عبور جدید:</label>
    <input type="password" id="new_password" name="new_password" required><br>

    <label for="confirm_password">تایید رمز عبور جدید:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br>

    <button type="submit">تغییر رمز عبور</button>
</form>
</body>
</html>


