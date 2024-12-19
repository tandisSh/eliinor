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

    $category_name = $_POST['category-name'];
   
    if (empty($category_name)) {
        header("Location: addCategory.php?error=نام دسته‌بندی نمی‌تواند خالی باشد.");
        exit();
    } else {
        
        $stmt = $pdo->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->execute(['name' => $category_name]);

        header("Location:../categoryList.php");
        exit();
    }
}
?>
