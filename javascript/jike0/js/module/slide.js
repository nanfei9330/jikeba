define(function(require, exports, module) {
    /*
    模块名：幻灯片
    */
    var slide = {};
    //切换时间
    slide.time = 2000;

    //图片宽度
    slide.picWidth = 570;
    index = 0;

    //图片张数
    slide.picNum = $(".slide-img a").length;

    //图片切换方法
    slide.runPic = function() {
        if (index == slide.picNum) {
            //当前是最后一张时,初始化
            index = 0;
        }
        if (index < 0) {
            index = slide.picNum - 1;
        }
        $(".slide-img").animate({
            left: -slide.picWidth * index
        });
        $(".slide-nav span").removeClass("switch").eq(index).addClass("switch");
        index++;
    };

    //每隔2秒，进行一次切换
    slide.interval = setInterval(slide.runPic, slide.time);

    //切换上一张
    $(".arrow-left").click(function() {
        clearInterval(slide.interval);
        index = index - 2;
        slide.runPic();

    });
    //切换下一张
    $(".arrow-right").click(function() {
        clearInterval(slide.interval);
        slide.runPic();
    });

    //图片导航
    $(".slide-nav span").click(function() {
        clearInterval(slide.interval);
        index = $(".slide-nav span").index(this);
        slide.runPic();
    });

    module.exports = slide;
});
