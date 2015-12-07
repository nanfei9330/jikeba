//滚动加载的数据
var dataImg = {
    "data": [{
        "src": "12.jpg",
        "link": "#12",
        "title": "蜡笔小新12 - 百度百科"
    }, {
        "src": "13.jpg",
        "link": "#13",
        "title": "蜡笔小新13 - 百度百科"
    }, {
        "src": "14.jpg",
        "link": "#14",
        "title": "蜡笔小新14 - 百度百科"
    }, {
        "src": "15.jpg",
        "link": "#15",
        "title": "蜡笔小新15 - 百度百科"
    }]
};

    $(window).on("load", function() {
        imgLocation();

        //滚动触发
        window.onscroll = function() {
            if (scrollside()) {
            	//加载新数据
                createBox();
                //加载完数据重新摆放一下
                imgLocation();
            }
        };
    })

// function finshImageLoad(){
// 	var img=new Image();
// 	console.log(img.complete);
// }
//finshImageLoad();
//区块摆放设置，思路：每次划分两栏，第二栏开始的区块，拼接到第一栏最小高度的区块上。
function imgLocation() {
    //每一区块
    var box = $(".box");

    //获取区块宽度，因为css设置了宽度，所以获得了第一个区块宽度将获得全部区块宽度
    var boxWidth = box.eq(0).width();

    //获取一行能放区块数=浏览器宽度除以区块宽度
    var num = Math.floor($(window).width() / boxWidth);


    //创建数组，用于储存所有区块高度，以便于确定区块放置的位置
    var boxArr = [];

    //遍历所有区块
    box.each(function(index, value) {
        //每个区块的高度
        var boxHeight = box.eq(index).height();

        if (index < num) {
            //第一排高度存入数组
            boxArr[index] = boxHeight;
        } else {
            //获取最小高度
            var minboxHeight = Math.min.apply(null, boxArr);
            //获得最小高度的那个index，通过inArray确定minboxHeight在数组boxArr中的位置
            var minboxIndex = $.inArray(minboxHeight, boxArr);
            //确定区块位置
            $(value).css({
                "position": "absolute",
                "top": minboxHeight + 10,
                "left": box.eq(minboxIndex).position().left,

            });
            //为了让区块不停拼接上，在每确定完一个区块的位置后，从新计算高度，新原最小宽度=原最小高度+新摆上去的区块的高度
            boxArr[minboxIndex] += box.eq(index).height() + 10;
        }

    });
    	//图片延时加载 
          $("#container img").lazyload({ 
		  placeholder : "images/loading.gif",
                 effect: "show"
           });  
  
}



//滚动加载
function scrollside() {
    //文档高度
    var documentHeight = $(document).height();

    //窗口高度
    var windowHeight = $(window).height();

    //鼠标滚动高度
    var scrollHeight = $(window).scrollTop();

    //是否达到滚动边界
    return (scrollHeight + windowHeight) >= documentHeight ? true : false;
}


//遍历新数据，按照区块结构，动态创建区块
function createBox() {
    $.each(dataImg.data, function(index, value) {
        var box = $("<div>").addClass("box").appendTo($("#container"));
        var content = $("<div>").addClass("content").appendTo(box);
        var a = $("<a>").attr("href", $(value).attr("link")).appendTo(content);
        var img = $("<img>").attr("data-original", "images/" + $(value).attr("src")).attr("src","images/loading.gif").appendTo(a);
        var p = $("<p>").text($(value).attr("title")).appendTo(a);

    });

}
