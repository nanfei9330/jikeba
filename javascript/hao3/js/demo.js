//初始化
var styleBox = document.getElementById("style-box");
//判断浏览器是否支持localStorage，不支持则使用cookie
if (window.localStorage) {
	//localStorage
    //默认值为1
    if (localStorage.getItem("ustyle") == undefined) {
        localStorage.setItem("ustyle", "1");
    }

    //当按钮点击的时候，替换link的样式表，风格n对应stylen
    styleBox.addEventListener('click', function(e) {
        if (e.target.dataset.style) {
            localStorage.setItem("ustyle", e.target.dataset.style);
        } else {
            localStorage.setItem("ustyle", "1");
        }
        styleChange(localStorage.getItem("ustyle"));
    })


    document.getElementById("skin").className = "skin-" + localStorage.getItem("ustyle");

} else {
   //cookie
 	 if (getCookie("ustyle") == undefined || getCookie("ustyle")=="") {
        setCookie('ustyle','1',30);
    }

    //当按钮点击的时候，替换link的样式表，风格n对应stylen
    styleBox.attachEvent('onclick', function(e) {
    	var m=e.srcElement.getAttribute("data-style");
        if (m) {
            setCookie('ustyle',m,30);
        } else {
             setCookie('ustyle','1',30);
        }
        styleChange(getCookie("ustyle"));
    })


    document.getElementById("skin").className = "skin-" + getCookie("ustyle");
   
}


//点击时，修改样式表的函数
function styleChange(n) {
    var bd = document.getElementById("skin");
    bd.className = "skin-" + n;
}



/*******这个是w3c官网的代码**********/
//设置cookie
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
}
//获取cookie
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
    }
    return "";
}

//console.log("当前皮肤为：style"+localStorage.getItem("ustyle"));
