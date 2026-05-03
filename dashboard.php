<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("config.php");

if (!isset($_SESSION['admin_logged_in'])) { 
    header("Location: login.php"); 
    exit(); 
}

if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']); 
    $delete_query = "DELETE FROM places WHERE id = $id";
    if (mysqli_query($conn, $delete_query)) {
        header("Location: dashboard.php?msg=deleted");
        exit();
    }
}

$query = "SELECT * FROM places ORDER BY id ASC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة تحكم المشرف | اكتشف السعودية</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="admin-body">

<header>
    <div class="logo">لوحة تحكم المشرف</div>
    <nav>
        <a href="index.php" style="color: white; text-decoration: none; margin-left: 15px;">زيارة الموقع</a>
        <button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button>
        <a href="logout.php" class="logout-btn">تسجيل الخروج</a>
    </nav>
</header>

<main class="dashboard-container">
    <div class="content-manager">
        <h2>إدارة المحتوى</h2>
        <p>استخدم هذه الصفحة لإدارة محتوى الموقع من خلال عرض السجلات وإضافة أو تعديل أو حذف المحتوى.</p>
        
        <div class="actions-bar">
            <a href="add.php" class="add-btn">إضافة محتوى جديد</a>
        </div>

        <?php if(isset($_GET['msg'])): ?>
            <div class="success-alert" id="success-alert">
                <?php 
                    if($_GET['msg'] == 'added') echo "تمت إضافة المحتوى الجديد بنجاح!";
                    elseif($_GET['msg'] == 'updated') echo "تم تحديث بيانات المنطقة بنجاح!";
                    elseif($_GET['msg'] == 'deleted') echo "تم حذف السجل بنجاح!";
                ?>
            </div>
            <script>
                setTimeout(function() {
                    var alertElement = document.getElementById('success-alert');
                    if(alertElement) alertElement.style.display = 'none';
                }, 3000); 
            </script>
        <?php endif; ?>

        <div class="table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>المنطقة</th>
                        <th>التصنيف</th>
                        <th>الوصف</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td>
                            <?php 
                            $cat = $row['category'];
                            if($cat == 'city') echo 'مدن';
                            elseif($cat == 'nature') echo 'طبيعة';
                            elseif($cat == 'heritage') echo 'تاريخية';
                            elseif($cat == 'religious') echo 'دينية';
                            else echo $cat; 
                            ?>
                        </td>
                        <td class="desc-cell"><?= $row['description'] ?></td>
                        <td class="controls">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="edit-link">تعديل</a>
                            <a href="dashboard.php?delete_id=<?= $row['id'] ?>" class="delete-link" onclick="return confirm('هل تريد حذف هذا السجل نهائياً من قاعدة البيانات؟')">حذف</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>
<script src="js/script.js"></script>
</body>
</html>
