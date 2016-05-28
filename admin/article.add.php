<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Graham Article POST System</title>
        <link rel='stylesheet' href="../css/bootstrap.css" type="text/css">
        <link rel='stylesheet' href="../css/ms-styles.css" type="text/css">
    </head>
    <body>
        <div class="cms">
            <div class="cms-header">
                <h1 class="cms-title col-md-12"> 后台管理系统</h1>
            </div>
            <div class="cms-body col-md-12">
                <div class="row">
                    <div class="cms-sidebar col-xs-3 col-md-3">
                        <p><a href="article.add.php">发布文章</a></p>
                        <p><a href="article.manage.php">管理文章</a></p>
                    </div>
                    <div class="cms-content col-xs-9 col-md-9">
                        <form id="article-form" name="article-form" method="post" action="article.add.handle.php">
                            <div class=" row post-article">
                                <h4>发布文章</h4>
                            </div>
                            <div class=" row article-title">
                                <label class="col-md-2" for="title">标题</label>
                                <input class="col-md-8" type="text" name="title" id="title"/>
                            </div>
                            <div class=" row article-author">
                                <label class="col-md-2" for="author">作者</label>
                                <input class="col-md-8" type="text" name="author" id="author"/>
                            </div>
                            <div class="row article-desc">
                                <label class="col-md-2" for="description">简介</label>
                                <textarea class="col-md-8" name="description"  id="description" cols="80" rows="5"></textarea>
                            </div>
                            <div class="row article-content">
                                <label class="col-md-2" for="content">内容</label>
                                <textarea class="col-md-8" name="content" id="content" cols="80" rows="25"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cms-footer col-md-12">
                <p><span class="copyright col-md-8"><strong>版权归(GF)吉福科技有限公司所有</strong></span> <span class="contact col-md-4">联系方式：GF 15220195628</span></p>
            </div>
        </div>
    </body>
</html>
