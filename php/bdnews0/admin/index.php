<?php
include_once "../config/conn.php";
//删除单条新闻
if($_GET["t"]=="del" && $_GET["eid"]){
$sql="delete from news where `id`='".$_GET["eid"]."'";
mysql_query($sql);
}

//删除多条记录
if($_POST["delete"]){
$ids=implode(",",$_POST['listid']);
$delsql="delete from `news` where `id` in(".$ids.")";
mysql_query($delsql);
}
?>
<!DOCTYPE html>
<html>
<html lang="zh-cn">
<meta charset="UTF-8">
<title>Bootstrap index</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">

<!--mystyle-->
<link rel="stylesheet" href="css/mystyle.css"/>
</head>
<body>
<!--顶部导航-->
<nav class="nav navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#n">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">百度新闻管理系统</a>
        </div>

        <div class="collapse navbar-collapse" id="n">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="#">首页</a>
                </li>
      <!--          <li class="dropdown">
                    <a href="#" class="btn dropdown-toggle" data-toggle="dropdown">功能<span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">信息查询</a>
                        </li>
                        <li>
                            <a href="#">设置</a>
                        </li>
                        <li>
                            <a href="#">帮助</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">帮助</a>
                </li> -->
            </ul>
            <!--搜索-->
<form action="" class="navbar-form navbar-right" id="topForm">
                <div class="form-group">

                    <input type="text" class="form-control" placeholder="输入新闻关键字" name="keywords"/>
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form> 
        </div>


    </div>
</nav>


