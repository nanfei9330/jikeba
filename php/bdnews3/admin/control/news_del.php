<?php
/*
 *后台新闻删除处理文件
 */
include_once "../../config/conn.php";
//删除单条新闻
if ($_GET["did"]) {
    $mysql->delete("news", "where `id`='" . $_GET["did"] . "'");
	echo "ok";
}

//删除多条记录
if ($_POST["delete"]) {
    $ids = implode(",", $_POST['listid']);
	if($mysql->delete("news", "where `id` in(" . $ids . ")")){
	$mysql->goPage("../index.php");
}
}
?>
