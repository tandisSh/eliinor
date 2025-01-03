<?php
include('vendor/dbConnection.php');
session_start();
if (!isset($_SESSION['users'])) {
    echo "<p style='color: red;'>لطفاً وارد حساب کاربری خود شوید.</p>";
    exit;
}

$total_quantity = 0;
$total_price = 0;
$products = [];

if (isset($_SESSION["users"])) {
    $user_id = $_SESSION['users']['id'];
    $result = $pdo->prepare("SELECT * FROM baskets WHERE user_id = :user_id");
    $result->execute(['user_id' => $user_id]);
    $baskets = $result->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($baskets)) {
        $basket_id = $baskets[0]['basket_id'];
        $item_result = $pdo->prepare("SELECT * FROM basket_items WHERE basket_id = :basket_id");
        $item_result->execute(['basket_id' => $basket_id]);
        $basket_items = $item_result->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($basket_items)) {
            $product_ids = array_map(function ($item) {
                return $item['product_id'];
            }, $basket_items);

            $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
            $product_result = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
            $product_result->execute($product_ids);
            $products = $product_result->fetchAll(PDO::FETCH_ASSOC);

            //  محاسبه قیمت کل و تعداد کالاها
            foreach ($basket_items as $item) {
                foreach ($products as $product) {
                    if ($item['product_id'] == $product['id']) {
                        $total_quantity += $item['quantity'];
                        $total_price += $product['pro_price'] * $item['quantity'];
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سبد خرید شما</title>
    <link rel="stylesheet" href="../public/css/ShowBasket.css">
</head>

<body>
    <h1>سبد خرید شما</h1>
    <div class="cart-container">
        <!-- جدول جزئیات محصولات -->
        <?php if (!empty($products)): ?>
            <table>
                <thead>
                    <tr>
                        <th>تصویر</th>
                        <th>نام محصول</th>
                        <th>قیمت واحد</th>
                        <th>تعداد</th>
                        <th>جمع قیمت</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <?php
                        $quantity = 0;
                        foreach ($basket_items as $item) {
                            if ($item['product_id'] == $product['id']) {
                                $quantity = $item['quantity'];
                                break;
                            }
                        }
                        $total_price_product = $quantity * $product['pro_price'];
                        ?>
                        <tr>
                            <td class="product-image">
                                <img src="../public/images/<?php echo htmlspecialchars($product['pro_image']); ?>" alt="Product Image">
                            </td>
                            <td><?php echo htmlspecialchars($product['pro_name']); ?></td>
                            <td><?php echo number_format($product['pro_price']); ?> تومان</td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo number_format($total_price_product); ?> تومان</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- خلاصه سبد خرید -->
            <?php if (!empty($products)): ?>
                <div class="cart-summary">
                    <table>
                        <thead>
                            <tr>
                                <th>تعداد کل کالاها:</th>
                                <th>جمع کل:</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $total_quantity; ?></td>

                                <td><?php echo number_format($total_price); ?> تومان</td>
                            </tr>

                        </tbody>
                    </table>
                    <form action="checkout.php" method="POST" style="margin-top: 20px; text-align: center;">
                        <button type="submit">تایید و تکمیل سفارش</button>
                    </form>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <p class="empty-cart">سبد خرید شما خالی است.</p>

        <?php endif; ?>
    </div>

</body>

</html>