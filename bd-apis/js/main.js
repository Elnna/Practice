"use strict";
/* 0. Initialization */
// Get height on Window resized
$(window).on('resize',function(){
    var slideHeight = $('.slick-track').innerHeight();
	return false;
});


// Smooth scroll <a> links 
var $root = $('html, body');
$('a.s-scroll').on('click',function() {
    var href = $.attr(this, 'href');
    $root.animate({
        scrollTop: $(href).offset().top
    }, 500, function () {
        window.location.hash = href;
    });
    return false;
});

// Page Loader : hide loader when all are loaded
$(window).load(function(){
    $('#page-loader').addClass('hidden');
});



/* 1. Clock attribute */

/*
var dateReadableText = 'Upcoming date';
    if($('.site-config').attr('data-date-readable') && ($('.site-config').attr('data-date-readable') != '')){
        $('.timeout-day').text('');
        dateReadableText = $('.site-config').attr('data-date-readable');        
        $('.timeout-day').text(dateReadableText);
    }
$('.clock-countdown').downCount({
    date: $('.site-config').attr('data-date'),
    offset: +10
}, function () {
    //callback here if finished
    //alert('YES, done!');
    var zerodayText = 'An upcoming date';
    if($('.site-config').attr('data-zeroday-text') && ($('.site-config').attr('data-zeroday-text') != '')){
        $('.timeout-day').text('');
        zerodayText = $('.site-config').attr('data-zeroday-text'); 
    }
    $('.timeout-day').text(zerodayText);
});
*/


/* 2. Background for page / section */

var background = '#ccc';
var backgroundMask = 'rgba(255,255,255,0.92)';
var backgroundVideoUrl = 'none';

/* Background image as data attribut */
var list = $('.bg-img');

for (var i = 0; i < list.length; i++) {
	var src = list[i].getAttribute('data-image-src');
	list[i].style.backgroundImage = "url('" + src + "')";
	list[i].style.backgroundRepeat = "no-repeat";
	list[i].style.backgroundPosition = "center";
	list[i].style.backgroundSize = "cover";
}

/* Background color as data attribut */
var list = $('.bg-color');
for (var i = 0; i < list.length; i++) {
	var src = list[i].getAttribute('data-bgcolor');
	list[i].style.backgroundColor = src;
}

/* Background slide show Background variables  */
var imageList = $('.slide-show .img');
var imageSlides = [];
for (var i = 0; i < imageList.length; i++) {
	var src = imageList[i].getAttribute('data-src');
	imageSlides.push({src: src});
}


/* Slide Background variables */
var isSlide = false;
var slideElem = $('.slide');
var arrowElem = $('.p-footer .arrow-d');
var pageElem = $('.page');

//var historyCity = '';




