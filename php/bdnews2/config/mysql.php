<?php
class mysql
{
    //数据库主机
    private $db_host;
    //数据库用户名
    private $db_user;
    //数据库密码
    private $db_pwd;
    //数据库名
    private $db_database;
    //数据库编码
    private $coding;

    //构造函数
    public function __construct($db_host, $db_user, $db_pwd, $db_database, $coding)
    {
        $this->db_host     = $db_host;
        $this->db_user     = $db_user;
        $this->db_pwd      = $db_pwd;
        $this->db_database = $db_database;
        $this->coding      = $coding;
        $this->connect();
    }
    //数据库连接
    public function connect()
    {
        $conn = mysql_connect($this->db_host, $this->db_user, $this->db_pwd) or die("数据库连接失败!");
        mysql_select_db($this->db_database, $conn);
        mysql_query("set names $this->coding");
    }
    //数据库执行
    public function query($sql)
    {
        return mysql_query($sql);
    }
    //删除
    public function delete($table, $condition)
    {
        return $this->query("delete from news $condition");
    }
    //统计条数
    public function sum($table, $condition)
    {
        $sqlnum    = "select count(*) from $table $condition";
        $num_query = mysql_query($sqlnum);
        $rownum    = mysql_fetch_array($num_query);
        return $rownum[0];
    }
    //查询一个表的所有数据
    public function search_table($table)
    {
        $sql   = "select * from $table";
        $query = $this->query($sql);
        while ($row = mysql_fetch_array($query)) {
            $arr[] = $row;
        }
        return $arr;
    }
    
    //搜索新闻表返回数据
    public function search_news($sql)
    {
        $query = $this->query($sql);
        while ($row = mysql_fetch_array($query)) {
            $arr["tid"]        = $row["tid"];
            $arr["id"]         = $row["id"];
            $arr["main_title"] = $row["main_title"];
            $arr["second_abs"] = $row["second_abs"];
            $arr["picture"]    = $row["picture"];
            $arr["link"]       = $row["link"];
			switch ($row["tid"]) {
				case "1":
				    $arr["typename"] = "社会";
				    break;
				case "2":
				    $arr["typename"] = "百家";
				    break;
				case "3":
				    $arr["typename"] = "本地";
				    break;
				case "4":
				    $arr["typename"] = "娱乐";
				    break;
				}
            //时间相减得出秒数
            $t                 = strtotime(date("Y-m-d H:i:s")) - strtotime($row['time']);
            //发布时间距离现在多少分钟
            $intervalTime      = $t / 60;
            //如果小于60分，则显示分钟
            if ($intervalTime < 60) {
                $intervalShow = floor($intervalTime) . "分钟";
            } else if ($intervalTime > 60) {
                $intervalShow = floor(($intervalTime / 60)) . "小时";
            }
            $arr["time"] = $intervalShow;
            $newlist[]   = $arr;
        }
        return $newlist;
    }
    
    //把数据变为json格式
    public function json($arr)
    {
        return json_encode($arr);
    }
	public function goPage($url){
		echo "<script>window.location='".$url."'</script>";
	}
}
?>
