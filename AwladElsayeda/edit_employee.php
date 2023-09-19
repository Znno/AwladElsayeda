<?php
include_once 'includes/db.inc.php';
session_start();
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>الإدارة - تعديل بيانات موظف</title>
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
        <div class="block-header">تعديل بيانات موظف</div>
        <div class="block-content">
            <?php
                $query = mysqli_query($GLOBALS['conn'],"select * from employees where EMP_ID = '$id'")or die(mysqli_error($GLOBALS['conn']));
                $row = mysqli_fetch_array($query);
            ?>
            <form class="block-form" method="post" enctype="multipart/form-data">
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الصورة:
                            <img src="<?php echo $row['IMAGE']; ?>" alt="مكسوف يحط صورته">
                            <input type="file" name="IMAGE" id="FILE">
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الاسم:
                            <input type="text" name="NAME" placeholder="Employee Name" value="<?php echo $row['NAME']; ?>" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            الراتب:
                            <input type="text" name="SALARY" placeholder="Employee Salary" value="<?php echo $row['SALARY']; ?>" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            رقم الهاتف:
                            <input type="text" name="NUMBER" placeholder="Phone Number" value="<?php echo $row['NUMBER']; ?>" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            المسمى الوظيفي:
                            <input type="text" name="JOB_TITLE" placeholder="Job Title" value="<?php echo $row['JOB_TITLE']; ?>" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            تاريخ التوظيف:
                            <input type="text" name="HIRE_DATE" placeholder="HIRE DATE" value="<?php echo $row['HIRE_DATE']; ?>" required>
                        </label>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button name="update" type="submit" class="btn btn-info">حفظ</button>
                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST['update'])){
                $NAME = $_POST['NAME'];
                $SALARY = $_POST['SALARY'];
                $NUMBER = $_POST['NUMBER'];
                $JOB_TITLE = $_POST['JOB_TITLE'];
                $HIRE_DATE = $_POST['HIRE_DATE'];
                mysqli_query($GLOBALS['conn'],"update employees set NAME = '$NAME' , SALARY = '$SALARY', NUMBER = '$NUMBER', JOB_TITLE = '$JOB_TITLE', HIRE_DATE = '$HIRE_DATE' where EMP_ID = '$id'")or die(mysqli_error($GLOBALS['conn']));
                if (!empty($_FILES["IMAGE"]["name"])) {
                    $image_location = $_FILES['IMAGE']['tmp_name'];
                    $image_name = basename($_FILES['IMAGE']['name']);
                    $image_up = "images/".$image_name;
                    mysqli_query($GLOBALS['conn'],"update employees set IMAGE = '$image_up' where EMP_ID = '$id'")or die(mysqli_error($GLOBALS['conn']));
                    move_uploaded_file($image_location, 'images/'.$image_name);
                }
                ?>
                <script>
                    window.location = "employees.php";
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