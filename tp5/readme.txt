1.在tp5中，module/controller/model，都用小写表示

2.创建控制器，比如index控制器，文件命名为:Index.php, 类名：Index，区别于tp3.2,不加Controller后缀

3如果只有一个模块，首先在application下的config.php设置 'app_multi_module' false 并且直接在 application 下建立controller,model,view.还可以绑定入口文档：在公共文件中绑定
// 应用公共文件
define('BIND_MODULE','index/index');

