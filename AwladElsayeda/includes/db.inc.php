<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "awlad_elsayeda";

$GLOBALS["conn"] = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);
mysqli_set_charset($GLOBALS["conn"], "utf8");
if (!$GLOBALS["conn"]) {
    die("Connection failed: " . mysqli_connect_error());
}

