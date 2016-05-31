<?php
require_once('../config/connect.php');
$id=$_GET['id'];
$sql = "select * from articles where id='$id'";
$query = mysql_query($sql);
$data = mysql_fetch_assoc($query);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>修改文章</title>
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
                                <h4>修改文章</h4>
                            </div>
                            <div class=" row article-title">
                                <label class="col-md-2 col-xs-2" for="title">标题</label>
                                <input class="col-md-8 col-xs-8" type="text" name="title" placeholder="请输入标题" id="title" value="<?php echo $data['title']; ?>"/>
                            </div>
                            <div class=" row article-author">
                                <label class="col-md-2 col-xs-2" for="author">作者</label>
                                <input class="col-md-8 col-xs-8" type="text" name="author" placeholder="作者" id="author" value="<?php echo $data['author']; ?>"/>
                            </div>
                            <div class="row article-desc">
                                <label class="col-md-2 col-xs-2" for="description">简介</label>
                                <textarea class="col-md-8 col-xs-8" name="description" placeholder="请输入不超过140字的简介" id="description"  rows="5"><?php echo $data['description']; ?></textarea>
                            </div>
                            <div class="row article-content">
                                <label class="col-md-2 col-xs-2" for="content">内容</label>
                                <textarea class="col-md-8 col-xs-8" name="content" id="content" placeholder="请在此处输入文章内容"  rows="25"><?php echo $data['content']; ?></textarea>
                            </div>
                            <div class="row article-save">
                                <input type="reset" class="btn btn-primary" name="reset-article" id="reset-article" value="取消"/>
                                <input type="submit" name="save-article" id="save-article" class="btn btn-primary" value="保存"/>
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
