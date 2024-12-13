<?php
include ('vendor/dbConnection.php');
session_start();
if (!isset($_SESSION['users'])) {
    echo "لطفاً وارد حساب کاربری خود شوید.";
    exit;
}

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
            $product_ids = array_map(function($item) {
                return $item['product_id'];
            }, $basket_items);

            $placeholders = implode(',', array_fill(0, count($product_ids), '?'));
            $product_result = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
            $product_result->execute($product_ids); 
            $products = $product_result->fetchAll(PDO::FETCH_ASSOC); 
        } else {
            echo "سبد خرید شما خالی است.";
        }
    } else {
        echo "سبد خرید برای این کاربر یافت نشد.";
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
        <!-- Product Details Section -->
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
                            // پیدا کردن تعداد هر محصول از جدول basket_items
                            $quantity = 0;
                            foreach ($basket_items as $item) {
                                if ($item['product_id'] == $product['id']) {
                                    $quantity = $item['quantity']; // تعداد محصول
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
            <p>سبد خرید شما خالی است.</p>
        <?php endif; ?>

        <!-- Cart Summary Section -->
        <div class="cart-summary">
            <h2>سبد خرید شما</h2>
            <div class="summary-item">
                <span>تعداد کالاها</span>
                <span></span>
            </div>
            <div class="summary-item">
                <span>جمع سبد خرید</span>
                <span>178,440 تومان</span>
            </div>
            <div class="summary-item total">
                <span>سود شما از خرید</span>
                <span> تومان</span>
            </div>
            <button>تایید و تکمیل سفارش</button>
        </div>
    </div>
</body>
</html>
