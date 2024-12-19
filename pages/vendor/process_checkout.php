<?php
include('dbConnection.php');
session_start();

// بررسی لاگین بودن کاربر
if (!isset($_SESSION['users'])) {
    echo "لطفاً وارد حساب کاربری خود شوید.";
    exit;
}

$user_id = $_SESSION['users']['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // اطلاعات فرم ارسال شده
    $city= $_POST['city'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];

    // بازیابی سبد خرید کاربر
    $basket_query = $pdo->prepare("SELECT * FROM baskets WHERE user_id = :user_id");
    $basket_query->execute(['user_id' => $user_id]);
    $basket = $basket_query->fetch(PDO::FETCH_ASSOC);

    if (!$basket) {
        echo "سبد خرید یافت نشد.";
        exit;
    }

    // بازیابی اقلام سبد خرید
    $basket_items_query = $pdo->prepare("SELECT * FROM basket_items WHERE basket_id = :basket_id");
    $basket_items_query->execute(['basket_id' => $basket['basket_id']]);
    $basket_items = $basket_items_query->fetchAll(PDO::FETCH_ASSOC);

    if (empty($basket_items)) {
        echo "سبد خرید شما خالی است.";
        exit;
    }

    // ایجاد سفارش جدید در جدول orders
    $order_query = $pdo->prepare("
        INSERT INTO orders (user_id,city, address, postal_code, phone, created_at)
        VALUES (:user_id, :city, :address, :postal_code, :phone, NOW())
    ");
    $order_query->execute([
        'user_id' => $user_id,
        'city' => $city,
        'address' => $address,
        'postal_code' => $postal_code,
        'phone' => $phone
    ]);

    // شناسه سفارش ایجاد شده
    $order_id = $pdo->lastInsertId();

    // انتقال اقلام سبد خرید به جدول order_items
    $order_items_query = $pdo->prepare("
        INSERT INTO order_items (order_id, product_id, quantity, price)
        VALUES (:order_id, :product_id, :quantity, :price)
    ");

    foreach ($basket_items as $item) {
        // دریافت قیمت محصول
        $product_query = $pdo->prepare("SELECT pro_price FROM products WHERE id = :product_id");
        $product_query->execute(['product_id' => $item['product_id']]);
        $product = $product_query->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $order_items_query->execute([
                'order_id' => $order_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $product['pro_price']
            ]);
        }
    }

    // حذف اقلام از جدول basket_items
    $delete_items_query = $pdo->prepare("DELETE FROM basket_items WHERE basket_id = :basket_id");
    $delete_items_query->execute(['basket_id' => $basket['basket_id']]);

    // حذف سبد خرید از جدول baskets
    $delete_basket_query = $pdo->prepare("DELETE FROM baskets WHERE basket_id = :basket_id");
    $delete_basket_query->execute(['basket_id' => $basket['basket_id']]);

    echo "سفارش شما با موفقیت ثبت شد.";
    header("Location:../Orders.php");
    exit;
}
?>
