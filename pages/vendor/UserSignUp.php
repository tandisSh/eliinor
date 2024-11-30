<?php 
include ('dbConnection.php');
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
  
      session_start();
          $_SESSION['users'] = $user;
          header("Location:../mainPage.php");
          exit();
    } catch (PDOException $e) {
        die("Error inserting data: " . $e->getMessage());
    }
}



?>