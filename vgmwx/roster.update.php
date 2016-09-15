<?php 
include_once('./config.php');
extract($config);
$mysqli = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
$mysqli->set_charset($dbcharset);


$rosterId = isset($_GET['roster_id']) ?intval($_GET['roster_id']):"";

if(!empty($rosterId)){
    
    $sql = "select * from roster where roster_id=$rosterId";


    $roster = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);


    if(!empty($roster)) $roster=$roster[0];
//    var_dump($roster);
}

//获取部门
$classSql = "select class_id,class_name from class where status=1 order by class_fid asc";
$classList = $mysqli->query($classSql)->fetch_all(MYSQLI_ASSOC);

//var_dump($classList);

$mysqli->close();
$rosterStatus = array('在职','休假','病假','离职');

/*$require = empty($roster)||empty($roster['roster_pic'])?'required':'';
echo "require:".$require.'<hr/>';*/
?>

<!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>添加部门</title>
        <link href="./public/css/bootstrap.min.css" rel="stylesheet">
        <link href="./public/css/fileinput.min.css" rel="stylesheet">
        <link href="./public/css/mystyle.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!--页面名称-->
            <h3>
                员工
                <a href="./roster.update.php" class="<?php echo empty($rosterId)?'active current' : 'active';?>">添加</a>
                <a href="#" class="<?php echo !empty($rosterId)?'active current' : 'active';?>">修改</a>
            </h3>
            <h4><small>请在电脑上使用该后台，否则无法上传照片...</small></h4>
            
            <form class="form-horizontal" role="form" action="./admin/admin.roster.update.php" method="post" name="roster-add" id="roster-add" enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="rosterName" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="rosterName" name="roster_name" placeholder="姓名" value="<?=!empty($roster) ?$roster['roster_name']:'';?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rosterNumber" class="col-sm-2 control-label">工号</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="rosterNumber" name="roster_number"  placeholder="工号" value="<?=!empty($roster)?$roster['roster_number']:'';?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rosterPic" class="control-label col-sm-2" >照片</label>
                    <div class="col-sm-10">
                        <?php 
                            if(!empty($roster)&&!empty($roster['roster_pic'])):
                                session_start();
                                $_SESSION['roster_pic'] = $roster['roster_pic'];
                        ?>
                        <div id="show-roster-img">
                            <img src="<?=substr($roster['roster_pic'],1);?>" alt="员工照片" width="140px" height="140px" class="img-rounded">
                            <button type="button" class="btn btn-primary">修改</button>
                        </div>
                        <?php endif;?>
                        
                        <?php 
                        $require = empty($roster)||empty($roster['roster_pic'])?'required':''; 
                        $display = $require ? 'show':'hide';
                        
                        ?>
                        <div id="rosterPic" class="<?=$display;?>">
                        
                            <input   name="roster_pic" type="file" class="file file-loading " multiple data-show-upload="false"  data-allowed-file-extensions='["jpg","png","jpeg"]' <?=$require;?>>
                        </div>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="rosterGender" class="col-sm-2 control-label">性别</label>
                    
                    <div class="col-sm-10">
                         <label class="radio-inline">
                            <input type="radio" name="roster_gender" id="roster-female" value="0" <?php echo (!empty($roster) && $roster['roster_gender'] == 0)? 'selected':''; ?> checked> 女
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="roster_gender" id="roster-male" value="1" <?php echo (!empty($roster) && $roster['roster_gender'] == 1)? 'selected':''; ?>> 男
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rosterBirthday" class="col-sm-2 control-label">生日</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="rosterBirthday" name="roster_birthday" value="<?=!empty($roster)?$roster['roster_birthday']:'';?>" placeholder="生日" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rosterMP" class="col-sm-2 control-label">手机</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="rosterMP" name="roster_mp" value="<?=!empty($roster)?$roster['roster_mp']:'';?>" placeholder="手机" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rosterTP" class="col-sm-2 control-label">电话</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control" id="rosterTP" value="<?=!empty($roster)?$roster['roster_phone']:'';?>" name="roster_phone" placeholder="电话" >
                    </div>
                </div>  
                <div class="form-group">
                    <label for="rosterClass" class="col-sm-2 control-label">部门</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="roster_class" id="rosterClass" required>
                            <option value="0">请选择部门</option>
                            <?php 
                            if(!empty($classList)):
                                foreach($classList as $v):
                                    $selected = '';
                            
                                    if(!empty($roster)):
                                        $selected = $roster[0]['roster_class'] == $v['class_id']? 'selected':'';
                                    endif;
                            ?> 
                                <option value="<?=$v['class_id'];?>" <?=$selected;?>><?=$v['class_name'];?></option>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                           
                        </select>
                    </div>
                  </div>
                <div class="form-group">
                    <label for="rosterEmail" class="col-sm-2 control-label">邮箱</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="rosterEmail" name="roster_email" placeholder="邮箱" value="<?=!empty($roster)?$roster['roster_email']:'';?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rosterWX" class="col-sm-2 control-label">微信</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="rosterWX" name="roster_wechat" placeholder="微信" value="<?=!empty($roster)?$roster['roster_wechat']:'';?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rosterStatus" class="col-sm-2 control-label">状态</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="rosterStatus" name="roster_status" required>
                            <option value="0">请选择员工状态</option>
                            <?php 
                                foreach($rosterStatus as $k=>$v):
                                    $selected='';
                                    if(!empty($roster)):
                           
                                        $selected = intval($roster['roster_status']) == ($k+1) ? 'selected':'';
                                    endif;
                            ?>
                            <option value="<?=$k+1;?>" <?=$selected;?>><?=$v;?></option>
                            <?php endforeach;?>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="rosterIn" class="col-sm-2 control-label">入职</label>
                    <div class="col-sm-10">
                        <input type="datetime" class="form-control" id="rosterIn" value="<?=!empty($roster)?$roster['roster_in']:'';?>" name="roster_in" required>
                    </div>
                </div>
                

                <input type="hidden" name="roster_id" value="<?=$rosterId;?>">
                

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">提交</button>
                    </div>
                </div>
            </form>
        </div>
        
        <script src='./public/js/jquery-1.11.1.min.js'></script>
        <script src='./public/js/bootstrap.min.js'></script>
        <script src='./public/js/fileinput.min.js'></script>
<!--        <script src='./public/js/zh.js'></script>-->
        <script>
            $(document).on('ready',function(){
               $('#show-roster-img button').on('click',function(){
                   $(this).parent().addClass('hide');
                   $('#rosterPic').removeClass('hide').addClass('show');
               });
            });
        </script>
        
    </body>
</html>
