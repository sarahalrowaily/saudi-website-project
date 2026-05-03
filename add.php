<?php
session_start();
include("config.php");

if (!isset($_SESSION['admin_logged_in'])) { 
    header("Location: login.php"); 
    exit(); 
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $landmarks = mysqli_real_escape_string($conn, $_POST['landmarks']);
    $category = mysqli_real_escape_string($conn, $_POST['category']); 
    $info = mysqli_real_escape_string($conn, $_POST['info']); 

    $target_dir = "images/";
    
    $main_image = time() . "_" . $_FILES['main_image']['name'];
    $gallery1 = time() . "_g1_" . $_FILES['gallery1']['name'];
    $gallery2 = !empty($_FILES['gallery2']['name']) ? time() . "_g2_" . $_FILES['gallery2']['name'] : "";

    if (move_uploaded_file($_FILES['main_image']['tmp_name'], $target_dir . $main_image)) {
        move_uploaded_file($_FILES['gallery1']['tmp_name'], $target_dir . $gallery1);
        if(!empty($gallery2)) {
            move_uploaded_file($_FILES['gallery2']['tmp_name'], $target_dir . $gallery2);
        }

        $query = "INSERT INTO places (name, description, info, landmarks, image, image2, image3, category) 
                  VALUES ('$name', '$description', '$info', '$landmarks', '$main_image', '$gallery1', '$gallery2', '$category')";

        if (mysqli_query($conn, $query)) {
            header("Location: dashboard.php?msg=added");
            exit();
        } else {
            $error = "خطأ في الداتابيس: " . mysqli_error($conn);
        }
    } else {
        $error = "فشل في رفع الصور، تأكدي من وجود مجلد images وصلاحياته.";
    }
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>إضافة محتوى جديد | لوحة المشرف</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="admin-body">

<header>
    <div class="logo">لوحة المشرف</div>
    <nav>
        <a href="dashboard.php">لوحة التحكم</a>
        <a href="index.php">زيارة الموقع</a>
        <button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button>
        <a href="logout.php" class="logout-btn">تسجيل الخروج</a>
    </nav>
</header>

<main class="add-page-container">
    <div class="add-card">
        <h3>إضافة مكان جديد</h3>
        
        <?php if($error != "") echo "<p style='color:red; text-align:center;'>$error</p>"; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>* اسم المكان</label>
                <input type="text" name="name" placeholder="مثال: العلا" required>
            </div>

            <div class="form-group">
                <label>* التصنيف</label>
                <select name="category" required>
                    <option value="">اختر التصنيف...</option>
                    <option value="city">مدن</option>
                    <option value="nature">طبيعة</option>
                    <option value="heritage">تاريخية</option>
                    <option value="religious">دينية</option>
                </select>
            </div>

            <div class="form-group">
                <label>* الصورة الرئيسية للمكان</label>
                <input type="file" name="main_image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label>* الوصف المختصر</label>
                <textarea name="description" placeholder="وصف يظهر في كرت المدينة..." required></textarea>
            </div>

            <div class="form-group">
                <label>* المعلومات التفصيلية (المنطقة، المناخ، المميزات)</label>
                <textarea name="info" placeholder="مثال: المنطقة: غربية | المناخ: معتدل..." required></textarea>
            </div>

            <div class="form-group">
                <label>* المعالم (افصلي بينها بـ ،)</label>
                <input type="text" name="landmarks" placeholder="مثال: مدائن صالح، جبل الفيل" required>
            </div>

            <div class="gallery-section">
                <h4>صور إضافية للمكان (المعرض)</h4>
                <div class="form-group">
                    <label>* صورة المعرض الأولى</label>
                    <input type="file" name="gallery1" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label>صورة المعرض الثانية (اختياري)</label>
                    <input type="file" name="gallery2" accept="image/*">
                </div>
            </div>

            <button type="submit" class="save-btn">اضافة المكان</button>
        </form>
    </div>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>
<script src="js/script.js"></script>
</body>
</html>
