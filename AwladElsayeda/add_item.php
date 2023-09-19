<?php
include_once 'includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>الإدارة - إضافة عنصر</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div id="logo">
    <a href="index.php" title="Logo">أولاد السيدة</a>
</div>
<div class="nav" id="centered_nav">
    <a href="index.php" title="Home"><i class="material-icons">home</i>الرئيسية</a>
    <a href="management.php" title="Management"><i class="material-icons">settings</i>الإدارة</a>
</div>
<div class="main-dashboard">
    <div>
        <ul class="sidebar">
            <li><a href="management.php">لوحة التحكم</a></li>
            <li><a href="employees.php">الموظفين</a></li>
            <li><a href="menu.php">الطعام</a></li>
            <li><a href="customers.php">الزبائن</a></li>
            <li><a href="orders.php">الطلبات</a></li>
        </ul>
    </div>
    <div class="block">
        <div class="block-header">إضافة عنصر</div>
        <div class="block-content">
            <form class="block-form" method="post" enctype="multipart/form-data">
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الصورة:
                            <input type="file" name="IMAGE" id="FILE">
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            النوع:
                            <input type="text" name="TYPE" placeholder="Item Type" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الاسم:
                            <input type="text" name="NAME" placeholder="Item Name" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            السعر:
                            <input type="text" name="PRICE" placeholder="Item Price" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الحجم:
                            <input type="text" name="ITEM_SIZE" placeholder="Item Size" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button name="save" type="submit" class="btn btn-info">إضافة</button>
                    </div>
                </div>
            </form>
            <?php
                if (isset($_POST['save'])) {
                    $IMAGE = $_FILES['IMAGE'];
                    $image_location = $_FILES['IMAGE']['tmp_name'];
                    $image_name = basename($_FILES['IMAGE']['name']);
                    $image_up = "images/".$image_name;
                    $NAME = $_POST['NAME'];
                    $TYPE = $_POST['TYPE'];
                    $PRICE = $_POST['PRICE'];
                    $ITEM_SIZE = $_POST['ITEM_SIZE'];
                    mysqli_query($GLOBALS["conn"],"insert into items (TYPE, NAME, PRICE, ITEM_SIZE, IMAGE) values ('$NAME', '$NAME', '$PRICE', '$ITEM_SIZE', '$image_up')")or die(mysqli_error($GLOBALS["conn"]));
                    move_uploaded_file($image_location, 'images/'.$image_name)
            ?>
                    <script>
                        window.location = "menu.php";
                    </script>
            <?php
                }
            ?>
        </div>
    </div>
</div>
</body>
<script src="script.js"></script>
</html>