<?php
//连接mysql
$conn=mysql_connect("localhost","root","open00") or die("数据库连接失败!");
//连接数据库
mysql_select_db("jike",$conn);
//设置编码
mysql_query("set names utf8");
?>