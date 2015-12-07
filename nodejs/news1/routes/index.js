var express = require('express');
var moment = require('moment');
var mysql = require('../config/mysql');
var db = mysql();
var router = express.Router();


//分类
var typelist = [{
    tid: 1,
    title: "社会"
}, {
    tid: 2,
    title: "百家"
}, {
    tid: 3,
    title: "本地"
}, {
    tid: 4,
    title: "娱乐"
}];
//前台默认只使用模板不引入数据，数据由前台js控制
router.get('/', function(req, res, next) {
    res.render('news', {
        typelist: typelist
    });
});




//前台新闻数据接口
router.get('/newsapi/:tid&:page', function(req, res, next) {
    var pagesize = 8;
    var pageget = req.params.page;
    var page = (pageget - 1) * pagesize;
    //前台默认tid为1
    var tid = req.params.tid;
    var where ='where `tid` =' +tid;
    var sql = 'select * from `news` '+where +' order by `id` desc limit '+page+','+pagesize;
    db.query(sql, function(err, rows, fields) {
        res.send(rows);
    });

});



module.exports = router;
