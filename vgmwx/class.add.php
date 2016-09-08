<?php
//添加部门
include_once('base.class.php');
include_once('mysqli.class.php');
$mysqli = new mysqli();
$class_id = intval($_GET['class_id']);
$action = $_POST['action'];
$action = string::un_script_code($action);
$action = string::un_html($action);
if($class_id){
    $class_val = $mysqli->mysqli_query("select * from")
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>添加部门</title>
    </head>
    <body>
        
    </body>
</html>