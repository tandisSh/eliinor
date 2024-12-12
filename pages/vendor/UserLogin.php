<?php 
include ('dbConnection.php');


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
                // $_SESSION['users']['id']=$user_id;
                header("Location:../index.php");
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