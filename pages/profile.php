<?php
// شروع سیشن
session_start();

include('vendor/dbConnection.php');

if (!isset($_SESSION['users'])) {
    // اگر کاربر لاگین نکرده بود، به صفحه ورود هدایت شود
    header("Location: login.php");
    exit();
}

// دریافت ID کاربر از سیشن
$user_id = $_SESSION['users']['id'];

try {
    // دریافت اطلاعات کاربر از دیتابیس
    $query = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['id' => $user_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        echo "کاربر پیدا نشد!";
        exit();
    }

        // بررسی نقش کاربر
    $is_admin = isset($user['type']) && $user['type'] == 1;

  
} catch (PDOException $e) {
    echo "خطا در ارتباط با پایگاه داده: " . $e->getMessage();
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/Userprofile.css">

 
    <title>profile</title>
</head>
<body>
<div class="m" dir="rtl">
                <div class="card">
                    <div class="left-container">
                        <img class="img" src="../public/images/avatar.png">
                        <h2 class="gradienttext"><?php echo htmlspecialchars($user['username']); ?></h2>
                        <p class="p"><?php echo htmlspecialchars($user['email']); ?></p>
                    </div>
                    <div class="right-container">
                        <h3 class="gradienttext" style="color: #E35F83;">
                        <?php echo $is_admin ? 'پروفایل ادمین' : 'پروفایل کاربر'; ?>
                        </h3>
                        <div class="wrapper">
                            <table class="textAll">
                                <tr>
                                    <td>نام کاربری :</td>
                                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                                </tr>
                                <tr>
                                    <td>رمزعبور:</td>
                                    <td><?php echo htmlspecialchars($user['password']); ?></td>
                                </tr>
                                <tr>
                                    <td>شماره همراه :</td>
                                    <td><?php echo htmlspecialchars($user['phone_number']); ?></td>
                                </tr>
                                <tr>
                                    <td>ایمیل :</td>
                                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                                </tr>
                                <tr>
                                    <td>کد ملی:</td>
                                    <td><?php echo htmlspecialchars($user['national_code']); ?></td>
                                </tr>
                            </table>
                            <div id="newpass">
                                <a href="newpass.php" >تغییر رمز عبور</a>
                            </div>
                        </div>

                    </div>
                </div>
</body>
</html>