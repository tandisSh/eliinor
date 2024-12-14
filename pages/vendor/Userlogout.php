<?php 
session_start();
// unset($_SESSION['user']);
// session_destroy();
$_SESSION = []; // حذف تمامی متغیرهای موجود در جلسه
session_unset(); // حذف متغیرهای جلسه
session_destroy();
header("location:../login.php");
exit();
?>
