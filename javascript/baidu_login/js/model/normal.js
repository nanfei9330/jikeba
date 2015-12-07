define(function(require, exports, module) {
    var normalControl={};
    normalControl.moreTag=function(){
        //右上角导航显示隐藏
    $('.moreproduct').hover(function() {
        $('.tj_link_wrapper').show();
    });
    $('.tj_link_wrapper').hover(function() {
        $('.tj_link_wrapper').show();
    }, function() {
        $('.tj_link_wrapper').hide();
    });

    }

module.exports=normalControl;
});


// JavaScript Document
//$(function() {
    // $(window).load(function() {
    //         ckName();
    //     });
    //     //右上角导航显示隐藏
    // $('.moreproduct').hover(function() {
    //     $('.tj_link_wrapper').show();
    // });
    // $('.tj_link_wrapper').hover(function() {
    //     $('.tj_link_wrapper').show();
    // }, function() {
    //     $('.tj_link_wrapper').hide();
    // });

    // //点击登录
    // $("#lg").click(function() {
    //     $(".alert_fullbg").show();
    //     $("#login-box").show();
    // });

    // //文本框聚焦效果
    // $(".pass-text-input").focus(function() {
    //     $(this).css({
    //         "border": "1px solid #4490F7"
    //     });
    //     $(this).parent().find("label").css({
    //         "background-position-y": "-35px"
    //     });
    // }).blur(function() {
    //     $(this).css({
    //         "border": "1px solid #ddd"
    //     });
    //     $(this).parent().find("label").css({
    //         "background-position-y": "5px"
    //     });
    // });
    // //清空用户名
    // $(".pass-clearbtn").click(function() {
    //     $(".userName").val("");
    // });

    // //输入
    // $(".pass-text-input").keyup(function() {
    //     ckName();
    // });

    // //点击右下角图片切换
    // $(".tang-pass-pop-login-changeWrapper").click(function() {
    //     var datatype = $(this).attr("data-type");
    //     if (datatype == "normal") {
    //         $(this).css({
    //             "background-position-x": "-46px"
    //         });
    //         $("#pass-login-pop-form").hide();
    //         $("#qrcodeContent").show();
    //         datatype = $(this).attr("data-type", "code");
    //     } else if (datatype == "code") {
    //         $(this).css({
    //             "background-position-x": "--87px"
    //         });
    //         $("#qrcodeContent").hide();
    //         $("#pass-login-pop-form").show();
    //         datatype = $(this).attr("data-type", "normal");
    //     }

    // });

    // $("#login-box .close").click(function() {
    //     $(".alert_fullbg").hide();
    //     $("#login-box").hide();
    // });

    // function ckName() {
    //     if ($(".userName").val() == "") {
    //         $(".pass-clearbtn").hide();
    //     } else {
    //         $(".pass-clearbtn").show();
    //     }
    // }



//})