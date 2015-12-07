<?php
/*
 *后台新闻删除处理文件
 */
include_once "../../config/conn.php";
if($_POST["editform"]){
$id=$_POST["id"];
$main_title2=$_POST["main_title2"];
$second_abs2 =$_POST["second_abs2"];
$tid2 =$_POST["tid2"];
$picture2 = $_POST["picture2"]?$_POST["picture2"]:"";
$link2=$_POST["link2"]?$_POST["link2"]:"#";
$edit_sql="UPDATE `news` SET  `main_title` =  '".$main_title2."' ,`second_abs`='".$second_abs2."',`tid`='".$tid2."',`picture`='".$picture2."',`link`='".$link2."' WHERE `id`='".$id."';";
if($mysql->query($edit_sql)){
$mysql->goPage("../index.php");
}
}
?>