<!--自适应布局-->
<div class="container-fluid">
    <div class="row">
        <!--左侧导航-->
        <div class="col-xs-2 sidebar">
            <ul class="nav  nav-pills nav-stacked" role="tablist">
                <li class="active">
                    <a href="#newslist" role="tab" data-toggle="tab">新闻列表</a>
                </li>
  <li>
                    <a href="#addnews" role="tab" data-toggle="tab">添加新闻</a>
                </li>
  <li style="display:none;">
                    <a href="#editnews" role="tab" data-toggle="tab">编辑新闻</a>
                </li>
            </ul>

        </div>


        <!--右侧控制台-->
        <div class="col-xs-10 main col-xs-offset-2"  style="padding-top:70px;">
			<!--切换内容-->
			<div class="tab-content">
			
			<!--新闻列表 -->
			<div class="tab-pane active" id="newslist">
			           
			<div class="row">

                

                <!--表格面板-->
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">新闻列表</div>
                        </div>
                        <div class="panel-body">
						<form action="index.php?t=newslist" method="post">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th align="center" width="30"><input type="checkbox" class="checkbox chk_all"/></th>
									<th>ID</th>
									<th>分类</th>
                                    <th>标题</th>
                                    <th>添加时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php				
																				
								//方便测试，每页显示6条内容
								$pagesize=6;
								$pageget=$_GET["page"] ? $_GET["page"] : 1;
								$page=($pageget-1)*$pagesize;
								$keywords=$_GET["keywords"];
								$where="";
								if($keywords!==""){
									$where="where `main_title`like'%".$keywords."%'" ;
								}
									$sqllist="select * from news $where order by `id` desc limit $page,$pagesize";
									$list_query=mysql_query($sqllist);
									while($row=mysql_fetch_array($list_query)){
									switch($row["tid"]){
									case "1":
									$typename="社会";
									break;
									case "2":
									$typename="百家";
									break;
									case "3":
									$typename="本地";
									break;
									case "4":
									$typename="娱乐";
									break;									
									}
										echo '
										<tr>
                                    <td align="center"><input type="checkbox" class="checkbox" value="'.$row["id"].'" name="listid[]"/></td>
									<td>'.$row["id"].'</td>
									<td>'.$typename.'</td>
                                    <td>'.$row["main_title"].'</td>
                                    <td>'.$row["time"].'</td>
                                    <td><a href="?t=editnews&eid='.$row["id"].'">编辑</a> | <a href="?t=del&eid='.$row["id"].'" class="delete">删除</a></td>
                                </tr>            										
										';
									}
								?>
                                          <tr>
										  <td><input type="checkbox" class="checkbox chk_all"/></td>
										  <td colspan="5"><input class="btn btn-danger" type="submit"  name="delete" value="删除多条" id="delbtn"/></td>
										  </tr>
                                </tbody>
                            </table>
							</form>
                        </div>

                        <!--分页-->
                        <div class="pager" id="table-page">
                            <nav>
                                <ul class="pagination">
								                               
								<?php
									//统计新闻条数
									$sqlnum="select count(*) from news $where";
									$num_query=mysql_query($sqlnum);
									$rownum=mysql_fetch_array($num_query);
									//新闻总条数
									$pagenum=ceil($rownum[0]/$pagesize);
									//上一页
									$prepage=$_GET["page"]-1;									
									echo '<li ';
									  	if($prepage<=0){echo 'style="display:none;"';}										
									  echo '>
                                        <a href="?page='.$prepage.'&keywords='.$keywords.'" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>';
									
									//中间页码
									for($i=0;$i<$pagenum;$i++){
									$p=$i+1;
									echo '<li ';
									//当前状态样式为active
									if($p==$_GET["page"]){
									echo 'class="active"';
									}
									//当只有1页时，1页码为当前页码
									if($p==1 && $_GET["page"]==""){
									echo 'class="active"';
									}
									echo '><a href="?page='.$p.'&keywords='.$keywords.'">'.$p.'</a></li>';
									}
																	
									//下一页
									$nextpage=$_GET["page"]+1;

									echo' <li ';
									if($nextpage>$pagenum ||$nextpage==1){echo 'style="display:none;"';}
									echo '>
                                        <a href="?page='.$nextpage.'&keywords='.$keywords.'" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>'
								?>
                                   
                                </ul>
                            </nav>

                        </div>
                    </div>

                </div>


            </div>
			</div>
			
			<!--添加新闻 -->

			<div class="tab-pane" id="addnews">
			<div class="col-xs-12">
						<?php
			if($_POST["addform"]){
			//新闻标题
				$main_title=$_POST["main_title"];
				//新闻副标题
				$second_abs =$_POST["second_abs"];
				//新闻分类
				$tid =$_POST["tid"];
				//新闻图片
				$picture = $_POST["picture"]?$_POST["picture"]:"";
				//新闻链接
				$link=$_POST["link"]?$_POST["link"]:"#";
				//添加时间为当前时间
				$time= date("Y-m-d H:i:s");
				//新闻添加sql
				$sqladd="INSERT INTO `news` VALUES (' ',$tid,'".$main_title."', '".$second_abs."', '".$picture."', '".$link."', '".$time."');";
				if(mysql_query($sqladd)){
					echo '<div class="alert alert-success">
                                <strong>新闻添加成功!</strong>
                            </div>';
				}
			}
			?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">添加新闻</div>
                        </div>
                        <div class="panel-body">
                          <form action="index.php?t=addnews" method="post">						  
						    <table class="table table-bordered table-hover">
                             <tr>
    <td>标题：</td>
    <td><input type="text" name="main_title" /></td>
  </tr>
  <tr>
    <td>副标题：</td>
    <td><input type="text" name="second_abs" /></td>
  </tr>
  <tr>
    <td>分类：</td>
    <td><select name="tid">
	<option value="1">社会</option>
	<option value="2">百家</option>
	<option value="3">本地</option>
	<option value="4">娱乐</option>
	</select></td>
  </tr>
  <tr>
    <td>图片：</td>
    <td><input type="text" name="picture" /> </td>
  </tr>
  <tr>
    <td>链接：</td>
    <td><input type="text" name="link" /> 不填默认为#</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="添加新闻" class="btn btn-success" name="addform"/></td>
  </tr>
                            </table></form>
                        </div>

   
                        
                    </div>

                </div>
			</div>
	
	
			<!--编辑新闻 -->
			<div class="tab-pane" id="editnews">
			<div class="col-xs-12">
			<?php
			//读取对应id的新闻信息
				$eid=$_GET['eid'];
				$search_sql="select * from news where `id`='".$eid."' limit 1";
				$search_query=mysql_query($search_sql);
				$search_row=mysql_fetch_array($search_query);
				
			//更新新闻
			if($_POST["editform"]){
			$id=$_POST["id"];
				$main_title2=$_POST["main_title2"];
				$second_abs2 =$_POST["second_abs2"];
				$tid2 =$_POST["tid2"];
				$picture2 = $_POST["picture2"]?$_POST["picture2"]:"d.jpg";
				$link2=$_POST["link2"]?$_POST["link2"]:"#";
				$edit_sql="UPDATE `news` SET  `main_title` =  '".$main_title2."' ,`second_abs`='".$second_abs2."',`tid`='".$tid2."',`picture`='".$picture2."',`link`='".$link2."' WHERE `id`='".$id."';";
				if(mysql_query($edit_sql)){
					echo '<div class="alert alert-success">
                                <strong>编辑成功!</strong>
                            </div>';
				}
			}
			?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">编辑新闻</div>
                        </div>
                        <div class="panel-body">
                            <form action="index.php?t=editnews" method="post">						  
						    <table class="table table-bordered table-hover">
                             <tr>
    <td>标题：</td>
    <td><input type="hidden" name="id" class="checkbox" value="<?php echo $search_row["id"];?>"/><input type="text" name="main_title2" value="<?php echo $search_row["main_title"];?>"/></td>
  </tr>
  <tr>
    <td>副标题：</td>
    <td><input type="text" name="second_abs2" value="<?php echo $search_row["second_abs"];?>" /></td>
  </tr>
  <tr>
    <td>分类：</td>
    <td><select name="tid2">
	<option value="1" <?php if($search_row["tid"]==1){echo "selected";}?>>社会</option>
	<option value="2" <?php if($search_row["tid"]==2){echo "selected";}?>>百家</option>
	<option value="3" <?php if($search_row["tid"]==3){echo "selected";}?>>本地</option>
	<option value="4" <?php if($search_row["tid"]==4){echo "selected";}?>>娱乐</option>
	</select></td>
  </tr>
  <tr>
    <td>图片：</td>
    <td><input type="text" name="picture2" value="<?php echo $search_row["picture"];?>"/> 不填默认为d.jpg</td>
  </tr>
  <tr>
    <td>链接：</td>
    <td><input type="text" name="link2" value="<?php echo $search_row["link"];?>"/> 不填默认为#</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="更新" class="btn btn-info" name="editform"/></td>
  </tr>
                            </table></form>
                        </div>

   
                        
                    </div>

                </div>
			
			
			</div>
			
			</div>
			
			
			<!--切换内容结束 -->
        </div>


    </div>
