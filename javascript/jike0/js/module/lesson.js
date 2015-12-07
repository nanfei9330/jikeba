define(function(require, exports, module) {
    /*
    模块名：课程栏目切换
    */


    var timer;
    $('.lesson-list li').hover(function() {
        //li内小块
        var normal_li = $(this);
        var ops = $(this).find(".info p");
        var info = $(this).find(".info");
        var ico = $(this).find(".timeandicon");
        //hover时触发way
        function way() {
            ops.animate({
                "height": "50px"
            }, 100);
            info.animate({
                "height": "160px"
            }, 100);
            ico.css({
                "height": "48px"
            });
            normal_li.css({
                "overflow": "visible"
            });
        }
        //加上timer避免用户移动过快
        timer = setTimeout(way, 300);
    }, function() {
        $(this).find(".info p").animate({
            "height": "0"
        }, 1);
        $(this).find(".info").animate({
            "height": "70px"
        }, 100);

        $(this).find(".timeandicon").css({
            "height": "24px"
        });
        clearTimeout(timer);
    });

    //课程栏导航切换效果
    $(".lesson-nav li").hover(function() {
        var i = $(".lesson-nav li").index(this);
        $(".lesson-nav li").removeClass("on");
        $(".lesson-nav li").eq(i).addClass("on");
        $(".lesson-list ul").hide();
        $(".lesson-list ul").eq(i).show();
    });

});
