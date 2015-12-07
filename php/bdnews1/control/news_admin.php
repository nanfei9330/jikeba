<?php
//未登录则调整到登录页
if(!$_SESSION['admin']){
echo "<script>window.location='login.php'</script>";
};

//删除单条新闻
if($_GET["t"]=="del" && $_GET["eid"]){
$mysql->delete("news","where `id`='".$_GET["eid"]."'");
}

//删除多条记录
if($_POST["delete"]){
$ids=implode(",",$_POST['listid']);
$mysql->delete("news","where `id` in(".$ids.")");
}
?>
