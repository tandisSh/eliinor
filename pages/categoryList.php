<?php
include('vendor/dbConnection.php');
session_start();

$sql = "SELECT id, name FROM categories ORDER BY id DESC";
$stmt = $pdo->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/UsersList.css">
    <title>لیست دسته‌بندی‌ها</title>
</head>

<body>
    <div class="container">
        <h1>لیست دسته‌بندی‌ها</h1>
        <?php if (!empty($categories)): ?>
            <table class="user-list">
                <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>نام دسته‌بندی</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?php echo $category['id']; ?></td>
                            <td><?php echo htmlspecialchars($category['name']); ?></td>
                            <td>
                               
                                <form action="vendor/deleteCategory.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $category['id']; ?>">
                                    <button type="submit" onclick="return confirm('آیا از حذف این دسته‌بندی مطمئن هستید؟')">حذف</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>هیچ دسته‌بندی ثبت نشده است.</p>
        <?php endif; ?>
    </div>
</body>

</html>
