<?php
include('vendor/dbConnection.php');
session_start();
if (!isset($_SESSION['users'])) {
    echo "<p style='color: red;'>لطفاً وارد حساب کاربری خود شوید.</p>";
    exit;
}

$total_quantity = 0; // مقداردهی اولیه
$total_price = 0;    // مقداردهی اولیه
$products = [];      // مقداردهی اولیه برای جلوگیری از ارورها

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../public/css/showBasket.css">
</head>

<body>
    <h1>سبد خرید شما</h1>
    <div class="cart-container">
        <!-- بخش جزئیات محصولات -->
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="product-details">
                    <div class="product">
                        <img src="../public/images/<?php echo $product['pro_image']; ?>" alt="Product Image">
                        <div class="product-info">
                            <h3><?php echo $product['pro_name']; ?></h3>
                            <p><?php echo $product['pro_detail']; ?></p>
                        </div>
                        <div class="product-actions">
                            <span class="price"><?php echo $product['pro_price']; ?> تومان</span>

                            <!-- نمایش تعداد هر محصول -->
                            <?php
                            $quantity = 0;
                            foreach ($basket_items as $item) {
                                if ($item['product_id'] == $product['id']) {
                                    $quantity = $item['quantity'];
                                    break;
                                }
                            }
                            ?>
                            <div>
                                <span>تعداد: <?php echo $quantity; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="color: orange;">سبد خرید شما خالی است.</p>
        <?php endif; ?>

        <!-- بخش خلاصه سبد خرید -->
        <?php if (!empty($products)): ?>
            <div class="cart-summary">
                <h2>سبد خرید شما</h2>
                <div class="summary-item">
                    <span>تعداد کالاها</span>
                    <span><?php echo $total_quantity; ?></span>
                </div>
                <div class="summary-item">
                    <span>جمع سبد خرید</span>
                    <span><?php echo number_format($total_price); ?> تومان</span>
                </div>
                <div class="summary-item total">
                    <span>سود شما از خرید</span>
                    <span> تومان</span>
                </div>
                <form action="checkout.php" method="POST">
                    <button type="submit">تایید و تکمیل سفارش</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>
