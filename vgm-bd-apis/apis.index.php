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

$expKey = '25b8f22d3ca6bdc864a1b5e7984f0395';
$convenienceInfo->setAppKey($expKey);//set key;
$expressResult = $convenienceInfo->getExpressCom();
//var_dump($expressResult);

$weeksArr = array('monday'=>'星期一','tuesday' => '星期二', 'wednesday' => '星期三','thursday' =>'星期四','friday' => '星期五','saturday' => '星期六', 'sunday' => '星期天');
$zodiacDateArr = array('白羊座'=>'3月21日-4月19日','金牛座'=>'4月20日-5月20日','双子座'=>'5月21日-6月21日','巨蟹座'=>'6月22日-7月22日','狮子座'=>'7月23日-8月22日','处女座'=>'8月23日-9月22日','天枰座'=>'9月23日-10月23日','天蝎座'=>'10月24日-11月22日','射手座'=>'11月23日-12月21日','摩羯座'=>'12月22日-1月19日','水瓶座'=>'1月20日-2月18日','双鱼座'=>'2月19日-3月20日');
$zodiacDateArr = array_flip($zodiacDateArr);
?>

<!DOCTYPE html>

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
        <link rel="stylesheet" href="./css/font-awesome.min.css">
        <!-- Weather CSS style -->
        <link rel="stylesheet" href="./css/weather-icons.css">
        
         <!-- bootstrap CSS style -->
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/bootstrap-datepicker.css">
<!--        <link rel="stylesheet" href="./css/jquery-ui.css">-->

        <!-- Vendor CSS style -->
<!--        <link rel="stylesheet" href="./css/foundation.min.css">-->
        <link rel="stylesheet" href="./js/vendor/jquery.fullPage.css">
        <link rel="stylesheet" href="./js/vegas/vegas.min.css">
        
		<!-- Main CSS files -->
