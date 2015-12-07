<?php
include_once "config/conn.php";
//计算当前分类最多可加载多少页，用于显示或隐藏 '加载更多按钮'
$pagesize=8;
$tid=$_GET['tid']?$_GET['tid']:1;
$numsql="select count(*) from news where `tid`='$tid'";
$numquery=mysql_query($numsql);
$tidnum=mysql_fetch_array($numquery);
//可加载数
$loadNum=ceil($tidnum[0]/$pagesize);
?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>百度新闻</title>
	<link rel="stylesheet" href="css/wap-new.css">
	<script src="js/jquery-1.3.2.min.js"></script>

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
		<table border="0">
			<tr>
<td><a href="?tid=1" class="on">社会</a></td>
<td><a href="?tid=2">百家</a></td>
<td><a href="?tid=3">本地</a></td>
<td><a href="?tid=4">娱乐</a></td>
			</tr>
		</table>
	</div>
	</header>

<!-- 内容 -->
<div class="content">


	<!-- 幻灯片 -->
	<div class="gallery" style="display:none;">
		<div class="g-list">
				<a href="#"><img  src="images/timg.jpg"></a>
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
<div class="load"><img src="images/loading.gif"></div>

<!-- 底部 -->
	<footer id="footer">
		<div class="ui-footer">
		<a href="#" class="item feedback"><span class="ico"></span>意见反馈</a>
		<a href="#" class="item app-recommend"><span class="ico"></span>应用推荐</a>
		<a href="#" class="item app-download"><span class="ico"></span>客户端</a>
		</div>	
	</footer>
	
	<script type="text/javascript">
	$(document).ready(function() {
		//默认加载页
	var page=1;
    //默认加载分类1
    var tid = <?php echo $_GET['tid']?$_GET['tid']:1;?>; 
      $(".refresh").live("click",function(){
	  	page++;		
		ajaxLoad(page);
		ifshow();
	  });
//异步加载方法
    function ajaxLoad(page) {
        $.ajax({
            url: "newajax.php",
            async: false,
            data: {
                tid: tid,
                page: page,
            },
            type: "post",
            success: function(con) {
                $(".list-item").append(con);
            }
        });
    }
    //加载中隐藏显示
    $loaddiv = $(".load");
    $loaddiv.ajaxStart(function() {
        $(this).show();
    }).ajaxStop(function() {
        $(this).hide();
    });


//加载按钮是否显示
   function ifshow(){
   	  var loadnum=<?php echo $loadNum?$loadNum:1;?>;
   if(page>=loadnum){  
			$(".refresh").hide();
		}else{
		$(".refresh").show();
		}
   }
   //默认打开页面时判断是否显示加载按钮
   function defaultIfShowMore(){
   	 var loadnum=<?php echo $loadNum?$loadNum:1;?>;
	if(loadnum==1){
	$(".refresh").hide();
	}
   }
       //默认触发
   ajaxLoad(page);
   defaultIfShowMore();
});

	</script>
</body>
</html>