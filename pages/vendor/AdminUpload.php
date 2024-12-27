<?php 
include ('dbConnection.php');  
$pro_name = $pro_qty = $pro_price = $pro_image = $pro_detail = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pro_name = trim($_POST['pro-name']);
    $pro_qty = trim($_POST['pro-qty']);
    $pro_price = trim($_POST['pro-price']);
    $pro_image = $_FILES['image'];
    $pro_detail = trim($_POST['pro-detail']);
    $pro_category_id = trim($_POST['pro_category_id']);

    if (empty($pro_name)) {
        $errors[] = "لطفاً نام کالا را وارد کنید.";
    }

    
    if (empty($pro_qty)) {
        $errors[] = "لطفاً موجودی کالا را وارد کنید.";
    } elseif (!is_numeric($pro_qty) || $pro_qty <= 0) {
        $errors[] = "موجودی کالا باید یک عدد مثبت باشد.";
    }

    if (empty($pro_price)) {
        $errors[] = "لطفاً قیمت کالا را وارد کنید.";
    } elseif (!is_numeric($pro_price) || $pro_price <= 0) {
        $errors[] = "قیمت کالا باید یک عدد مثبت باشد.";
    }
    if (empty($pro_category_id)) {
        $errors[] = "لطفاً دسته بندی کالا را انتخاب کنید.";
    }
  
    //   تصویر کالا
    if (empty($pro_image['name'])) {
        $errors[] = "لطفاً تصویر کالا را وارد کنید.";
    } else {
        // بررسی نوع فایل و اندازه
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_size = 5 * 1024 * 1024; 

        if (!in_array($pro_image['type'], $allowed_types)) {
            $errors[] = "فقط فایل‌های JPG، PNG و GIF مجاز هستند.";
        }

        if ($pro_image['size'] > $max_size) {
            $errors[] = "حجم فایل باید کمتر از 5MB باشد.";
        }
    }

    if (empty($pro_detail)) {
        $errors[] = "لطفاً توضیحات تکمیلی کالا را وارد کنید.";
    }

    if (empty($errors)) {
        // مسیر ذخیره تصویر
        $upload_dir = '../../public/images/';
        $image_name = basename($pro_image['name']);
        $target_file = $upload_dir . $image_name;

        // انتقال فایل به پوشه uploads
        if (move_uploaded_file($pro_image['tmp_name'], $target_file)) {
            
            $sql = "INSERT INTO products (pro_name, pro_qty, pro_price, pro_image, pro_detail, pro_category_id) 
                    VALUES (:pro_name, :pro_qty, :pro_price, :image_name, :pro_detail ,:pro_category_id)";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(':pro_name', $pro_name);
            $stmt->bindParam(':pro_qty', $pro_qty);
            $stmt->bindParam(':pro_price', $pro_price);
            $stmt->bindParam(':image_name', $image_name);
            $stmt->bindParam(':pro_detail', $pro_detail);
            $stmt->bindParam(':pro_category_id', $pro_category_id);

            if ($stmt->execute()) {
                echo "کالا با موفقیت افزوده شد.";
            } else {
                echo "خطا در افزودن کالا.";
            }
        } else {
            $errors[] = "خطا در آپلود فایل. لطفاً دوباره تلاش کنید.";
        }
    }

    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}
?>
