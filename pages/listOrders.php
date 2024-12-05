<?php
include ('vendor/dbConnection.php');
$sql = "SELECT id , pro_image , pro_name, pro_price , pro_detail FROM products";
$result = $pdo->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست سفارش‌ها</title>
    <link rel="stylesheet" href="../public/css/listOrder.css">
</head>
<body>
    <div class="container" >
        <h1>لیست سفارش‌ها</h1>
        <div class="gallery">
            <?php if ($result->rowCount() > 0): ?> 
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?> 
                    <div class="image-card">
                        <img src="../public/image/<?php echo $row['pro_image'];  ?>" alt="Image"> <!-- اصلاح نام ستون به pro_image -->
                        <div id="details">
                           <p><?php echo 'نام محصول:'.'  '.$row['pro_name']; ?><p>
                           <p><?php echo 'قیمت محصول:'.'  '.$row['pro_price']; ?><p>
                        </div>
                        
                        <div class="actions">
                            <button class="edit-btn" onclick="editImage(<?php echo $row['id']; ?>)">ویرایش
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 32 32" width="20px" height="20px">
                                    <path d="M 23.90625 3.96875 C 22.859375 3.96875 21.8125 4.375 21 5.1875 L 5.1875 21 L 5.125 21.3125 L 4.03125 26.8125 L 3.71875 28.28125 L 5.1875 27.96875 L 10.6875 26.875 L 11 26.8125 L 26.8125 11 C 28.4375 9.375 28.4375 6.8125 26.8125 5.1875 C 26 4.375 24.953125 3.96875 23.90625 3.96875 Z M 23.90625 5.875 C 24.410156 5.875 24.917969 6.105469 25.40625 6.59375 C 26.378906 7.566406 26.378906 8.621094 25.40625 9.59375 L 24.6875 10.28125 L 21.71875 7.3125 L 22.40625 6.59375 C 22.894531 6.105469 23.402344 5.875 23.90625 5.875 Z M 20.3125 8.71875 L 23.28125 11.6875 L 11.1875 23.78125 C 10.53125 22.5 9.5 21.46875 8.21875 20.8125 Z M 6.9375 22.4375 C 8.136719 22.921875 9.078125 23.863281 9.5625 25.0625 L 6.28125 25.71875 Z"/>
                                </svg>
                            </button>
                            <button class="delete-btn" onclick="deleteImage(<?php echo $row['id']; ?>)">حذف
                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="delete" style="enable-background:new 0 0 64 64" version="1.1" viewBox="0 0 64 64" width="20px" height="20px">
                                    <g id="Icon-Trash" transform="translate(232 228)">
                                        <path id="Fill-6" d="M-207.5-205.1h3v24h-3z" style="fill:#134563"></path>
                                        <path id="Fill-7" d="M-201.5-205.1h3v24h-3z" style="fill:#134563"></path>
                                        <path id="Fill-8" d="M-195.5-205.1h3v24h-3z" style="fill:#134563"></path>
                                        <path id="Fill-9" d="M-219.5-214.1h39v3h-39z" style="fill:#134563"></path>
                                        <path id="Fill-10" d="M-192.6-212.6h-2.8v-3c0-.9-.7-1.6-1.6-1.6h-6c-.9 0-1.6.7-1.6 1.6v3h-2.8v-3c0-2.4 2-4.4 4.4-4.4h6c2.4 0 4.4 2 4.4 4.4v3" style="fill:#134563"></path>
                                        <path id="Fill-11" d="M-191-172.1h-18c-2.4 0-4.5-2-4.7-4.4l-2.8-36 3-.2 2.8 36c.1.9.9 1.6 1.7 1.6h18c.9 0 1.7-.8 1.7-1.6l2.8-36 3 .2-2.8 36c-.2 2.5-2.3 4.4-4.7 4.4" style="fill:#134563"></path>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>هیچ عکسی پیدا نشد!</p>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function editImage(id) {
            alert("ویرایش عکس با شناسه: " + id);
            // کد ویرایش را اینجا اضافه کنید
        }

        function deleteImage(id) {
            if (confirm("آیا از حذف این عکس مطمئن هستید؟")) {
                alert("حذف عکس با شناسه: " + id);
                // کد حذف را اینجا اضافه کنید
            }
        }
    </script>
</body>
</html>
