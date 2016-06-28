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

/*zodiac*/

var zodiacArr = ["白羊座", "金牛座", "双子座","巨蟹座","狮子座","处女座","天秤座","天蝎座","射手座","摩羯座","水瓶座","双鱼座"];
var dayProgressBar = ['all','health','love','money','work'];
/*express*/
var expComList = '';

/* 3. Init all plugin on load */
$(document).ready(function($) {
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
		anchors: ['express', 'illegal', 'tickets','plane-tickets','zodiac'],
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
		
//        afterRender: function(){}
        afterRender: function(){
           /* $('.modal')
                .on('shown.bs.modal', function() {
                    $.fn.fullpage().setScrollOverflow(false);
                })
                .on('hidden.bs.modal', function() {
//                    $.fn.fullpage.setAutoScrolling(false);

//                    $.fn.fullpage().setScrollOverflow(true);
                });*/
        }
        
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
    
   
    
    
    /*page express*/
    
    $("#express-type").typeahead({
        source: function (query, process) {
                var names = [];
                if(expComList== ''){
                    var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
                    var url = 'http://apis.baidu.com/netpopo/express/express2';
                     $.ajax({
                        url:url, 
                        method: "GET",  
                        headers: apikey, 
                        dataType: "json",
    //                    async:false, 
                        success: function(data){
                            console.log("url",url);
                            console.log("get express com success",data);
    //                        var comList = getExpressCom();
                            expComList = data;
                            $.each(expComList.result, function (index, ele) {
                                comMap[ele.name] = ele.type;
                                names.push(ele.name);
                            });
                            process(names);//调用处理函数，格式化

    //                        return data;
                        },
                        error:function(data){
                            console.log("failed",data);
                        }
                    });
                } else{
                    $.each(expComList.result, function (index, ele) {
                        comMap[ele.name] = ele.type;
                        names.push(ele.name);
                    });
                    process(names);//调用处理函数，格式化
                }
                
               

            },
        afterSelect: function (item) {
            $("#express-type-code").val(comMap[item]);
            console.log(comMap[item]);//取出选中项的值
        }
    });


    $('#expressComList').on('click',function(){
        //查询快递公司
//                    alert("test");
        var expCom = '';
        if(expComList == ''){
            var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
            var url = 'http://apis.baidu.com/netpopo/express/express2';
             $.ajax({
                url:url, 
                method: "GET",  
                headers: apikey, 
                dataType: "json",
//                    async:false, 
                success: function(data){
                    console.log("url",url);
                    console.log("get express com success",data);
//                        var comList = getExpressCom();
                    expComList = data;
                    makeComHtml(expComList);

                },
                error:function(data){
                    console.log("failed",data);
                }
            });
        } else {
            console.log("data",expCom);
            makeComHtml(expComList);
            
        }

    });
    
   $('#express-submit').on('click',function(){
       var type = $('#express-type-code').val();
       var num = $('#express-nu').val();
//       var expListData = '';
//       if(expListData = getExpressList(type,num)){
       if(type!='' && num !=''){
           var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
           var url = 'http://apis.baidu.com/netpopo/express/express1?type=' + type + '&number=' + num;
           $.ajax({
               url:url,
               method: "GET",
               headers: apikey,
    //           async:false,
               dataType: "json",
               success: function(data){
                    console.log("get express list url",url);
                    var expListData = data;
                    if(expListData.status == 0){
                       expListData = expListData.result;
                       var comName = getExpComName(expListData.type);
            //                       var comName = '顺丰';
                       console.log(deliStatus(expListData.deliverystatus));
                       var html = '<header><p>'+deliStatus(expListData.deliverystatus)+'</p>\
                                  <h1>'+ comName + '快递，<span><strong>单号</strong>' + expListData.number+'</span></h1></header><ul class="timeline">';
                       for(var i=0; i< expListData.list.length;i++){
                           html += '<li><div class="direction-'+(i%2==0? 'r':'l') +'"><div class="flag-wrapper"><span class="hexa"></span><span class="flag">'+expListData.list[i].time.substr(11,9)+'</span><span class="time-wrapper"><span class="time">'+ expListData.list[i].time.substr(0,10) +'</span></span></div><div class="desc">'+ expListData.list[i].status +'</div></div></li>';
                       }
                       html +='</ul>';
        //               console.log(html);
                       $('.page-express .modal .modal-body').html(html);
                       $('#expressSearch').modal('toggle');

                   }else{
                        $('.page-express .modal .modal-body').html('<div class="error-code">查询失败，请重试！</div>');
                   }
               },
               error:function(data){
                    console.log("failed",data);
               }
           });

       } else{
           alert("快递公司或者单号不能为空！");
       }
          /* if(expListData.status == 0){
               expListData = expListData.result;
               var comName = getExpComName(expListData.type);
    //                       var comName = '顺丰';
               console.log(deliStatus(expListData.deliverystatus));
               var html = '<header><p>'+deliStatus(expListData.deliverystatus)+'</p>\
                          <h1>'+ comName + '快递，<span><strong>单号</strong>' + expListData.number+'</span></h1></header><ul class="timeline">';
               for(var i=0; i< expListData.list.length;i++){
                   html += '<li><div class="direction-'+(i%2==0? 'r':'l') +'"><div class="flag-wrapper"><span class="hexa"></span><span class="flag">'+expListData.list[i].time.substr(11,9)+'</span><span class="time-wrapper"><span class="time">'+ expListData.list[i].time.substr(0,10) +'</span></span></div><div class="desc">'+ expListData.list[i].status +'</div></div></li>';
               }
               html +='</ul>';
//               console.log(html);
               $('.page-express .modal .modal-body').html(html);
               $('#expressSearch').modal('toggle');

           }else{
                $('.page-express .modal .modal-body').html('<div class="error-code">查询失败，请重试！</div>');
           }*/
//       }
   });

    
    
    
   //zodiac typeahead
   

    $('#zodiac-input').typeahead({source: zodiacArr});
    
    $('#zodiac-search-submit').on('click',function(){
        $('#zodiacSearchModal').modal('hide');
//        alert("success");
        var daily = $(".daily-options input[type='radio']:checked").val();
        var week = $(".week-options input[type='radio']:checked").val();
        var zodiac  = $("#zodiac-input").val()== "" ? "双子座" :  $("#zodiac-input").val();
        var currentZodiac = $('h3.zodiac-name')[0].innerText.substr(0,3);
        var currentDaily = $('header.p-title h3')[1].innerText.substr(0,2);
        var currentWeek = $('header.p-title h3')[2].innerText.substr(0,2);
        
        if(zodiac != currentZodiac){
            //更改图像
            console.log("image",'img/zodiac/' + changeZodiacImg(zodiac) + '.png');
            $('.zodiac-img img').attr('src','img/zodiac/' + changeZodiacImg(zodiac) + '.png');
//            alert("data",zodiac);
            //更改日运势
            changeZodiacFortune(zodiac,daily);
            //更改周运势
            changeZodiacFortune(zodiac,week);
            //更改月运势
            changeZodiacFortune(zodiac,'month');
            //更改年运势
            changeZodiacFortune(zodiac,'year');

        }else{
            if(daily != currentDaily ){
                changeZodiacFortune(zodiacArr[2],daily);
            }
            if(week !=currentWeek){
                changeZodiacFortune(zodiacArr[2],week);
            }
        }
        
        
    });
    
//    $('.page-tickets #ss-datepicker,.page-tickets .input-group-addon:nth-child(5)').on('click',pickDate());
    $('#ss-datepicker,#ts-datepicker').datepicker({
        autoclose: true,//选中之后自动隐藏日期选择框
        clearBtn: true,//清除按钮
        format: "yyyy-mm-dd",
        startDate:'now',
        endDate:'+2m',
        todayHighlight:true,
        orientation:'bottom right',
    });
    
    $('#station-change').on('click',function(){
        var from = $('#start-station').val();
        var to = $('#dest-station').val();
        $('#start-station').val(to);
        $('#dest-station').val(from);
        
    });
    
     $('#ss-submit').on('click',function(){
//         alert("test");
        var from = $('#start-station').val();
        var to = $('#dest-station').val();
        var date = $("#ss-datepicker").val();
         trainSSSearch(from,to,date);
         
    });
    $("#train-submit").on('click',function(){
        var from = $('#start-station').val();
        var to = $('#dest-station').val();
        var date = $("#ts-datepicker").val();
        var train = unescape(encodeURIComponent($('#train-search').val()));
        tarinSearch(train,date,from,to);

    });
    $("#station-search").on('click',function(){
        var sta = $('#train-station-search').val();
        stationSearch(sta);
    });
    $('.page-tickets .modal-body').on('click','.filter-btn',function (e){
        var rex = new RegExp($('#filter').val(), 'i');
        console.log(rex);
        $('.searchable tr').after('<tr></tr>').hide();
        $('.searchable tr').filter(function () {
            return rex.test($(this).text());
        }).show();

    });
    
    
                
    
    
});


