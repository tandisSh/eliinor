<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
          /*  background: linear-gradient(135deg, #74ebd5, #acb6e5);*/
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            direction: rtl;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px 0;
            vertical-align: top;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }

        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"] {
            background: #28a745;
            color: #fff;
        }

        input[type="submit"]:hover {
            background: #218838;
        }

        input[type="reset"] {
            background: #dc3545;
            color: #fff;
        }

        input[type="reset"]:hover {
            background: #c82333;
        }
        input:hover{
            background-color: #fff3f6;
            border: 1px solid #f47899;
        }
        textarea {
            resize: none;
        }

        span {
            color: red;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <form action="" method="POST" style="direction: rtl;">
        <table>
            <tr>
                <td>کد کالا<span style="color:red;">*</span></td>
                <td><input type="text" id="pro-code" name="pro-code"/></td>
            </tr>
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
                <td><input type="text" style="text-align: left;" id="pro-image" name="pro-image" size="30"/></td>
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
</body>
</html>