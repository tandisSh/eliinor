<?php
include "dbConnection.php";  


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $result = $pdo->prepare("DELETE FROM products WHERE id = ?");
    $result->bindValue(1, $product_id);
    $result->execute();

    header('Location: ../dashbord.php');
    exit();
} else {
    echo "شناسه محصول مشخص نشده است!";
}
?>
