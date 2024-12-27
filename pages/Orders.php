<?php
include('vendor/dbConnection.php');
session_start();

// چک کردن ورود کاربر
if (!isset($_SESSION['users'])) {
    echo "لطفاً وارد حساب کاربری خود شوید.";
    exit;
}

// واکشی سفارشات کاربر
$user_id = $_SESSION['users']['id'];
$sql = "
    SELECT 
        o.id AS order_id, 
        o.created_at AS order_date, 
        o.status AS status,
        SUM(oi.quantity * p.pro_price) AS order_total, 
        oi.product_id, 
        oi.quantity, 
        p.pro_name, 
        p.pro_price 
    FROM 
        orders o
    INNER JOIN 
        order_items oi ON o.id = oi.order_id
    INNER JOIN 
        products p ON oi.product_id = p.id
    WHERE 
        o.user_id = :user_id
    GROUP BY 
        o.id, oi.product_id
    ORDER BY 
        o.created_at DESC";


$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
$status_labels = [
    0 => 'در حال بررسی',
    1 => 'ارسال شده',
    2 => 'لغو شده'
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست سفارشات</title>
    <link rel="stylesheet" href="../public/css/Orders.css">
</head>
<body>
    <div class="container">
        <h1>لیست سفارشات</h1>
        <?php if (!empty($orders)): ?>
            <?php 
            $current_order_id = null; 
            foreach ($orders as $order): 
            ?>
                <?php if ($current_order_id !== $order['order_id']): ?>
                    <?php if ($current_order_id !== null): ?>
                        </table>
                    <?php endif; ?>
                    <div class="order">
                        <h2>شماره سفارش: <?php echo $order['order_id']; ?></h2>
                        <p>تاریخ سفارش: <?php echo $order['order_date']; ?></p>
                        <p>جمع کل: <?php echo number_format($order['order_total']); ?> تومان</p>
                        <p>وضعیت سفارش: <?php echo $status_labels[$order['status']]; ?></p>
                        <table class="order-items">
                            <thead>
                                <tr>
                                    <th>نام محصول</th>
                                    <th>قیمت</th>
                                    <th>تعداد</th>
                                    <th>جمع</th>
                                </tr>
                            </thead>
                            <tbody>
                <?php $current_order_id = $order['order_id']; ?>
                <?php endif; ?>
                                <tr>
                                    <td><?php echo $order['pro_name']; ?></td>
                                    <td><?php echo number_format($order['pro_price']); ?> تومان</td>
                                    <td><?php echo $order['quantity']; ?></td>
                                    <td><?php echo number_format($order['pro_price'] * $order['quantity']); ?> تومان</td>
                                </tr>
            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
        <?php else: ?>
            <p>هیچ سفارشی ثبت نشده است.</p>
        <?php endif; ?>
    </div>
</body>
</html>
