<?php
session_start();
include("config.php"); 

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "اسم المستخدم أو كلمة المرور غير صحيحة!";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل دخول المشرف | اكتشف السعودية</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="logo">لوحة المشرف</div>
    <nav>
        <a href="index.php">زيارة الموقع</a>
        <button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button>
    </nav>
</header>

<main class="login-container">
    <div class="login-card">
        <div class="login-card-header">تسجيل دخول المشرف</div>
        <div class="login-card-body">
            <form method="POST" action="login.php">
                <div class="form-group">
                    <label>اسم المستخدم</label>
                    <input type="text" name="username" placeholder="مثال: admin" required>
                </div>
                
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="login-btn">دخول</button>

                <?php if($error != ""): ?>
                    <p style="color:red; text-align:center; margin-top:10px; font-size:14px;"><?php echo $error; ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>

<script src="js/script.js"></script>
</body>
</html>
