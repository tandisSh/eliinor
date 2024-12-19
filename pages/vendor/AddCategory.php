<?php
include('dbConnection.php'); 
session_start();

if (isset($_SESSION['users'])) {
    if ($_SESSION['users']['type'] == 0) {
        header("Location: index.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // دریافت اطلاعات فرم
    $category_name = $_POST['category-name'];

    // اعتبارسنجی داده‌ها
    if (empty($category_name)) {
        header("Location: addCategory.php?error=نام دسته‌بندی نمی‌تواند خالی باشد.");
        exit();
    } else {
        // ذخیره دسته‌بندی جدید در دیتابیس
        $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->execute(['name' => $category_name]);

        header("Location: addCategory.php?success=دسته‌بندی با موفقیت اضافه شد.");
        exit();
    }
}
?>
