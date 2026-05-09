<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("config.php");
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>اكتشف السعودية | الرئيسية</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <div class="logo">اكتشف السعودية</div>
    <nav>
        <a href="index.php">الرئيسية</a>
        <a href="regions.php">معرض المناطق</a>
        <a href="login.php">دخول المشرف</a>
        <button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button>
    </nav>
</header>

<main>
    <section class="hero">
        <div class="hero-text">
            <h2>موقع ثقافي تفاعلي للتعريف بالمملكة</h2>
            <p>
               استكشف مناطق المملكة العربية السعودية وتعرف على أهم 
               المعالم التاريخية والثقافية. اختر منطقة من المعرض للانتقال إلى التفاصيل.
            </p>
            <a href="regions.php" class="explore-btn">ابدأ الاستكشاف</a>
        </div>

        <div class="hero-box">
            <h2> أهلاً بك 👋</h2>
            <p>ابدأ رحلتك لاكتشاف مناطق المملكة</p>
        </div>
    </section>

    <section class="info-cards">
        <div class="info-card">
            <h3>🎯 الهدف</h3>
            <p>تقديم معلومات موثوقة ومدارة ديناميكياً عن مناطق المملكة.</p>
        </div>

        <div class="info-card">
            <h3>🗺️ المناطق</h3>
            <p>تصفح مناطق المملكة المختلفة المضافة عبر لوحة التحكم بسهولة.</p>
        </div>

        <div class="info-card">
            <h3>📍 التفاصيل</h3>
            <p>صفحة تعرض وصفاً ومعلومات لكل منطقة.</p>
        </div>
    </section>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>

<script src="js/script.js"></script>
</body>
</html>
