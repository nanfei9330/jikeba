function getMaxLength() {
	 var str = ["a", "x", "b", "d", "m", "a", "p", "j", "a"];
	var obj = {};
	var k = "";

	//1、把数组每个字符和出现次数存放在对象中
	for (var i = 0; i < str.length; i++) {

		k = str[i]; //k=每个字母

		if (obj[k]) {
			obj[k]++; //字母每出现一次值递增一次
		} else {
			obj[k] = 1;
		}

	}

	//2、查询谁次数最多
	//循环属性,比较次数大小
	//假设出现次数最多为0次
	var max = 0;

	//假设出现最多的字母
	var who = null;

	//对象中出现次数比max大的，更新max值，以及更新出现最多的字母
	for (var y in obj) {
		if (obj[y] > max) {
			max = obj[y];
			who = y;
		}
	}

	

	//3、查询出现次数最多元素出现的位置
	var seat="";
	for(var i=0;i<str.length;i++){
		if(str[i]==who){
			seat=seat+" "+i;
		}
	}
	document.write(who + "出现次数最多，次数为：" + max + "次，"+"出现位置分别为："+seat);
}
getMaxLength();