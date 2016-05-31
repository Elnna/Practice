<?php 
require_once('../config/connect.php');
$id = $_GET['id'];
//echo $id;
$deletesql = "delete from articles where id='$id'";
//echo $deletesql;
if(mysql_query($deletesql)){
    echo "<script>alert('删除文章成功');window.location.href='article.manage.php';</script>";
}else{
    echo "<script>alert('删除文章失败');window.location.href='article.manage.php';</script>";  
}
?>