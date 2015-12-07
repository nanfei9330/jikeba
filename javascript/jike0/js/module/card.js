define(function(require, exports, module) {
    /*
    模块名：合作院校等栏目-友情链接切换
    */
    mediaIndex = 0;
    schoolIndex = 0;
    //院校个数
    var lastSchoolIndex = $("#school .slide-box-inner a").length - 1;
    var lastMediaIndex = $("#media .slide-box-inner a").length - 1;
    var cardTimer;
    //合作院校切换
    $("#school .arrow-right,#school .arrow-left").click(function() {
        var o = $("#school");
        if ($(this).attr("class") == "arrow-right") {
            schoolIndex++;
            if (schoolIndex > lastSchoolIndex) {
                // $("#school .slide-box-inner a").eq(schoolIndex-1).clone(true).appendTo($("#school .slide-box-inner"));
                schoolIndex = 0;
            }
        } else {
            schoolIndex--;
            //页面展示空位数为7，提前一个空位进行初始化
            if (schoolIndex < -6) {
                schoolIndex = 0;
            }
        }
        cardScroll(o, 140);
    });


    //媒体报道切换
    $("#media .arrow-right,#media .arrow-left").click(function() {
        var o = $("#media");
        if ($(this).attr("class") == "arrow-right") {
            mediaIndex++;
            if (mediaIndex > lastMediaIndex) {
                mediaIndex = 0;
            }
        } else {
            mediaIndex--;
            //页面展示空位数为6，提前一个空位进行初始化
            if (mediaIndex < -5) {
                mediaIndex = 0;
            }
        }
        cardScroll(o, 160);
    });

    //共用滚动
    function cardScroll(o, w) {
        //加上cardTimer避免用户点击太快
        clearTimeout(cardTimer);
        setTimeout(function() {
            var id = o.attr("id");
            if (id == "school") {
                o.find(".slide-box-inner").animate({
                    left: -w * schoolIndex
                });
            } else {
                o.find(".slide-box-inner").animate({
                    left: -w * mediaIndex
                });
            }

        }, 300);


    }
});
