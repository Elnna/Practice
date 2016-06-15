<?php
header('Content-type:text/html;charset=utf-8');
include './api/info.query.php'; //引入天气请求类
require_once('./api/get.city.php'); 

//接口基本信息配置
$appkey = '2cf291486b5dd04551e81c11e1346615'; //全国天气查询appkey
$weather = new weather($appkey);
$gaddress = new gaddress();
$city = $gaddress->getCityByIp($gaddress->getIp());
$ipWeatherResult = $weather->getWeather($city);  
$zodiac = $weather->getZodiacFortuneByName("双子座");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Page Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        * {
            line-height: 1.5;
            margin: 0;
        }

        html {
            color: #888;
            font-family: sans-serif;
            text-align: center;
        }

        body {
            left: 50%;
            margin: -43px 0 0 -150px;
            position: absolute;
            top: 50%;
            width: 300px;
        }

        h1 {
            color: #555;
            font-size: 2em;
            font-weight: 400;
        }

        p {
            line-height: 1.2;
        }
        div{
            display: block;
            width: 100%;
            text-align: left;
        }
        @media only screen and (max-width: 270px) {

            body {
                margin: 10px 10px;
                position: static;
                width: 95%;
            }

            h1 {
                font-size: 1.5em;
            }

        }

    </style>
</head>
<body>
    <div>
        <h1>天气查询</h1>
        <pre>
        <?php var_dump($ipWeatherResult);?>
        </pre>
    </div>
    <div>
        <h1>星座查询</h1>
        <pre>
        <?php var_dump($zodiac);?>
        </pre>
    </div>
    <div>
        <h1>快递查询</h1>
    </div>
    <div>
        <h1>火车票查询</h1>
    </div>
</body>
</html>
<!-- IE needs 512+ bytes: http://blogs.msdn.com/b/ieinternals/archive/2010/08/19/http-error-pages-in-internet-explorer.aspx -->
