// 只需要编译 html 文件，以及其用到的资源。
fis.set('project.files', ['*.html', 'map.json']);

/*快速安装插件
npm install fis-spriter-csssprites -g
npm install fis-optimizer-uglify-js -g
npm install fis3-hook-cmd -g
npm install fis3-postpackager-loader -g
*/

//快速启动： fis3 release  


/*图片合并*/
fis.match('::package', {
    spriter: fis.plugin('csssprites')
})

fis.match('*.css', {
    useSprite: true
});




//js/model目录下为组件
fis.match('/js/model/*.js', {
    isMod: true
});

fis.match('/js/vendor/sea.js', {
    isMod: false
});

//配置模块目录，设置别名
fis.hook('cmd', {
    baseUrl: './js',
    //路径基于baseUrl
    paths: {
        "jquery": "jquery",
        "$": "jquery"
    }
});


//打包
fis.match('::packager', {
    postpackager: fis.plugin('loader')
});

//css合并
fis.match('*.css', {
    packTo: '/static/aio.css'
});
//css压缩
fis.match('*.css', {
  optimizer: fis.plugin('clean-css')
});


//定位图片
fis.match('/images/(*.{png,gif})', {
    release: '/static/pic/$1$2'
});

// sea.js 方案
fis
    .media('prod')
    .match('/js/**.js', {
        optimizer: fis.plugin('uglify-js')
    })
    .match('::packager', {
        postpackager: fis.plugin('loader', {
            allInOne: {
                includeAsyncs: true,
                ignore: ['/js/vendor/sea.js']
            }
        })
    })
