<?php
session_start();
require 'dbConnection.php'; // فایل اتصال به دیتابیس

// بررسی ورود کاربر
if (!isset($_SESSION['user_id'])) {
    die("لطفاً وارد حساب کاربری خود شوید.");
}

$host = "localhost";
$dbname = "elinor";
$usernameDB = "root";
$passwordDB = "";
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
// گرفتن product_id از لینک
if (isset($_GET['product_id'])) {
    $product_id = intval($_GET['product_id']);
    $user_id = $_SESSION['user_id']; // شناسه کاربر از سشن

    try {
        // 1. بررسی اینکه آیا سبد خرید برای کاربر وجود دارد
        $pdo = new PDO($dsn, $usernameDB, $passwordDB);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT basket_id FROM basket_items WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $user_id]);
        $basket = $stmt->fetch();

        if (!$basket) {
            // اگر سبد وجود ندارد، ایجاد یک سبد جدید
            $stmt = $pdo->prepare("INSERT INTO basket_items (user_id) VALUES (:user_id)");
            $stmt->execute(['user_id' => $user_id]);
            $basket_id = $pdo->lastInsertId();
        } else {
            $basket_id = $basket['basket_id'];
        }

        // 2. افزودن محصول به جدول basket_items
        $stmt = $pdo->prepare("INSERT INTO basket_items (basket_id, product_id, quantity) 
                                VALUES (:basket_id, :product_id, 1)
                                ON DUPLICATE KEY UPDATE quantity = quantity + 1");
        $stmt->execute(['basket_id' => $basket_id, 'product_id' => $product_id]);

        echo "محصول با موفقیت به سبد خرید اضافه شد.";
        header("Location: ../showbasket.php"); // هدایت به صفحه سبد خرید
        exit;

    } catch (PDOException $e) {
        echo "خطا در اتصال به دیتابیس: " . $e->getMessage();
    }
} else {
    echo "شناسه محصول معتبر نیست.";
}
?>
