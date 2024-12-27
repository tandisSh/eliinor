<?php
session_start();
include('vendor/dbConnection.php');


$emailError = $passwordError = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["email"])) {
        $emailError = "لطفا ایمیل را وارد کنید*";
        $isValid = false;
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordError = "لطفا رمز عبور را وارد کنید*";
        $isValid = false;
    } else {
        $password = $_POST["password"]; 
    }


    if ($isValid) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
         
            if ($password === $user['password']) {
                session_start();
                $_SESSION['users'] = $user;
                header("Location:index.php");
                exit();
                
            } else {
                $passwordError = "رمز عبور نادرست است";
            }
        } else {
            $emailError = "ایمیل یافت نشد";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ورود</title>
    <link rel="stylesheet" href="../public/css/signUp.css">
</head>
<body>
<div class="container">
    <h2>فرم ورود</h2>
    <form method="post">
        <label for="email">ایمیل:</label>
        <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="error"><?php echo $emailError; ?></span>

        <label for="password">رمز عبور:</label>
        <input type="password" id="password" name="password">
        <span class="error"><?php echo $passwordError; ?></span>

        <br><br>
        <input type="submit" value="ورود">
    </form>
    <br>
    <br>
    <a style="color:black; text-decoration:none;" href="signUp.php">حساب کاربری ندارید؟ ثبت نام کنید</a>
</div>
<script src="../public/js/login.js"></script>
</body>
</html>
