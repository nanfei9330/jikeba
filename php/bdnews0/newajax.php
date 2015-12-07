<?php
include_once "config/conn.php";
$tid= $_POST["tid"]?$_POST["tid"]:1;
$pagesize=8;
$pageget=$_POST["page"] ? $_POST["page"] : 1;
$page=($pageget-1)*$pagesize;
$sql="select * from news where `tid`='$tid' order by `time` desc limit $page,$pagesize ";
$query=mysql_query($sql);
//echo $pageget; 


//添加数据
echo "<ul>";
while($row=mysql_fetch_array($query)){
//时间相减得出秒数
$t=strtotime(date("Y-m-d H:i:s"))-strtotime($row['time']);
//发布时间距离现在多少分钟
$intervalTime=$t/60;
//如果小于60分，则显示分钟
if($intervalTime<60){
$intervalShow=floor($intervalTime)."分钟";
}else if($intervalTime>60){
$intervalShow=floor(($intervalTime/60))."小时";
}
	echo '<li>';	
			if($row['picture']!==""){
		echo '<div class="item-pic">
					<a href="'.$row['link'].'"><img src="images/'.$row['picture'].'" alt=""></a>
				</div>';
		}		

				echo '
				
				<div class="item-con">
					<div class="main-title">
					<a href="'.$row['link'].'">'.$row['main_title'].'</a>
				</div>
				<div class="main-abs">'.$row['second_abs'].'</div>
				<div class="list-bottom">
					<div class="time">'.$intervalShow.'前</div>
				</div>
				</div>
			</li>
	';
}
echo "</ul>";
?>