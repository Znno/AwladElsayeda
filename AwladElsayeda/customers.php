<?php
include_once 'includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>الإدارة - العملاء</title>
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
        <div class="block-header">الزبائن</div>
        <div class="block-content">
            <form class="block-form" method="post">
                <div class="btn-group">
                    <a href="add_customer.php" class="btn btn-info">إضافة زبون</a>
                    <a onclick="modalVisible('delete_customer')" class="btn btn-danger">حذف زبون</a>
                </div>
                <div id="delete_customer" class="modal hide" tabindex="-1" aria-hidden="true">
                    <div class="modal-header">
                        <h3>حذف زبون؟</h3>
                    </div>
                    <div class="modal-body">
                        <p>هل أنت متيقن؟</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" type="button" onclick="modalVisible('delete_customer')">لا</button>
                        <button name="delete_customer_btn" type="submit" class="btn btn-danger">نعم</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                    <tr>
                        <th>الرقم</th>
                        <th>رقم الهاتف</th>
                        <th>الاسم</th>
                        <th>العنوان</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="table-content">
                    <?php
                        $id = -1;
                        $query = mysqli_query($GLOBALS["conn"],"select * from customers") or die(mysqli_error($GLOBALS["conn"]));
                        while ($row = mysqli_fetch_array($query)) {
                            $id = $row['PH_NUMBER'];
                    ?>
                            <tr>
                                <td class="first-last-td">
                                    <input id="optionCheckBox" class="check-on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                </td>
                                <td><?php echo $row['PH_NUMBER']; ?></td>
                                <td><?php echo $row['NAME']; ?></td>
                                <td><?php echo $row['ADDRESS']; ?></td>
                                <td class="first-last-td">
                                    <a href="edit_customer.php<?php echo '?PH='.$id; ?>" class="btn btn-success">تعديل</a>
                                </td>
                            </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </form>
            <?php
            if (isset($_POST['delete_customer_btn'])){
                $id = $_POST['selector'];
                if ($id) {
                    $N = count($id);
                    for ($i = 0; $i < $N; $i++) {
                        $result = mysqli_query($GLOBALS["conn"],"DELETE FROM customers where PH_NUMBER = '$id[$i]'");
                    }
                }
                ?>
                <script>
                    window.location = "customers.php";
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