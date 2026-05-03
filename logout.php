<?php
session_start(); // البدء بالوصول للجلسة الحالية

// مسح جميع متغيرات الجلسة
$_SESSION = array();

// تدمير الجلسة تماماً من السيرفر
session_destroy();

// إعادة التوجيه لصفحة تسجيل الدخول أو الرئيسية
header("Location: login.php");
exit();
?>