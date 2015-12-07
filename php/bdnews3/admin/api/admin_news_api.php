<?php
/*
 *用途：后台新闻api
 */
header("Content-Type: text/html;charset=utf-8");
include_once "../../config/conn.php";

//一页加载数
$pagesize = 6;
$pageget  = $_GET["page"] ? $_GET["page"] : 1;
$page     = ($pageget - 1) * $pagesize;
//默认tid为1
$keywords = $_GET["keywords"] ? $_GET["keywords"] : "";
//搜索新闻
$where    = "";
if ($keywords !== "") {
    $where = "where `main_title`like'%" . $keywords . "%'";
}

$sql = "select * from news $where order by `id` desc limit $page,$pagesize";

//如果有编辑id则修改sql
if($_GET['eid']){
$sql="select * from news where `id`='".$_GET['eid']."' limit 1";
}
$arr = $mysql->search_news($sql);
//print_r($arr); 

//输出新闻数据
print_r($mysql->json($arr));
?>
