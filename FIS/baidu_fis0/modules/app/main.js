define(function (require, exports, moudles) {
	require('jquery')
	var news=require('./model/news'); 
	var tab=require('./model/tab');
	var normal=require('./model/normal');
	 tab.hometab();
	 normal.moreTag();
});