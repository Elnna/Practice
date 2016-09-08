<?php
//添加部门
include_once('../config.php');
include_once('./libs/base.class.php');
include_once('./libs/mysqli.class.php');
$mysqli = new mysqliDB($config);

//var_dump($_POST);

$classId = isset($_GET['class_id']) ? intval($_GET['class_id']): "";
$action = isset($_POST['action']) ? $_POST['action']:"";
$action = string::un_script_code($action);
$action = string::un_html($action);
if($classId){
    $sql = "select * from class where class_id=$classId";
    session_start();
    $classVal = $mysqli->mysqli_query($sql);
    $_SESSION['classVal'] = $classVal;
    if(!$classVal){
        echo "<script>alert('无此部门');history.back();</script>";
        exit;
    }
}

//
if(in_array($action,array('update','insert'))){
    //获取表单传入数据
    $oldClassId = intval($_POST['class_id']);
    $className = string::un_script_code($_POST['class_name']);
    $classFid = intval($_POST['class_fid']);
    //检测
    if(empty($className)){
        
//        echo var_dump($_POST);
        echo "<script>alert('请输入部门名称');history.back();</script>";
    }
    //default 
    $nowTime = date("Y-m-d H:i:s",time());
    $table = 'class';
    if($oldClassId){
        //修改部门名称、所属、更新时间
        
        $arr = array(
            'class_name' => $className,
            'class_fid' => $classFid,
            'edittime' => $nowTime
        );
        $where = "class_id=$classId";
        $res = $mysqli->update($table,$arr,$where);
    }else{
        //新增记录
        $arr = array(
            array(
                'class_name' => $className,
                'class_fid' => $classFid,
                'edittime' => $nowTime,
                'addtime' => $nowTime,
                'status' => 1
            )
        );
        $res = $mysqli->insert($table,$arr);
       
    }
    if(empty($res)){
        echo "<script>alert('".$res."');history.back();</script>";
        exit;
    }else{
        $newClassId = $res['insert_id'];
        echo "<script>alert('操作成功！');location='../classview.php?class_id=$newClassId';</script>";
        
    }
    
    $sql = "select class_name, class_id from class where `status`=1 order by class_fid asc";
    $query = $mysqli->query($sql);
    $classList = $mysqli->findAll($query);
    session_start();
    $_SESSION['classList'] = $classList;
    
}
?>

