<?php
//添加员工
include_once('../config.php');
include_once('./libs/base.class.php');
extract($config);
$mysqli = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
$mysqli->set_charset($dbcharset);


if(!empty($_POST)){
   
    var_dump($_POST);
    echo "<hr>";
    $fileName = '';

    $rosterId = isset($_POST['roster_id'])?intval($_POST['roster_id']):'';
    
    
    $roster_number = $_POST['roster_number'];
    
    if($_FILES['roster_pic']['error'] == UPLOAD_ERR_OK){
        $fileExtArr = array('jpg','png');
        $fileExt = explode("/",$_FILES['roster_pic']['type'])[1];
       
        if(!in_array($fileExt,$fileExtArr)){
           echo "<script>alert('只允许上传后缀为jpg/png的图片文件');history.back();</script>";
               exit();
        }
        $tmpName = $_FILES['roster_pic']['tmp_name'];
        $fileName = '../public/upload/' .  substr(md5($roster_number),0,6).date('YmHis').".".$fileExt;

//        move_uploaded_file($tmpName,$fileName);
    }
    
   
    $in = array('roster_pic' => $fileName);
    
//    $data = array_merge(array_slice($_POST,0,2), $in, array_slice($_POST,2));

     
    try{
        $time = date("Y-m-d H:i:s",time()); 
        
        $status = 1;
        if(!empty($rosterId)){
            $_POST['roster_id'] = $rosterId;
            
            
            $sql = " UPDATE `roster` SET `roster_name`=?,`roster_number`=?,`roster_pic`=?,`roster_gender`=?,`roster_birthday`=?,`roster_mp`=?,`roster_phone`=?,`roster_class`=?,`roster_email`=?,`roster_wechat`=?,`roster_status`=?,`roster_in`=?,`addtime`='$time',`edittime`='$time',`status`=$status WHERE `roster_id`=?";
            
        }else{
            unset($_POST['roster_id']);
            $sql = "INSERT INTO `roster`(`roster_name`, `roster_number`, `roster_pic`, `roster_gender`, `roster_birthday`, `roster_mp`, `roster_phone`, `roster_class`, `roster_email`, `roster_wechat`, `roster_status`, `roster_in`, `addtime`, `edittime`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,'$time','$time',$status)";
        
        }

        echo 'sql' . $sql . "<hr/>";
        
        $data = array_merge(array_slice($_POST,0,2), $in, array_slice($_POST,2));
        
        
        $stmt = $mysqli->prepare($sql);
       /* var_dump($stmt);
        exit;*/
        
        extract($data);
        foreach($data as $k => $v) {
            eval('$vars[\'' . $k . '\'] = &$' . $k . ';'); // Referencing to our last newly created variable
        }
        $types = getTypes($data);
       
        call_user_func_array(array($stmt, 'bind_param'), array_merge(array($types), $vars));
        $stmt->execute();
        
        if($stmt->affected_rows){
            if($stmt->insert_id){
//                echo "<script>alert('新增员工'+$stmt->insert_id+'成功');</script>";
                echo "<script>alert('新增员工'+$stmt->insert_id+'成功');location='../roster.update.php';</script>";
                exit();
            }else{
//                echo "<script>alert('修改成功');</script>";
                echo "<script>alert('修改员工'+$rosterId+'成功');location='../roster.update.php';</script>";
                exit();
            }
        }else{
            echo "<script>alert('操作失败' + $mysqli->error);history.back();</script>";
            exit();
        }
       
        
//        var_dump($stmt);

    }catch(mysqli_sql_exception $e){
        echo $e->getMessage;
    }
}

