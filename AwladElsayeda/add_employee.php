<?php
include_once 'includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>الإدارة - إضافة موظف</title>
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
        <div class="block-header">إضافة موظف</div>
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
                            الاسم:
                            <input type="text" name="NAME" placeholder="Employee Name" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الراتب:
                            <input type="text" name="SALARY" placeholder="Employee Salary" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            رقم الهاتف:
                            <input type="text" name="NUMBER" placeholder="Phone Number" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            المسمى الوظيفي:
                            <input type="text" name="JOB_TITLE" placeholder="Job Title" required>
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
                    $SALARY = $_POST['SALARY'];
                    $NUMBER = $_POST['NUMBER'];
                    $JOB_TITLE = $_POST['JOB_TITLE'];
                    $query = mysqli_query($GLOBALS["conn"],"select * from employees where NUMBER = '$NUMBER' ") or die(mysqli_error($GLOBALS["conn"]));
                    $count = mysqli_num_rows($query);
                    if ($count > 0){ ?>
                        <script>
                            alert('رقم الهاتف الذي أدخلته مستخدم بالفعل!');
                        </script>
                    <?php
                    } else {
                        mysqli_query($GLOBALS["conn"],"insert into employees (IMAGE, NAME, SALARY, NUMBER, JOB_TITLE, HIRE_DATE) values ('$image_up', '$NAME', '$SALARY', '$NUMBER', '$JOB_TITLE', now())")or die(mysqli_error($GLOBALS["conn"]));
                        move_uploaded_file($image_location, 'images/'.$image_name)
                    ?>
                        <script>
                            window.location = "employees.php";
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