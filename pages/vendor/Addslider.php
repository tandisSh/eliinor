<?php
// اتصال به دیتابیس
include('./vendor/dbConnection.php');

// شروع جلسه
session_start();

// افزودن اسلاید
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_slide'])) {
    // دریافت اطلاعات از فرم
    $image_path = $_POST['image_path'];
    $link = $_POST['link'] ?? null;

    // بررسی بارگذاری تصویر
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_folder = "../../public/images/sliders/" . $image_name; // مسیر ذخیره تصویر

        // انتقال فایل به پوشه 'uploads'
        if (move_uploaded_file($image_tmp, $image_folder)) {
            try {
                // اجرای دستور SQL برای ذخیره تصویر و لینک در دیتابیس
                $stmt = $pdo->prepare("INSERT INTO sliders (image, link) VALUES (:image, :link)");
                $stmt->execute(['image' => $image_name, 'link' => $link]);
                
                // هدایت به صفحه پس از ذخیره
                header("Location: admin_slider.php");
                exit();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Please choose a valid image.";
    }
}

// حذف اسلاید
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM sliders WHERE id = :id");
        $stmt->execute(['id' => $id]);

        // هدایت به صفحه اصلی پس از حذف
        header("Location: ./index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// دریافت اسلایدها
$stmt = $pdo->prepare("SELECT * FROM sliders ORDER BY created_at DESC");
$stmt->execute();
$sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- HTML برای فرم افزودن اسلایدر -->

