<?php
/*
*后台新闻添加处理文件
*/
include_once "../../config/conn.php";
if($_POST["addform"]){
//新闻标题
$main_title=$_POST["main_title"];
//新闻副标题
$second_abs =$_POST["second_abs"];
//新闻分类
$tid =$_POST["tid"];
//新闻图片
$picture = $_POST["picture"]?$_POST["picture"]:"";
//新闻链接
$link=$_POST["link"]?$_POST["link"]:"#";
//添加时间为当前时间
$time= date("Y-m-d H:i:s");
//新闻添加sql
$sqladd="INSERT INTO `news` VALUES (' ',$tid,'".$main_title."', '".$second_abs."', '".$picture."', '".$link."', '".$time."');";
if(mysql_query($sqladd)){
$mysql->goPage("../index.php");
}
}
?>
