<?php
//添加部门
include_once('../config.php');
include_once('./libs/base.class.php');
extract($config);
$mysqli = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
$mysqli->set_charset($dbcharset);

$action = isset($_POST['action']) ? $_POST['action']:"";
$action = string::un_script_code($action);
$action = string::un_html($action);


if(in_array($action,array('update','insert'))){
    //获取表单传入数据
    $oldClassId = intval($_POST['class_id']);
    $className = string::un_script_code($_POST['class_name']);
    $classFid = intval($_POST['class_fid']);
    //检测
    if(empty($className)){
        
//        echo var_dump($_POST);
        echo "<script>alert('请输入部门名称');history.back();</script>";
        exit;
    }
    //default 
    $nowTime = date("Y-m-d H:i:s",time());
    $table = 'class';
    if($oldClassId){
        //修改部门名称、所属、更新时间
        $sql = "update class set class_name='$className',class_fid='$classFid',edittime='$nowTime' where class_id='$oldClassId'";
        $mysqli->query($sql);
    }else{
        //新增记录
        $sql = "insert into class(class_name,class_fid,edittime,addtime,status)  values('$className','$classFid','$nowTime','$nowTime',1)";
        $mysqli->query($sql);
        
    }
    if($mysqli->errno != 0){
        
        echo "<script>alert('".$mysqli->error."');history.back();</script>";
        exit;
        
    }else{
        if(!$oldClassId){
            $newClassId = $mysqli->insert_id;
            $sql = "select class_fid,class_name from class where class_id=$newClassId";

            $classVal = $mysqli->query($sql)->fetch_array(MYSQLI_ASSOC);

            session_start();
            $_SESSION['classVal'] = $classVal;

            echo "<script>alert('操作成功！');location='../class.update.php?class_id=$newClassId';</script>";
            exit;
        }else{
            echo "<script>alert('操作成功！');location='../class.update.php';</script>";
            exit;
        }
        
        
    }
    
    
    
}

?>

