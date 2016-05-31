<?php
require_once('../config/connect.php');
$sql = "select * from articles order by created desc";
$query = mysql_query($sql);
if($query&&mysql_num_rows($query)){
    while($row = mysql_fetch_assoc($query)){
        $data[] = $row;
    }
}else{
    $data = array();
}
?>
<html>
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
                        
                        <div class=" row manage-article">
                            <h4>管理文章</h4>
                        </div>
                        <div class="row article-list">
                            <table>
                                <tr>
                                    <th> 编号 </th>
                                    <th> 标题 </th>
                                    <th> 操作 </th>
                                </tr>
                                    <?php 
                                        if(!empty($data)){
                                            foreach($data as $v){
                                    ?>
                                <tr>
                                    <td><?php echo $v['id'];?></td>
                                    <td><?php echo $v['title'];?></td>
                                    <td><a href="article.del.handle.php?id=<?php echo $v['id'];?>">删除</a>&nbsp;&nbsp;<a href="article.modify.php?id=<?php echo $v['id'];?>">编辑</a></td>
                                </tr>
                                    <?php  }}?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cms-footer col-md-12">
                <p><span class="copyright col-md-8"><strong>版权归(GF)吉福科技有限公司所有</strong></span> <span class="contact col-md-4">联系方式：GF 15220195628</span></p>
            </div>
        </div>
    </body>
</html>

    