/*var pickDate = function(){
     $('#ss-datepicker,#ts-datepicker').datepicker({
        autoclose: true,//选中之后自动隐藏日期选择框
        clearBtn: true,//清除按钮
        format: "yyyy-mm-dd",
        startDate:'now',
        endDate:'+2m',
        todayHighlight:true,
        orientation:'bottom right',
    });
}*/

/*page express*/
var comMap = {}; 
var makeComHtml = function(expCom){
    
    if(expCom.status == 0){
        var comData = expCom.result;
        var html = '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
        for(var i=0; i< comData.length;i++){
            html += '<div class="panel panel-default"><div class="panel-heading" role="tab" id="heading-'+(i+1)+'"><h4 class="panel-title"><a '+(i==0?'': 'class="collapsed"')+' role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-'+(i+1)+'" aria-expanded="true" aria-controls="collapse-'+(i+1)+'">'+comData[i].name+'</a></h4></div><div id="collapse-'+(i+1)+'" class="panel-collapse collapse'+(i==0?' in':'')+'" role="tabpanel" aria-labelledby="heading-'+(i+1)+'"><div class="panel-body"><address><abbr title="快递公司编号"><i class="ion-ios-pricetag-outline"></i>:</abbr>'+ comData[i].type +'<br><abbr title="固定电话"><i class="ion-android-call"></i>:</abbr>'+comData[i].number+'<br><abbt title="移动电话"><i class="ion-iphone"></i>:</abbr>'+ comData[i].tel +'</address></div></div></div>';
        }
        html +='</div>';
//                console.log("html",html);
        $('.page-express .modal .modal-body').html(html);
        $('#expressSearch').modal('toggle');
    }
    else{
        $('.page-express .modal .modal-body').html('<div class="error-code">查询失败，请重试！</div>');
    }
}
/*var getExpressCom = function(){
    var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
    var url = 'http://apis.baidu.com/netpopo/express/express2';
     $.ajax({
        url:url, 
        method: "GET",  
        headers: apikey, 
        dataType: "json",
        async:false, 
        success: function(data){
            console.log("url",url);
            console.log("success",data);
            return data;
        },
        error:function(data){
            console.log("failed",data);
        }
    });
}*/
var getExpComName = function( type){
//    var comList = getExpressCom();
    var comName = type.substr(0,type.length-7);
    var comList = expComList;
    if(comList.status ==0){
        $.each(comList.result, function (index, ele) {
            if(ele.type == type){
               comName = ele.name;
                return true;
//                return comName;
//                alert(comName);
            }
        });
    }
    return comName; 
}
var deliStatus = function( deliverystatus){
    var status = '';
    switch(deliverystatus){
        case '1': status = '正在火速奔向您的途中，您耐心等待';
            break;
        case '2': status = '快递小哥就来啦，请保持电话通畅';
            break;
        case '3': status = '您的快件已签收，谢谢您的厚爱';
            break;
        case '4': status = '哟，派件失败了，小主快快核查一下吧';
            break;
        default: status = '正在火速奔向您的途中，您耐心等待';
            break;
    }
    return status;
}
/*var getExpressList = function(type,num){
    var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
    var url = 'http://apis.baidu.com/netpopo/express/express1?type=' + type + '&number=' + number;
     $.ajax({
        url:url, 
        method: "GET",  
        headers: apikey, 
        async:false, 
        dataType: "json",
        success: function(data){
                console.log("url",url);
            return data;
        },
        error:function(data){
            console.log("failed",data);
        }
    });
}*/
/*page train search*/



