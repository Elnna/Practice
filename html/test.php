<?php 
function getIPLoc_QQ($queryIP){ 
    $url = 'http://ip.qq.com/cgi-bin/searchip?searchip1='.$queryIP; 
    $ch = curl_init($url); 
    curl_setopt($ch,CURLOPT_ENCODING ,'gb2312'); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回 
    $result = curl_exec($ch); 
    $result = mb_convert_encoding($result, "utf-8", "gb2312"); // 编码转换，否则乱码 
    curl_close($ch); 
    preg_match("@<span>(.*)</span></p>@iU",$result,$ipArray); 
    $loc = $ipArray[1]; 
    return $loc; 
} 
function user_realip() {
    if (getenv('HTTP_CLIENT_IP'))
    {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR'))
    {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif (getenv('REMOTE_ADDR'))
    {
        $ip = getenv('REMOTE_ADDR');
    } else
    {
        $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
    }
    return $ip;
}
$ip =  user_realip();
$location = getIPLoc_QQ($ip);

echo $location.'<br>';
$location = '中国河南省信阳市 联通';
$iparr = explode(' ',$location);
$pos = trim(substr($location,0,strlen($location)-6));
echo 'pos:'.$pos . '<br>';
echo urlencode($pos);
/*echo mb_detect_encoding($iparr[0]).'<br>';
$pos = mb_convert_encoding($iparr[0],'UTF-8','ASCII');

echo $iparr[0].'<br>';
echo mb_detect_encoding($iparr[0]).'<br>';
echo mb_detect_encoding($pos).'<br>';*/

// echo getIPLoc_QQ($ip);
?>