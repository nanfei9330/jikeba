
    var tab = {};
    //首页导航切换
    tab.hometab = function() {
        //左右栏tab
        $(".user-menu a").each(function() {
            $(this).click(function() {
                $(".user-menu a").removeClass("current");
                $(this).addClass("current");
                var tid = $(this).attr("data-tid") - 1;
                var height = 320;
                $(".model-con").animate({
                    "top": -height * tid
                });
            });
        });
        //右区tab
        $(".s-content .tab").each(function() {
            $(this).click(function(i) {
                var p = $(this).parents(".s-content");
                var tabs = p.find(".tab");
                var index = tabs.index(this);
                tabs.removeClass("tab-on");
                $(this).addClass("tab-on");
                p.find(".inner").hide();
                p.find(".inner").eq(index).show();
            });
        });
    };
tab.hometab();