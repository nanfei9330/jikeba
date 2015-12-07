$(document).ready(function() {
    //默认加载页
    var page = 1;
    //默认加载分类1
    var tid = $("#t").val();
    $(".refresh").live("click", function() {
        page++;
        ajaxLoad(page);
        ifshow();
    });
    //异步加载方法
    function ajaxLoad(page) {
        $.ajax({
            url: "newajax.php",
            async: false,
            data: {
                tid: tid,
                page: page,
            },
            type: "post",
            success: function(con) {
                $(".list-item").append(con);
            }
        });
    }
    //加载中隐藏显示
    $loaddiv = $(".load");
    $loaddiv.ajaxStart(function() {
        $(this).show();
    }).ajaxStop(function() {
        $(this).hide();
    });


    //加载按钮是否显示
    function ifshow() {
        var loadnum = $("#loadNum").val();
        if (page >= loadnum) {
            $(".refresh").hide();
        } else {
            $(".refresh").show();
        }
    }
    //默认打开页面时判断是否显示加载按钮
    function defaultIfShowMore() {
        var loadnum = $("#loadNum").val();
        if (loadnum == 1) {
            $(".refresh").hide();
        }
    }
    //默认触发
    ajaxLoad(page);
    defaultIfShowMore();
});
