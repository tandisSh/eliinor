<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/uploads.css">
    <title>افزودن دسته‌بندی</title>
</head>

<body>
    <div id="formdiv">
        <form action="vendor/AddCategory.php" method="POST">
            <table>
                <h1>افزودن دسته‌بندی جدید</h1>

                <!-- نمایش پیام‌ها -->
                <?php if (isset($_GET['error'])): ?>
                    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
                <?php elseif (isset($_GET['success'])): ?>
                    <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
                <?php endif; ?>

                <tr>
                    <td>نام دسته‌بندی<span style="color:red;">*</span></td>
                    <td><input type="text" id="category-name" name="category-name" /></td>
                </tr>
                <tr>
                    <td><br></td>
                    <div id="buttons-container">
                        <td>
                            <input type="submit" value="افزودن دسته‌بندی" />&nbsp;&nbsp;&nbsp;
                            <input type="reset" value="انصراف" />
                        </td>
                    </div>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
