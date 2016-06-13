<?php 
header('Content-type:text/html;charset=utf-8');
include 'constellation.api.php';//引入星座请求类
//接口基本信息配置
$appkey = '2cf291486b5dd04551e81c11e1346615'; //全国天气查询appkey
$constellation = new constellation($appkey);

$star = '双子座';
$consteReslut = $constellation->getFortuneByName($star);

var_dump($consteReslut);
    
    
?>
<?php
   /* $ch = curl_init();
    $url = 'http://apis.baidu.com/bbtapi/constellation/constellation_query?consName=%E5%8F%8C%E5%AD%90%E5%BA%A7&type=today';
    $header = array(
        'apikey: 2cf291486b5dd04551e81c11e1346615',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);

    var_dump($res);*/
?>