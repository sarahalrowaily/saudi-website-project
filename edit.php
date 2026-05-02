<?php
include("config.php");
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }

$id = isset($_GET['id']) ? $_GET['id'] : 1;


$row = null;
foreach($static_regions as $region) {
    if($region['id'] == $id) {
        $row = $region;
        break;
    }
}
if(!$row) { $row = $static_regions[0]; }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    header("Location: dashboard.php?msg=updated");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل بيانات المكان</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="admin-body">

<header>
    <div class="logo">لوحة المشرف</div>
    <nav>
        <a href="dashboard.php">لوحة التحكم</a>
      <a href="index.html" class="logout-btn">تسجيل الخروج</a>
    </nav>
</header>

<main class="edit-page-container">


    <div class="edit-grid">
        
     
        <div class="form-section">
            <div class="card">
                <h3 style="text-align: center;">تعديل البيانات</h3>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>اسم المكان</label>
                        <input type="text" name="name" value="<?= $row['name'] ?>">
                    </div>

                    <div class="form-group">
                        <label>تحديث الصورة الرئيسية (اختياري)</label>
                        <input type="file" name="main_image">
                    </div>

                    <div class="form-group">
                        <label>الوصف</label>
                        <textarea name="description" rows="5"><?= $row['description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>الموقع</label>
                        <select name="category">
                            <option value="وسطى" <?= $row['category'] == 'وسطى' ? 'selected' : '' ?>>المنطقة الوسطى</option>
                            <option value="غربية" <?= $row['category'] == 'غربية' ? 'selected' : '' ?>>المنطقة الغربية</option>
                            <option value="شرقية" <?= $row['category'] == 'شرقية' ? 'selected' : '' ?>>المنطقة الشرقية</option>
                            <option value="جنوبية" <?= $row['category'] == 'جنوبية' ? 'selected' : '' ?>>المنطقة الجنوبية</option>
                            <option value="شمالية" <?= $row['category'] == 'شمالية' ? 'selected' : '' ?>>المنطقة الشمالية</option>
                        </select>
                    </div>
 <div class="form-group">
<label>المميزات</label>
<input type="text" name="features" value="<?= isset($row['features']) ? $row['features'] : '' ?>">
    </div>
<div class="form-group">
<label>الأنشطة</label>
<input type="text" name="activities" value="<?= isset($row['activities']) ? $row['activities'] : '' ?>">
 </div>

 <div class="form-group">
                        <label>المعالم (افصل بينها بفاصلة)</label>

                        <input type="text" name="landmarks" value="<?= $row['landmarks'] ?>">

                    </div>

                    <div class="form-group">
                        <label>صور المعرض (اختياري)</label>
                        <input type="file" name="gallery1" class="mb-5">
                        <input type="file" name="gallery2" class="mb-5">
                       
                    </div>

                    <button type="submit" class="save-btn">حفظ التغييرات</button>
                </form>
            </div>
        </div>

  
        <aside class="preview-section">
            <div class="card">
                <h3 style="text-align: center;">تحديث مكان</h3>
                <div style="text-align: center;">
                    <span class="status-badge">المعلومات الحالية</span>
                </div>
                
                <div class="preview-item" style="margin-top: 15px;">
                    <strong>اسم المكان:</strong> <span><?= $row['name'] ?></span>
                </div>

                <div class="preview-images">
                    <p>الصورة الرئيسية الحالية:</p>
                    <img src="images/<?= $row['image'] ?>" class="thumb-large" onerror="this.src='images/placeholder.jpg'">
                    
                    <p style="margin-top: 10px;">صور المعرض الحالية:</p>
                    <div class="thumb-grid">
                        <?php 
                        $gallery = isset($row['gallery']) ? $row['gallery'] : [];
                        foreach($gallery as $img): 
                        ?>
                            <img src="images/<?= $img ?>" onerror="this.src='images/placeholder.jpg'">
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <div style="margin-top: 20px;">
                    <a href="dashboard.php?msg=deleted" class="delete-btn-outline" style="display: block; text-align: center; text-decoration: none;" onclick="return confirm('هل أنت متأكد؟')">حذف هذا السجل</a>
                </div>
            </div>
        </aside>

    </div>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>
<script src="js/script.js"></script>
</body>
</html>