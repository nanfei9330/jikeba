num1 = 0; //保存第一值
num2 = 0; //保存第二值
op = ""; //保存运算符
opresult = 0; //保存结果，用于连续计算
opScreen = document.getElementById("note");
opProcess = document.getElementById("process");

//按键触发
var calculator = document.getElementById("calculator");
if (typeof addEventListener != "undefined") {
	calculator.addEventListener("click", normalListener);
} else {
	calculator.attachEvent("onclick", IEListener);
}


function normalListener(e) {
	//数字按钮点击
	if (e.target.className == "num") {
		countSHow(e.target);
	}
	//运算符键
	if (e.target.className == "btn2") {
		operationShow(e.target);
	}

}

function IEListener(e) {
	//数字按钮点击
	if (e.srcElement.getAttribute("class") == "num") {
		countSHow(e.srcElement);
	}
	//运算符键
	if (e.srcElement.getAttribute("class") == "btn2") {
		operationShow(e.srcElement);
	}

}


/*按数字的屏幕显示控制：如果屏幕显示是0，按n替换为n，显示不为0则追加字符 */
function countSHow(n) {
	if (opScreen.value == "0" || opScreen.value == num1 || opScreen.value == "除数不为0") {
		opScreen.value = n.value;
	} else {
		opScreen.value += n.value;
	}

}

/*按点时的屏幕显示控制：已存在'.'，则不加'.'，否则追加'.'*/
function dot() {
	var screenText = opScreen.value;
	if (screenText.indexOf(".") < 0) {
		opScreen.value += ".";
	}

}

//传入运算符，计算器顶部显示运算过程，并更新num1和运算符
function operationShow(o) {
	//先计算结果
	result();
	op = o.value;
	num1 = opScreen.value;
	if (op == "sin" || op == "cos") {
		opProcess.innerHTML = op + "(" + opScreen.value + ")";
	} else {
		opProcess.innerHTML = opScreen.value + op;
	}
}


/*等于，计算并在显示屏输出结果*/
function result() {
	num2 = opScreen.value;
	//有运算符和值可得出结果，否则不作为
	if (op && opScreen.value) {
		switch (op) {
			case "÷":
				opresult = divide(num1, num2);
				break;

			case "×":
				opresult = times(num1, num2);
				break;

			case "+":
				opresult = plus(num1, num2);
				break;

			case "-":
				opresult = minus(num1, num2);
				break;
			case "sin":
				opresult = sinfun(opScreen.value);
				break;
			case "cos":
				opresult = sinfun(opScreen.value);
				break;

		}
		opScreen.value = opresult;
		opProcess.innerHTML = "";
		num1 = 0;
		num2 = 0;
		op = "";
	}


}


/*加*/
function plus(x, y) {
	return parseFloat(x) + parseFloat(y);
}


/*减*/
function minus(x, y) {
	return x - y;
}

/*乘*/
function times(x, y) {
	return x * y;
}


/*除*/
function divide(x, y) {
	if (y == "0") {
		return "除数不为0";
	} else {
		return x / y;
	}
}

/*sin*/
function sinfun(x) {
	return Math.sin(x);

}

/*cos*/
function cosfun(x) {
	return Math.cos(x);
}


/*重置*/
function clearNote() {
	opScreen.value = "0";
	opProcess.innerHTML = "";
	num1 = 0;
	num2 = 0;
	op = "";
	opresult = 0;
}

//让IE刷新清0的兼容
setTimeout(clearNote,200);