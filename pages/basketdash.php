<?php 
include('vendor/dbConnection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/basket.css">
    <title>سبد خرید</title>
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <h2>سبد خرید شما</h2>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Example items in cart (replace this with database fetch)
                $cart = [
                    ['name' => 'Product 1', 'price' => 100, 'quantity' => 2],
                    ['name' => 'Product 2', 'price' => 200, 'quantity' => 1],
                ];
                $grandTotal = 0;

                foreach ($cart as $item) {
                    $total = $item['price'] * $item['quantity'];
                    $grandTotal += $total;
                    echo "
                    <tr>
                        <td>{$item['name']}</td>
                        <td>\${$item['price']}</td>
                        <td>{$item['quantity']}</td>
                        <td>\${$total}</td>
                        <td><button class='btn btn-danger'>Remove</button></td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="total">
            Grand Total: $<?php echo $grandTotal; ?>
        </div>
        <button class="btn">Proceed to Checkout</button>
    </div>
</body>
</html>
