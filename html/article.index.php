<?php
    require_once('../config/connect.php');
    $sql = "select * from articles order by created desc";
    $query = mysql_query($sql);
    if($query&& mysql_num_rows($query)){
        while($row = mysql_fetch_assoc($query)){
            $data[] = $row;
        }
    }
?>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
        <title>简单的文章管理系统</title>
        <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="../css/ms-styles.css" type="text/css">
    </head>
    <body>
        
<!--   navbar     -->
        <div class="navbar-wrapper">
           
            <div class="container row">
                <div id="logo" class="col-md-8 col-xs-8">
                    <h1><a href="/">PHP与MYSQL<sup></sup></a></h1>
                </div>
                <div id="navbar" class="col-md-4 col-xs-4 cms-menu">
                   <ul>
                       <li class="active"><a href="article.index.php">文章</a></li>
                       <li><a href="#">关于我们</a></li>
                       <li><a href="#">联系我们</a></li>
                   </ul> 
                </div>
            </div>
          
        </div>
<!--   end of navbar     -->
<!--    page    -->
        
        <div class="cms-front-body row ">
            <div class="col-md-12 col-xs-12">
                <div class="article-list col-md-8 col-xs-8">
                    <?php 
                        if(empty($data)){
                            echo "当前没有文章，请管理员到后台添加文章！";
                        }else {
                            foreach($data as $v){

                    ?>
                    <div class="article">
                        <h1 class="article-info"><span class="article-title"><?php echo $v['title'];?></span><span class="article-author">作者: &nbsp;<?php echo $v['author'];?></span></h1>
                        <div class="article-entry">
                            <?php echo $v['description']; ?>
                        </div>
                        <div class="article-meta">
                            <p class="article-links"><a class="show-more" href="article.show.php?id=<?php echo $v['id'];?>">查看详细</a>&nbsp;&nbsp;»&nbsp;&nbsp;</p>
                        </div>
                    </div>
                    <?php }}?>
                </div>
                <div class="article-sidebar col-md-4 col-xs-4">
                    <div class="search">
                        <h2><b class="text1">Search</b></h2>
                        <div class="search-key row" >
                            <form method="get" action="article.search.php">
                                <fieldset>
                                    <input type="text" id="key" value="" name="key"/>
                                    <input type="submit" id="search" value="搜索" name="submit" class="btn btn-primary"/>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--    end of page    -->
        <div class="cms-footer col-md-12">
            <p><span class="copyright col-md-8 col-xs-8"><strong>版权归(GF)吉福科技有限公司所有</strong></span> <span class="contact col-md-4 col-xs-4">联系方式：GF 15220195628</span></p>
        </div>
    </body>
</html>