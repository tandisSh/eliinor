<?php
include('vendor/dbConnection.php');
include('vendor/processOrders.php');

// واکشی سفارشات
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
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت سفارشات</title>
    <link rel="stylesheet" href="../public/css/ListOrder.css">
</head>
<body>
    <div class="container">
        <h1>مدیریت سفارشات</h1>

        <?php if (!empty($orders)): ?>
            <?php 
            foreach ($orders as $order): 
            ?>
                <div class="order">
                    <h2>شماره سفارش: <?php echo $order['order_id']; ?></h2>
                    <p>تاریخ سفارش: <?php echo $order['order_date']; ?></p>
                    <p>کاربر: <?php echo $order['username']; ?> (شناسه: <?php echo $order['user_id']; ?>)</p>
                    <p>جمع کل: <?php echo number_format($order['order_total']); ?> تومان</p>
                    <p>وضعیت: 
                        <?php 
                        // وضعیت‌ها باید به صورت آرایه تعریف شده باشند. برای مثال:
                        $status_labels = ['در حال بررسی', 'ارسال شده', 'لغو شده'];
                        echo $status_labels[$order['status']];
                        ?>
                    </p>
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
                            <tr>
                                <td><?php echo $order['pro_name']; ?></td>
                                <td><?php echo number_format($order['pro_price']); ?> تومان</td>
                                <td><?php echo $order['quantity']; ?></td>
                                <td><?php echo number_format($order['pro_price'] * $order['quantity']); ?> تومان</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- فرم تغییر وضعیت برای هر سفارش -->
                    <form method="POST" action="vendor/processOrders.php" class="order-actions">
                        <input type="hidden" name="order_id" value="<?php echo $order['order_id']; ?>">
                        <label for="status-<?php echo $order['order_id']; ?>">تغییر وضعیت:</label>
                        <select name="status" id="status-<?php echo $order['order_id']; ?>">
                            <option value="0" <?php echo $order['status'] == 0 ? 'selected' : ''; ?>>در حال بررسی</option>
                            <option value="1" <?php echo $order['status'] == 1 ? 'selected' : ''; ?>>ارسال شده</option>
                            <option value="2" <?php echo $order['status'] == 2 ? 'selected' : ''; ?>>لغو شده</option>
                        </select>
                        <button type="submit">ثبت تغییر</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>هیچ سفارشی ثبت نشده است.</p>
        <?php endif; ?>
    </div>
</body>
</html>
