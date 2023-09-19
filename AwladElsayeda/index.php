<?php
include_once 'includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>أولاد السيدة</title>
    <link rel="stylesheet" type="text/css" href="style.css?ts=<?= time() ?>" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div id="logo">
    <a href="index.php" title="Logo">أولاد السيدة</a>
</div>
<div class="nav" id="centered_nav">
    <a href="index.php"><i class="material-icons">home</i>الرئيسية</a>
    <a href="management.php"><i class="material-icons">settings</i>الإدارة</a>
</div>
<div class="welcome">
    <audio autoplay src="welcome.m4a">
        Your browser does not support the audio element.
    </audio>
    <video playsinline autoplay muted loop poster="images/kebab.jpg">
        <source src="intro.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="caption">
        <h2>مرحباً بكم في أولاد السيدة</h2>
        <p>أصل الأكلات الشعبية لا مثيل لنا</p>
    </div>
</div>

<h1 class="center_header">المأكولات</h1>
<audio id="whatbuy" src="whatfood.m4a">
    Your browser does not support the audio element.
</audio>
<audio id="goodbuy" src="goodchoice.m4a">
    Your browser does not support the audio element.
</audio>
<div class="container">
    <?php
        $id = -1;
        $query = mysqli_query($GLOBALS["conn"],"select * from items where TYPE = 'FOOD'") or die(mysqli_error($GLOBALS["conn"]));
        while ($row = mysqli_fetch_array($query)) {
            $id = $row['ITEM_ID'];
    ?>
            <div class="card" onclick="goodFun()">
                <img src="<?php echo $row['IMAGE']; ?>" alt="<?php echo $row['NAME']; ?>" style="width: 100%" />
                <div class="ctr">
                    <h4><b><?php echo $row['NAME']; ?> (<?php echo $row['ITEM_SIZE']; ?>)</b></h4>
                    <p>السعر : <?php echo $row['PRICE']; ?> $</p>
                </div>
            </div>
    <?php
        }
    ?>
</div>
<h1 class="center_header">المشروبات</h1>
<div class="container">
    <?php
    $id = -1;
    $query = mysqli_query($GLOBALS["conn"],"select * from items where TYPE = 'DRINKS'") or die(mysqli_error($GLOBALS["conn"]));
    while ($row = mysqli_fetch_array($query)) {
        $id = $row['ITEM_ID'];
        ?>
        <div class="card" onclick="goodFun()">
            <img src="<?php echo $row['IMAGE']; ?>" alt="<?php echo $row['NAME']; ?>" style="width: 100%" />
            <div class="ctr">
                <h4><b><?php echo $row['NAME']; ?> (<?php echo $row['ITEM_SIZE']; ?>)</b></h4>
                <p>السعر : <?php echo $row['PRICE']; ?> $</p>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
<script>
    let flag = false;
    window.onscroll = function() {scrollFun()};
    function scrollFun() {
        if (document.documentElement.scrollTop > 650 && !flag) {
            document.getElementById('whatbuy').play();
            flag = true;
        }
    }
    function goodFun() {
        document.getElementById('goodbuy').play();
    }
</script>
<script src="script.js"></script>
</html>