/* 3. Init all plugin on load */
$(document).ready(function() {
	/* Init console to avoid error */
	var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
	
	/* Init Slidesow background */
	 $('.slide-show').vegas({
        delay: 5000,
        shuffle: true,
        slides: imageSlides,
    	//transition: [ 'zoomOut', 'burn' ],
		animation: [ 'kenburnsUp', 'kenburnsDown', 'kenburnsLeft', 'kenburnsRight' ]
    });
	
	/* Init video background */
	/*$('.video-container video, .video-container object').maximage('maxcover');
	
	 Init youtube video background 
	if(backgroundVideoUrl != 'none'){
        
        //disable video background for smallscreen
        if($(window).width() > 640){
          $.okvideo({ source: backgroundVideoUrl,
                    adproof: true
                    });
        }
    }*/
	
	/** Init fullpage.js */
    $('#mainpage').fullpage({
		menu: '#qmenu',
		anchors: ['express',  'zodiac', 'tickets', 'contact'],
//        verticalCentered: false,
//        resize : false,
//		responsive: 900,
		scrollOverflow: true,
        css3: false,
        navigation: true,
		onLeave: function(index, nextIndex, direction){
			arrowElem.addClass('gone');
			pageElem.addClass('transition');
//			$('.active').removeClass('transition');
			slideElem.removeClass('transition');
			isSlide = false;
		},
        afterLoad: function(anchorLink, index){
			arrowElem.removeClass('gone');
			pageElem.removeClass('transition');
			if(isSlide){
				slideElem.removeClass('transition');
			}
		},
		
        afterRender: function(){}
    });
    
    
    /*nav slide*/
    $('.nav-item').click(function(e){ 
        var oldHash = $('.nav-item.active').attr('href');
        var newHash = $(this).attr('href');
//        console.log("oldhash:" , oldHash);
//        console.log("newhash:" , newHash);
        
        $('.nav-item.active').removeClass('active');
        $(this).addClass('active');
//        console.log($('#s-' + oldHash.substr(1,oldHash.length-1)));
        $('#s-' + oldHash.substr(1,oldHash.length-1)).removeClass('active');
        $('#s-' + newHash.substr(1,newHash.length-1)).addClass('active');
      
    });
    
    
    /*change city*/
    $('.header-top h1').on("click",function(e){
//       alert("success");
        
        //替换header top 
//        var oldNode = $(this)[0];
        /*var newNodes = "<div id='change-city' class='change-city'>\
        <div class='input-box'><input class='get-city' type='text' name='city' value='" + 
        $('.header-top h1 span')[0].innerText  + "' style='background-color: transparent;'/>\
        <button class='submit-btn' type='button' name='submit'>确定</button></div>\
        <div class='history-cities'></div>\
        <hr style='width:10%'>\
        <div class='common-cities'><span>北京</span><span>上海</span><span>深圳</span>" +  
        "<span>武汉</span><span>广州</span><span>杭州</span><span>南京</span><span>成都</span>\
        <span>天津</span><span>西安</span><span>福州</span><span>重庆</span><span>厦门</span>"+
        "<span>青岛</span><span>大连</span></div></div>";*/
        
//        $('.header-top').html(newNodes);
        
        $(this).addClass('hide');
        var city = $('.header-top h1 span')[0].innerText;
        $('.get-city').val(city);
        if($('.history-cities span').text().indexOf(city) == -1){
                $('.history-cities i').before('<span>' + city + '</span>');
        }
        $('.change-city').removeClass('hide');
        
    });
    
     $('.common-cities span').on('click',function(data){
            var city = $(this).text();
//            historyCity = document.createElement('span');
//            historyCity.innerText = city;
            if($('.history-cities span').text().indexOf(city) == -1){
                $('.history-cities i').before('<span>' + city + '</span>');
            }
//            historyCity += '<span>' + city + '</span>';
//            $('.history-cities').html(historyCity);
            $('.get-city').val(city);
            $('.header-top h1 span')[0].innerText = city;
            $('.change-city').addClass('hide');
            $('.header-top h1').removeClass('hide');
     
            changeWeather(city);
         
    });
    $('.history-cities').on('click',' .history-cities span',function(){
        //alert("cc");
        var city = $(this).text();
        $('.header-top h1 span')[0].innerText = city;

        $('.change-city').addClass('hide');
        $('.header-top h1').removeClass('hide');
        changeWeather(city);

    });
    $('.history-cities i').on('click',function(e){
       $(this).parent().empty().append($(this));
    });
        
    $('button.submit-btn').on('click',function(e){
        var city = $('input.get-city').val();
        $('.header-top h1 span')[0].innerText = city;
         if($('.history-cities span').text().indexOf(city) == -1){
            $('.history-cities i').before('<span>' + city + '</span>');
        }
        $('.change-city').addClass('hide');
        $('.header-top h1').removeClass('hide');
        changeWeather(city);

    });
   
    
});

