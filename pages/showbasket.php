<?php
include ('vendor/UserBasket.php');
$result=$pdo->prepare("SELECT * FROM Basket_items ");
$result->execute();
$baskets=$result->FetchAll(PDO::FETCH_ASSOC);


$resultpro=$pdo->prepare("SELECT * FROM products ");
$resultpro->execute();
$products=$resultpro->FetchAll(PDO::FETCH_ASSOC);

?>
?>
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .cart-container {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            gap: 20px;
        }
        .cart-summary {
            flex: 1;
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        .cart-summary h2 {
            font-size: 18px;
            margin-bottom: 15px;
        }
        .cart-summary .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .cart-summary .total {
            font-weight: bold;
            color: #e63946;
        }
        .cart-summary button {
            width: 100%;
            padding: 10px;
            background-color: #e63946;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .cart-summary button:hover {
            background-color: #d62828;
        }
        .product-details {
            flex: 2;
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }
        .product {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .product img {
            max-width: 80px;
            margin-right: 10px;
        }
        .product-info {
            flex: 1;
        }
        .product-info h3 {
            font-size: 16px;
            margin: 0;
            color: #333;
        }
        .product-info p {
            font-size: 14px;
            color: #666;
        }
        .product-actions {
            text-align: right;
        }
        .product-actions .price {
            font-size: 16px;
            color: #e63946;
            font-weight: bold;
        }
        .product-actions button {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #555;
            margin: 5px;
        }
        .product-actions button:hover {
            color: #e63946;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <!-- Product Details Section -->
        <div class="product-details">
            <div class="product">
                <img src="product-image.png" alt="Product Image">
                <div class="product-info">
                    <h3><?php  ?></h3>
                    <p>مناسب پوست های چرب و مختلط حجم 50 میلی لیتر</p>
                </div>
                <div class="product-actions">
                    <span class="price">145,900 تومان</span>
                    <div>
                        <button>-</button>
                        <span>1</span>
                        <button>+</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cart Summary Section -->
        <div class="cart-summary">
            <h2>سبد خرید شما</h2>
            <div class="summary-item">
                <span>قیمت کالاها (2)</span>
                <span>312,390 تومان</span>
            </div>
            <div class="summary-item">
                <span>جمع سبد خرید</span>
                <span>178,440 تومان</span>
            </div>
            <div class="summary-item total">
                <span>سود شما از خرید</span>
                <span>133,950 تومان</span>
            </div>
            <button>تایید و تکمیل سفارش</button>
        </div>
    </div>
</body>
</html>