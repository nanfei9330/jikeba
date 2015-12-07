<?php
include_once "control/news_default.php";
?>
<!DOCTYPE html>
  <html lang="zh-cn">
    <meta charset="UTF-8">
    <title>
    百度新闻管理系统v3
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!--mystyle-->
    <link rel="stylesheet" href="css/mystyle.css" />
    </head>
    <!--
	作业版本3：
	更换思路，从数据库返回json和html模板结合,更方面维护和操作
	删除、添加、编辑改为独立文件操作
	 -->
    <body>
      <!--顶部导航-->
      <nav class="nav navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#n">
              <span class="sr-only">
              </span>
              <span class="icon-bar">
              </span>
              <span class="icon-bar">
              </span>
              <span class="icon-bar">
              </span>
            </button>
            <a href="#" class="navbar-brand">
              百度新闻管理系统
            </a>
          </div>
          <div class="collapse navbar-collapse" id="n">
            <ul class="nav navbar-nav">
              <li class="active">
                <a href="#">
                  首页
                </a>
              </li>
              <li>
                <a href="../news.php">
                  查看前台
                </a>
              </li>
            </ul>
            <!--搜索-->
            <form action="" class="navbar-form navbar-right" id="topForm">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="输入新闻关键字如：9" name="keywords"
                />
              </div>
              <button type="submit" class="btn btn-default">
                搜索
              </button>
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
                <a href="#newslist" role="tab" data-toggle="tab">
                  新闻列表
                </a>
              </li>
              <li>
                <a href="#addnews" role="tab" data-toggle="tab">
                  添加新闻
                </a>
              </li>
              <li style="display:none;">
                <a href="#editnews" role="tab" data-toggle="tab">
                  编辑新闻
                </a>
              </li>
            </ul>
          </div>
          <!--右侧控制台-->
          <div class="col-xs-10 main col-xs-offset-2" style="padding-top:70px;">
            <!--切换内容-->
            <div class="tab-content">
              <!--新闻列表-->
              <div class="tab-pane active" id="newslist">
                <div class="row">
                  <!--表格面板-->
                  <div class="col-xs-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <div class="panel-title">
                          新闻列表
                        </div>
                      </div>
                      <div class="panel-body">
					  <form method="post" action="control/news_del.php">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th align="center" width="30">
                                  <input type="checkbox" class="checkbox chk_all" />
                                </th>
                                <th>
                                  ID
                                </th>
                                <th>
                                  分类
                                </th>
                                <th>
                                  标题
                                </th>
                                <th>
                                  添加时间
                                </th>
                                <th>
                                  操作
                                </th>
                              </tr>
                            </thead>
						
							 <tbody id="listbody">
                             	<!--新闻数据区 -->
                            </tbody>
                            <tbody>
                             
                              <tr>
                                <td>
                                  <input type="checkbox" class="checkbox chk_all" />
                                </td>
                                <td colspan="5">
                                  <input class="btn btn-danger" type="submit" name="delete" value="删除多条" id="delbtn" />
                                </td>
                              </tr>
                            </tbody>
                          </table>
						  </form>
                      </div>
                      <!--分页层-->
                      <div class="pager" id="table-page">
                        <nav>
                        <?php
                        echo $mypage->pageWrite();                          
                       ?> 
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--添加新闻-->
              <div class="tab-pane" id="addnews">
                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="panel-title">
                        添加新闻
                      </div>
                    </div>
                    <div class="panel-body">
                      <form action="control/news_add.php" method="post">
                        <table class="table table-bordered table-hover">
                          <tr>
                            <td>
                              标题：
                            </td>
                            <td>
                              <input type="text" name="main_title" />
                            </td>
                          </tr>
                          <tr>
                            <td>
                              副标题：
                            </td>
                            <td>
                              <input type="text" name="second_abs" />
                            </td>
                          </tr>
                          <tr>
                            <td>
                              分类：
                            </td>
                            <td>
                              <select name="tid">
                                <option value="1">
                                  社会
                                </option>
                                <option value="2">
                                  百家
                                </option>
                                <option value="3">
                                  本地
                                </option>
                                <option value="4">
                                  娱乐
                                </option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              图片：
                            </td>
                            <td>
                              <input type="text" name="picture" />
                            </td>
                          </tr>
                          <tr>
                            <td>
                              链接：
                            </td>
                            <td>
                              <input type="text" name="link" />
                              不填默认为#
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;
                              
                            </td>
                            <td>
                              <input type="submit" value="添加新闻" class="btn btn-success" name="addform"/>
                            </td>
                          </tr>
                        </table>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!--编辑新闻-->
              <div class="tab-pane" id="editnews">
                <div class="col-xs-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <div class="panel-title">
                        编辑新闻
                      </div>
                    </div>
                    <div class="panel-body">
                      <form action="control/news_edit.php" method="post">
                        <table class="table table-bordered table-hover">
                          <tr>
                            <td>
                              标题：
                            </td>
                            <td>
                              <input type="hidden" name="id" class="checkbox" value="" />
                              <input type="text" name="main_title2" value="" />
                            </td>
                          </tr>
                          <tr>
                            <td>
                              副标题：
                            </td>
                            <td>
                              <input type="text" name="second_abs2" value="" />
                            </td>
                          </tr>
                          <tr>
                            <td>
                              分类：
                            </td>
                            <td>
                              <select name="tid2" class="selector">
                                <option value="1">
                                  社会
                                </option>
                                <option value="2">
                                  百家
                                </option>
                                <option value="3">
                                  本地
                                </option>
                                <option value="4">
                                  娱乐
                                </option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              图片：
                            </td>
                            <td>
                              <input type="text" name="picture2" value="" />
                            </td>
                          </tr>
                          <tr>
                            <td>
                              链接：
                            </td>
                            <td>
                              <input type="text" name="link2" value="" />
                              不填默认为#
                            </td>
                          </tr>
                          <tr>
                            <td>&nbsp;
                              
                            </td>
                            <td>
                              <input type="submit" value="更新" class="btn btn-info" name="editform" />
                            </td>
                          </tr>
                        </table>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--切换内容结束-->
          </div>
        </div>
      </div>
      <!--底部-->
      <footer id="footer" class="panel-footer">
        <p class="pull-right">
          by百战天虫
        </p>
        <p>
          &copy;2015极客学院练习
        </p>
        <input type="hidden" id="t" value="">
      </footer>

      <!-- 模板 -->
      <textarea id="trtpl">
        <tr>
          <td align="center">
            <input type="checkbox" class="checkbox" value="$id$" name="listid[]">
          </td>
          <td>
            $id$
          </td>
          <td>
            $typename$
          </td>
          <td>
            $main_title$
          </td>
          <td>
           $time$
          </td>
          <td>
            <a href="javascript:void(0)" class="edit" data-eid="$id$">
              编辑
            </a>
            |
            <a href="javascript:void(0)" class="delete" data-did="$id$">
              删除
            </a>
          </td>
        </tr>
      </textarea>
      <input type="hidden" id="page" value="<?echo $_GET["page"];?>">
      <input type="hidden" id="keywords" value="<?echo $_GET["keywords"];?>">
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/module/news_admin.js"></script>
      </script>
    </body>
  
  </html>