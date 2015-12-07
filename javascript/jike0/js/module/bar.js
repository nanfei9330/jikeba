define(function(require, exports, module) {
    /*
    模块名：左栏导航切换
    */

    //导航移上去对应内容 显示 or 隐藏
    $(".lesson-bar").hover(function() {
        $(".lesson-bar").css({
            "overflow": "visible"
        });
        $(".lesson-bar .line").hide();
    }, function() {
        $(".lesson-bar").css({
            "overflow": "hidden"
        });
        $(".lesson-bar .line").show();
    });

    //  导航超出显示 or 隐藏
    $(".lesson-bar li").hover(function() {
        $(this).find(".lesson-show").show();
    }, function() {
        $(this).find(".lesson-show").hide();
    });
});