</div>


<!--底部-->
<footer id="footer" class="panel-footer">
    <p class="pull-right">by 百战天虫</p>
    <p>&copy; 2015 极客学院练习 </p>
</footer>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//编辑和添加新闻后调转回当页达到刷新效果
		<?php
		if($_GET['t']=="addnews"){
			?>
			$('a[href="#addnews"]').tab('show');
		<?php
		}else if($_GET['t']=="editnews"){
		?>
		$('a[href="#editnews"]').tab('show');	
		<?php
		}
		?>
		$('a[href="#newslist"]').click(function(){
			window.location.href="index.php";
		});
		//点击任意栏目，隐藏添加成功提示语
		$(".nav li").click(function(){
			$(".alert ").remove();
		});
		
			//全选全不选
			$(".chk_all").click(function()
        {		
            $("input[name='listid[]']").prop("checked",this.checked);          
        });
		
		
		//点击删除链接	
		$(".delete").click(function(){
		return msg();
		});
		//点击删除多条按钮
		$("#delbtn").click(function(){
		  var checknum=$("input[name='listid[]']:checked").length;
			if(checknum>0){
			msg();			
			}else{
				alert("没选中删除项!");
				return false;
			}
		  

		});
		//删除时对话框
		function msg(){
		var gnl=confirm("你真的确定要删除吗?"); 
			if (gnl==true){ 
			return true; 
			} 
			else{ 
			return false; 
			} 
		}
    });</script>
</body>
</html>