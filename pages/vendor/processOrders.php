<?php
include('dbConnection.php');
session_start();

// تعریف وضعیت‌ها
$status_labels = [
    0 => 'در حال بررسی',
    1 => 'ارسال شده',
    2 => 'لغو شده'
];

// تغییر وضعیت سفارش
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'], $_POST['status'])) {
    $order_id = intval($_POST['order_id']);
    $status = intval($_POST['status']);

    try {
        if (!in_array($status, [0, 1, 2])) {
            throw new Exception("وضعیت نامعتبر است.");
        }

        $update_sql = "UPDATE orders SET status = :status WHERE id = :order_id";
        $update_stmt = $pdo->prepare($update_sql);
        $result = $update_stmt->execute(['status' => $status, 'order_id' => $order_id]);

        if ($result) {
            $_SESSION['message'] = "وضعیت سفارش با موفقیت به‌روز شد.";
        } else {
            $_SESSION['message'] = "خطا در به‌روزرسانی وضعیت سفارش.";
        }
    } catch (Exception $e) {
        $_SESSION['error'] = "خطا: " . $e->getMessage();
    }

    header('Location:../dashbord.php');
    exit;
}
?>
