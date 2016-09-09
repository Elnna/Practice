<?php

include_once('../config.php');
include_once('./libs/base.class.php');
extract($config);
$mysqli = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
$mysqli->set_charset($dbcharset);

//获取操作标识
$action = isset($_GET['action'])?$_GET['action']:"";
$action = string::un_script_code($action);
$action = string::un_html($action);


//是否删除
if($action == 'del'){
    //获取部门ID
    $classId = intval($_GET['class_id']);
    //获取当前时间
    $nowTime = date('Y-m-d H:i:s', time());
    $sql = "update class set status=0, edittime='$nowTime'  where  class_id=$classId";
   
    $mysqli->query($sql);
   
    if($mysqli->errno !=0){
        echo "<script>alert('".$mysqli->error."');history.back();</script>";
    }else{
        echo "<script>alert('操作成功');location='../class.view.php?page=$page';</script>"; 
    }
    
}

