<?php 
include_once('./config.php');

extract($config);
$mysqli = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
$mysqli->set_charset($dbcharset);
//var_dump($mysqli);

$sql = "select class_name, class_id from class where `status`=1 order by class_fid asc";



$classList = $mysqli->query($sql)->fetch_all(MYSQLI_ASSOC);
var_dump($classList);
exit;

$mysqli->close();

$classId = isset($_GET['class_id'])&&!empty($_GET['class_id'])?intval($_GET['class_id']):"" ;

if(!empty($classId)){
    session_start();
    $classVal = isset($_SESSION['classVal'])?$_SESSION['classVal']:"";  
}else{
    $classVal = "";
}
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>添加部门</title>
        <link href="./public/css/bootstrap.min.css" rel="stylesheet">
        <link href="./public/css/mystyle.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <!--页面名称-->
            <h3>
                部门<a href="./class.update.php" class="<?php echo empty($classId)?'active current' : 'active';?>">添加</a>|<a href="./class.update.php?class_id=<?=$classId;?>" class="<?php echo !empty($classId)?'active current' : 'disabled';?>">修改</a>
                <a href="./class.view.php" >返回</a>
            </h3>
            <!--表单-->
           
            <form  action="./admin/admin.class.add.php" method="post" name="class-add" id="class-add" enctype="multipart/form-data" class="form-horizontal" role="form" >
              <div class="form-group">
                <label for="className" class="col-sm-2 control-label">部门名称</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="className" name="class_name" placeholder="部门名称" value="<?php echo  empty($classVal) ? "":$classVal['class_name'];?>">
                </div>
              </div>
                
              <div class="form-group">
                <label for="classFid" class="col-sm-2 control-label">上级部门</label>
                <div class="col-sm-10">
                    <select class="form-control" name="class_fid" id="classFid">
                        <option value="0">无上级部门</option>
                        
                        <?php 
                            if(!empty($classList)):
                                foreach($classList as $v): 
                                if(!empty($classVal)){
                                    $classSelect = ($classVal['class_fid'] == $v['class_id'] ) ? " selected" : "";
                                }else{
                                    $classSelect = "";
                                }
                                
                        ?>
                                    <option value="<?=$v['class_id'];?>" <?=$classSelect;?>><?=$v['class_name']; ?></option>
                        <?php 
                            
                                endforeach;
                            endif;
                        ?>
                        
                    </select>
                </div>
              </div>
                <?php 
                $actionVal = isset($_GET['class_id']) && !empty($_GET['class_id']) ? 'update' : 'insert'; ?>
              <input type="hidden" name="action" value="<?=$actionVal;?>">
              <input type="hidden" name="class_id" value="<?=$classId;?>">
                
             
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">提交</button>
                </div>
              </div>
            </form>
        </div>
        
        <script src='./public/js/bootstrap.min.js'></script>
    </body>
</html>