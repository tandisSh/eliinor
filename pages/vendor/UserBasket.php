<!-- <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        include("vendor/dbConnection.php");

        if (!isset($_SESSION['users'])) {
            echo "لطفاً وارد حساب کاربری خود شوید.";
            exit;
        }

        $user_id = $_SESSION['users']['id'];

        // اضافه کردن محصول به سبد خرید
        if (isset($_POST['add_to_cart'])) {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            // بررسی اینکه آیا سبد خرید برای این کاربر وجود دارد یا خیر
            $basket_query = $pdo->prepare("SELECT * FROM baskets WHERE user_id = :user_id");
            $basket_query->execute(['user_id' => $user_id]);
            $basket = $basket_query->fetch(PDO::FETCH_ASSOC);

            // اگر سبد خرید وجود ندارد، ایجاد می‌کنیم
            if (!$basket) {
                $basket_query = $pdo->prepare("INSERT INTO baskets (user_id) VALUES (:user_id)");
                $basket_query->execute(['user_id' => $user_id]);
                $basket_id = $pdo->lastInsertId(); // شناسه سبد خرید تازه ایجاد شده
            } else {
                $basket_id = $basket['basket_id']; // استفاده از شناسه سبد خرید موجود
            }

            // بررسی اینکه آیا این محصول قبلاً به سبد خرید اضافه شده است یا نه
            $basket_item_query = $pdo->prepare("SELECT * FROM basket_items WHERE basket_id = :basket_id AND product_id = :product_id");
            $basket_item_query->execute(['basket_id' => $basket_id, 'product_id' => $product_id]);
            $basket_item = $basket_item_query->fetch(PDO::FETCH_ASSOC);

            if ($basket_item) {
                // اگر محصول قبلاً موجود است، فقط تعداد آن را به‌روز می‌کنیم
                $new_quantity = $basket_item['quantity'] + $quantity;
                $update_query = $pdo->prepare("UPDATE basket_items SET quantity = :quantity WHERE basket_id = :basket_id AND product_id = :product_id");
                $update_query->execute(['quantity' => $new_quantity, 'basket_id' => $basket_id, 'product_id' => $product_id]);
            } else {
                // اگر محصول موجود نیست، آن را به سبد خرید اضافه می‌کنیم
                $insert_query = $pdo->prepare("INSERT INTO basket_items (basket_id, product_id, quantity) VALUES (:basket_id, :product_id, :quantity)");
                $insert_query->execute(['basket_id' => $basket_id, 'product_id' => $product_id, 'quantity' => $quantity]);
            }

            // نمایش پیام موفقیت
            echo "محصول به سبد خرید اضافه شد!";
        }
        ?> -->