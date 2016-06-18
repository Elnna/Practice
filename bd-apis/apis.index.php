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
$zodiac = $convenienceInfo->getZodiacFortuneByName("双子座");
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
            <div><i class="ion ion-loading-d"></i><p>请耐心等待</p></div>
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
					<a href="#express" class=""><i class="icon ion ion-plane"></i>
					</a>
					<span class="title">快递</span>
				</li>
				
               <!-- <li data-menuanchor="illegal">
					<a href="#tickets"><i class="icon ion ion-android-car"></i>
					</a>
					<span class="title">违章查询</span>
				</li>-->
                <li data-menuanchor="zodiac">
					<a href="#zodiac"><i class="icon ion ion-star"></i>
					</a>
					<span class="title">星座运势</span>
				</li>
				<li data-menuanchor="tickets">
					<a href="#tickets"><i class="icon ion ion-ios-information"></i>
					</a>
					<span class="title">火车票</span>
				</li>
				<!--<li data-menuanchor="plane-tickets">
					<a href="#tickets"><i class="icon ion ion-android-plane"></i>
					</a>
					<span class="title">订机票</span>
				</li>-->
                
				<li data-menuanchor="contact">
					<a href="#contact"><i class="icon ion ion-email"></i>
					</a>
					<span class="title">Contact</span>
				</li>
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
                    <a href="#zodiac">
                        <div class="arrow-d">
							<div class="before">Scroll</div>
							<div class="after">Down</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
			</div>
			<!-- End of home page -->
            
           
            
            <!-- Begin of zodiac page -->
            <div class="section page-zodiac page page-cent"  id="s-zodiac">
                <section class="content">
                    <header class="p-title">
                        <h3>Register <i class="ion ion-compose"></i></h3> 
						<h4 class="subhead">Register to get our latest news</h4>
                    </header>
                    <div>
                        <form id="mail-subscription" class="form magic send_email_form" method="get" action="ajaxserver/serverfile.php">
                            <p class="invite">Please, write your email below to stay in touch with us :</p>
							<div class="fields clearfix">
								<div class="input">
									<label for="reg-email">Email </label>
									<input id="reg-email" class="email_f"  name="email" type="email" required placeholder="your@email.address" data-validation-type="email"></div>
								<div class="buttons">
									<button id="submit-email" class="button email_b" name="submit_email">Ok</button>
								</div>
							</div>
                            
                            <p class="email-ok invisible"><strong>Thank you</strong> for your subscription. We will inform you.</p>
                        </form>
                    </div>
                </section>
                <footer class="p-footer p-scrolldown">
                    <a href="#tickets">
                        <div class="arrow-d">
							<div class="before">About</div>
							<div class="after">Lorem</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
            </div>
            <!-- End of zodiac page -->
            
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
                    <a href="#contact">
                        <div class="arrow-d">
							<div class="before">Contact</div>
							<div class="after">Message</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
            </div>
            <!-- End of tickets page -->
                
            <!-- Begin of Contact page   -->
            <div class="section page-contact page page-cent  bg-color" data-bgcolor="rgba(95, 25, 208, 0.88)s" id="s-contact">
				<!-- Begin of contact information -->
				<div class="slide" id="s-information" data-anchor="information">
					<section class="content">
						<header class="p-title">
							<h3>Contact<i class="ion ion-location">
								</i>
							</h3>
							<ul class="buttons">
								<li class="show-for-medium-up">
									<a title="About" href="#tickets" ><i class="ion ion-android-information"></i></a>
								</li>
								<li>
									<a title="Message" href="#contact/message"><i class="ion ion-email"></i></a>
								</li>
							</ul>
						</header>
						<!-- Begin Of Page SubSction -->
						<div class="contact">
							<div class="row">
								<div class="medium-6 columns left">
									<ul>
										<li>
											<h4>Email</h4>
											<p><a href="mailto://contact@mail.com">contactemail@mail.com</a></p>
										</li>
										<li>
											<h4>Address</h4>
											<p>99 Location Street
											<br>Antartica SP</p>
										</li>
										<li>
											<h4>Phone</h4>
											<p>+999 123 456 89</p>
										</li>
									</ul>
								</div>
								<div class="medium-6 columns social-links right">
									<ul>

										<!-- legal notice -->
										<li class="show-for-medium-up">
											<h4>Website</h4>
											<p><a href="http://www.highhay.com">www.highhay.com</a></p>
										</li>
										<li  class="show-for-medium-up">
											<h4>Find us on</h4>
											<!-- Begin of Social links -->
											<div class="socialnet">
												<a href="#"><i class="ion ion-social-facebook"></i></a>
												<a href="#"><i class="ion ion-social-instagram"></i></a>
												<a href="#"><i class="ion ion-social-twitter"></i></a>
												<a href="#"><i class="ion ion-social-pinterest"></i></a>
												<a href="#"><i class="ion ion-social-tumblr"></i></a>
											</div>
											<!-- End of Social links -->
										</li>
										<li>
											<p><img src="img/logo_large.png" alt="Logo" class="logo"></p>
											<p class="small">Bientot by <strong><a href="http://highhay.com">Brand</a></strong>. All right reserved 2015</p>
										</li>
									</ul>

								</div>
							</div>
						</div>
						<!-- End of page SubSection -->
					</section>  
				</div>
				<!-- end of contact information -->
				
				<!-- begin of contact message --> 
				<div class="slide" id="s-message" data-anchor="message">
					<section class="content">
						<header class="p-title">
							<h3>Write to us<i class="ion ion-email">
								</i>
							</h3>
							<ul class="buttons">
								<li class="show-for-medium-up">
									<a title="About" href="#tickets"><i class="ion ion-android-information"></i></a>
								</li>
								<li>
									<a title="Contact" href="#contact/information"><i class="ion ion-location"></i></a>
								</li>
								<!--<li>
									<a title="Message" href="#contact/message"><i class="ion ion-email"></i></a>
								</li>-->
							</ul>
						</header>
						<!-- Begin Of Page SubSction -->
						
						<div class="page-block c-right v-zoomIn">
							<div class="wrapper">
								<div>
									<form class="message form send_message_form" method="get" action="ajaxserver/serverfile.php">
										<div class="fields clearfix">
											<div class="input">
												<label for="mes-name">Name </label>
												<input id="mes-name" name="name" type="text" placeholder="Your Name" required></div>
											<div class="buttons">
												<button id="submit-message" class="button email_b" name="submit_message">Ok</button>
											</div>
										</div>
										<div class="fields clearfix">
											<div class="input">
												<label for="mes-email">Email </label>
												<input id="mes-email" type="email" placeholder="Email Address" name="email" required>
											</div>
										</div>
										<div class="fields clearfix no-border">
											<label for="mes-text">Message </label>
											<textarea id="mes-text" placeholder="Message ..." name="message" required></textarea>

											<div>
												<p class="message-ok invisible">Your message has been sent, thank you.</p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- End Of Page SubSction -->
					</section>
						
				</div>
				<!-- End of contact message -->
            </div>
            <!-- End of Contact page  -->   
        
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