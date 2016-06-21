<?php 
header('Content-type:text/html;charset=utf-8');
include './api/info.query.php'; //引入天气请求类
require_once('./api/get.city.php'); 

//接口基本信息配置
$appkey = '2cf291486b5dd04551e81c11e1346615'; //全国天气查询appkey
$convenienceInfo = new convenienceInfo($appkey);
$gaddress = new gaddress();
$city = $gaddress->getCityByIp($gaddress->getIp());
$ipWeatherResult = $convenienceInfo->getWeather($city);  
//星座运势
$zodiacType = array('today','tomorrow','week','nextweek','month','year');
$zodiacName = '双子座';

//火车票查询：
//getTrainDetail($train,$from,$to,$date)
$train = 'G101';
$from = '北京南';
$to = '上海虹桥';
$trainDate = '2016-07-01';
$station = '北京';
/*
$trainDetail = $convenienceInfo->getTrainDetail($train,$from,$to,$trainDate);
$stationSearch = $convenienceInfo->getStationSearch($station);
$ssSearch = $convenienceInfo->getS2SSearch($from,$to,$trainDate);
$trainSuggest = $convenienceInfo->getSuggestSearch($station);
*/

//快递
//apikey;
$expressApiKey = '40bf371ed022440d';
$expressCom = 'yunda';
$expressNu = '1900171113992';
/*
$expressResult = $convenienceInfo->getExpress($expressApiKey,$expressCom,$expressNu);
*/

$weeksArr = array('monday'=>'星期一','tuesday' => '星期二', 'wednesday' => '星期三','thursday' =>'星期四','friday' => '星期五','saturday' => '星期六', 'sunday' => '星期天');
?>

<!doctype html>
<!--
COPYRIGHT by HighHay/Mivfx
Before using this theme, you should accept themeforest licenses terms.
http://themeforest.net/licenses
-->

