function proc(x, y, z) {
	x = parseFloat(x);
	y = parseFloat(y);
	switch (z) {
		case "jia":
			r = x + y;
			break;
		case "jian":
			r = x - y;
			break;
		case "cheng":
			r = x * y;
			break;
		case "chu":
			r = x / y;
			break;
	}
	/*除数为0*/
if(r=="Infinity"){
	r="除数不为0";
	
}
return r;
}

function count() {
	var num1 = document.getElementById("num1").value;
	var num2 = document.getElementById("num2").value;
	var operator = document.getElementById("operator").value;
	if(num1=="" || num2==""){
		alert("请输入数字");
		return false;
	}
	if (isNaN(num1) || isNaN(num2)) {
		alert("请输入数字");
		return false;
	}

	document.getElementById("msg").innerHTML = "运算结果为："+proc(num1, num2, operator);
}