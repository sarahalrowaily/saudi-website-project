<?php
include("config.php");
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];


    if ($user == "admin" && $pass == "123456") {
        $_SESSION['admin'] = "admin";
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "اسم المستخدم أو كلمة المرور غير صحيحة";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تسجيل دخول المشرف</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <div class="logo">لوحة المشرف</div>
    <nav>
        <a href="index.html">زيارة الموقع</a>
        <button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button>
    </nav>
</header>

<main class="login-container">
    <div class="login-card">
        <div class="login-card-header">تسجيل دخول المشرف</div>
        <div class="login-card-body">
            <form method="POST">
                <div class="form-group">
                    <label>اسم المستخدم</label>
                    <input type="text" name="username" placeholder="مثال: admin" required>
                </div>
                
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="login-btn">دخول</button>

                <?php if($error): ?>
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
