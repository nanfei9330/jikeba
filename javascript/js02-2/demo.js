/*
简易计算器：
可运算加、减、乘、除
*/
//window.__defineSetter__('op',function(){debugger});
num1 = 0; //保存第一值
num2 = 0; //保存第二值
op = ""; //保存运算符
opresult = 0; //保存结果，用于连续计算
opScreen = document.getElementById("note");
/*
思路：第一次点击运算符时，记录第一值和运算符，按等号记录第二值并计算
*/

/*按数字的屏幕显示控制：如果屏幕显示是0，按n替换为n，显示不为0则追加字符 */
function countSHow(n) {
    if (opScreen.value == "0" || opScreen.value == num1 || opScreen.value == "除数不为0") {
        opScreen.value = n.value;
    } else {
        opScreen.value += n.value;
    };

}

/*按点时的屏幕显示控制：已存在'.'，则不加'.'，否则追加'.'*/
function dot() {
    var screenText = opScreen.value;
    if (screenText.indexOf(".") < 0) {
        opScreen.value += ".";
    }

}

//一按运算符，计算器顶部显示运算过程，并更新num1和运算符
function operationShow(o) {
    num1 = opScreen.value;
    op = o.value;
    document.getElementById("process").innerHTML = num1 + op;
}


/*等于，计算并在显示屏输出结果*/
function result() {
    num2 = opScreen.value;
    switch (op) {
        case "÷":
            opresult = divide(num1, num2);
            break;

        case "x":
            opresult = times(num1, num2);
            break;

        case "+":
            opresult = plus(num1, num2);
            break;

        case "-":
            opresult = minus(num1, num2);
            break;
    }

    opScreen.value = opresult;
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


/*重置*/
function clearNote() {
    opScreen.value = "0";
    document.getElementById("process").innerHTML = "";
    num1 = 0;
    num2 = 0;
    op = "";
    opresult = 0;
}
