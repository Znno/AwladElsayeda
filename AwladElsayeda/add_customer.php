<?php
include_once 'includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>الإدارة - إضافة زبون</title>
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
        <div class="block-header">إضافة زبون</div>
        <div class="block-content">
            <form class="block-form" method="post" enctype="multipart/form-data">
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            رقم الهاتف:
                            <input type="text" name="PH_NUMBER" placeholder="Phone Number" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الاسم:
                            <input type="text" name="NAME" placeholder="Customer Name" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            العنوان:
                            <input type="text" name="ADDRESS" placeholder="Address" required>
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
                    $NAME = $_POST['NAME'];
                    $PH_NUMBER = $_POST['PH_NUMBER'];
                    $ADDRESS = $_POST['ADDRESS'];
                    $query = mysqli_query($GLOBALS["conn"],"select * from customers where PH_NUMBER = '$PH_NUMBER' ") or die(mysqli_error($GLOBALS["conn"]));
                    $count = mysqli_num_rows($query);
                    if ($count > 0){ ?>
                        <script>
                            alert('رقم الهاتف الذي أدخلته مستخدم بالفعل!');
                        </script>
                    <?php
                    } else {
                        mysqli_query($GLOBALS["conn"],"insert into customers (PH_NUMBER, NAME, ADDRESS) values ('$PH_NUMBER', '$NAME', '$ADDRESS')") or die(mysqli_error($GLOBALS["conn"]));
                    ?>
                        <script>
                            window.location = "customers.php";
                        </script>
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
</body>
<script src="script.js"></script>
</html>