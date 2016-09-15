<?php
include_once('./config.php');
include_once('./admin/libs/base.class.php');
extract($config);
$mysqli = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
$mysqli->set_charset($dbcharset);
//列表数据获取、分页
$sql = "select count(*) from class where status=1";
$count = $mysqli->query($sql)->fetch_row()[0];

//获取当前页码
$page = isset($_GET['page']) ? intval($_GET['page']):0;

$classMList  ="";

if($count){
    //每页条数
    $pageNum = 3;
   
    $pages = intval($count) / intval($pageNum);
    $pages = ceil($pages);
    $page = $page>$pages?$pages:$page; //page不能大于总页数;
    
    if($page == 0) $page = 1;   //无页码，首页
    //计算开如记录的序号
    $frecord = ($page-1) * $pageNum;
    //获取符合条件的数据
    $sql = "select A.class_id,A.class_name,B.class_name as fclass_name from class A left join class B on A.class_fid=B.class_id where A.status=1 order by A.class_id desc limit $frecord,$pageNum";
    
    $classMList = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
    
    $mysqli->close();
//    $multi = multi($count,$pageNum,$page,'class.view.php');
    $multi = page($page,$count,'class.view.php',$pageNum,3);
}


?>
<!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>部门管理</title>
        <link href="./public/css/bootstrap.min.css" rel="stylesheet">
        <link href="./public/css/mystyle.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!--页面名称-->
            <h3>部门管理｜<a href="class.update.php">新增部门</a></h3>
            <!--列表开始-->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>序号</th>
                        <th>部门名称</th>
                        <th>所属上级</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php 
                    if(!empty($classMList)):
                        foreach($classMList as $v):?>
                            <tr>
                                <td><?php echo $v['class_id'];?></td>
                                <td><?php echo $v['class_name'];?></td>
                                <td><?php echo $v['fclass_name'];?></td>
                                <td><a href="class.update.php">编辑</a><span>|</span><a href="./admin/admin.class.manager.php?action=del&class_id=<?=$v['class_id'];?>">删除</a></td>
                            </tr>
                <?php 
                        endforeach;
                    else:
                ?>
                        <tr>
                            <td colspan=4>无记录</td>
                        </tr>
                <?php
                    endif;
                ?>
                    
                </tbody>
            </table>
            <nav>
                <ul class="pagination">
<!--                    <li><a href="class.view.php?page=0">&laquo;</a></li>-->
                    <?php echo $multi;?>
                    
<!--                    <li><a href="class.view.php?page=<?=isset($pages)?$pages:0;?>">&raquo;</a></li>-->
                </ul>
            </nav>
        </div>
    </body>
</html>