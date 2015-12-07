define(function(require, exports, module) {
    /*
    模块名：零碎的首页效果
    */
    //顶部menu显示隐藏
    $(".user-menu").hover(function() {
        $(".user-menu-menu").show();
    }, function() {
        $(".user-menu-menu").hide();
    });

    //问号提示语显示隐藏
    $(".way").hover(function() {
        $(this).next(".way-info").show().animate({
            "left": 0
        });
    }, function() {
        $(this).next(".way-info").animate({
            "left": "-15px"
        }).fadeOut("fast");
    });

    //搜索框聚焦效果
    $(".keywords").focus(function(){
        $(".hot-words").hide();
        $('.search-btn').addClass("search-focus");
    }).blur(function(){
        $(".hot-words").show();
        $('.search-btn').removeClass("search-focus");
    });

    //搜索关键字点击效果
    $(".hot-words a").click(function(){
        var txt=$(this).text();
       $(".keywords").val(txt);
    });

});
