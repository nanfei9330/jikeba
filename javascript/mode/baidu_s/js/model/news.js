//此为新闻幻灯片特效代码，使用了单例模式，把元素和事件分开，代码更好看;保护了属性和方法，防止跟其他特效互相干扰。
define(function(require, exports, module) {
    var $ = require('jquery');
    var runSlide = (function() {
        //幻灯片时间
        var time = 2000;
        //计时对象
        var interval;
        //图片宽度
        var picWidth = 425;
        var index = 0;
        //图片张数
        var picNum = $(".img-viewer-cell a").length;

        function runPic() {
            if (index == picNum) {
                //最后一张
                index = 0;
            }
            if (index < 0) {
                index = picNum - 1;
            }
            $(".img-viewer-cell").animate({
                left: -picWidth * index
            });
            $(".img-bars-content a").removeClass("on").eq(index).addClass("on");
            index++;
        }

        /*
         *******************************************
         *单例代码
         *******************************************
         */
        var news = {};
        news.init = function() {
                var me = this;
                me.render();
                me.bind();
            }
            //元素
        news.render = function() {
                var me = this;
                me.preBtn = $(".pre-img");
                me.nextBtn = $(".next-img");
                me.imgCon = $(".s-news-img-ctner");
                me.smallPic = $(".img-bars-content a");
            }
            //事件
        news.bind = function() {
            var me = this;

            //上一张：如果当前是第一张，则跳到最后一张，否则向上切换一张
            me.preBtn.click(function() {
                clearInterval(interval);
                index = index - 2;
                runPic();

            });

            //下一张： 如果当前是最后一张，则跳回第一张，否则切换下一张
            me.nextBtn.click(function() {
                clearInterval(interval);
                runPic();
            });

            //悬停
            me.imgCon.hover(function() {
                clearInterval(interval);
            }, function() {
                interval = setInterval(runPic, time);
            });

            /*缩略图导航*/
            me.smallPic.click(function() {
                clearInterval(interval);
                index = $(".img-bars-content a").index(this);
                runPic();
            });
        }

        return news;
    })();


    module.exports = runSlide;
});