var stationSearch = function(station){
    console.log("station",station);
    var apikey = {'apikey':'2cf291486b5dd04551e81c11e1346615'};
    var url = 'http://apis.baidu.com/qunar/qunar_train_service/stationsearch?version=1.0&station=' + station;
    console.log(url);
    $.ajax({
        url:url, 
        method: "GET",  
        headers: apikey, 
        dataType: "json",
        success: function(data){
            console.log("success",data);
            if(data.ret){
                var filters = data.data.filters;
                var trainInfo = data.data.trainInfo;
                var ticketInfo = data.data.ticketInfo;
               
                console.log("filters",filters);
                /*
                    <div class="input-group"> <span class="input-group-addon">Filter</span>

    <input id="filter" type="text" class="form-control" placeholder="Type here...">
</div>
                */
                //搜索框
                var html = '<div class="input-group"><span class="input-group-addon filter-btn">搜索</span><input id="filter" type="text" class="form-control" placeholder="请输入关键字进行搜索" ></div>';
               /* var html = '<div class="form-inline"><div class="input-group"><div class="input-group-addon filter-btn" ><span >过滤</span></div><div class="input-group"><input id="filter" type="text" class="form-control" placeholder="自定义搜索" ></div>';
                for(var x in filters){
                    html += '<div class="form-group"><select class="form-control">';
                   
                    html += '<option>' + filtersName(x)+ '</option>';
                    for(var i=0; i < filters[x].length;i++){
                        html += '<option value="' + filters[x][i].value + '">'+ filters[x][i].name + '</option>';
                    }
                    html += '</select></div>';
                }
                html += '</div></div>';
                */
                //table
                html += '<table class="table table-bordered table-hover"><thead><th>车次</th><th>站点</th><th>类型</th><th>出发站</th><th>终点站</th><th>城市</th><th>时间</th><th>座位信息</th></thead><tbody class="searchable">';
                for(var x in trainInfo){
                    html += '<tr><td>'+trainInfo[x].code+'</td><td>'+trainInfo[x].station+'</td><td>'+ trainInfo[x].stationType +'</td><td>'+ trainInfo[x].deptStation +'</td><td>'+
                    trainInfo[x].arriStation +'</td><td>'+ trainInfo[x].deptCity + '<i class="ion-arrow-right-c"></i>' + trainInfo[x].arriCity +'</td><td>'+ trainInfo[x].deptTime + '<i class="ion-arrow-right-c"></i>'+ trainInfo[x].arriTime +'<br><span>'+ '(历时' + trainInfo[x].interval + ')' +'</span></td><td><ul class="list-group">';
                   
                    for(var j=0; j< ticketInfo[x].length;j++){
                        html += '<li class="list-group-item">'  + '<span class="badge">'+ '￥'+ ticketInfo[x][j].pr +'</span>' + ticketInfo[x][j].type + '</li>';
                       
                    }
                    html += '</ul></td></tr>';
                }
                html += '</tbody></table>';
                $('.page-tickets .modal-body').html(html);
               
                var html2 = '<address>站点:<strong>'+ data.data.city+'</strong><br>总计:<abbr>'+ data.data.count+'</abbr></address>';
                $('.page-tickets .modal-footer').html(html2);
                
            } else{
                $('.page-tickets .modal-body').html('<div class="error-code">'+ data.errmsg +'</div>');
            }
            
        },
        error:function(data){
            console.log("failed",data);

        }
    })
}     

