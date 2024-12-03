<?php
include ('vendor/dbConnection.php');
$sql = "SELECT id, pro_image FROM products";
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
    <div class="container">
        <h1>لیست سفارش‌ها</h1>
        <div class="gallery">
            <?php if ($result->rowCount() > 0): ?> 
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?> 
                    <div class="image-card">
                        <img src="<?php echo $row['pro_image'];  ?>" alt="Image"> <!-- اصلاح نام ستون به pro_image -->
                        <div class="actions">
                            <button class="edit-btn" onclick="editImage(<?php echo $row['id']; ?>)">ویرایش</button>
                            <button class="delete-btn" onclick="deleteImage(<?php echo $row['id']; ?>)">حذف</button>
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
