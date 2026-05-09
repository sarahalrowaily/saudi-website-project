<?php 
include 'config.php'; 

$query = "SELECT id, name, category, image, description FROM places";
$result = mysqli_query($conn, $query);
$total_results = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>معرض المناطق | اكتشف السعودية</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .card-link {
            text-decoration: none;
            color: inherit;
            display: block;
        }
    </style>
</head>
<body>

<header>
    <h1>اكتشف السعودية</h1>
    <nav>
        <a href="index.php">الرئيسية</a>
        <a href="regions.php">معرض المناطق</a>
        <a href="login.php">دخول المشرف</a>
        <button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button>
    </nav>
</header>

<main>
    <section class="regions-head">
        <div>
            <h2>معرض المناطق</h2>
            <p>ابحث أو اختر التصنيف ثم اضغط على أي منطقة للانتقال إلى صفحة التفاصيل.</p>
        </div>

        <div class="filters">
            <input type="text" id="searchInput" placeholder="ابحث باسم مدينة أو منطقة" onkeyup="filterGallery()">

            <select id="categorySelect" onchange="filterGallery()">
                <option value="all">كل التصنيفات</option>
                <option value="city">مدن</option>
                <option value="nature">طبيعة</option>
                <option value="heritage">تاريخية</option>
                <option value="religious">دينية</option>
            </select>
        </div>
    </section>

    
    <p class="result-count">عدد النتائج: <span id="resultCount"><?php echo $total_results; ?></span></p>

    <section class="gallery" id="galleryContainer">
        <?php
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['name'];
            $category = $row['category']; 
            $image = $row['image'];
            $description = $row['description'];
        ?>
            <a href="details.php?id=<?php echo $id; ?>" class="card-link">
                <div class="card <?php echo $category; ?>" data-name="<?php echo $name; ?>">
                    <img src="images/<?php echo $image; ?>" alt="<?php echo $name; ?>" onerror="this.src='images/placeholder.jpg'">
                    
                    <small>
                        <?php 
                        if($category == 'city') echo 'مدن';
                        elseif($category == 'nature') echo 'طبيعة';
                        elseif($category == 'heritage') echo 'تاريخية';
                        elseif($category == 'religious') echo 'دينية';
                        else echo $category; 
                        ?>
                    </small> 

                    <h3><?php echo $name; ?></h3>
                    <p><?php echo $description; ?></p>
                    <span style="color: #2c3e50; font-weight: bold; text-decoration: underline;">عرض التفاصيل</span>
                </div>
            </a>
        <?php 
        } 
        ?>
    </section>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>

<script src="js/script.js"></script>
</body>
</html>
