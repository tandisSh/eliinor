<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="../public/css/upload.css">
</head>
<body>
    <form action="vendor/AdminUpload.php" method="POST" enctype="multipart/form-data" style="direction: rtl;">
        <table>
            <!-- <tr>
                <td>کد کالا<span style="color:red;">*</span></td>
                <td><input type="text" id="pro-code" name="pro-code"/></td>
            </tr> -->
            <tr>
                <td>نام کالا<span style="color:red;">*</span></td>
                <td><input type="text" style="text-align: right;" id="pro-name" name="pro-name"/></td>
            </tr>
            <tr>
                <td>موجودی کالا<span style="color:red;">*</span></td>
                <td><input type="text" style="text-align: left;" id="pro-qty" name="pro-qty"/></td>
            </tr>
            <tr>
                <td>قیمت کالا<span style="color:red;">*</span></td>
                <td><input type="text" style="text-align: left;" id="pro-price" name="pro-price"/></td>
            </tr>


            <tr>
            <td>آپلود تصویر کالا<span style="color:red;">*</span></td>
            <td>
                <!-- دکمه آپلود -->
                <button type="button" id="upload-button">انتخاب تصویر</button>
                <!-- ورودی فایل مخفی -->
                <input type="file" id="image-upload" name="image" hidden />
                <!-- نام فایل انتخاب شده -->
                <span id="file-name">هیچ فایلی انتخاب نشده است</span>
            </td>
        </tr>
            <tr>
                <td>توضیحات تکمیلی کالا<span style="color:red;">*</span></td>
                <td><textarea name="pro-detail" id="pro-detail" cols="45" rows="10" wrap="virtual"></textarea></td>
            </tr>
            <tr>
                <td><br><br></td>
                <td><input type="submit" value="افزودن کالا"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="جدید" /></td>
            </tr>

        </table>
    </form>

    <script src="../public/js/upload.js"></script>

</body>
</html>