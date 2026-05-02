<?php
include("config.php");
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    header("Location: dashboard.php?msg=added");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إضافة محتوى جديد</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="admin-body">

<header>
    <div class="logo">لوحة المشرف</div>
    <nav>
        <a href="dashboard.php">لوحة التحكم</a>
         <button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button>

                <a href="index.html" class="logout-btn">تسجيل الخروج</a>

    </nav>
</header>

<main class="add-page-container">
    <div class="add-card">
        <h3>إضافة مكان جديد</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>*اسم المكان</label>
                <input type="text" name="name" placeholder="مثال: أبها" required>
            </div>

            <div class="form-group">
                <label>*الصورة الرئيسية للمكان</label>
                <input type="file" name="main_image" required>
            </div>

            <div class="form-group">
                <label>*الوصف</label>
                <textarea name="description" placeholder="اكتب وصفاً تفصيلياً..." required></textarea>
            </div>

            <div class="form-group">
                <label>*الموقع</label>
                <select name="location" required>
                    <option value="">اختر المنطقة...</option>
                    <option value="وسطى">المنطقة الوسطى</option>
                    <option value="غربية">المنطقة الغربية</option>
                    <option value="شرقية">المنطقة الشرقية</option>
                    <option value="شمالية">المنطقة الشمالية</option>
                    <option value="جنوبية">المنطقة الجنوبية</option>
                </select>
            </div>

            <div class="form-group">
                <label>*المميزات</label>
                <input type="text" name="features" placeholder="مثال: مواقع أثرية، طبيعة خلابة" required>
            </div>

            <div class="form-group">
                <label>*الأنشطة</label>
                <input type="text" name="activities" placeholder="مثال: جولات تاريخية، تسوق" required>
            </div>

            <div class="form-group">
                <label>*المعالم (افصل بينها بفاصلة)</label>
                <input type="text" name="landmarks" placeholder="مثال: جبل فيفا، قرية ذي عين" required>
            </div>

            <div class="gallery-section">
                <h4>صور المعرض</h4>
                <div class="form-group">
                    <label>*صورة المعرض الأولى</label>
                    <input type="file" name="gallery1" required>
                </div>
                <div class="form-group">
                    <label>صورة المعرض الثانية (اختياري)</label>
                    <input type="file" name="gallery2">
                </div>
                <div class="form-group">
                    <label>صورة المعرض الثالثة (اختياري)</label>
                    <input type="file" name="gallery3">
                </div>
            </div>

            <button type="submit" class="save-btn">إضافة المحتوى</button>

        </form>
    </div>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>
<script src="js/script.js"></script>
</body>
</html>