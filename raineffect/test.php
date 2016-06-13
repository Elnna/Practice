<?php
header('Content-type:text/html;charset=utf-8');
include './api/juhe.weather.php'; //引入天气请求类
require_once('./api/get.ip.php'); 
//require_once('./api/weather.code.php'); //引入天气标识

//接口基本信息配置
$appkey = '895e98a1c9681cae048688ef98feffec'; //全国天气查询appkey
$weather = new weather($appkey);
//根据IP查询天气
//$ipWeatherResult = $weather->getWeatherByIP(getIp());

//echo '当前IP' . getIp() .'<br>';
$ip = getIp();
//$url = 'http://07ma.com/' ;
//$url = $_SERVER['HTTP_HOST'];
//$ip = gethostbyname($url);
//echo '当前IP' . getIp() .'<br>';
//echo phpinfo();
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Rain Effect Experiments | Demo 1 | Codrops</title>

<!--可无视-->
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/demo.css" />

<!--必要样式-->
<link rel="stylesheet" type="text/css" href="css/style1.css" />
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
    <body>
        <?php echo $ip;?>
    </body>
</html>