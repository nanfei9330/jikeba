define(function(require, exports, module) {
    /*
    模块名：合作院校等栏目-友情链接切换
    */
    var $ = require('jquery');


    //克隆
    $("#school .slide-copy").html($("#school .slide-content").html());
    $("#media .slide-copy").html($("#media .slide-content").html());

    function cardScroll(id, dec, w) {
        var obj = $("#" + id);
        var slideBox = obj.find(".slide-box-m-box");
        //内容层
        var slideContent = obj.find(".slide-content");
        //拼接层
        var slideCopy = obj.find(".slide-copy");

        var seeWidth = slideContent.innerWidth();
        if (slideBox.scrollLeft() >= seeWidth) {
            slideBox.scrollLeft(0);
        } else {
            var i = slideBox.scrollLeft();
            if (dec == "left") {
                i -= w;
            } else {              
                 i += w;
            }

            slideBox.scrollLeft(i);

        }

    }

    //每次切换138
    $("#school .arrow").click(function() {
        var dec = $(this).attr("data-dec");
        cardScroll("school", dec, 138);
    });


    //每次切换161
    $("#media .arrow").click(function() {
        var dec = $(this).attr("data-dec");
        cardScroll("media", dec, 161);
    });


});
