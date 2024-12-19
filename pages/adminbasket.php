<?php
include('vendor/dbConnection.php');
session_start();

// بازیابی تمامی سبدهای خرید
$basket_query = $pdo->prepare("
    SELECT 
        b.basket_id,
        b.user_id,
        u.username AS user_name,
        bi.product_id,
        p.pro_name,
        p.pro_price,
        p.pro_image,
        bi.quantity
    FROM baskets b
    LEFT JOIN basket_items bi ON b.basket_id = bi.basket_id
    LEFT JOIN products p ON bi.product_id = p.id
    LEFT JOIN users u ON b.user_id = u.id
");
$basket_query->execute();
$baskets = $basket_query->fetchAll(PDO::FETCH_ASSOC);

// گروه‌بندی اطلاعات سبدها بر اساس کاربر
$grouped_baskets = [];
foreach ($baskets as $basket) {
    $user_id = $basket['user_id'];
    if (!isset($grouped_baskets[$user_id])) {
        $grouped_baskets[$user_id] = [
            'user_name' => $basket['user_name'],
            'items' => []
        ];
    }
    $grouped_baskets[$user_id]['items'][] = $basket;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User Baskets</title>
    <link rel="stylesheet" href="../public/css/showBasket.css">
</head>

<body>
    <h1>سبدهای خرید کاربران</h1>
    <?php if (!empty($grouped_baskets)): ?>
        <?php foreach ($grouped_baskets as $user_id => $user_basket): ?>
            <div class="user-basket">
                <h2>کاربر: <?php echo htmlspecialchars($user_basket['user_name']); ?></h2>
                <div class="cart-container">
                    <?php if (!empty($user_basket['items'][0]['product_id'])): ?>
                        <?php foreach ($user_basket['items'] as $item): ?>
                            <div class="product-details">
                                <div class="product">
                                    <img src="../public/images/<?php echo htmlspecialchars($item['pro_image']); ?>" alt="Product Image">
                                    <div class="product-info">
                                        <h3><?php echo htmlspecialchars($item['pro_name']); ?></h3>
                                        <p>قیمت: <?php echo number_format($item['pro_price']); ?> تومان</p>
                                    </div>
                                    <div class="product-actions">
                                        <span>تعداد: <?php echo htmlspecialchars($item['quantity']); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p style="color: orange;">سبد خرید این کاربر خالی است.</p>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <p style="color: orange;">هیچ سبد خریدی یافت نشد.</p>
    <?php endif; ?>
</body>

</html>
