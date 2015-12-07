<?php
class mypage {
    //总条数
    private $total;
    //每页显示条数
    private $pagesize;
    public function __construct($total, $pagesize) {
        $this->total = $total;
        $this->pagesize = $pagesize;
        $this->pagenum = ceil($total / $pagesize);
    }
    public function pageWrite() {
        //上一页
        $prepage = $_GET["page"] - 1;
        $keywords = $_GET["keywords"] ? $_GET["keywords"] : "";
        $pageContent = '<ul class="pagination"><li ';
        if ($prepage <= 0) {
            $pageContent.= 'style="display:none;"';
        }
        $pageContent.= '>
			<a href="?page=' . $prepage . '&keywords=' . $keywords . '" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>';
        //中间页码
        for ($i = 0; $i < $this->pagenum; $i++) {
            $p = $i + 1;
            $pageContent.= '<li ';
            //当前状态样式为active
            if ($p == $_GET["page"]) {
                $pageContent.= 'class="active"';
            }
            //当只有1页时，1页码为当前页码
            if ($p == 1 && $_GET["page"] == "") {
                $pageContent.= 'class="active"';
            }
            $pageContent.= '><a href="?page=' . $p . '&keywords=' . $keywords . '">' . $p . '</a></li>';
        }
        //下一页
        $nextpage = $_GET["page"] + 1;
        $pageContent.= ' <li ';
        if ($nextpage > $this->pagenum || $nextpage == 1) {
            $pageContent.= 'style="display:none;"';
        }
        $pageContent.= '>
		<a href="?page=' . $nextpage . '&keywords=' . $keywords . '" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
		</a>
	</li></ul>';
        return $pageContent;
    }
}
?>

