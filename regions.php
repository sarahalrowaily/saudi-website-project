<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>معرض المناطق</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <h1>اكتشف السعودية</h1>
    <nav>
        <a href="index.html">الرئيسية</a>
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
                <option value="وسطى">المنطقة الوسطى</option>
                <option value="غربية">المنطقة الغربية</option>
                <option value="شرقية">المنطقة الشرقية</option>
                <option value="جنوبية">المنطقة الجنوبية</option>
                <option value="شمالية">المنطقة الشمالية</option>
            </select>
        </div>
    </section>

    <p class="result-count">عدد النتائج: <span id="resultCount"><?= count($static_regions) ?></span></p>

    <section class="gallery" id="galleryContainer">
        <?php foreach($static_regions as $row): ?>
            <div class="card <?= $row['category'] ?>" data-name="<?= $row['name'] ?>">
              
               <img src="images/<?= $row['image'] ?>" alt="<?= $row['name'] ?>">
                <small><?= $row['category'] ?></small>
                <h3><?= $row['name'] ?></h3>
                <p><?= $row['description'] ?></p>

              <!-- Link to the details page using the ID -->

                <a href="details.php?id=<?= $row['id'] ?>">عرض التفاصيل</a>
            </div>
        <?php endforeach; ?>
    </section>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>

<script src="js/script.js"></script>
</body>
</html>
