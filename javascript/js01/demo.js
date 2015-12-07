/* 
等级分布：
91-100分，一等
81-90，二等
71-80，三等
61-70，四等
51-60，五等
41-50。六等
31-40，七等
21-30，八等
11-20，九等
0-10，十等
*/
function checkScore() {
	var score = document.form1.score.value;
	var msg = "您的等级为：";
	var msgBox = document.getElementById("msg");
	var level = "";
	// 用户输入数字为负数或不是数字，提示输入正确的分数
	if (isNaN(score) || score < 0) {
		msgBox.innerHTML = "<span style='color:red'>请输入正确的分数！</span>";
		return false;
	}

	switch (true) {
		case score <= 100 && score > 90:
			level = "一";
			break;
		case score <= 91 && score > 80:
			level = "二";
			break;
		case score <= 81 && score > 70:
			level = "三";
			break;
		case score <= 71 && score > 60:
			level = "四";
			break;
		case score <= 61 && score > 50:
			level = "五";
			break;
		case score <= 51 && score > 40:
			level = "六";
			break;
		case score <= 41 && score > 30:
			level = "七";
			break;
		case score <= 31 && score > 20:
			level = "八";
			break;
		case score <= 21 && score > 10:
			level = "九";
			break;
		default:
			level = "十";

	}

	msgBox.innerHTML = "<span style='color:blue;'>"+msg + level + "级</span>";

}