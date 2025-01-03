<?php
include('vendor/dbConnection.php');
session_start();

$sql = "SELECT id, username, email, phone_number, national_code, degree,  type FROM users";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت کاربران</title>
    <link rel="stylesheet" href="../public/css/UsersList.css">
</head>
<body>
    <div class="container">
        <h1>مدیریت کاربران</h1>
        <?php if (!empty($users)): ?>
            <table class="user-list">
                <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>نام کاربری</th>
                        <th>ایمیل</th>
                        <th> شماره تلفن</th>
                        <th>کد ملی</th>
                        <th>تحصیلات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                            <td><?php echo $user['phone_number']; ?></td>
                            <td><?php echo $user['national_code']; ?></td>
                            <td><?php echo $user['degree']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>هیچ کاربری ثبت نشده است.</p>
        <?php endif; ?>
    </div>
</body>
</html>
