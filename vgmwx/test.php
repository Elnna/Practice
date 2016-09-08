<?php
/*$url = 'http://voguem.com/vgmwx/public/img/0.jpg';
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
echo $content;*/
//include_once('bdmapexp.txt');
/*$res = '{"status":0,"message":"ok","location":{"lat":32.13334141291585,"lng":114.11728592505813},"address_component":{"country":"中国","province":"河南省","city":"信阳市","district":"平桥区","street":"G312(沪霍线)","street_number":"","admin_area_code":411503,"country_code":"0"},"formatted_address":"河南省信阳市平桥区G312(沪霍线)","recommended_location_description":"夏家老塆西南51米"}';
$json1 = json_decode($res);

var_dump($json1);
echo "<hr/>";
echo $city= $json1->address_component->city;
echo "<hr/>";
$weatherApiUrl = "http://php.weather.sina.com.cn/xml.php?password=DJOYnieT8234jlsK";
//$city = "&city=".urlencode(iconv("UTF-8","GB2312",$city));
//0:当天,1:第二天,...
$day = "&day=0";
echo $url=$weatherApiUrl.$city.$day;
echo "<hr/>";
$encode = mb_detect_encoding($city, array("ASCII","UTF-8","GB2312","GBK","BIG5")); 
echo "encode" .$encode."<hr/>";

$weather_api_url="http://php.weather.sina.com.cn/xml.php?password=DJOYnieT8234jlsK";
              //城市名转字符编码
$city = "信阳";
$city = @iconv( "utf-8", "gb2312//IGNORE",$city);
                $city="&city=".urlencode($city);
              //查询当天
                $day="&day=0";
echo $weather_api_url.$city.$day."<hr/>";
echo $city;*/

/*$weather = file_get_contents('./weatherexp.txt');
preg_match_all("/\<status2\>(.*?)\<\/status2\>/",$weather,$wStatus2);
var_dump($wStatus2);*/
/*
$str = "o3Em6wUGfQRJ_gmbKMhIalJ3jp9Y  2016-09-08 00:28:11 退订";
echo strstr($str,"dddGfQRJ_gmbKMhIalJ3jp9Y")? "存在": "不存在";
*/
/*$fn = './public/local/unsubscribe.txt';
$fp = fopen($fn, "r");
$l = 0;
$fromUserName = "o3Em6wUGfQRJ_gmbKMhIalJ3jp9Y";
echo $fromUserName . "<hr/>";
while(!feof($fp)){
    $line = fgets($fp,4096);    //逐行读取
    echo $line . "<hr/>";
    $l++;
    if(!strstr($line,$fromUserName)){
        $content = $l . "  " . $fromUserName . "  " . date("Y-m-d H:i:s") . " 退订\n"; 
        
    }
}
fclose($fp);

if(!empty($content)){
    $fp = fopen($fn, "a");
    fwrite($fp,$content);
    fclose($fp);
}*/

echo chr(48);


?>