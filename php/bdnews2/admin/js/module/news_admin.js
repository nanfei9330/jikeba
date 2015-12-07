$(document).ready(function() {

    //页码
    var page = $("#page").val();

    //每页显示条数，修改请同步newsapi.php
    var pagesize = 8;
    var keywords = $("#keywords").val();
    var $listbox = $("#listbody");
    //替换模板对应数据
    String.prototype.temp = function(obj) {
        return this.replace(/\$\w+\$/gi, function(matchs) {
            var returns = obj[matchs.replace(/\$/g, "")];
            return (returns + "") == "undefined" ? "" : returns;
        });
    };

    //新闻读取方法
    var readnews = function(keywords, page) {
        var newList = "";
        var newTemp = $("#trtpl").val();;

        //读取新闻api
        $.ajax({
            url: "api/admin_news_api.php",
            type: "get",
            data: {
                keywords: keywords,
                page: page
            },
            dataType: "json",
            async: false,
            success: function(data) {
                $.each(data, function(index, value) {
                    //新闻数据整合
                    newList += newTemp.temp(value);
                });
            }
        });

        //新闻数据添加到对应层
        $listbox.html(newList);
    };


    //默认加载第一分类第page页
    readnews(keywords, page);


    /************常规操作**************/
        //全选全不选
    $(".chk_all").click(function() {
        $("input[name='listid[]']").prop("checked", this.checked);
    });

    //删除单条    
    $(".delete").click(function() {
        var did=$(this).attr("data-did");
        var r="";
        if(msg()){
            $.ajax({
                url:"control/news_del.php",
                type:"get",
                data:{did:did},
                async: false,
                success:function(r){
                   if(r=="ok"){
                    location.reload();
                   }                  
                }
            });
        };
    });

    //删除多条
    $("#delbtn").click(function() {
        var checknum = $("input[name='listid[]']:checked").length;
        if (checknum > 0) {
            return msg();
        } else {
            alert("没选中删除项!");
            return false;
        }
    });

    //删除时对话框
    function msg() {
        var gnl = confirm("你真的确定要删除吗?");
        if (gnl == true) {
            return true;
        } else {
            return false;
        }
    };

        //编辑
    $(".edit").click(function(){
        //显示编辑层
         $('a[href="#editnews"]').tab('show');
         var eid=$(this).attr("data-eid");
         //读取数据
        $.ajax({
            url: "api/admin_news_api.php",
            type: "get",
            data: {
                eid: eid
            },
            dataType: "json",
            async: false,
            success: function(data) {
                $.each(data, function(index, value) {
                    $("input[name='id']").val($(value).attr("id"));
                    $("input[name='main_title2']").val(value.main_title);    
                    $("input[name='second_abs2']").val(value.second_abs);
                    $(".selector").find("option[value='"+value.tid+"']").attr("selected",true);  
                    $("input[name='picture2']").val(value.picture); 
                    $("input[name='link2']").val(value.link);    
                });
            }
        });
    });

});