<html class="no-js" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">

        <!-- Page Title Here -->
        <title>Discuz 07ma 便民窗口</title>
		
        <!-- Page Description Here -->
		<meta name="description" content="07ma 为您提供天气预报，快递查询，星座运势，火车票、机票查询等便民窗口.">

        <!-- Disable screen scaling-->
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->
        
        <!-- Initializer -->
        <link rel="stylesheet" href="./css/normalize.css">        
        
        <!-- Web fonts and Web Icons -->
        <link rel="stylesheet" href="./css/pageloader.css">
        <link rel="stylesheet" href="./fonts/opensans/stylesheet.css">
        <link rel="stylesheet" href="./fonts/asap/stylesheet.css">
        <link rel="stylesheet" href="./css/ionicons.min.css">
        
        <!-- Weather CSS style -->
        <link rel="stylesheet" href="./css/weather-icons.css">
         <!-- bootstrap CSS style -->
        <link rel="stylesheet" href="./css/bootstrap.css">

        <!-- Vendor CSS style -->
        <link rel="stylesheet" href="./css/foundation.min.css">
        <link rel="stylesheet" href="./js/vendor/jquery.fullPage.css">
        <link rel="stylesheet" href="./js/vegas/vegas.min.css">
        
		<!-- Main CSS files -->
        <link rel="stylesheet" href="./css/main.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/main_responsive.css">
        <link rel="stylesheet" href="./css/style-color1.css">
        
        <script src="./js/vendor/modernizr-2.7.1.min.js"></script>
    </head>
    <body id="menu" class="alt-bg">
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Page Loader -->
        <div class="page-loader" id="page-loader">
            <div><i class="ion ion-load-a"></i><p>请耐心等待</p></div>
        </div>
        
        <!-- BEGIN OF site header Menu -->
		<!-- Add "material" class for a material design style -->
        
        
       
        <!-- END OF site header Menu-->
        
        <!-- BEGIN OF Quick nav icons at left -->
		<nav class="quick-link count-4 nav-left">
			<div class="logo">
				<a href="#express">
					<img src="img/logo_only.png" alt="Logo Brand">
				</a>
			</div>
			<ul id="qmenu" class="qmenu">
				<li data-menuanchor="express">
					<a href="#express" class=""><i class="icon ion ion-android-bicycle"></i>
					</a>
					<span class="title">快递</span>
				</li>
				
                <li data-menuanchor="illegal">
					<a href="#illegal"><i class="icon ion ion-android-car"></i>
					</a>
					<span class="title">违章查询</span>
				</li>
               
				<li data-menuanchor="tickets">
					<a href="#tickets"><i class="icon ion ion-android-train"></i>
					</a>
					<span class="title">火车票</span>
				</li>
				<li data-menuanchor="plane-tickets">
					<a href="#plane-tickets"><i class="icon ion ion-android-plane"></i>
					</a>
					<span class="title">订机票</span>
				</li>
                <li data-menuanchor="zodiac">
					<a href="#zodiac"><i class="icon ion ion-star"></i>
					</a>
					<span class="title">星座运势</span>
				</li>
				<!--<li data-menuanchor="contact">
					<a href="#contact"><i class="icon ion ion-email"></i>
					</a>
					<span class="title">Contact</span>
				</li>-->
			</ul>
		</nav>
        <!-- END OF Quick nav icons at left -->
        


        <!-- BEGIN OF site cover -->
        <div class="page-cover" id="s-cover">
            <!-- Cover Background -->
            <div class="cover-bg pos-abs full-size bg-img" data-image-src="img/bg-default.jpg"></div>
			
            <!-- BEGIN OF Slideshow Background -->
            <div class="cover-bg pos-abs full-size slide-show">
				<i class='img' data-src='./img/bg-slide1.jpg'></i>
				<i class='img' data-src='./img/bg-slide2.jpg'></i>
				<i class='img' data-src='./img/bg-slide3.jpg'></i>
				<i class='img' data-src='./img/bg-slide4.jpg'></i>
			</div>
            <!-- END OF Slideshow Background -->
            
			
			<!-- Solid color as filter -->
            <div class="cover-bg-mask pos-abs full-size bg-color" data-bgcolor="rgba(0, 0, 0, 0.41)"></div>
            
        </div>
        <!--END OF site Cover -->
        
       
        
        <header class="header-top">
			<h1><span><?php echo (($ipWeatherResult['errNum'] == 0) ? $ipWeatherResult['retData']['city']: $city ); ?></span><span>切换地址</span></h1>
            <div id='change-city' class='change-city hide'>
                <div class='input-box'>
                    <input class='get-city' type='text' name='city' value='' style='background-color: transparent;'/>
                    <button class='submit-btn' type='button' name='submit'>确定</button>
                </div>
                <div class='history-cities'><i class='ion ion-close'></i></div>
                <hr style='width:10%'>
                <div class='common-cities'>
                    <span>北京</span><span>上海</span><span>深圳</span><span>武汉</span><span>广州</span><span>杭州</span><span>南京</span><span>成都</span><span>天津</span><span>西安</span><span>福州</span><span>重庆</span><span>厦门</span><span>青岛</span><span>大连</span>
                </div>
            </div>
		</header>
        
		<!-- Begin of weather pane -->
		<div class="pane-weather " id="s-weather">
			<div class="content">
                <?php
                    if($ipWeatherResult['errNum'] == 0){
                        $data = $ipWeatherResult['retData'];
                        $type = $data['today']['type'];
                        $weather = $convenienceInfo->getWeatherByWeatherId($type) ? $convenienceInfo->getWeatherByWeatherId($type) : 'sunny' ;
                        $forecast = $data['forecast'];
                        $today = explode('-',$data['today']['date']);
                        $date = $today[0] . ' 年' . $today[1]. '月' . $today[2] . $data['today']['week'];  
                ?>
               <div class="weather-forecast" data-bgcolor="rgba(95, 25, 208, 0.88)s" id="s-forecast">
				    <!-- Begin of current weather -->
                   <?php
                        ini_set('date.timezone', 'Asia/Shanghai');
                        $time = date('H:i', time());
                    ?>
                    <div class="weather-item active" id="s-current" >
                        <section class="content">
                            <header class="p-weather-date">
                                <h6><?php echo $date;?><span><?php echo $time;?></span></h6>
                            </header>
                            <div class="weather-type">
                                <p><span><?php echo $data['today']['type']; ?></span> <span><?php echo $data['today']['fengxiang']; ?></span><span><?php echo $data['today']['fengli'];?></span></p>
                            </div>
                            <div class="weather-temp" style="font-size:7em margin-top:5%">
                                <?php echo substr($data['today']['curTemp'],0,2) .'°';?><small>C</small>
                            </div>                            
                        </section>  
                    </div>
				    <!-- Begin of today weather -->
                   
                    <div class="weather-item" id="s-today" >
                        <section class="content">
                            <header class="p-weather-date">
                                <h6><?php echo $date;?></h6>
                            </header>
                            <div class="weather-type">
                                <p><span><?php echo $data['today']['type']; ?></span> <span><?php echo $data['today']['fengxiang']; ?></span><span><?php echo $data['today']['fengli'];?></span></p>
                            </div>
                            <div class="weather-temp" >
                                <?php echo substr($data['today']['lowtemp'],0,2). '°~' . substr($data['today']['hightemp'],0,2) .'°'?><small>C</small>
                            </div>                            
                        </section>  
                    </div>
    
                    <!-- end of today weather   -->

                   
                   <!-- Begin of forecast weather -->
                   <?php 
                    foreach($forecast as $fk => $fv){
                        $ftype = $fv['type'];
                        $fc = $convenienceInfo->getWeatherByWeatherId($ftype) ? $convenienceInfo->getWeatherByWeatherId($ftype):'rainy';
                        $fvdate = explode('-',$fv['date']);
                        $fdate = $fvdate[0] . ' 年' . $fvdate[1]. '月' . $fvdate[2] . '日&nbsp;' . $fv['week'];
//                        $fdate = $today[0] + "年" + $today[1] + "月" + $fv['date'];
                        
                        $fweather = '<span>' . $fv['type'] .'</span><span>' . $fv['fengxiang'] . '</span><span>' . $fv['fengli'] . '</span>';
                        $ftemp = substr($fv['lowtemp'],0,2). '°~' . substr($fv['hightemp'],0,2) .'°';
                        $anchor = array_search($fv['week'],$weeksArr);
                    ?>
                   <div class="weather-item" id="s-<?php echo $anchor;?>">
                        <section class="content">
                            <header class="p-weather-date">
                                <h6><?php echo $fdate;?></h6>
                            </header>
                            <div class="weather-type">
                                <p><?php echo $fweather;?></p>
                            </div>
                            <div class="weather-temp">
                               <?php echo $ftemp; ?><small>C</small>
                            </div>                            
                        </section>  
                    </div>
                   <?php }?>
                    <!-- end of forecast weather   -->
                   				
<!--				<footer>-->
                     <!-- start of weather nav   -->
                   <nav class="slide-nav" id="weather-nav">
                       <a class="nav-item active" href="#current">
                           <i class="wi wi-day-<?php echo $fc;?>"></i><span>实时天气</span>
                       </a>
                       <a class="nav-item" href="#today">
                            <i class="wi wi-day-<?php echo $fc;?>"></i><span><?php echo $today[2] . '/' . $today[1];?></span>
                       </a>
                    <?php 
                        foreach($forecast as $fk => $fv){
                            $ftype = $fv['type'];
                            $fweather = $convenienceInfo->getWeatherByWeatherId($ftype) ? $convenienceInfo->getWeatherByWeatherId($ftype):'rainy';
                            $fvdate = explode('-',$fv['date']);
                            $fdate =$fvdate[2] . '/' . $fvdate[1];
                            $anchor = array_search($fv['week'],$weeksArr);

                    ?>
                       <a class="nav-item" href="#<?php echo $anchor; ?>">
                            <i class="wi wi-day-<?php echo $fweather;?>"></i><span><?php echo $fdate;?></span>
                       </a>
                    <?php }?>  
                   </nav>
                    <!-- end of weather nav  -->
<!--                </footer>                -->
			</div> 
            <?php }else{?>
                 <p class="error-code"> Sorry!!!<?php echo $ipWeatherResult['errMsg']; ?></p>
            <?php }?>
		  </div>
        </div>
		<!-- End of weather pane -->
        
        <!-- BEGIN OF site main content content here -->
        <main class="page-main" id="mainpage">             
            
			<!-- Begin of express page -->
			<div class="section page-express page page-cent" id="s-express">
				
				<!-- Logo -->
				<!--<div class="logo-container">
					<img class="h-logo" src="img/logo_only.png" alt="Logo">
				</div>-->
				<!-- Content -->
				<section class="content">
					
