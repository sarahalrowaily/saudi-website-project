<?php
session_start();
include("config.php");

if (!isset($_SESSION['admin_logged_in'])) { 
    header("Location: login.php"); 
    exit(); 
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "SELECT * FROM places WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) { 
    header("Location: dashboard.php"); 
    exit(); 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $landmarks = mysqli_real_escape_string($conn, $_POST['landmarks']);
    $category = mysqli_real_escape_string($conn, $_POST['category']); // (city, nature, etc.)
    $info = mysqli_real_escape_string($conn, $_POST['info']);

    $update_query = "UPDATE places SET 
                    name = '$name', 
                    description = '$description', 
                    info = '$info', 
                    landmarks = '$landmarks', 
                    category = '$category' 
                    WHERE id = $id";
    
    mysqli_query($conn, $update_query);

    if (!empty($_FILES['main_image']['name'])) {
        $img = time() . "_" . $_FILES['main_image']['name'];
        move_uploaded_file($_FILES['main_image']['tmp_name'], "images/" . $img);
        mysqli_query($conn, "UPDATE places SET image = '$img' WHERE id = $id");
    }
    
    if (!empty($_FILES['gallery1']['name'])) {
        $img1 = time() . "_g1_" . $_FILES['gallery1']['name'];
        move_uploaded_file($_FILES['gallery1']['tmp_name'], "images/" . $img1);
        mysqli_query($conn, "UPDATE places SET image2 = '$img1' WHERE id = $id");
    }

    if (!empty($_FILES['gallery2']['name'])) {
        $img2 = time() . "_g2_" . $_FILES['gallery2']['name'];
        move_uploaded_file($_FILES['gallery2']['tmp_name'], "images/" . $img2);
        mysqli_query($conn, "UPDATE places SET image3 = '$img2' WHERE id = $id");
    }

    header("Location: dashboard.php?msg=updated");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تعديل بيانات المكان | لوحة المشرف</title>
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

<main class="edit-page-container">
    <div class="edit-grid">
        <div class="form-section">
            <div class="card">
                <h3 style="text-align: center;">تعديل البيانات لـ: <?= $row['name'] ?></h3>
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>اسم المكان</label>
                        <input type="text" name="name" value="<?= $row['name'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>تحديث الصورة الرئيسية (اختياري)</label>
                        <input type="file" name="main_image" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label>الوصف العام</label>
                        <textarea name="description" rows="4" required><?= $row['description'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>التصنيف</label>
                        <select name="category" required>
                            <option value="city" <?= ($row['category'] == 'city') ? 'selected' : '' ?>>مدن</option>
                            <option value="nature" <?= ($row['category'] == 'nature') ? 'selected' : '' ?>>طبيعة</option>
                            <option value="heritage" <?= ($row['category'] == 'heritage') ? 'selected' : '' ?>>تاريخية</option>
                            <option value="religious" <?= ($row['category'] == 'religious') ? 'selected' : '' ?>>دينية</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>المعلومات الإضافية (المنطقة، المناخ، المميزات)</label>
                        <textarea name="info" rows="3"><?= $row['info'] ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>المعالم (افصلي بينها بفاصلة)</label>
                        <input type="text" name="landmarks" value="<?= $row['landmarks'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label>تحديث صور المعرض (اختياري)</label>
                        <input type="file" name="gallery1" class="mb-5" accept="image/*">
                        <input type="file" name="gallery2" accept="image/*">
                    </div>

                    <button type="submit" class="save-btn">حفظ التغييرات في قاعدة البيانات</button>
                </form>
            </div>
        </div>

        <aside class="preview-section">
            <div class="card">
                <h4 style="text-align: center;">المعاينة الحالية</h4>
                <div class="preview-images" style="text-align: center;">
                    <p>الصورة الأساسية:</p>
                    <img src="images/<?= $row['image'] ?>" style="width:100%; border-radius:8px; margin-bottom: 10px;">
                    
                    <p>صور المعرض:</p>
                    <div style="display:flex; gap:5px; justify-content:center;">
                        <img src="images/<?= $row['image2'] ?>" style="width:48%; height:80px; object-fit:cover; border-radius:5px;">
                        <img src="images/<?= $row['image3'] ?>" style="width:48%; height:80px; object-fit:cover; border-radius:5px;">
                    </div>
                </div>
                <hr style="margin: 20px 0;">
                <a href="dashboard.php?delete_id=<?= $row['id'] ?>" class="delete-link" style="color:red; text-decoration:none; display:block; text-align:center;" onclick="return confirm('هل تريد حذف هذا السجل نهائياً؟')">🗑️ حذف هذا السجل</a>
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
