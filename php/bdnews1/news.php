<?php
include_once "config/conn.php";
include_once "control/news_default.php";
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta charset="UTF-8">
<title>百度新闻</title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link rel="stylesheet" href="css/wap-new.css">
<script src="js/jquery-1.3.2.min.js"></script>
<!--
作业版本2：修复了移动端显示问题，把php最大限度的与html分离
 -->
</head>
<body>
<!-- 头部 -->
<header class="header">
<div class="ui-new-toolbar">
	<div class="ui-new-toolbar-l">
		<a href="#" class="btn-config"></a>
		<a href="#" class="btn-userhome"></a>
	</div>
	<div class="ui-new-toolbar-r">
		<a href="#" class="btn-search"></a>
		<a href="#" class="btn-subscribe"></a>
	</div>
</div>
<!-- 导航 -->
<div class="navigator">
	<ul>
		<li><a href="?tid=1" class="on">社会</a></li>
		<li><a href="?tid=2">百家</a></li>
		<li><a href="?tid=3">本地</a></li>
		<li><a href="?tid=4">娱乐</a></li>
	</ul>
</div>
</header>
<!-- 内容 -->
<div class="content">
	<!-- 幻灯片 -->
	<div class="gallery" style="display:none;">
		<div class="g-list">
			<a href="#"><img src="images/timg.jpg"></a>
		</div>
	</div>
	<!-- 新闻列表 -->
	<div class="list-item">
	</div>
	<div class="refresh-wrapper">
		<div class="refresh">
				点击加载更多
		</div>
	</div>
</div>
<!--加载中 -->
<div class="load">
	<img src="images/loading.gif">
</div>
<!-- 底部 -->
<footer id="footer">
<div class="ui-footer">
	<a href="#" class="item feedback"><span class="ico"></span>意见反馈</a>
	<a href="#" class="item app-recommend"><span class="ico"></span>应用推荐</a>
	<a href="#" class="item app-download"><span class="ico"></span>客户端</a>
</div>
<input type="hidden" id="t" value="<?php echo $tid;?>" />
<input type="hidden" id="loadNum" value="<?php echo $loadNum?$loadNum:1;?>" />
</footer>
<script type="text/javascript" src="js/news.js"></script>
</body>
</html>