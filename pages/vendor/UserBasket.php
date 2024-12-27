 <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        include("dbConnection.php");

        $user_id = null;
        if (!isset($_SESSION['users'])) {
            echo "<p style='color: red;'>لطفاً وارد حساب کاربری خود شوید.</p>";
        } else {
            $user_id = $_SESSION['users']['id'];
        }

        if (isset($_POST['add_to_cart'])&& $user_id) {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            $basket_query = $pdo->prepare("SELECT * FROM baskets WHERE user_id = :user_id");
            $basket_query->execute(['user_id' => $user_id]);
            $basket = $basket_query->fetch(PDO::FETCH_ASSOC);

            if (!$basket) {
                $basket_query = $pdo->prepare("INSERT INTO baskets (user_id) VALUES (:user_id)");
                $basket_query->execute(['user_id' => $user_id]);
                $basket_id = $pdo->lastInsertId(); 
            } else {
                $basket_id = $basket['basket_id']; 
            }

            $basket_item_query = $pdo->prepare("SELECT * FROM basket_items WHERE basket_id = :basket_id AND product_id = :product_id");
            $basket_item_query->execute(['basket_id' => $basket_id, 'product_id' => $product_id]);
            $basket_item = $basket_item_query->fetch(PDO::FETCH_ASSOC);

            if ($basket_item) {
                $new_quantity = $basket_item['quantity'] + $quantity;
                $update_query = $pdo->prepare("UPDATE basket_items SET quantity = :quantity WHERE basket_id = :basket_id AND product_id = :product_id");
                $update_query->execute(['quantity' => $new_quantity, 'basket_id' => $basket_id, 'product_id' => $product_id]);
            } else {
                $insert_query = $pdo->prepare("INSERT INTO basket_items (basket_id, product_id, quantity) VALUES (:basket_id, :product_id, :quantity)");
                $insert_query->execute(['basket_id' => $basket_id, 'product_id' => $product_id, 'quantity' => $quantity]);
            }

            echo "محصول به سبد خرید اضافه شد!";
          
        }
        ?>