<!DOCTYPE html>
<html lang="zh-cn">   
    <head>
        <meta charset="UTF-8">
        <title>
            百度新闻
        </title>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="css/wap-new.css">
        <script src="js/jquery-1.3.2.min.js">
        </script>
    </head>
    
    <body>
        <!-- 头部 -->
        <header class="header">
            <div class="ui-new-toolbar">
                <div class="ui-new-toolbar-l">
                    <a href="#" class="btn-config">
                    </a>
                    <a href="#" class="btn-userhome">
                    </a>
                </div>
                <div class="ui-new-toolbar-r">
                    <a href="#" class="btn-search">
                    </a>
                    <a href="#" class="btn-subscribe">
                    </a>
                </div>
            </div>
            <!-- 导航 -->
            <div class="navigator">
                <ul>
                    <li>
                        <a data-tid="1" href="#" class="on">
                            社会
                        </a>
                    </li>
                    <li>
                        <a data-tid="2" href="#">
                            百家
                        </a>
                    </li>
                    <li>
                        <a data-tid="3" href="#">
                            本地
                        </a>
                    </li>
                    <li>
                        <a data-tid="4" href="#">
                            娱乐
                        </a>
                    </li>
                </ul>
            </div>
        </header>
        <!-- 内容 -->
        <div class="content">
            <!-- 幻灯片 -->
            <div class="gallery" style="display:none;">
                <div class="g-list">
                    <a href="#">
                        <img src="images/timg.jpg">
                    </a>
                </div>
            </div>
            <!-- 新闻列表 -->
            <div class="list-item">
            	<ul></ul>
            </div>
            <!--加载中 -->
            <div class="load">
                <img src="images/loading.gif">
            </div>
            <div class="refresh-wrapper">
                <div class="refresh" data-tid="1">
                    点击加载更多>>
                </div>
            </div>
        </div>
        <!-- 底部 -->
        <footer id="footer">
            <div class="ui-footer">
                <a href="#" class="item feedback">
                    <span class="ico">
                    </span>
                    意见反馈
                </a>
                <a href="#" class="item app-recommend">
                    <span class="ico">
                    </span>
                    应用推荐
                </a>
                <a href="#" class="item app-download">
                    <span class="ico">
                    </span>
                    客户端
                </a>
            </div>
        </footer>
        <!-- 模板1有图片 -->
        <textarea style="display:none" id="temparea1">
            <li>
            <div class="item-pic">
                    <a href="d"><img src="images/$picture$" alt=""></a>
                </div>
                <div class="item-con">
                    <div class="main-title">
                        <a href="$link$">
                            $main_title$
                        </a>
                    </div>
                    <div class="main-abs">
                         $second_abs$
                    </div>
                    <div class="list-bottom">
                        <div class="time">
                             $time$前
                        </div>
                    </div>
                </div>
            </li>
        </textarea>
        <!-- 模板2：没图片 -->
         <textarea style="display:none" id="temparea2">
            <li>
                <div class="item-con">
                    <div class="main-title">
                        <a href="$link$">
                            $main_title$
                        </a>
                    </div>
                    <div class="main-abs">
                         $second_abs$
                    </div>
                    <div class="list-bottom">
                        <div class="time">
                             $time$前
                        </div>
                    </div>
                </div>
            </li>
        </textarea>
        <script type="text/javascript" src="js/news.js">
        </script>
    </body>

</html>