<?php
include ('vendor/dbConnection.php'); 
session_start();
if (isset($_SESSION['users'])) {
    if ($_SESSION['users']['type'] == 0) {
        header("Location:mainPage.php");
        exit();
    }
}

// دریافت اطلاعات محصول از دیتابیس
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $productId = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute(['id' => $productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo "محصول موردنظر یافت نشد.";
        exit();
    }
} else {
    echo "شناسه محصول نامعتبر است.";
    exit();
}

$results = $pdo->prepare("SELECT * FROM categories");
$results->execute();
$category = $results->fetchAll(PDO::FETCH_ASSOC);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/edit.css">
    <title>Edit Product</title>
</head>

<body>
    <div id="formdiv">
        <form action="vendor/AdminEdit.php" method="POST" enctype="multipart/form-data">
            <table>
                <h1>ویرایش کالا</h1>

                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />

                <tr>
                    <td>نام کالا<span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: right;" id="pro-name" name="pro-name" value="<?php echo $product['pro_name']; ?>" /></td>
                </tr>
                <tr>
                    <td>موجودی کالا<span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: left;" id="pro-qty" name="pro-qty" value="<?php echo $product['pro_qty']; ?>" /></td>
                </tr>
                <tr>
                    <td>قیمت کالا<span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: left;" id="pro-price" name="pro-price" value="<?php echo $product['pro_price']; ?>" /></td>
                </tr>
                <tr>
                    <td>دسته‌بندی کالا<span style="color:red;">*</span></td>
                    <td>
                        <select name="pro_category_id" id="pro_category_id">
                            <option value="" disabled>انتخاب دسته‌بندی</option>
                            <?php foreach ($category as $cat): ?>
                                <option value="<?php echo $cat['id']; ?>" <?php echo $cat['id'] == $product['pro_category_id'] ? 'selected' : ''; ?>>
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
                    <td><textarea name="pro-detail" id="pro-detail" cols="45" rows="10" wrap="virtual"><?php echo $product['pro_detail']; ?></textarea></td>
                </tr>
                <tr>
                    <td><br></td>
                    <div id="buttons-container">
                        <td><input type="submit" value="ذخیره تغییرات" />&nbsp;&nbsp;&nbsp;<input type="reset" value="انصراف" /></td>
                    </div>
                </tr>

            </table>
        </form>
    </div>
    <!-- <script src="../public/js/dashbord.js"></script> -->
</body>

</html>