var tarinSearch = function(train,date,from,to){
    console.log("date",date);
    var apikey = {'apikey':'2cf291486b5dd04551e81c11e1346615'};
    var url = 'http://apis.baidu.com/qunar/qunar_train_service/traindetail?version=1.0&train=' + train + '&from=' + from + '&to=' + to +'&date=' + date;
    console.log(url);
     $.ajax({
        url:url, 
        method: "GET",  
        headers: apikey, 
        dataType: "json",
        success: function(data){
            console.log(data);
            if(data.ret){
                var html = '<table class="table table-striped"><thead>';
                var info = data.data.info;
                console.log("head", info.head);
                for(var x in info.head ){
                    html += '<th>' + info.head[x] + '</th>';
//                    console.log("x:",x);
                }
                html += '</thead><tbody>';
                console.log("y",info.head.length);
                for(var i=0; i< info.value.length; i++){
                    html += '<tr>';
                    for(var j=0; j < info.head.length; j++){
                        html += '<td>' +info.value[i][j] + '</td>';
                    }
                    html += '</tr>';
                }
               
                html += '</tbody></table>';
               
                var start = from ? from: info.value[0][1];
                var end = to ? to : info.value[info.value.length -1][1];
                console.log("from",start);
                console.log("end",end);
                
                var html2 = '<address><strong>' + train + '</strong><br>\
                '+ start + '~' + end +   '<br>\
                本趟行程' + data.data.extInfo.intervalMileage +  '公里,行驶' + data.data.extInfo.intervalTime + '<br>\
                全程' + data.data.extInfo.totalMileage +  '公里,行驶' + data.data.extInfo.totalTime + '<br></address>'
                $('.page-tickets .modal-body').html(html);
                $('.page-tickets .modal-footer').html(html2);
            }else{
                $('.page-tickets .modal-body').html('<div class="error-code">'+ data.errmsg +'</div>');
            }
        },
        error:function(data){
            console.log(data);
        }
     });
}
var trainSSSearch = function(from,to,date){
        console.log("date",date);
        var apikey = {'apikey':'2cf291486b5dd04551e81c11e1346615'};
        var url = 'http://apis.baidu.com/qunar/qunar_train_service/s2ssearch?version=1.0&from=' + from + '&to=' + to +'&date=' + date;

        $.ajax({
            url:url, 
            method: "GET",  
            headers: apikey, 
            dataType: "json",
            success: function(data){
                console.log("data",data);
                if(data.ret){
                    var data = data.data.trainList;
                
                    var html = '<table class="table table-striped"><thead>\
                    <th>车次信息</th><th>座位信息</th></thead><tbody>';
                    for(var i=0; i<data.length; i++){
                        html += '<tr><td><div class="ticket-info"><h1>' + data[i].trainNo + '</h1>\
                                <div class="tcdd"><span><i class="ion-android-locate"></i></span><strong class="start-s">' + data[i].from + '</strong><span><i class="ion-android-pin"></i></span><strong class="end-s">' + data[i].to +'</strong></div>\
                                <div class="tcds"><span><i class="ion-ios-clock-outline"></i></span>'+ data[i].startTime + '<span><i class="ion-ios-time-outline"></i></span>' + data[i].endTime +'\
                                </div> <div class="train-ls"><span><i class="ion-speedometer"></i></span><strong>' + data[i].duration + '</strong></div></div></td><td><ul class="list-group">';//</tr>';

                        for(var j=0;j <data[i]['seatInfos'].length; j++){
                            html += '<li class="list-group-item"><span class="badge">' + data[i].seatInfos[j].remainNum + '张\
                                    </span>' + data[i].seatInfos[j].seat  + '(' + data[i].seatInfos[j].seatPrice + '￥/张' + ')\
                                    ' + '</li>';
                        }
                        html += '</ul></td></tr>';
                    }
                    html += '</tbody></table>';
                  
                     $('.page-tickets .modal-body').html(html);
                     $('.page-tickets .modal-footer').html('');
                }else{
                     $('.page-tickets .modal-body').html('<div class="error-code">'+ data.errmsg +'</div>');
                     $('.page-tickets .modal-footer').html('');
                }
            },
            error:function(data){

            }
        });
    }

