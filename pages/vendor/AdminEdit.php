<?php
include('dbConnection.php');
session_start();

if (!isset($_SESSION['users'])) {
    header("Location:../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $name = $_POST['pro-name'];
    $quantity = $_POST['pro-qty'];
    $price = $_POST['pro-price'];
    $categoryId = $_POST['pro_category_id'];
    $details = $_POST['pro-detail'];
    $imagePath = null;

    if (isset($_FILES['pro_image']) && $_FILES['pro_image']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['pro_image']['name'];
        $imageTmpPath = $_FILES['pro_image']['tmp_name'];
        $imageDestination = '../uploads/' . $imageName;

        if (move_uploaded_file($imageTmpPath, $imageDestination)) {
            $imagePath = 'uploads/' . $imageName; 
        } else {
            echo "مشکلی در آپلود تصویر پیش آمد.";
            exit();
        }
    } else {
        // در صورتی که تصویر آپلود نشود، مقدار قبلی تصویر را از دیتابیس دریافت می‌کنیم
        $stmt = $pdo->prepare("SELECT pro_image FROM products WHERE id = :id");
        $stmt->execute(['id' => $productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product) {
            $imagePath = $product['pro_image']; // تصویر قبلی
        } else {
            echo "محصول موردنظر یافت نشد.";
            exit();
        }
    }

    $stmt = $pdo->prepare("UPDATE products 
                           SET pro_name = :name, 
                               pro_qty = :quantity, 
                               pro_price = :price, 
                               pro_category_id = :category_id, 
                               pro_detail = :details, 
                               pro_image = :image 
                           WHERE id = :id");
    $stmt->execute([
        'name' => $name,
        'quantity' => $quantity,
        'price' => $price,
        'category_id' => $categoryId,
        'details' => $details,
        'image' => $imagePath,
        'id' => $productId,
    ]);
    
    echo "محصول با موفقیت ویرایش شد.";
    header("Location:../dashbord.php");
    exit();
}