<!--					<header class="header">-->
						<iframe  id="express-iframe" name="kuaidi100" src="//www.kuaidi100.com/frame/app/index2.html" width="700" height="350" marginwidth="0" marginheight="10" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>
<!--					</header>-->
				</section>
				
				<!-- Scroll down button -->
                <footer class="p-footer p-scrolldown">
                    <a href="#illegal">
                        <div class="arrow-d">
							<div class="before">Scroll</div>
							<div class="after">Down</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
			</div>
			<!-- End of express page -->
            
           <!-- Begin of illegal page -->
			<div class="section page-illegal page page-cent" id="s-illegal">
				
				<!-- Logo -->
				<!--<div class="logo-container">
					<img class="h-logo" src="img/logo_only.png" alt="Logo">
				</div>-->
				<!-- Content -->
				<section class="content">
					
					<header class="header">
						<div class="h-left">
							<h2>New <strong>Company</strong></h2>
						</div>
						<div class="h-right">
							<h3>Lorem <br>product</h3>
							<h4 class="subhead"><a href="#zodiac">Available here soon</a></h4>
						</div>
					</header>
				</section>
				
				<!-- Scroll down button -->
                <footer class="p-footer p-scrolldown">
                    <a href="#tickets">
                        <div class="arrow-d">
							<div class="before">Scroll</div>
							<div class="after">Down</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
			</div>
			<!-- End of illegal page -->
            
            
            
            <!-- Begin of tickets page -->
            <div class="section page-tickets page page-cent" id="s-tickets">
                <section class="content">
                    <header class="p-title">
                        <h3>About Us<i class="ion ion-android-information">
                            </i>
                        </h3>
						<h4 class="subhead">We <span class="bold">make</span> only <span class="bold">beautiful</span> things</h4>
                    </header>
                    <article class="text">
                        <p>Lorem ipsum <strong>magicum </strong>dolor sit amet, consectetur adipiscing elit. Maecenas a sem ultrices neque vehicula fermentum a sit amet nulla.</p>
                        <p>Aenean ultricies odio at erat facilisis tincidunt. Fusce tempor auctor justo, nec facilisis quam vehicula vel. Aenean non mattis purus, eget lobortis odio. </p>
                    </article>
                </section>
                <footer class="p-footer p-scrolldown">
                    <a href="#plane-tickets">
                        <div class="arrow-d">
							<div class="before">Contact</div>
							<div class="after">Message</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
            </div>
            <!-- End of tickets page -->
                
            <!-- Begin of illegal page -->
			<div class="section page-plane-tickets page page-cent" id="s-plane-tickets">
				
				<!-- Logo -->
				<!--<div class="logo-container">
					<img class="h-logo" src="img/logo_only.png" alt="Logo">
				</div>-->
				<!-- Content -->
				<section class="content">
					
					<header class="header">
						<div class="h-left">
							<h2>New <strong>Company</strong></h2>
						</div>
						<div class="h-right">
							<h3>Lorem <br>product</h3>
							<h4 class="subhead"><a href="#register">Available here soon</a></h4>
						</div>
					</header>
				</section>
				
				<!-- Scroll down button -->
                <footer class="p-footer p-scrolldown">
                    <a href="#zodiac">
                        <div class="arrow-d">
							<div class="before">Scroll</div>
							<div class="after">Down</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
			</div>
			<!-- End of illegal page -->
            <!-- Begin of zodiac page -->
            <div class="section page-zodiac page page-cent  bg-color" data-bgcolor="rgba(95, 25, 208, 0.88)s" id="s-zodiac">
                <!--        begin of zodiac search modal         -->
                
                <div class="modal fade" id="zodiacSearchModal" tabindex="-1" role="dialog" aria-labelledby="zodiacSearchModalLabel">
                    <div class="modal-dialog" role = "document">
                        <div class="modal-content">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title" id="zodiacSearchModalLabel">星座查询</h4>
                            </div>
                            <div class="modal-body">
                                <input type="text" placeholder="星座名" id="zodiac-input" data-provide="typeahead">
                                <div class="daily-options">
                                    <label for="radio" class="col-sm-4 control-label">日查询</label>
                                    <div class="col-sm-8">
                                        <div class="radio-inline"><label><input type="radio" name="daily-option" value="today" checked=""> 今日</label></div>
                                        <div class="radio-inline"><label><input type="radio" name="daily-option"  value="tomorrow" > 明日</label></div>
                                    </div>
                                    
                                </div>
                                <div class="week-options">
                                    <label for="radio" class="col-sm-4 control-label">周查询</label>
                                    <div class="col-sm-8">
                                        <div class="radio-inline"><label><input type="radio" checked="" name="week-option" value="week"> 本周</label></div>
                                        <div class="radio-inline"><label><input type="radio"   name="week-option" value="nextweek"> 下周</label></div>
                                    </div>
                                </div>
                                <div class="zodiac-options">
                                    <div class="row"></div>
                                    <div class="row"></div>
                                    <div class="row"></div>
                                    <div class="row"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" name="cancel">取消</button>
                                <button type="button" class="btn btn-primary" name="submit" id="zodiac-search-submit">确定</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <!--        begin of zodiac search modal         -->

				<!-- Begin of  zodiac daily fortune -->
                
				<div class="slide" id="s-zodiac-day" data-anchor="zodiac-day">
                    <?php 
                        $zodiacToday = $convenienceInfo->getZodiacFortuneByNameType($zodiacName,$zodiacType[0]);
                        if($zodiacToday['error_code'] == 0):
                    ?>
                     <div class="zodiac-info-header" >
                        <div class="zodiac-img col-md-4 col-xs-4" >
                            <img class="img-rounded" data-src="holder.js/140x140" alt="skills" src="img/zodiac/Gemini.png" style="width:100px; height:100px;" >
                        </div>
                        <div class="zodiac-basic-info col-md-6 col-xs-6">
                            <h3 class="zodiac-name">
                                <span><?php echo $zodiacToday['name'];?></span>
                                <span data-toggle="modal" data-target="#zodiacSearchModal" >星座查询</span>
                            </h3>
                            <h4 class="zodiac-qfriend">
                                <span>速配星座</span><span><?php echo $zodiacToday['QFriend'];?></span>
                            </h4>
                           <h5>
                               <span>幸运色</span><span><?php echo $zodiacToday['color'];?></span>
                               <span>幸运数字</span><span><?php echo $zodiacToday['number'];?></span>
                            </h5>
                        </div>
                    </div>
           
					<section class="content">
						<header class="p-title">
							<h3>今日运势<i class="ion ion-ios-gear">
								</i>
							</h3>
							<ul class="buttons">
								<li>
									<a title="本周运势" href="#zodiac/zodiac-week" ><i class="ion ion-android-calendar"></i></a>
								</li>
								<li>
									<a title="本月运势" href="#zodiac/zodiac-month"><i class="ion ion-ios-pulse"></i></a>
								</li>
                                <li>
									<a title="本年运势" href="#zodiac/zodiac-year"><i class="ion ion-ios-analytics"></i></a>
								</li>
							</ul>
						</header>
						<!-- Begin Of Today Fortune Page SubSction -->
						<div class="zodiac-info">
                            
                         
                            <div class="row">
                                <dl class="dl-horizontal">
                                    <dt>综合指数</dt>
                                    <dd><div class="progress"><div class="progress-bar progress-bar-info" style="width: <?php echo $zodiacToday['all']; ?>;"><?php echo $zodiacToday['all']; ?></div></div></dd>
                                    <dt>健康指数</dt>
                                    <dd><div class="progress"><div class="progress-bar progress-bar-success" style="width: <?php echo $zodiacToday['health']; ?>;"><?php echo $zodiacToday['health']; ?></div></div></dd>
                                    <dt>爱情指数</dt>
                                    <dd><div class="progress"><div class="progress-bar progress-bar-danger" style="width: <?php echo $zodiacToday['love']; ?>;"><?php echo $zodiacToday['love']; ?></div></div></dd>
                                    <dt>财运指数</dt>
                                    <dd><div class="progress"><div class="progress-bar progress-bar-warning" style="width: <?php echo $zodiacToday['money']; ?>;"><?php echo $zodiacToday['money']; ?></div></div></dd>
                                    <dt>工作指数</dt>
                                    <dd><div class="progress"><div class="progress-bar progress-bar-success" style="width: <?php echo $zodiacToday['work']; ?>;"><?php echo $zodiacToday['work']; ?></div></div></dd>
                                </dl>
                            </div>
                            <div class="row">
                                <div class="zodiac-conclude"><span>总结</span><span><?php echo $zodiacToday['summary']; ?></span></div>
                            </div>
                            
                        </div>
						<!-- End of page SubSection -->
                        
					</section> 
                    <?php else:?>
                    <div class="error-code">查询失败，请重试！</div>
                           
                    <?php endif;?>
				</div>
				<!-- end of daily fortune  -->
				
				<!-- begin of zodiac week fortune --> 
				<div class="slide" id="s-zodiac-week" data-anchor="zodiac-week">
					<?php 
                            $zodiacWeek = $convenienceInfo->getZodiacFortuneByNameType($zodiacName,$zodiacType[2]);
                            if($zodiacWeek['error_code'] == 0):
                        ?>
                    <section class="content">
						<header class="p-title">
							<h3>本周运势<i class="ion ion-android-calendar">
								</i>
							</h3>
							<ul class="buttons">
								<li>
									<a title="今日运势" href="#zodiac/zodiac-day"><i class="ion ion-ios-gear"></i></a>
								</li>
								<li>
									<a title="本月运势" href="#zodiac/zodiac-month"><i class="ion ion-ios-pulse"></i></a>
								</li>
                                <li>
									<a title="本年运势" href="#zodiac/zodiac-year"><i class="ion ion-ios-analytics"></i></a>
								</li>
							</ul>
						</header>
						<!-- Begin Of week fortune Page SubSction -->
						<div class="zodiac-week-info">
                            <div class="row">
                                <h5><?php echo $zodiacWeek['date'];?></h5>
                            </div>
                            <div class="row" title="<?php echo $zodiacWeek['health'];?>">
                                <p><i class="ion-ios-body"></i><?php echo $zodiacWeek['health'];?></p>
                            </div>
                            <div class="row" title="<?php  echo $zodiacWeek['job'];?>">
                                <p><i class="ion-ios-paper"></i><?php echo $zodiacWeek['job'];?></p>
                            </div>
                            <div class="row" title="<?php  echo $zodiacWeek['love'];?>">
                                <p><i class="ion-ios-rose"></i><?php echo $zodiacWeek['love'];?></p>
                            </div>
                            <div class="row" title="<?php  echo $zodiacWeek['money'];?>">
                                <p><i class="ion-social-yen"></i><?php echo $zodiacWeek['money'];?></p>
                            </div>
                            <div class="row" title="<?php echo $zodiacWeek['work'];?>">
                                <p><i class="ion-briefcase"></i><?php echo $zodiacWeek['work'];?></p>
                            </div>
                            
                           
                        </div>
						
						<!-- End Of week fortune Page SubSction -->
					</section>
				    <?php else:?>
                    <div class="error-code">查询失败，请重试！</div>
                    <?php endif;?>	
				</div>
				<!-- End of zodiac message -->
                <!-- begin of zodiac month fortune --> 
				<div class="slide" id="s-zodiac-month" data-anchor="zodiac-month">
                    <?php 
                        $zodiacMonth = $convenienceInfo->getZodiacFortuneByNameType($zodiacName,$zodiacType[4]);
                    
                        if($zodiacMonth['error_code'] == 0):
                    ?>
					<section class="content">
						<header class="p-title">
							<h3>本月运势<i class="ion ion-ios-pulse">
								</i>
							</h3>
							<ul class="buttons">
								<li>
									<a title="今日运势" href="#zodiac/zodiac-day"><i class="ion ion-ios-gear"></i></a>
								</li>
								<li>
									<a title="本周运势" href="#zodiac/zodiac-week"><i class="ion ion-android-calendar"></i></a>
								</li>
								<li>
									<a title="本年运势" href="#zodiac/zodiac-year"><i class="ion ion-ios-analytics"></i></a>
								</li>
							</ul>
						</header>
						<!-- Begin Of month fortune Page SubSction -->
                        <div class="zodiac-month-info">
                            <div class="row">
                                <h5><?php echo $zodiacMonth['date'];?></h5>
                            </div>
                            
                            <div class="row" title="<?php echo $zodiacMonth['all'];?>">
                                <p><i class="ion-compose"></i><?php echo $zodiacMonth['all'];?></p></div>
                            <div class="row" title="<?php echo $zodiacMonth['health'];?>">
                                <p><i class="ion-ios-body"></i><?php echo $zodiacMonth['health'];?></p></div>
                            <div class="row" title="<?php echo $zodiacMonth['love'];?>">
                                <p><i class="ion-ios-rose"></i><?php echo $zodiacMonth['love'];?></p></div>
                            <div class="row" title="<?php echo $zodiacMonth['money'];?>">
                                <p><i class="ion-social-yen"></i><?php echo $zodiacMonth['money'];?></p></div>
                            <div class="row" title="<?php echo $zodiacMonth['work'];?>">
                                <p><i class="ion-briefcase"></i><?php echo $zodiacMonth['work'];?></p></div>
                        
                        </div>
                    </section>
				    <!-- End Of month fortune Page SubSction -->
					<?php else:?>
                    <div class="error-code">查询失败，请重试！</div>
                    <?php endif;?>		
				</div>
				<!-- End of zodiac month fortune  -->
                <!-- begin of zodiac year fortune --> 
				<div class="slide" id="s-zodiac-year" data-anchor="zodiac-year">
                    <?php 
                        $zodiacYear = $convenienceInfo->getZodiacFortuneByNameType($zodiacName,$zodiacType[5]);
                    
                        if($zodiacYear['error_code'] == 0):
                    ?>
					<section class="content">
						<header class="p-title">
							<h3>本年运势<i class="ion ion-ios-analytics">
								</i>
							</h3>
							<ul class="buttons">
								<li>
									<a title="今日运势" href="#zodiac/zodiac-day"><i class="ion ion-ios-gear"></i></a>
								</li>
								<li>
									<a title="本周运势" href="#zodiac/zodiac-week"><i class="ion ion-android-calendar"></i></a>
								</li>
								<li>
									<a title="本月运势" href="#zodiac/zodiac-month"><i class="ion ion-ios-pulse"></i></a>
								</li>
							</ul>
						</header>
						<!-- Begin Of year fortune Page SubSction -->
						
						
                        <div class="zodiac-year-info">
                            <div class="row">
                                <h5><?php echo $zodiacYear['date'];?></h5>
                            </div>
                            <div class="row" title="<?php echo $zodiacYear['mima']['text'][0];?>" >
                                <p><i class="ion-stats-bars"></i><span><?php echo $zodiacYear['mima']['info']; ?></span><span><?php echo $zodiacYear['mima']['text'][0];?></span></p>
                            </div>
                            <div class="row" title="<?php echo $zodiacYear['career'][0];?>" >
                                <p><i class="ion-briefcase"></i><?php echo $zodiacYear['career'][0]; ?></p>
                            </div>
                            <div class="row" title="<?php echo $zodiacYear['love'][0];?>" >
                                <p><i class="ion-heart"></i><?php echo $zodiacYear['love'][0]; ?></p>
                            </div>
                            <div class="row" title="<?php echo $zodiacYear['health'][0];?>" >
                                <p><i class="ion-ios-body"></i><?php echo $zodiacYear['health'][0]; ?></p>
                            </div>
                            <div class="row" title="<?php echo $zodiacYear['finance'][0];?>" >
                                <p><i class="ion-cash"></i><?php echo $zodiacYear['finance'][0]; ?></p>
                            </div>
                            <div class="row" >
                                <p><i class="ion-egg"></i><?php echo $zodiacYear['luckyStone']; ?></p>
                            </div>
                           
                        </div>
                    </section>
				    <!-- End Of year fortune Page SubSction -->
					<?php else:?>
                    <div class="error-code">查询失败，请重试！</div>
                    <?php endif;?>		
				</div>
				<!-- End of zodiac month fortune  -->
            </div>
            <!-- End of zodiac page  -->   
            
        </main>

        <!-- END OF site main content content here -->  
		
		<!-- Begin of site footer -->
		<footer class="page-footer">
			<div>
				<a href="http://www.facebook.com/highhay" target="_blank"><i class="ion icon ion-social-facebook"></i></a>
				<a href="http://www.instagram.com/miradontsoa" target="_blank"><i class="ion icon ion-social-instagram"></i></a>
				<a href="http://twitter.com/miradontsoa" target="_blank"><i class="ion icon ion-social-twitter"></i></a>
			</div>
		</footer>
		<!-- End of site footer -->

        
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
        
        <!-- All Javascript plugins goes here -->
