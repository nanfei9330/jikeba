<?php
session_start();
include_once "../config/conn.php";
$name     = $_POST["name"];
$password = $_POST["password"];
$sql      = "select count(*) as count from `admin` where `name`='$name' and `password`='$password'";
$query    = $mysql->query($sql);
$flag     = mysql_fetch_array($query);
if ($flag[0]) {
    $_SESSION['admin'] = $name;
} else {
    echo "no";
}
?>