<?php
$servername = "localhost";
$username = "hanezwre";
$password = "HaneenAlaqeel";
$dbname = "hanezwre_saudi-website"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("فشل الاتصال بقاعدة البيانات: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