var changeZodiacImg = function(imgNameChi){
    var zodiacImgName = '';
    switch(imgNameChi){
            
        case '白羊座': zodiacImgName = 'Aries';
            break;
        case '金牛座': zodiacImgName = 'Taurus';
            break;
        case '双子座': zodiacImgName = 'Gemini';
            break;
        case '巨蟹座': zodiacImgName = 'Cancer';
            break;
        case '狮子座': zodiacImgName = 'Leo';
            break;
        case '处女座': zodiacImgName = 'Virgo';
            break;
        case '天枰座': zodiacImgName = 'Libra';
            break;
        case '天蝎座': zodiacImgName = 'Scorpio';
            break;
        case '射手座': zodiacImgName = 'Sagittarius';
            break;
        case '摩羯座': zodiacImgName = 'Capricorn';
            break;
        case '水瓶座': zodiacImgName = 'Aquarius';
            break;
        case '双鱼座': zodiacImgName = 'Pisces';
            break;
        default:
            zodiacImgName = 'Gemini';
            break;
    }
    return zodiacImgName; 
}

var changeZodiacFortune = function(zodiacName,zodiacType){
    var apikey = {'apikey':'2cf291486b5dd04551e81c11e1346615'};
    var url = 'http://apis.baidu.com/bbtapi/constellation/constellation_query?consName=' + zodiacName + '&type=' + zodiacType;
    $.ajax({
       url:url, 
       method: "GET",  
       headers: apikey, 
       dataType: "json",
       success: function(data){
           console.log("success",data);
           console.log("type:",zodiacType);
           var zodiacIcon = '';
           if(data.error_code == 0){
               if(zodiacType == 'today' || zodiacType == 'tomorrow'){
                   //更改zodiac-name
                   var day = (zodiacType == 'today') ? '今日运势':'明日运势';
                   var oldDay = $('header.p-title h3')[1].innerText;
                    $('header.p-title h3')[1].innerText = day;
                   $("[title='" + oldDay + "']").attr('title',day);
                   var dataArr = [data.all,data.health,data.love,data.money,data.work];
                   $('h3.zodiac-name span:first-child')[0].innerText = zodiacName;
                   $('h4.zodiac-qfriend span:last-child')[0].innerText = data.QFriend;
                   $('.zodiac-basic-info h5 span:nth-child(2)')[0].innerText = data.color;
                   $('.zodiac-basic-info h5 span:nth-child(4)')[0].innerText = data.number;
                   //progress bar
                   for(var i=0;i<5;i++){
                       $('.dl-horizontal .progress >div')[i].style.width = dataArr[i];
                       $('.dl-horizontal .progress >div')[i].innerText = dataArr[i];
                   }
                   $('.zodiac-conclude span:last-child')[0].innerText = data.summary;
               }
               
               if(zodiacType == 'week' || zodiacType == 'nextweek'){
                   var week = (zodiacType == 'week') ? '本周运势':'下周运势';
                   var oldWeek = $('header.p-title h3')[2].innerText;
                   $('header.p-title h3')[2].innerText = week;
                   $("[title='" + oldWeek + "']").attr('title',day);
                   
                   $('.zodiac-week-info .row:nth-child(1) h5')[0].innerText = data.date;
                   var dataArr = [data.health,data.job,data.love,data.money,data.work];
                   for(var i=0;i<5;i++){
                       zodiacIcon = $('.zodiac-week-info .row:nth-child(' + (i+2) + ') i')[0];
                       $('.zodiac-week-info .row:nth-child(' + (i+2) + ') p')[0].innerText = dataArr[i];
                       $('.zodiac-week-info .row:nth-child(' + (i+2) + ') p').prepend(zodiacIcon);
                   }
                  
               }
               if(zodiacType == 'year'){
                   $('.zodiac-year-info .row:nth-child(2) span')[0].innerText = data.mima.info;
                   $('.zodiac-year-info .row:nth-child(2) span')[1].innerText = data.mima.text[0];
                   $('.zodiac-year-info .row:nth-child(2)').attr("title",data.mima.text[0]);
                   var dataArr = [data.career,data.love,data.health,data.finance];
                   for(var i=0;i<4;i++){
                       zodiacIcon = $('.zodiac-year-info .row:nth-child(' + (i+3) + ') i')[0];
                       $('.zodiac-year-info .row:nth-child(' + (i+3) + ') p')[0].innerText = dataArr[i];
                       $('.zodiac-year-info .row:nth-child(' + (i+3) + ') p').prepend(zodiacIcon);
                       $('.zodiac-year-info .row:nth-child(' + (i+3) + ')').attr("title", dataArr[i]);
                   }
                
                   $('.zodiac-year-info .row:nth-child(7) p')[0].innerText = data.luckyStone;
                   
               }
               if(zodiacType == 'month'){
//                   console.log("month",data);
                   var dataArr = [data.all,data.health,data.love,data.money,data.work];
                   for(var i=0;i<dataArr.length;i++){
//                       console.log("i:",i);
                       zodiacIcon = $('.zodiac-month-info .row:nth-child(' + (i+2) + ') i')[0];
                       $('.zodiac-month-info .row:nth-child(' + (i+2) + ') p')[0].innerText = dataArr[i];
                       $('.zodiac-month-info .row:nth-child(' + (i+2) + ') p').prepend(zodiacIcon);
                       $('.zodiac-month-info .row:nth-child(' + (i+2) + ')').attr("title", dataArr[i]);
                   }
                   
               }
            } else{
                alert("查询失败，请重新查询!!!");
            }
               
       },
       
       error:function(data){

       }
    });
        
}

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

            
               //更改温度
               var tempHtml = retData.today.lowtemp.substr(0,2) + "°~" + retData.today.lowtemp.substr(0,2) + "°<small>C</small>" ;
               $('#s-today .weather-temp').html(tempHtml);

            

               for(var i=1; i <= forecast.length; i++){

                  
                   $("[href=#" + getWeekEn(forecast[i-1]['week']) + "].nav-item i")[0].className = "wi wi-day-" + getWeatherCode(forecast[i-1].type);

                   //更改温度
                   $('#'+ getWeekEn(forecast[i-1]['week']) + ' .weather-temp').innerHTML = forecast[i-1].lowtemp.substr(0,2) + '°~' + forecast[i-1].hightemp.substr(0,2)+'°' +  "<small>C</small>";
                   //更改天气详细说明
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


var expList = 
{
    "status": "0",
    "msg": "ok",
    "result": {
        "number": "471799413917",
        "type": "sfexpress",
        "list": [
            {
                "time": "2016-04-13 13:30:30",
                "status": "在官网\"运单资料&签收图\",可查看签收人信息"
            },
            {
                "time": "2016-04-13 13:29:36",
                "status": "已签收,感谢使用顺丰,期待再次为您服务"
            },
            {
                "time": "2016-04-13 12:53:37",
                "status": "正在派送途中(派件人:徐程得,电话:15990107893)"
            },
            {
                "time": "2016-04-13 12:41:42",
                "status": "快件到达 【杭州西湖国力大酒店营业点】"
            },
            {
                "time": "2016-04-13 10:07:50",
                "status": "快件离开【杭州总集散中心】,正发往 【杭州西湖国力大酒店营业点】"
            },
            {
                "time": "2016-04-13 05:34:33",
                "status": "快件到达 【杭州总集散中心】"
            },
            {
                "time": "2016-04-13 00:13:51",
                "status": "快件离开【北京首都机场集散中心2】,正发往下一站"
            },
            {
                "time": "2016-04-12 21:49:33",
                "status": "快件到达 【北京首都机场集散中心2】"
            },
            {
                "time": "2016-04-12 20:32:03",
                "status": "快件离开【北京东城俊景苑小区营业点】,正发往 【北京首都机场集散中心2】"
            },
            {
                "time": "2016-04-12 19:44:40",
                "status": "顺丰速运 已收取快件"
            }
        ],
        "deliverystatus": "3",
        "issign": "1"
    }
};
var comArr = {
    "status": "0",
    "msg": "ok",
    "result": [
        {
            "name": "安信达",
            "type": "ANXINDA",
            "letter": "A",
            "tel": "",
            "number": ""
        },
        {
            "name": "AAE",
            "type": "AAEWEB",
            "letter": "A",
            "tel": "400-6100-400",
            "number": "150502359"
        },
        {
            "name": "安捷",
            "type": "ANJELEX",
            "letter": "A",
            "tel": "400-056-5656",
            "number": "AN21981331"
        },
        {
            "name": "百福东方",
            "type": "EES",
            "letter": "B",
            "tel": "010-84722171/72/73",
            "number": "108341481"
        },
        {
            "name": "德邦",
            "type": "DEPPON",
            "letter": "D",
            "tel": "400-830-5555 021-31350884",
            "number": "101117269"
        },
        {
            "name": "DPEX",
            "type": "DPEX",
            "letter": "D",
            "tel": "0755-88297707",
            "number": ""
        },
        {
            "name": "顺丰",
            "type": "sfexpress",
            "letter": "S",
            "tel": "0755-88297707",
            "number": ""
            
        }
    ]
}      