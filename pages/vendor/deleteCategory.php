<?php
include('dbConnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM categories WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    header("Location:../CategoryList.php");
    exit;
} else {
    echo "شناسه دسته‌بندی ارسال نشده است!";
    exit;
}
?>