var changeWeather = function(city){
    var apikey = {'apikey':'2cf291486b5dd04551e81c11e1346615'};
    var url = 'http://apis.baidu.com/apistore/weatherservice/recentweathers?cityname=' + city;
    $.ajax({
       url:url, 
       method: "GET",  
       headers: apikey, 
       dataType: "json",
       success: function(data){
           console.log('success',data);
           if(data.errNum==0){

               var retData = data.retData;
               var today = retData.today.date.split("-");
               var forecast = retData.forecast;
               var date = new Date();
               var time = date.getHours() + ':' + date.getMinutes();

              //实时天气
               $("#s-current .p-weather-date h6")[0].innerText = today[0] + "年" + today[1] + "月" + today[2] + "日" + forecast[0].week + time;

               $("[href=#current].nav-item i,[href=#today].nav-item i")[0].className = "wi wi-day-" + getWeatherCode(retData.today.type);


               //更改温度
               var tempHtml = retData.today.curTemp.substr(0,2) + "°<small>C</small>";
               $('#s-current .weather-temp').html(tempHtml);

               var typeHtml = '<span>' + retData.today.type + '</span><span>' + retData.today.fengxiang + '</span><span>' + retData.today.fengxiang + '</span>';
               $('#s-current .weather-type p,#s-today .weather-type p').html(typeHtml);


               //当天天气
                $("#s-today .p-weather-date h6")[0].innerText = today[0] + "年" + today[1] + "月" + today[2] + "日" + forecast[0].week ;

              /* $('[href=#today].nav-item i')[0].className = "wi wi-day-" + getWeatherCode(retData.today.type);
               */

               //更改温度
               var tempHtml = retData.today.lowtemp.substr(0,2) + "°~" + retData.today.lowtemp.substr(0,2) + "°<small>C</small>" ;
               $('#s-today .weather-temp').html(tempHtml);

              /* var typeHtml = '<span>' + retData.today.type + '</span><span>' + retData.today.fengxiang + '</span><span>' + retData.today.fengxiang + '</span>';
               $('#s-today .weather-type p').html(typeHtml);
               */


               for(var i=1; i <= forecast.length; i++){

                   //更改天气标识
    //                           console.log(getWeatherCode(forecast[i-1].type));
                   $("[href=#" + getWeekEn(forecast[i-1]['week']) + "].nav-item i")[0].className = "wi wi-day-" + getWeatherCode(forecast[i-1].type);

                   //更改温度
                   $('#'+ getWeekEn(forecast[i-1]['week']) + ' .weather-temp').innerHTML = forecast[i-1].lowtemp.substr(0,2) + '°~' + forecast[i-1].hightemp.substr(0,2)+'°' +  "<small>C</small>";
    //                         //更改天气详细说明
                   typeHtml = '<span>' + retData.today.type + '</span><span>' + retData.today.fengxiang + '</span><span>' + retData.today.fengxiang + '</span>';
                    $('#s-'+ getWeekEn(forecast[i-1]['week']) + ' .weather-type p').html(typeHtml);

               }


           } else{
               if(window.confirm(data.errMsg)){
                   return false;
               }

           }

        },
        error:function(data){
            $('.change-city').addClass('hide');
            $('.header-top h1').removeClass('hide');
            console.log('failed',data);

        }
       });
}
var getWeekEn = function(str){
    var en = '';
    switch(str){
        case '星期一':
            en = 'monday';
            break;
        case '星期二':
            en = 'tuesday';
            break;
        case '星期三':
            en = 'wednesday';
            break;
        case '星期四':
            en = 'thursday';
            break;
        case '星期五':
            en = 'friday';
            break;
        case  '星期六':
            en = 'saturday' ;
            break;
        case '星期天':
            en = 'sunday';
            break;
        default:
            break;        
    }
    return en;
}

var getWeatherCode = function(data){
      var code = '';
      switch(data){
              case'晴': code = 'sunny';
              break;
              case'多云': code = 'cloudy';
              break;
              case'阴': code = 'cloudy';
              break;
              case'阵雨': code = 'showers';
              break;
              case'雷阵雨': code = 'storm-showers';
              break;
              case'雷阵雨并伴有冰雹': code = 'radioactive'/* 'hail'*/;
              break;
              case'雨夹雪': code = 'sleet';
              break;
              case'小雨': code = 'sprinkle';
              break;
              case'中雨': code = 'rain-mix';
              break;
              case'大雨': code = 'rain';
              break;
              case'暴雨': code = 'thunderstorm';
              break;
              case'大暴雨': code = 'thunderstorm';
              break;
              case'特大暴雨': code = 'thunderstorm';
              break;
              case'阵雪': code = 'radioactive'/*'snow'*/;
              break;
              case'小雪': code = 'radioactive'/*'snow'*/;
              break;
              case'中雪': code = 'radioactive'/*'snow'*/;
              break;
              case'大雪': code = 'radioactive'/*'snow'*/;
              break;
              case'暴雪': code = 'radioactive'/*'snowthunderstorm'*/;
              break;
              case'雾': code = 'radioactive'/*'fog'*/;
              break;
              case'冻雨': code = 'sleet';
              break;
              case'沙尘暴': code = 'radioactive';
              break;
              case'小雨-中雨': code = 'radioactive';
              break;
              case'暴雨-大暴雨': code = 'radioactive';
              break;
              case'大暴雨-特大暴雨': code = 'radioactive';
              break;
              case'小雪-中雪': code = 'radioactive';
              break;
              case'中雪-大雪': code = 'radioactive';
              break;
              case'大雪-暴雪': code = 'radioactive';
              break;
              case'浮沉': code = 'radioactive';
              break;
              case'扬沙': code = 'radioactive';
              break;
              case'强沙尘暴': code = 'radioactive';
              break;
          default:code = 'sunny';
              break;
      }
      return code;
  }