<?php
include_once 'includes/db.inc.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>الإدارة</title>
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
        <div class="block-header">الإدارة</div>
        <div class="block-content">
            <p>مرحباً بك في نظام إدارة المطعم</p>
        </div>
    </div>
</div>
</body>
</html>