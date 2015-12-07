
//所需插件
var gulp = require('gulp'),
less = require('gulp-less'),
cssmin = require('gulp-minify-css'),
autoprefixer = require('gulp-autoprefixer');

//默认任务：把less解析为css并进行压缩，添加兼容前缀，最后输出到src文件夹
gulp.task('do', function() {
gulp.src('less/*.less')
    .pipe(less())
    .pipe(autoprefixer())
    .pipe(cssmin())
    .pipe(gulp.dest('src'));
});



//调试用：监听less变化执行
gulp.task('watch', function() {
gulp.watch('./less/*.less', ['do']);
});


gulp.task('default',['do']);