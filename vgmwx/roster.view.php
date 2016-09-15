<?php
include_once('./config.php');
include_once('./admin/libs/base.class.php');

extract($config);

$mysqli = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
$mysqli->set_charset($dbcharset);

//列表数据获取、分页
$sql = "select count(*) from roster where status=1";
$count = $mysqli->query($sql)->fetch_row()[0];

//获取当前页码
$page = isset($_GET['page']) ? intval($_GET['page']):0;

$rosterList  ="";
$multi = '';
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
    $sql = "select A.*,B.class_name from roster A left join class B on A.roster_class=B.class_id where A.status=1 order by A.roster_id desc limit $frecord,$pageNum";
    
    $rosterList = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
    
    $mysqli->close();
//    $multi = multi($count,$pageNum,$page,'class.view.php');
    $multi = page($page,$count,'roster.view.php',$pageNum,3);
}


?>
<!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>部门管理</title>
        <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!--页面名称-->
            <h3>部门管理｜<a href="roster.update.php">新增部门</a></h3>
            <!--列表开始-->
            <table class="table ">
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>工号</th>
                        <th>照片</th>
                        <th>性别</th>
                        <th>部门</th>
                        <th>手机</th>
                        <th>状态</th>
                        <th>微信绑定</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php 
                    if(!empty($rosterList)):
                        $rosterStatusArr = array('','在职','休假','病假','离职');
                        foreach($rosterList as $v):
                            $rosterGender = $v['roster_gender'] == 0? '女' : '男';
                            $rosterStatus = $rosterStatusArr[$v['roster_status']];
                            
                            $wechatBind = empty($v['roster_openid'])?"未绑定":"绑定";
                            $image = substr($v['roster_pic'],1);
                            
                            
                    ?>
                            <tr>
                                <td><?php echo $v['roster_id'];?></td>
                                <td><?php echo $v['roster_number'];?></td>
                                <td><img width="140px" height="140" src="<?=$image;?>" alt="员工照片" class="img-rounded"></td>
                                <td><?=$rosterGender;?></td>
                                <td><?=$v['class_name'];?></td>
                                <td><?=$v['roster_mp'];?></td>
                                <td><?=$rosterStatus;?></td>
                                <td><?=$wechatBind;?></td>
                                <td>
                                    <a href="roster.update.php?roster_id=<?=$v['roster_id'];?>">编辑</a>
                                    <span>|</span>
                                    <a href="roster.detail.php?roster_id=<?=$v['roster_id'];?>">查看</a>
                                    <span>|</span>
                                    <a href="./admin/admin.roster.manager.php?action=del&class_id=<?=$v['class_id'];?>">删除</a>
                                </td>
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

                    <?php echo $multi;?>
 
                </ul>
            </nav>
        </div>
    </body>
</html>