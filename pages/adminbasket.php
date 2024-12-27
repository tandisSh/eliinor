<?php
include('vendor/dbConnection.php');
session_start();

// بازیابی تمامی سبدهای خرید
$basket_query = $pdo->prepare("SELECT 
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
LEFT JOIN users u ON b.user_id = u.id");
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
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید کاربران</title>
    <link rel="stylesheet" href="../public/css/adminBasket.css">
    
</head>

<body>
    <div class="container">
        <h1>سبدهای خرید کاربران</h1>
        <?php if (!empty($grouped_baskets)): ?>
            <?php foreach ($grouped_baskets as $user_id => $user_basket): ?>
                <div class="user-basket">
                    <h2>کاربر: <?php echo htmlspecialchars($user_basket['user_name']); ?></h2>
                    <table>
                        <thead>
                            <tr>
                                <th>تصویر محصول</th>
                                <th>نام محصول</th>
                                <th>قیمت</th>
                                <th>تعداد</th>
                                <th>جمع کل</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($user_basket['items'][0]['product_id'])): ?>
                                <?php foreach ($user_basket['items'] as $item): ?>
                                    <tr>
                                        <td class="product-image">
                                            <img src="../public/images/<?php echo htmlspecialchars($item['pro_image']); ?>" alt="Product Image">
                                        </td>
                                        <td><?php echo htmlspecialchars($item['pro_name']); ?></td>
                                        <td><?php echo number_format($item['pro_price']); ?> تومان</td>
                                        <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                                        <td><?php echo number_format($item['pro_price'] * $item['quantity']); ?> تومان</td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" style="color: orange; text-align: center;">سبد خرید این کاربر خالی است.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: orange; text-align: center;">هیچ سبد خریدی یافت نشد.</p>
        <?php endif; ?>
    </div>
</body>

</html>
