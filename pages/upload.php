<?php
include ('vendor/dbConnection.php'); 
session_start();
if (isset($_SESSION['users'])) {
    if ($_SESSION['users']['type'] == 0) {
        header("Location:index.php");
        exit();
    }
}

$results = $pdo->prepare("SELECT * FROM categories");
$results->execute();
$category = $results->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/uploads.css">
    <title>Upload products</title>
</head>

<body>
    <div id="formdiv">
        <form  action="vendor/AdminUpload.php" method="POST" enctype="multipart/form-data">
            <table>
                <h1>افزودن کالا</h1>
                <tr>
                    <td>نام کالا<span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: right;" id="pro-name" name="pro-name" /></td>
                </tr>
                <tr>
                    <td>موجودی کالا<span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: left;" id="pro-qty" name="pro-qty" /></td>
                </tr>
                <tr>
                    <td>قیمت کالا<span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: left;" id="pro-price" name="pro-price" /></td>
                </tr>
                <tr>
                    <td>دسته‌بندی کالا<span style="color:red;">*</span></td>
                    <td>
                        <select name="pro_category_id" id="pro_category_id" >
                            <option value="" disabled selected>انتخاب دسته‌بندی</option>
                            <?php foreach ($category as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>">
                                    <?php echo $cat['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>


                <tr>
                    <td>آپلود تصویر کالا<span style="color:red;">*</span></td>
                    <td>
                        <!-- دکمه آپلود -->
                        <label for="image-upload" id="upload-button">انتخاب تصویر</label>
                        <!-- ورودی فایل مخفی -->
                        <input type="file" id="image-upload" name="image" style="display: none;" />
                        <!-- نام فایل انتخاب شده -->
                        <span id="file-name">هیچ فایلی انتخاب نشده است</span>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>توضیحات تکمیلی کالا<span style="color:red;">*</span></td>
                    <td><textarea name="pro-detail" id="pro-detail" cols="45" rows="10" wrap="virtual"></textarea></td>
                </tr>
                <tr>
                    <td><br></td>
                    <div id="buttons-container">
                        <td><input type="submit" value="افزودن کالا" />&nbsp;&nbsp;&nbsp;<input type="reset" value="انصراف" /></td>
                    </div>
                </tr>

            </table>
        </form>
    </div>
    <script src="../public/js/dashbord.js"></script>
    <script src="../public/js/up.js"></script>

</body>

</html>