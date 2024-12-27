<?php
session_start();
if (!isset($_SESSION['users'])) {
    echo "لطفاً وارد حساب کاربری خود شوید.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/edit.css">
    <title>تکمیل خرید</title>
</head>

<body>
    <div id="formdiv">
        <form action="vendor/process_checkout.php" method="POST">
            <table>
                <h1>تکمیل خرید</h1>
                <tr>
                    <td>شهر <span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: right;" id="city" name="city" required></td>
                </tr>
                <tr>
                    <td>آدرس <span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: right;" id="address" name="address" required></td>
                </tr>
                <tr>
                    <td>کد پستی<span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: left;" id="postal_code" name="postal_code" required></td>
                </tr>
                <tr>
                    <td>شماره تلفن<span style="color:red;">*</span></td>
                    <td><input type="text" style="text-align: left;" id="phone" name="phone" required/></td>
                </tr>
                <tr>
                    <td><br></td>
                    <div id="buttons-container">
                        <td><input type="submit" value=" ثبت سفارش" /><input type="reset" value="انصراف" /></td>
                    </div>
                </tr>

            </table>
        </form>
    </div>
</body>

</html>
