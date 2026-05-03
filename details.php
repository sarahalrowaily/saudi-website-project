<?php 
include 'config.php'; 

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1; 

$query = "SELECT * FROM places WHERE id = $id";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    $place = mysqli_fetch_assoc($result);
} else {
    header("Location: regions.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $place['name']; ?> | التفاصيل</title>
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
    <article class="details-page" id="place-details">
        <img class="cover-img" src="images/<?php echo $place['image']; ?>" alt="<?php echo $place['name']; ?>" onerror="this.src='images/placeholder.jpg'">

        <div class="details-content">
            <h2><?php echo $place['name']; ?></h2>
            <p><?php echo $place['description']; ?></p>

            <div class="quick-box">
                <h3>معلومات المنطقة</h3>
                <ul id="place-info">
                    <li><strong>التصنيف:</strong> 
                        <?php 
                        $cat = $place['category'];
                        if($cat == 'city') echo 'مدن';
                        elseif($cat == 'nature') echo 'طبيعة';
                        elseif($cat == 'heritage') echo 'تاريخية';
                        elseif($cat == 'religious') echo 'دينية';
                        else echo $cat; 
                        ?>
                    </li>
                    <?php 
                    if(!empty($place['info'])){
                        $info_items = explode('|', $place['info']);
                        foreach($info_items as $item) {
                            echo "<li>" . trim($item) . "</li>";
                        }
                    }
                    ?>
                </ul>
            </div>

            <?php if(!empty($place['landmarks'])): ?>
            <section class="landmarks-section">
                <h3>أبرز المعالم</h3>
                <ul id="place-landmarks">
                    <?php 
                    $landmarks = explode('،', $place['landmarks']);
                    foreach($landmarks as $landmark) {
                        echo "<li>" . trim($landmark) . "</li>";
                    }
                    ?>
                </ul>
            </section>
            <?php endif; ?>

            <section class="gallery-section">
                <h3>معرض الصور</h3>
                <div class="details-gallery">
                    <img src="images/<?php echo $place['image']; ?>" alt="صورة 1">
                    <?php if(!empty($place['image2'])): ?>
                        <img src="images/<?php echo $place['image2']; ?>" alt="صورة 2">
                    <?php endif; ?>
                    <?php if(!empty($place['image3'])): ?>
                        <img src="images/<?php echo $place['image3']; ?>" alt="صورة 3">
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </article>
</main>

<footer>
    © اكتشف السعودية - جامعة الملك سعود
</footer>

<script src="js/script.js"></script>
</body>
</html>
