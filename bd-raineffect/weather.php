<?php
header('Content-type:text/html;charset=utf-8');
include './api/juhe.weather.php'; //引入天气请求类
require_once('./api/get.city.php'); 

//接口基本信息配置
$appkey = '2cf291486b5dd04551e81c11e1346615'; //全国天气查询appkey
$weather = new weather($appkey);
$gaddress = new gaddress();
$city = $gaddress->getCityByIp($gaddress->getIp());

//$city = $gaddress->getCityByIp('125.42.205.112');
//var_dump($city);
/*
//根据IP设置默认地址
//$ip = getIp();
//$ip = '218.28.144.40';
$ip = '003.000.000.000';
//$ip = '125.42.205.112';
//$ip = '118.199.255.255';
$content = file_get_contents("http://api.map.baidu.com/location/ip?ak=7IZ6fgGEGohCrRKUE9Rj4TSQ&ip={$ip}&coor=bd09ll");
var_dump($content);

$address = json_decode($content);
var_dump($address->status);
//$address = $address->address;
$address = explode('|',$address->address)[2];
var_dump($address);
*/

//$ipWeatherResult = $weather->getWeatherByIP(getIp());
//$ip = '218.28.144.40';
//$ipWeatherResult = $weather->getWeatherByIP($ip);


//$ipWeatherResult = $weather->getWeather('朝阳');
$ipWeatherResult = $weather->getWeather($city);
//var_dump($ipWeatherResult);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Discuz 07ma Weather Forecast</title>

<!--可无视-->
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link href='http://fonts.useso.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="css/demo.css" />

<!--必要样式-->
<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />-->
<link rel="stylesheet" type="text/css" href="css/style1.css" />
<link rel="stylesheet" type="text/css" href="css/weather-icons.css" />
<script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script type="text/javascript" src="js/typeahead.bundle.js"></script>
<script type="text/javascript" src="js/forecast.js"></script>


<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body class="demo-1">

	<div class="image-preload">
		<img src="img/drop-color.png" alt="">
		<img src="img/drop-alpha.png" alt="">
		<img src="img/weather/texture-rain-fg.png" />
		<img src="img/weather/texture-rain-bg.png" />
		<img src="img/weather/texture-sun-fg.png" />
		<img src="img/weather/texture-sun-bg.png" />
		<img src="img/weather/texture-fallout-fg.png" />
		<img src="img/weather/texture-fallout-bg.png" />
		<img src="img/weather/texture-drizzle-fg.png" />
		<img src="img/weather/texture-drizzle-bg.png" />
	</div>
	<div class="container">
        <input id="city-name" type="hidden" value = "">
        <?php if($ipWeatherResult['errNum'] == 0){
                    $data = $ipWeatherResult['retData'];
                    $type = $data['today']['type'];
                    $fc = $weather->getWeatherByWeatherId($type) ? $weather->getWeatherByWeatherId($type) : 'sunny' ;
//            echo 'weather-' .$slide . ' : '. $fc;
                    $future = $data['forecast'];
                    $date = substr($data['today']['date'],0,4) . ' 年' . substr($data['today']['date'],5,2). '月' . substr($data['today']['date'],8,2) . '日' . $data['today']['week'];
        ?>   
		<header class="codrops-header">
			<h1><?php echo $data['city'];?><span>切换地址</span></h1>
			<nav class="codrops-demos">
				<a class="current-demo" href="weather.php">Weather</a>
			</nav>
		</header>
        <!--<div class="change-city">
            <input type="text" name="city"  placeholder="请输入城市名称或拼音或编号"/>
        </div> -->   
		<div class="slideshow">
			<canvas width="1" height="1" id="container" style="position:absolute"></canvas>
            <!-- 当前实况天气 -->
            <div class="slide" id="slide-0" data-weather="<?php echo $fc; ?>">
				<div class="slide__element slide__element--date"><?php echo  $date; ?></div>
                
				<div class="slide__element slide__element--temp"><?php echo $data['today']['curTemp'] . '°'?><small>C</small></div>
                
			</div>
            
            <!-- 未来几天天气 -->
            <?php 
                $slide = 1;
                foreach($future as $fk => $fv){
//                    var_dump($fv);
                    
                    $ftype = $fv['type'];
                    $ffc = $weather->getWeatherByWeatherId($ftype) ? $weather->getWeatherByWeatherId($ftype):'rainy';
                    $date = $date = substr($fv['date'],0,4) . ' 年' . substr($fv['date'],5,2). '月' . substr($fv['date'],8,2) . '日&nbsp;' . $fv['week'];
                    
                    $w = $fv['fengxiang'] . '&nbsp;' . $fv['fengli'];
                    $temp = substr($fv['lowtemp'],0,2). '°&nbsp;~&nbsp;' . substr($fv['hightemp'],0,2);

            ?>
			
			<div class="slide" id="slide-<?php echo $slide++;?>" data-weather="<?php echo $ffc;?>">
				<div class="slide__element slide__element--date"><?php echo $date; ?></div>
                <div class="slide__element slide__element--weather">
                    <?php echo $w; ?>
                </div>
				<div class="slide__element slide__element--temp"><?php echo $temp .'°'; ?><small>C</small></div>
			</div>
			<?php } ?>
			<nav class="slideshow__nav">
				<a class="nav-item" href="#slide-0"><i class="wi wi-day-<?php echo $fc;?>"></i><span>实时天气</span></a>
                <?php 
                    $navsilde = 1;
                    foreach($future as $fk => $fv){
                        $ftype = $fv['type'];
                        $ffc = $ffc = $weather->getWeatherByWeatherId($ftype) ? $weather->getWeatherByWeatherId($ftype):'rainy';
                       
                        $date =substr($fv['date'],9,2) . '/' . substr($fv['date'],5,2);
                ?>
				<a class="nav-item" href="#slide-<?php echo $navsilde++; ?>"><i class="wi wi-day-<?php echo $ffc;?>"></i><span><?php echo $date;?></span></a>
				<?php }?>
			</nav>
            
		</div>
		<?php }else {?>
        <p class="error-code">
            Sorry!!!
            <?php echo $ipWeatherResult['errMsg']; ?></p>
        <?php }?>
        <p class="nosupport">Sorry, but your browser does not support WebGL!</p>
	</div>
	<!-- /container -->
	<script src="js/index.js"></script>
</body>

</html>
