<?php
session_start();
include_once "../config/conn.php";
include_once "control/page.php";
/*
 *后台新闻页默认操作文件
 */

//未登录则调整到登录页
if (!$_SESSION['admin']) {
    echo "<script>window.location='login.php'</script>";
}
;

//一页加载数
$pagesize = 6;
$pageget  = $_GET["page"] ? $_GET["page"] : 1;
$page     = ($pageget - 1) * $pagesize;
$where    = "";
$keywords = $_GET["keywords"] ? $_GET["keywords"] : "";
if ($keywords !== "") {
    $where = "where `main_title`like'%" . $keywords . "%'";
}
//页面控制            
$rownum = $mysql->sum("news", $where);
$mypage = new mypage($rownum, $pagesize);

?>
