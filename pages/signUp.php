<?php
 session_start();
 if(isset($_SESSION['users']))
 {
    header("Location:Dashboardd.php");
    exit();
 }
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>فرم ثبت‌نام</title>
  <link rel="stylesheet" href="../public/css/signUp.css">
</head>
<body>
    <div class="container">
        <h2>فرم ثبت‌نام</h2>
  <?php 
  $host = "localhost";
  $dbname = "tamrin";
  $usernameDB = "root";
  $passwordDB = "";
  
  $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
  
  try {
      $pdo = new PDO($dsn, $usernameDB, $passwordDB);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      die("Database connection failed: " . $e->getMessage());
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = htmlspecialchars($_POST["username"]);
      $email = htmlspecialchars($_POST["email"]);
      $password = htmlspecialchars($_POST["password"]);
      $phoneNumber = htmlspecialchars($_POST["phoneNumber"]);
      $nationalCode = htmlspecialchars($_POST["nationalCode"]);
      $degree = htmlspecialchars($_POST["degree"]);
  
      $sql = "INSERT INTO users (username, email, password, phone_number, national_code, degree) 
              VALUES (:username, :email, :password, :phone_number, :national_code, :degree)";
      $stmt = $pdo->prepare($sql);
  
      try {
          $stmt->execute([
              ':username' => $username,
              ':email' => $email,
              ':password' => $password,
              ':phone_number' => $phoneNumber,
              ':national_code' => $nationalCode,
              ':degree' => $degree
          ]);
        //   header("Location:Dashboardd.php");
        //   exit();
        session_start();
            $_SESSION['users'] = $user;
            header("Location:./Dashboardd.php");
            exit();
      } catch (PDOException $e) {
          die("Error inserting data: " . $e->getMessage());
      }
  }
  ?>

<form method="post" id="signUpForm">
    <label for="username">نام کاربری:</label>
    <input type="text" id="username" name="username">
    <span class="error"></span>

    <label for="email">ایمیل:</label>
    <input type="email" id="email" name="email">
    <span class="error"></span>

    <label for="password">رمز عبور:</label>
    <input type="password" id="password" name="password">
    <span class="error"></span>

    <label for="phoneNumber">شماره تماس:</label>
    <input type="text" id="phoneNumber" name="phoneNumber">
    <span class="error"></span>

    <label for="nationalCode">کد ملی:</label>
    <input type="text" id="nationalCode" name="nationalCode">
    <span class="error"></span>

    <label for="degree">مدرک تحصیلی:</label>
    <select id="degree" name="degree">
        <option value="">انتخاب کنید</option>
        <option value="دیپلم">دیپلم</option>
        <option value="کارشناسی">کارشناسی</option>
        <option value="کارشناسی ارشد">کارشناسی ارشد</option>
        <option value="دکتری">دکتری</option>
    </select>
    <span class="error"></span>

    <input type="submit" value="ثبت‌نام">
</form>
<a href="login.php">حساب کاربری دارید؟ وارد شوید</a>
    </div>
    <script src="signUp.js"></script>
</body>
</html>
