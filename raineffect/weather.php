<?php
header('Content-type:text/html;charset=utf-8');
include './api/juhe.weather.php'; //引入天气请求类
require_once('./api/get.ip.php'); 
//require_once('./api/weather.code.php'); //引入天气标识

//接口基本信息配置
$appkey = '895e98a1c9681cae048688ef98feffec'; //全国天气查询appkey
$weather = new weather($appkey);
//根据IP查询天气
$ipWeatherResult = $weather->getWeatherByIP(getIp());
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
        <?php if($ipWeatherResult['error_code'] == 0){
                    $data = $ipWeatherResult['result'];
                    $fa = $data['today']['weather_id']['fa'];
                    $fb = $data['today']['weather_id']['fb'];
                    $fc = getWeatherByWeatherId($fa) ? getWeatherByWeatherId($fa) : 'sunny' ;
                    $future = $data['future'];
        ?>   
		<header class="codrops-header">
			<h1><?php echo $data['today']['city'];?></h1>
			<nav class="codrops-demos">
				<a class="current-demo" href="weather.php">Weather</a>
			</nav>
		</header>
            
		<div class="slideshow">
			<canvas width="1" height="1" id="container" style="position:absolute"></canvas>
            <!-- 当前实况天气 -->
            <div class="slide" id="slide-1" data-weather="<?php echo $fc; ?>">
				<div class="slide__element slide__element--date"><?php echo  $data['today']['date_y'] . $data['today']['week'] . ', ' . $data['sk']['time']; ?></div>
                <div class="slide__element slide__element--weather">
                    <?php echo '当前湿度  ' . $data['sk']['humidity'] . ' , 风向  ' . $data['sk']['wind_direction']  .  ' , 强度   ' . $data['sk']['wind_strength']; ?>
                </div>
				<div class="slide__element slide__element--temp"><?php echo $data['sk']['temp']?><small>C</small></div>
			</div>
            
            <!-- 今天天气 -->
            <div class="slide" id="slide-2" data-weather="<?php echo $fc; ?>">
				<div class="slide__element slide__element--date"><?php echo  $data['today']['date_y'] . $data['today']['week']; ?></div>
                <div class="slide__element slide__element--weather">
                    <?php echo $data['today']['weather']; ?>
                </div>
				<div class="slide__element slide__element--temp"><?php echo $data['today']['temperature']?><small>C</small></div>
			</div>
            
            
            <!-- 未来几天天气 -->
            <?php 
                $slide = 2;
                foreach($future as $fk => $fv){
                    $ffc = $fv['weather_id']['fa'];
                    $ffc = getWeatherByWeatherId($ffc) ? getWeatherByWeatherId($fc):'rainy';
                    $date = substr($fv['date'],0,4) . '年' . substr($fv['date'],4,2) .'月' . substr($fv['date'],6,2) . '日';
                    $weather = $fv['weather'];
                    $temp = $fv['temperature'];
                    $week = $fv['week'];
                    $wind = $fv['wind'];
                    
            ?>
			
			<div class="slide" id="slide-<?php echo ++$slide;?>" data-weather="<?php echo $ffc;?>">
				<div class="slide__element slide__element--date"><?php echo $date . ' , '. $week; ?></div>
                <div class="slide__element slide__element--weather">
                    <?php echo $weather . ' , ' . $wind; ?>
                </div>
				<div class="slide__element slide__element--temp"><?php echo $temp; ?><small>C</small></div>
			</div>
			<?php } ?>
			<nav class="slideshow__nav">
                <?php 
                    $today = $data['today']['date_y'];
                    $today = substr($today,8,2) . '/' . substr($today,6,2);
                ?>
				<a class="nav-item" href="#slide-1"><i class="icon icon--<?php echo $fc;?>"></i><span>实时天气</span></a>
				<a class="nav-item" href="#slide-2"><i class="icon icon--<?php echo $fc;?>"></i><span><?php echo $today;?></span></a>
                <?php $silde = 2;
                    foreach($future as $fk => $fv){
                         $ffc = $fv['weather_id']['fa'];
                    $ffc = getWeatherByWeatherId($ffc) ? getWeatherByWeatherId($fc):'rainy';
                    $date = substr($fv['date'],0,4) . '年' . substr($fv['date'],4,2) .'月' . substr($fv['date'],6,2) . '日';
                    $weather = $fv['weather'];
                    $temp = $fv['temperature'];
                    $week = $fv['week'];
                    $wind = $fv['wind'];
                        ?>
				<a class="nav-item" href="#slide-<?php echo ++$slide; ?>"><i class="icon icon--<?php echo $ffc;?>"></i><span><?php echo $date;?></span></a>
				<?php }?>
			</nav>
		</div>
		<?php }else {?>
        <p class="nosupport"><?php echo $ipWeatherResult['error_code'].":".$ipWeatherResult['reason']; ?></p>
        <?php }?>
        <p class="nosupport">Sorry, but your browser does not support WebGL!</p>
	</div>
	<!-- /container -->
	<script src="js/index.min.js"></script>
</body>

</html>
