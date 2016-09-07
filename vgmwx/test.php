<?php
$url = 'http://voguem.com/vgmwx/public/img/0.jpg';
$fromUserName = 'grahamhuang';
$filename = './public/img/'. $fromUserName. date('YmdHis'). '.jpg';
        
ob_start();  
//make file that output from url goes to buffer  
readfile($url);  
//file_get_contents($url);  这个方法不行的！！！只能用readfile  
$img = ob_get_contents();  
ob_end_clean();  
if(!empty($img)){
    $fp = @fopen($filename, "a"); //append  
    fwrite($fp, $img);  
    fclose($fp);  
    $content = "图片上传成功";
    
}else{
    $msgType = 'text';
    $content = "图片上传失败";    

}
echo $content;
?>