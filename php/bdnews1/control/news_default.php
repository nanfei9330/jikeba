<?php
//计算当前分类最多可加载多少页，用于显示或隐藏 '加载更多按钮'
$pagesize=8;
$tid=$_GET['tid']?$_GET['tid']:1;
$tidnum=$mysql->sum("news","where `tid`='$tid'");

//默认分类可加载数
$loadNum=ceil($tidnum/$pagesize);
?>