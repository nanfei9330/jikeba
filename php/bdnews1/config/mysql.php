<?php
class mysql {
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
    public function __construct($db_host, $db_user, $db_pwd, $db_database, $coding) {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pwd = $db_pwd;
        $this->db_database = $db_database;
        $this->coding = $coding;
        $this->connect();
    }
    //数据库连接
    public function connect() {
        $conn = mysql_connect($this->db_host, $this->db_user, $this->db_pwd) or die("数据库连接失败!");
        mysql_select_db($this->db_database, $conn);
        mysql_query("set names $this->coding");
    }
    //数据库执行
    public function query($sql) {
        return mysql_query($sql);
    }
    //删除
    public function delete($table, $condition) {
        return $this->query("delete from news $condition");
    }
    //统计条数
    public function sum($table, $condition) {
        $sqlnum = "select count(*) from $table $condition";
        $num_query = mysql_query($sqlnum);
        $rownum = mysql_fetch_array($num_query);
        return $rownum[0];
    }
}
?>
