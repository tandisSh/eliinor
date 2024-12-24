
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/addslider.css">
    <title>افزودن اسلایدر</title>
</head>
<body>
    <h1>افزودن اسلایدر</h1>

    <form action="./vendor/Addslid.php" method="POST" enctype="multipart/form-data">
        <label for="image">انتخاب تصویر:</label>
        <input type="file" name="image" id="image" required><br><br>

        <label for="link">لینک (اختیاری):</label>
        <input type="text" name="link" id="link"><br><br>

        <button type="submit" name="add_slide">افزودن اسلایدر</button>
    </form>

    <h2>لیست اسلایدها</h2>
    <table border="1">
        <tr>
            <th>تصویر</th>
            <th>لینک</th>
            <th>عملیات</th>
        </tr>

        <?php foreach ($sliders as $slide): ?>
            <tr>
                <td><img src="../../public/images/sliders/<?php echo htmlspecialchars($slide['image']); ?>" width="100" alt="Slider Image"></td>
                <td><?php echo htmlspecialchars($slide['link']); ?></td>
                <td>
                    <a href="?delete_id=<?php echo $slide['id']; ?>" onclick="return confirm('آیا مطمئن هستید که می خواهید این اسلاید را حذف کنید؟')">حذف</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
