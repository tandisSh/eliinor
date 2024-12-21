<?php
include('pages/vendor/dbConnection.php');

// افزودن اسلاید
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_slide'])) {
    $image_path = $_POST['image_path'];
    $link = $_POST['link'] ?? null;

    $stmt = $pdo->prepare("INSERT INTO sliders (image_path, link) VALUES (:image_path, :link)");
    $stmt->execute(['image_path' => $image_path, 'link' => $link]);
    header("Location: admin_slider.php");
    exit();
}

// حذف اسلاید
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $stmt = $pdo->prepare("DELETE FROM sliders WHERE id = :id");
    $stmt->execute(['id' => $id]);
    header("Location: admin_slider.php");
    exit();
}

// دریافت اسلایدها
$stmt = $pdo->prepare("SELECT * FROM sliders ORDER BY created_at DESC");
$stmt->execute();
$sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت اسلایدر</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center">مدیریت اسلایدر</h1>
        
        <!-- فرم افزودن اسلاید -->
        <div class="card my-4">
            <div class="card-header">افزودن اسلاید جدید</div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="mb-3">
                        <label for="image_path" class="form-label">مسیر تصویر</label>
                        <input type="text" name="image_path" id="image_path" class="form-control" placeholder="مثال: public/images/slide1.jpg" required>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">لینک (اختیاری)</label>
                        <input type="text" name="link" id="link" class="form-control" placeholder="مثال: /special-offers">
                    </div>
                    <button type="submit" name="add_slide" class="btn btn-success">افزودن اسلاید</button>
                </form>
            </div>
        </div>

        <!-- لیست اسلایدها -->
        <div class="card">
            <div class="card-header">لیست اسلایدها</div>
            <div class="card-body">
                <?php if (count($sliders) > 0): ?>
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>تصویر</th>
                                <th>لینک</th>
                                <th>عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sliders as $slide): ?>
                                <tr>
                                    <td><?php echo $slide['id']; ?></td>
                                    <td><img src="<?php echo $slide['image_path']; ?>" alt="اسلاید" style="width: 100px;"></td>
                                    <td><?php echo $slide['link'] ?? 'ندارد'; ?></td>
                                    <td>
                                        <a href="?delete_id=<?php echo $slide['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">حذف</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-center text-muted">هیچ اسلایدی وجود ندارد.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
