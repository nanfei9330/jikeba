define(function(require, exports, moudles) {
    var news = require('model/news');
    var tab = require('model/tab');
    tab.init();
    news.init();
});
