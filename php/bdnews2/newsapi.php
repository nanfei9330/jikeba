<?php
header("Content-Type: text/html;charset=utf-8"); 
include_once "config/conn.php";

//一页加载数
$pagesize=8;
$pageget=$_GET["page"] ? $_GET["page"] : 1;
$page=($pageget-1)*$pagesize;
//默认tid为1
$tid= $_GET["tid"]?$_GET["tid"]:1;
//搜索新闻
$where="where `tid`='$tid'";
$sql="select * from `news` $where order by `time` desc limit $page,$pagesize";
$arr=$mysql->search_news($sql);

//print_r($arr); 

//输出新闻数据
print_r($mysql->json($arr));
?>
