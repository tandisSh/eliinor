<?php 
session_start();
$_SESSION = []; // حذف تمامی متغیرهای موجود در جلسه
session_unset(); // حذف متغیرهای جلسه
session_destroy();
header("location:../login.php");
exit();
?>
