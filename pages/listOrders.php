<?php
include('vendor/dbConnection.php');
session_start();

// چک کردن ورود ادمین


// تعریف وضعیت‌ها
$status_labels = [
    1 => 'در حال بررسی',
    2 => 'ارسال شده',
    3 => 'لغو شده'
];

// واکشی سفارشات تمام کاربران
$sql = "
    SELECT 
        o.id AS order_id, 
        o.created_at AS order_date, 
        o.status, 
        o.user_id, 
        u.username, 
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
    INNER JOIN 
        users u ON o.user_id = u.id
    GROUP BY 
        o.id, oi.product_id
    ORDER BY 
        o.created_at DESC";

$stmt = $pdo->query($sql);
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// تغییر وضعیت سفارش
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'], $_POST['status'])) {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $update_sql = "UPDATE orders SET status = :status WHERE id = :order_id";
    $update_stmt = $pdo->prepare($update_sql);
    $update_stmt->execute(['status' => $status, 'order_id' => $order_id]);

    header("Location: AdminOrders.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت سفارشات</title>
    <link rel="stylesheet" href="../public/css/listOrders.css">
</head>
<body>
    <div class="container">
        <h1>مدیریت سفارشات</h1>
        <?php if (!empty($orders)): ?>
            <?php 
            $current_order_id = null; 
            foreach ($orders as $order): 
            ?>
                <?php if ($current_order_id !== $order['order_id']): ?>
                    <?php if ($current_order_id !== null): ?>
                        </table>
                        <form method="POST" class="order-actions">
                            <input type="hidden" name="order_id" value="<?php echo $current_order_id; ?>">
                            <button type="submit" name="status" value="2">ارسال شده</button>
                            <button type="submit" name="status" value="3">لغو شده</button>
                        </form>
                    <?php endif; ?>
                    <div class="order">
                        <h2>شماره سفارش: <?php echo $order['order_id']; ?></h2>
                        <p>تاریخ سفارش: <?php echo $order['order_date']; ?></p>
                        <p>کاربر: <?php echo $order['username']; ?> (شناسه: <?php echo $order['user_id']; ?>)</p>
                        <p>جمع کل: <?php echo number_format($order['order_total']); ?> تومان</p>
                        <!-- <p>وضعیت: 
                            <?php echo $status_labels[$order['status']]; ?>
                        </p> -->
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
                    <form method="POST" class="order-actions">
                        <input type="hidden" name="order_id" value="<?php echo $current_order_id; ?>">
                        <button type="submit" name="status" value="2">ارسال شده</button>
                        <button type="submit" name="status" value="3">لغو شده</button>
                    </form>
                </div>
        <?php else: ?>
            <p>هیچ سفارشی ثبت نشده است.</p>
        <?php endif; ?>
    </div>
</body>
</html>
