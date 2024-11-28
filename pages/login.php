<?php
include ('vendor/dbConnection.php');
 session_start();
 if(isset($_SESSION['users']))
 {
    header("Location:Dashboardd.php");
    exit();
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فرم ورود</title>
    <link rel="stylesheet" href="../public/css/signUp.css">
</head>
<body>
<div class="container">
<h2>فرم ورود</h2>
<?php


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
           
                // header("Location: Dashboardd.php");
                session_start();
                $_SESSION['users'] = $user;
                header("Location:./Dashboardd.php");
                exit();
                // exit();
            } else {
                $passwordError = "رمز عبور نادرست است";
            }
        } else {
            $emailError = "ایمیل یافت نشد";
        }
    }
}
?>
            <form  method="post">

            <label for="email">ایمیل:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            <span class="error"><?php echo $emailError; ?></span>

            <label for="password">رمز عبور:</label>
            <input type="password" id="password" name="password">
            <span class="error"><?php echo $passwordError; ?></span>
            
            <br><br>
            <input type="submit" value="ورود">
        </form>
        <a href="signUp.php">ثبت‌نام کنید</a>
    </div>
    <script src="login.js"></script>
</body>
</html>