<!--        <link rel="stylesheet" href="./css/main.css">-->
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/main_responsive.css">
<!--        <link rel="stylesheet" href="./css/style-color1.css">-->
        
        <script src="./js/vendor/modernizr-2.7.1.min.js"></script>
    </head>
    <body id="menu" class="alt-bg row">
        <!--[if lt IE 8]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
        <!-- Page Loader -->
        <div class="page-loader" id="page-loader">
            <div><i class="fa fa-spinner fa-pulse"></i><p>请耐心等待</p></div>
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
				<li data-menuanchor="about-us">
					<a href="#about-us"><i class="icon ion ion-ios-information"></i>
					</a>
					<span class="title">关于我们</span>
				</li>
			</ul>
		</nav>
        <!-- END OF Quick nav icons at left -->
        


        <!-- BEGIN OF site cover -->
        <div class="page-cover" id="s-cover">
            <!-- Cover Background -->
            <div class="cover-bg pos-abs full-size bg-img" data-image-src="img/bg-slide1.jpg"></div>
			
            <!-- BEGIN OF Slideshow Background -->
            <div class="cover-bg pos-abs full-size slide-show">
				<i class='img' data-src='./img/bg-slide1.jpg'></i>
				<i class='img' data-src='./img/bg-slide2.jpg'></i>
				<i class='img' data-src='./img/bg-slide3.jpg'></i>
				<i class='img' data-src='./img/bg-slide4.jpg'></i>
				<i class='img' data-src='./img/bg-slide5.jpg'></i>
				<i class='img' data-src='./img/bg-slide6.jpg'></i>
				<i class='img' data-src='./img/bg-slide7.jpg'></i>
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
		<div class="pane-weather" id="s-weather">
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
//                        var_dump($forecast);
                    foreach($forecast as $fk => $fv){
                        $ftype = $fv['type'];
                        $fc = $convenienceInfo->getWeatherByWeatherId($ftype) ? $convenienceInfo->getWeatherByWeatherId($ftype):'rain';
                        
                        $fdate = mb_substr($date,0,11) . $fv['week'];
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
                            $fdate = $fv['date'].'/'.mb_substr($date,8,2);
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
            <div class="weather-index">
               <?php foreach($data['today']['index'] as $ik => $iv):?>
                <div class="weather-<?php echo $iv['code'];?>"><i data-placement="bottom" data-toggle="popover" title="<?php echo $iv['name'];?>"  data-content="<?php echo $iv['details'] ?>" data-container="body" class="<?php echo getWeatherIndexIcon($iv['code']);?>"></i><small><?php echo $iv['index']; ?></small></div>
                <?php endforeach;?>
           </div>    
		  </div>
            
        </div>
		<!-- End of weather pane -->
        
        <!-- BEGIN OF site main content content here -->
        <main class="page-main" id="mainpage" >             
            <div class="modal fade" role="dialog" aria-labelledby="GridSlabel" id="page-search-result">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="GridSlabel">查询结果</h4>
                  </div>
                  <div class="loading"><i class="fa fa-spinner fa-pulse"></i></div>  
                  <div class="modal-body">

                  </div>
                  <div class="modal-footer"></div>
                </div><!-- /.modal-content -->

              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            
			<!-- Begin of express page -->
			<div class="section page-express page page-cent" id="s-express">

				<section class="content">
                    <header class="p-title">
                        <h3>快递查询<i class="ion ion-android-bicycle">
                            </i>
                        </h3>
                    </header>
					<div class="form-horizontal">
                        <div class="form-group">
                            <label for="express-com" class="col-md-3 col-xs-3 control-label">快递公司</label>
                            <div class=" input-group col-md-9 col-xs-9">
                                <span class="input-group-addon" id="expressComList"><i class="ion-ios-list-outline"></i></span>
                                <input type="text" class="form-control" id="express-type" placeholder="快递公司 顺丰 ">
                                <input type="hidden" class="form-control" id="express-type-code" placeholder="快递公司编号 顺丰 sf">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="express-nu" class="col-md-3 col-xs-3 control-label">单号</label>
                            <div class="input-group col-md-9 col-xs-9">
                                <span class="input-group-addon"><i class="ion-merge"></i></span>
                                <input type="text" class="form-control" id="express-nu" placeholder="快递单号">
                            </div>
                        </div>
                         <div class="form-group">
                             <div class="col-md-offset-3 col-xs-offset-3 col-md-9 col-xs-9">
                                 <button type="submit" class="btn btn-primary" id="express-submit">确定</button>
                             </div>
                          </div>
                    </div>
				</section>
				
				<!-- Scroll down button -->
                <footer class="p-footer p-scrolldown">
                    <a href="#illegal">
                        <div class="arrow-d">
							<div class="before">车辆</div>
							<div class="after">违章查询</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
			</div>
			<!-- End of express page -->
            
           <!-- Begin of illegal page -->
			<div class="section page-illegal page page-cent" id="s-illegal">
				<section class="content">
                    <header class="p-title">
                        <h3>违章查询<i class="ion ion-android-car">
                            </i>
                        </h3>
                    </header>
					<div class="form-horizontal" id="car-illegal-search">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-3 control-label" for="car-city">查询地址</label>
                            <div class="col-md-5 col-xs-5">
                                <select class="form-control  col-md-6" id="car-province"></select>
                            </div>
                            <div class="col-md-4 col-xs-4">
                                <select class="form-control col-md-6" id="car-city"></select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="car-lsnum-left" class="col-md-3 col-xs-3 control-label">车牌号码</label>
                            <div class="col-md-2 col-xs-2">
                                <select id="car-lsprefix" class="form-control col-md-6">

                                </select>
                            </div>

                            <div class="col-md-3 col-xs-3">

                                <select id="car-lsnum" class="form-control col-md-6">
                                    <option value="">空</option>
                                    <?php for( $i=65; $i<=90;$i++):
                                    ?>
                                    <option value="<?php echo chr($i);?>"><?php echo chr($i);?></option>
                                    <?php
                                    endfor;
                                    ?>

                                </select>
                            </div>
                            <div class="input-group col-md-4 col-xs-4">
                                <input type="text" class="form-control" id="car-lsnum-left" placeholder="车牌号码后五位">
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="car-type" class="col-md-3 col-xs-3 control-label">车辆类型</label>
                            <div class="col-md-9 col-xs-9">
                                <select id="car-type" class="form-control col-md-1">

                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9 col-xs-offset-3 col-xs-9">
                                <button type="button" class="btn btn-primary col-sm-5 col-xs-5" id="illegal-search-btn">违章查询</button>
                            </div>
                        </div>
                    </div>
				</section>
				
				<!-- Scroll down button -->
                <footer class="p-footer p-scrolldown">
                    <a href="#tickets">
                        <div class="arrow-d">
							<div class="before">火车票</div>
							<div class="after">查询</div>
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
                        <h3>火车票查询<i class="ion ion-android-train">
                            </i>
                        </h3>
                    </header>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label for="start-station" class="col-md-3 col-xs-3 control-label">站站查询</label>
                            <div class="input-group col-md-9 col-xs-9">
                                <input type="text" class="form-control" id="start-station" placeholder="出发站" >
                                <div class="input-group-addon" id="station-change"><span><i class="ion-ios-loop"></i></span></div>
                                <input type="text" class="form-control" id="dest-station" placeholder="到达站" >
                                <div class="input-group-addon"><i class="icon ion-clock"></i></div>
                                <input type="text" class="form-control"  id="ss-datepicker"  readonly>
                                <span class="input-group-addon" id="ss-submit">确定</span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="train-search" class="col-md-3 col-xs-3 control-label">车次查询</label>
                            <div class="input-group col-md-9 col-xs-9">
                                <input type="text" class="form-control" id="train-search" placeholder="车次 G101">
                                <div class="input-group-addon"><i class="icon ion-clock"></i></div>
                                <input type="text" class="form-control"  id="ts-datepicker" readonly>
                                <span class="input-group-addon" id="train-submit">确定</span>
                            </div>
                            <p class="help-block col-md-9 col-xs-9">车次的站站查询 = <span>站站查询</span>站点 + <span>车次查询</span>车次、时间</p>

                        </div>
                        <div class="form-group">
                            <label for="train-station-search" class="col-md-3 col-xs-3 control-label">车站查询</label>
                            <div class="input-group col-md-9 col-xs-9">
                                <input type="text" class="form-control" id="train-station-search" placeholder="北京西">
                                <span class="input-group-addon" id="station-search">确定</span>
                            </div>
                        </div>
                       
                    </div>
                </section>
                <footer class="p-footer p-scrolldown">
                    <a href="#plane-tickets">
                        <div class="arrow-d">
							<div class="before">航班</div>
							<div class="after">查询</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
            </div>
            <!-- End of tickets page -->
                
            <!-- Begin of plane tickets page -->
			<div class="section page-plane-tickets page page-cent" id="s-plane-tickets">
				
				<!-- Content -->
				<section class="content">
					
					<header class="p-title">
                        <h3>机票查询<i class="ion ion-android-plane">
                            </i>
                        </h3>
                    </header>
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 col-xs-3 control-label" for="start-city">航线查询</label>
                            <div class="input-group col-md-9 col-xs-9 ">
                                <input type="text" class="form-control" id="start-city" placeholder="出发城市" >
                                <div class="input-group-addon" id="city-switch"><span><i class="ion-ios-loop"></i></span></div>
                                <input type="text" class="form-control" id="dest-city" placeholder="到达城市" >
                                <span class="input-group-addon"><i class="icon ion-clock"></i></span>
                                <input type="text" class="form-control"  id="plane-datepicker1" style="width:90px" readonly>
                                <span class="input-group-addon" id="route-submit">确定</span>
                            </div>

                        </div>
                        <div class="form-group">
                             <label class="col-md-3 col-xs-3 control-label" for="plane-flight">航班查询</label>
                            <div class="input-group col-md-9 col-xs-9">
                                <input type="text" class="form-control" id="plane-flight" placeholder="航班号" >
                                <span class="input-group-addon"><i class="icon ion-clock"></i></span>
                                <input type="text" class="form-control"  id="plane-datepicker2" readonly>
                                <span class="input-group-addon"  id="flight-submit">确定</span>
                            </div>
                        </div>
                    </div>
                    
				</section>
				
				<!-- Scroll down button -->
                <footer class="p-footer p-scrolldown">
                    <a href="#zodiac">
                        <div class="arrow-d">
							<div class="before">星座</div>
							<div class="after">运势查询</div>
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
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <div class="input-group col-md-offset-2 col-xs-offset-2 col-md-8 col-xs-8">
                                            <input type="text" class="form-control" placeholder="星座名" id="zodiac-input" data-provide="typeahead">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="radio" class="col-md-4 col-xs-4 control-label">日查询</label>
                                        <div class="col-md-8 col-xs-8 daily-options ">
                                            <div class="radio-inline"><label><input type="radio" name="daily-option" value="today" checked=""> 今日</label></div>
                                            <div class="radio-inline"><label><input type="radio" name="daily-option"  value="tomorrow" > 明日</label></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="radio" class="col-md-4 col-xs-4 control-label">周查询</label>
                                        <div class="col-md-8 col-xs-8 week-options ">
                                            <div class="radio-inline"><label><input type="radio" checked="" name="week-option" value="week"> 本周</label></div>
                                            <div class="radio-inline"><label><input type="radio"   name="week-option" value="nextweek"> 下周</label></div>
                                        </div>
                                    </div>
                                    
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
                        $bdKey = '2cf291486b5dd04551e81c11e1346615';
                        $convenienceInfo->setAppKey($bdKey);
                        $zodiacToday = $convenienceInfo->getZodiacFortuneByNameType($zodiacName,$zodiacType[0]);
                        if($zodiacToday['error_code'] == 0):
                    ?>
                     <div class="zodiac-info-header" >
                        <div class="zodiac-img col-md-5 col-xs-5" >
                            <img class="img-rounded" data-src="holder.js/140x140" alt="zodiac" src="img/zodiac/Gemini.png" style="width:140px; height:140px;" >
                        </div>
                        <div class="zodiac-basic-info col-md-6 col-xs-6">
                            <h3 class="zodiac-name">
                                <span><?php echo $zodiacToday['name'];?></span>
                                <span data-toggle="modal" data-target="#zodiacSearchModal" >星座查询</span>
                            </h3>
                            <h6><?php echo array_search($zodiacToday['name'],$zodiacDateArr);?></h6>
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
                                    <?php 
                                        
                                        $arrIndex = array('综合指数','健康指数','爱情指数','财运指数','工作指数');
                                        $zodiacDayArr = array('all','health','love','money','work');
                                        $colorArr = array('info','success','danger','warning','success');
                                        foreach($zodiacDayArr as $k => $v){
                                            
                                    ?>
                                    <dt><?php echo $arrIndex[$k];?></dt>
                                    <dd><div class="progress"><div class="progress-bar progress-bar-<?php echo $colorArr[$k];?>" style="width:<?php echo $zodiacToday[$v];?>;"><?php echo $zodiacToday[$v];?></div></div></dd>
                                    <?php } ?>
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
                            <?php 
                                $zodiacWeekArr = array('health','job','love','money','work');
                                $iconArr = array('ion-ios-body','ion-ios-paper','ion-ios-rose','ion-social-yen','ion-briefcase');
                                foreach($zodiacWeekArr as $k => $v){
                            ?>
                            <div class="row">
                                <p data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo $zodiacWeek[$v]; ?>"><i class="<?php  echo $iconArr[$k];?>"></i><?php echo $zodiacWeek[$v];?></p>
                            </div>
                            <?php }?>
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
                            <?php 
                                $zodiacMonArr = array('all','health','love','money','work');
                                $iconArr = array('ion-compose','ion-ios-body','ion-ios-rose','ion-social-yen','ion-briefcase');
                                foreach($zodiacMonArr as $k =>$v){
                            ?>
                            <div class="row">
                                <p data-container="body" data-placement="top" data-toggle="popover" data-content="<?php echo $zodiacMonth[$v];?>"><i class="<?php echo $iconArr[$k]; ?>"></i><?php echo $zodiacMonth[$v];?></p>
                            </div>
                            <?php }?>
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
                            
                            <div class="row"  >
                                <p data-container="body" data-placement="top" data-toggle="popover"  data-content="<?php echo $zodiacYear['mima']['text'][0];?>"><i class="ion-stats-bars"></i><span><?php echo $zodiacYear['mima']['info']; ?></span><span><?php echo $zodiacYear['mima']['text'][0];?></span></p>
                            </div>
                            <?php 
                                $zodiacYearArr = array('career','love','health','finance');
                                $iconArr = array('ion-briefcase','heart','ion-ios-body','ion-cash');
                                foreach($zodiacYearArr as $k => $v){
                            ?>
                            <div class="row">
                                <p data-container="body" data-placement="top" data-toggle="popover" data-content="<?php echo $zodiacYear[$v][0];?>"><i class="<?php echo $iconArr[$k];?>"></i><?php echo $zodiacYear[$v][0];?></p>
                            </div>
                            <?php }?>
                            
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
            
            <!-- Begin of about us page -->
            <div class="section page-about-us page page-cent"  id="s-about-us">
                <section class="content">
                    <header class="p-title">
                        <h3>关于我们 <i class="ion ion-ios-information"></i></h3> 
                    </header>
                     <article class="text">
                        <address>
                            <attr>主要业务：</attr>    承接网站建设、推广、运营<br>
                            <attr>作者：</attr>    Graham<br>
                            <attr>邮箱：</attr>    grahamhuang@126.com<br>
                        </address>
                    </article>
                </section>
                <footer class="p-footer p-scrolldown">
                    <a href="#about-us">
                        <div class="arrow-d">
							<div class="before">About</div>
							<div class="after">Lorem</div>
							<div class="circle"><i class="ion ion-mouse"></i></div>
						</div>
                    </a>                        
                </footer>
            </div>
            <!-- End of about us page -->
        </main>

        <!-- END OF site main content content here -->  
		
		<!-- Begin of site footer -->
		<footer class="page-footer">
			<div>
				<a href="http://www.facebook.com/100004661118364" target="_blank"><i class="ion icon ion-social-facebook"></i></a>
				<a href="http://weibo.com/u/2829395724" target="_blank"><i class="fa fa-weibo"></i></a>
				<a href="https://twitter.com/GrahamFlyer" target="_blank"><i class="ion icon ion-social-twitter"></i></a>
			</div>
		</footer>
		<!-- End of site footer -->

        
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
        
        <!-- All Javascript plugins goes here -->
<!--		<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>-->
        <script src="./js/vendor/jquery-1.11.2.min.js"></script>
<!--        <script src="./js/jquery-ui.min.js"></script>-->
        <script src="./js/bootstrap.js"></script>
        <script src="./js/bootstrap3-typeahead.js"></script>
        <script src="./js/bootstrap-datepicker.js"></script>
		<!-- All vendor scripts -->
        <script src="./js/vendor/all.js"></script>
		
		<!-- Detailed vendor scripts -->
        <script src="./js/vendor/jquery.fullPage.min.js"></script>
        <script src="./js/vendor/jquery.slimscroll.min.js"></script>
        <!--<script src="./js/vendor/jquery.knob.min.js"></script>
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