<!--		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>-->
        <script src="./js/vendor/jquery-1.11.2.min.js"></script>
        <script src="./js/jquery-ui.min.js"></script>
        <script src="./js/bootstrap.js"></script>
        <script src="./js/bootstrap3-typeahead.js"></script>
		<!-- All vendor scripts -->
        <script src="./js/vendor/all.js"></script>
		
		<!-- Detailed vendor scripts -->
        <!--<script src="./js/vendor/jquery.fullPage.min.js"></script>
        <script src="./js/vendor/jquery.slimscroll.min.js"></script>
        <script src="./js/vendor/jquery.knob.min.js"></script>
        <script src="./js/vegas/vegas.min.js"></script>
        <script src="./js/jquery.maximage.js"></script>
        <script src="./js/okvideo.min.js"></script>-->
		
		<!-- Downcount JS -->
        <script src="./js/jquery.downCount.js"></script>
		
		<!-- Form script -->
        <script src="./js/form_script.js"></script>
        
		<!-- Javascript main files -->
        <script src="./js/main.js"></script>
         

        <!-- Google Analytics: Uncomment and change UA-XXXXX-X to be your site"s ID. -->
        <!--<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src="//www.google-analytics.com/analytics.js";
            r.parentNode.insertBefore(e,r)}(window,document,"script","ga"));
            ga("create","UA-XXXXX-X");ga("send","pageview");
        </script>-->
    </body>
</html>