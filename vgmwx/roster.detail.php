<?php 
include_once('./config.php');
extract($config);
$mysqli = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
$mysqli->set_charset($dbcharset);


$rosterId = isset($_GET['roster_id']) ?intval($_GET['roster_id']):"";
$roster = '';
if(!empty($rosterId)){
    
    $sql = "select A.*,B.class_name from roster A left join class B on A.roster_class=B.class_id where A.roster_id=$rosterId";


    $roster = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);


    if(!empty($roster)) $roster=$roster[0];
//    var_dump($roster);
}
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>员工信息</title>
        <link href="./public/css/bootstrap.min.css" rel="stylesheet">
        <link href="./public/css/mystyle.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php if(empty($roster)):?>
            <p>无此员工</p>
            <?php 
            else:
                $rosterStatusArr = array('','在职','休假','病假','离职');
                        
                $rosterGender = $roster['roster_gender'] == 0? '女' : '男';
                $rosterStatus = $rosterStatusArr[$roster['roster_status']];

            ?>
            <h3 class="text-primary">员工<?=$rosterId;?>信息</h3>
            <dl class="dl-horizontal">
                <dt >姓名</dt>
                <dd ><?=$roster['roster_name'];?></dd>
                <dt>工号</dt>
                <dd><?=$roster['roster_number'];?></dd>
                <dt>照片</dt>
                <dd><img src="<?=substr($roster['roster_pic'],1)?>" alt="员工归照片" width="140px" height="140px" class="img-rounded"></dd>
                <dt>性别</dt>
                <dd><?=$rosterGender;?></dd>
                <dt>生日</dt>
                <dd><?=$roster['roster_birthday'];?></dd>
                <dt>手机</dt>
                <dd><?=$roster['roster_mp'];?></dd>
                <dt>电话</dt>
                <dd><?=$roster['roster_phone'];?></dd>
                <dt>部门</dt>
                <dd><?=$roster['roster_class'];?></dd>
                <dt>邮箱</dt>
                <dd><?=$roster['roster_email'];?></dd>
                <dt>微信</dt>
                <dd><?=$roster['roster_wechat'];?></dd>
                <dt>状态</dt>
                <dd><?=$rosterStatus;?></dd>
                <dt>入职</dt>
                <dd><?=$roster['roster_in'];?></dd>
                
            </dl>
            <?php endif;?>
        </div>
        <script src='./public/js/jquery-1.11.1.min.js'></script>
        <script src='./public/js/bootstrap.min.js'></script>
    </body>
</html>