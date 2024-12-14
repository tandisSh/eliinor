<?php
include ('dbConnection.php'); 
session_start();

// بررسی اینکه آیا کاربر لاگین کرده است یا خیر
if (!isset($_SESSION['users'])) {
    header("Location:../login.php");
    exit();
}

// دریافت داده‌های فرم
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productId = $_POST['product_id'];
    $name = $_POST['pro-name'];
    $quantity = $_POST['pro-qty'];
    $price = $_POST['pro-price'];
    $categoryId = $_POST['pro_category_id'];
    $details = $_POST['pro-detail'];
    $imagePath = null;

    // بررسی وجود تصویر آپلودی
    if (isset($_FILES['pro_image']) && $_FILES['pro_image']['error'] === UPLOAD_ERR_OK) {
        $imageName = $_FILES['pro_image']['name'];
        $imageTmpPath = $_FILES['pro_image']['tmp_name'];
        $imageDestination = '../uploads/' . $imageName;

        // انتقال فایل به پوشه‌ی uploads
        if (move_uploaded_file($imageTmpPath, $imageDestination)) {
            $imagePath = 'uploads/' . $imageName; // مسیر جدید تصویر
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

    // به‌روزرسانی اطلاعات محصول در دیتابیس
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
        'image' => $imagePath, // مسیر تصویر (جدید یا قبلی)
        'id' => $productId,
    ]);

    // پیام موفقیت و ریدایرکت به صفحه لیست محصولات
    echo "محصول با موفقیت ویرایش شد.";
    header("Location:../listOrders.php");
    exit();
}
?>
