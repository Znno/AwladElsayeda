<?php
include_once 'includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>الإدارة - إضافة طلب</title>
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
        <div class="block-header">إضافة طلب</div>
        <div class="block-content">
            <form class="block-form" method="post" enctype="multipart/form-data">
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            هاتف الزبون:
                            <input type="text" name="CUST_NUMBER" placeholder="Customer Number" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            السعر الكلي:
                            <input type="text" name="TOTAL_PRICE" placeholder="Total Price" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الملاحظات:
                            <input type="text" name="NOTES" placeholder="Notes" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            العناصر:
                            <input type="text" name="ITEMS_ID" placeholder="Items ID" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الكميات:
                            <input type="text" name="ITEMS_QUANTITY" placeholder="Items Quantity" required>
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
                    $CUST_NUMBER = $_POST['CUST_NUMBER'];
                    $TOTAL_PRICE = $_POST['TOTAL_PRICE'];
                    $NOTES = $_POST['NOTES'];
                    $ITEMS_ID = $_POST['ITEMS_ID'];
                    $ITEMS_QUANTITY = $_POST['ITEMS_QUANTITY'];
                    mysqli_query($GLOBALS["conn"],"insert into orders (CUST_NUMBER, TOTAL_PRICE, NOTES, ITEMS_ID, ITEMS_QUANTITY) values ('$CUST_NUMBER', '$TOTAL_PRICE', '$NOTES', '$ITEMS_ID', '$ITEMS_QUANTITY')")or die(mysqli_error($GLOBALS["conn"]));
            ?>
                    <script>
                        window.location = "orders.php";
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