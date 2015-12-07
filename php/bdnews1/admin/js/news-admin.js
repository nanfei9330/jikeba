$(document).ready(function() {
	
    //编辑和添加新闻后调转回当页达到刷新效果
    var t = $("#t").val();
    if (t == "addnews") {
        $('a[href="#addnews"]').tab('show');
    } else if (t == "editnews") {
        $('a[href="#editnews"]').tab('show');
    }
    $('a[href="#newslist"]').click(function() {
        window.location.href = "index.php";
    });
    //点击任意栏目，隐藏添加成功提示语
    $(".nav li").click(function() {
        $(".alert ").remove();
    });

    //全选全不选
    $(".chk_all").click(function() {
        $("input[name='listid[]']").prop("checked", this.checked);
    });


    //点击删除链接	
    $(".delete").click(function() {
        return msg();
    });
    //点击删除多条按钮
    $("#delbtn").click(function() {
        var checknum = $("input[name='listid[]']:checked").length;
        if (checknum > 0) {
            msg();
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
    }
});
