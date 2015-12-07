//mysql操作
//路由需放在query内才有效，此文件暂没应用
var mysql=require('../config/mysql');
var db=mysql();


// var SQLControl={};
// SQLControl.insert=function(){
// db.query('INSERT INTO `mytable` SET ?', {name: 'me'}, function(err, result) {
//   if (err) throw err;
// 	console.log(result.insertId);
// });
// }

// module.exports=SQLControl;


//http://www.tuicool.com/articles/JfqYN3I