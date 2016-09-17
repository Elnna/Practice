<?php
/*
require_once('./wx_interface.php');

$wechatObj = new wechatCallbackapi();
$token = 'weizhi';
$wechatObj->valid($token);
*/


//var_dump($_FILES);

/*if(!empty($_FILES['roster_pic']['name'])){
        
    $fileExtArr = array('jpg','png');
    $fileExt = explode("/",$_FILES['roster_pic']['type'])[1];
    if(!in_array($fileExt,$$fileExtArr)){
       echo "<script>alert('只允许上传后缀为jpg/png的图片文件');history.back();</script>"
           exit();
    }
    $filename = '../public/upload/' .  substr(md5($oster_number),0,6).date('YmHis').".".$fileExt;
    
    var_dump($fileExt);
}else{
    echo "empty";
}*/
?>
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
            <form method="post" action="?" enctype="multipart/form-data">
               <div class="form-group">
                    <label for="rosterPic" class="control-label col-sm-2" >照片</label>
                    <div class="col-sm-10">
                        <div id="rosterPic" class="hide">
                        
                            <input   name="roster_pic" type="file" class="file" multiple data-show-upload="false" data-show-caption="true" >
                        </div>
                    </div>

                </div>
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
    </body>
</html>
