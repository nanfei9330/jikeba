var express = require('express');
var moment = require('moment');
var mysql = require('../config/mysql');
var db = mysql();
var router = express.Router();
var moment = require('moment');




//后台首页
router.get('/', function(req, res, next) {
    res.render('admin');
});



//登录页
router.get('/login', function(req, res, next) {
    res.render('login');
});

//登录检查

router.get('/logincheck', function(req, res, next) {
    var name = req.query.name;
    var password = req.query.password;
    var sql = "select *  from `admin` where `name`='" + name + "' and `password`='" + password + "'";
    db.query(sql, function(err, rows, fields) {
        res.send(rows);
    });
   
});

//首页
// router.get('/api/:keywords&:page', function(req, res, next) {
//     var pagesize = 8;
//     var pageget = req.params.page;
//     var page = (pageget - 1) * pagesize;
//     //前台默认tid为1
//     var keywords = req.params.keywords;
//     var where = "";
//     if (keywords !== "" || keywords !== " ") {
//         where = "where `main_title`like'%" + keywords + "%'";
//     }
//     var sql = 'select * from `news` ' + where + ' order by `id` desc limit ' + page + ',' + pagesize;
//     db.query(sql, function(err, rows, fields) {
//         res.send(rows);
//     });
// });

//页码查询
router.get('/api/:page', function(req, res, next) {
    var pagesize = 8;
    var pageget = req.params.page;
    var page = (pageget - 1) * pagesize;
    //前台默认tid为1

    var sql = 'select * from `news` order by `id` desc limit ' + page + ',' + pagesize;
    db.query(sql, function(err, rows, fields) {
        res.send(rows);
    });

});

//默认页码总数查询
router.get('/page', function(req, res, next) {
    var sql = 'select * from `news` ';
    db.query(sql, function(err, rows, fields) {
        res.send(rows);
    });
});

//删除执行，成功删除则返回首页
router.get('/del/', function(req, res, next) {
    var did = req.query.did;
    var sql = 'delete from `news` where `id`=' + did;
    db.query(sql, function(err, rows, fields) {
        if (err) {
            console.log(err);
            res.json({
                success: 0
            });
        } else {
            res.json({
                success: 1
            });
        }
    });
});

//批量删除执行，成功则返回首页
router.get('/deleteall/', function(req, res, next) {
    var listid = req.query.listid;
    var ids = listid.join(',');
    var sql = 'delete from `news` where `id` in (' + ids + ')';
    db.query(sql, function(err, rows, fields) {
        if (err) {
            console.log(err);
        } else {
            res.redirect('/admin/');
        }
    });
});

//编辑查询
router.get('/searchid/:eid', function(req, res, next) {
    var eid = req.params.eid;
    var sql = 'select * from `news` where `id`=' + eid;
    db.query(sql, function(err, rows, fields) {
        res.send(rows);
    });
});

//编辑执行
router.get('/edit/', function(req, res, next) {
    var id = req.query.id;
    var main_title2 = req.query.main_title2;
    var second_abs2 = req.query.second_abs2;
    var tid2 = req.query.tid2;
    var picture2 = "";
    if (req.query.picture2 !== "") {
        picture2 = req.query.picture2;
    }
    var link2 = "#";
    if (req.query.link2) {
        link = req.query.link2;
    }

    var sql = "UPDATE `news` SET  `main_title` =  '" + main_title2 + "' ,`second_abs`='" + second_abs2 + "',`tid`='" + tid2 + "',`picture`='" + picture2 + "',`link`='" + link2 + "' WHERE `id`='" + id + "';";
    db.query(sql, function(err, rows, fields) {
        if (err) {
            console.log(err);
        } else {
            res.json({
                success: 1
            });
        }
    });
});

//添加--添加成功则返回首页
router.get('/add/', function(req, res, next) {
    var main_title = req.query.main_title;
    var second_abs = req.query.second_abs;
    var tid = req.query.tid;
    var picture = req.query.picture;
    var link = '#';
    if (req.query.link) {
        link = req.query.link;
    }
    var time = moment().format('YYYY-MM-DD HH:mm:ss');
    var sqladd = "INSERT INTO `news` VALUES (' '," + tid + ",'" + main_title + "', '" + second_abs + "', '" + picture + "', '" + link + "', '" + time + "');";
    db.query(sqladd, function(err, rows, fields) {
        if (rows.insertId) {
            res.render('tips', {
                say: "新闻添加成功"
            });
        }
    });

});







module.exports = router;
