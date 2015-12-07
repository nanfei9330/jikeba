    /*
                    快速安装：
                    	npm install --save-dev gulp gulp-less gulp-minify-css gulp-concat gulp-autoprefixer
                    快捷：
                    	gulp
                    */
    //所需插件
    var gulp = require('gulp'),
        less = require('gulp-less'),
        concat = require('gulp-concat'),
        cssmin = require('gulp-minify-css'),
        autoprefixer = require('gulp-autoprefixer');

    //默认任务：把less解析为css并进行压缩合并，添加兼容前缀，最后输出到style文件夹
    gulp.task('default', function() {
        gulp.src('less/**/*.less')
            .pipe(less())
            .pipe(concat('index.min.css'))
            .pipe(autoprefixer({
                browsers: ['last 2 versions'],
                cascade: false
            }))
            .pipe(cssmin())
            .pipe(gulp.dest('style'));
    });



    //调试用：监听less变化执行
    gulp.task('develop', function() {
        gulp.watch('./less/index/*.less', ['default']);
    });
