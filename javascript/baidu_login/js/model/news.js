define(function(require, exports, module) {
//新闻数据
var dataImg = {
    "data": [{
        "src": "slider1.jpg",
        "link": "#1",
        "title": "荷兰确认MH17被俄制导弹击落"
    }, {
        "src": "slider2.jpg",
        "link": "#2",
        "title": "安徽安庆一街头挂满禁止传销宣传条幅"
    }, {
        "src": "slider3.jpg",
        "link": "#3",
        "title": "帅气的德国男人真高冷吗?"
    }]
};

//幻灯片时间
var time = 2000;
//计时对象
var interval;
//图片宽度
var picWidth = 425;
index = 0;
//图片张数
picNum = $(".img-viewer-cell a").length;
interval = setInterval(runPic, time);

//上一张
var pre = $(".pre-img");
//下一张
var next = $(".next-img");

//加载新闻数据
function loadNew() {
    $.each(dataImg.data, function(index, value) {
        var link = $(value).attr("link");
        var imgsrc = $(value).attr("src");
        var title = $(value).attr("title");
        // //小预览图
        var a = $("<a>").attr("href", link).appendTo($(".img-bars-content"));
        var img = $("<img>").attr("src", "images/" + imgsrc).appendTo(a);

        var a2 = $("<a>").attr("href", link).appendTo($(".img-viewer-cell"));
        var img2 = $("<img>").attr("src", "images/" + imgsrc).appendTo(a2);
    });

}

loadNew();


function runPic() {
    if (index == dataImg.data.length) {
        //最后一张
        index = 0;
    }
    if (index < 0) {
        index = dataImg.data.length - 1;
    }
    $(".img-viewer-cell").animate({
        left: -picWidth * index
    });
    $(".img-bars-content a").removeClass("on").eq(index).addClass("on");
    index++;
}


//悬停
$(".s-news-img-ctner").hover(function() {
    clearInterval(interval);
}, function() {
    interval = setInterval(runPic, time);
});

//上一张：如果当前是第一张，则跳到最后一张，否则向上切换一张
pre.click(function() {
    clearInterval(interval);
    index = index - 2;
    runPic();

});

//下一张： 如果当前是最后一张，则跳回第一张，否则切换下一张
next.click(function() {
    clearInterval(interval);
    runPic();
});


/*缩略图导航*/
$(".img-bars-content a").click(function(){
     clearInterval(interval);
    index= $(".img-bars-content a").index(this);
    runPic();
});



});