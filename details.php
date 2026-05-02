<?php
include("config.php"); //


$id = isset($_GET['id']) ? $_GET['id'] : 1; 


$row = null;
foreach($static_regions as $region) {
    if($region['id'] == $id) {
        $row = $region;
        break;
    }
}


if(!$row) {
    header("Location: regions.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تفاصيل <?= $row['name'] ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
    <div class="logo">اكتشف السعودية</div>
    <nav>
        <a href="index.html">الرئيسية</a>
        <a href="regions.php">معرض المناطق</a>
        <a href="login.php">دخول المشرف</a>
        <button class="mode-btn" onclick="toggleMode()">الوضع الليلي</button>
    </nav>
</header>

<main>
    <section class="details-page" id="place-details">


        <img src="images/<?= $row['image'] ?>" class="cover-img" alt="<?= $row['name'] ?>" onerror="this.src='images/placeholder.jpg'">

        <div class="details-content">
    
            <h2><?= $row['name'] ?></h2>
            <p><?= $row['description'] ?></p>

            <div class="quick-box">
    <h3>معلومات سريعة</h3>
    <ul>
        <li><strong>المنطقة:</strong> <?= $row['category'] ?></li>
        <li><strong>المناخ:</strong> <?= $row['climate'] ?></li>
        <li><strong>تشتهر بـ:</strong> <?= $row['famous_for'] ?></li>
    </ul>
</div>

<h3>أبرز المعالم</h3>
<ul>
    <?php 

    $landmarks = explode('،', $row['landmarks']); 
    foreach($landmarks as $item): 
    ?>
        <li><?= trim($item) ?></li>
    <?php endforeach; ?>
</ul>

            <h3>معرض الصور</h3>
            <div class="details-gallery">
                <?php 
      
                if(isset($row['gallery']) && is_array($row['gallery'])):
                    foreach($row['gallery'] as $img): 
                ?>
                    <img src="images/<?= $img ?>" alt="صورة من <?= $row['name'] ?>" 
                <?php 
                    endforeach; 
                endif;
                ?>
            </div>
        </div>

    </section>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>

<script src="js/script.js"></script>
</body>
</html>
