<?php
header('Content-type:text/html;charset=utf-8');
include 'juhe.weather.php'; //引入天气请求类
require_once('./api/get.ip.php'); 
require_once('./api/weather.code.php'); //引入天气标识

//接口基本信息配置
$appkey = '895e98a1c9681cae048688ef98feffec'; //全国天气查询appkey
$weather = new weather($appkey);
//根据IP查询天气
//$ipWeatherResult = $weather->getWeatherByIP(getIp());
echo '当前IP' . getIp();
?>