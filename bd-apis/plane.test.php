<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="./css/ionicons.min.css">
        <link rel="stylesheet" href="./css/font-awesome.min.css">

<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<style>
input.form-control{
    font-size: 0.5em;
}
.airline {
  list-style: none;
  margin: 25px 0 22px;
  padding: 0;
  position: relative;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
.airline:after {
  border: 6px solid;
  border-top-width: 13px;
/*  border-color: #00c4f3 transparent transparent transparent;*/
  border-color: #046880 transparent transparent transparent;
  content: "";
  display: block;
  position: absolute;
  bottom: -19px;
  left: 15px;
}

.airline-horizontal:after {
  border-top-width: 6px;
  border-left-width: 13px;
  border-color: transparent transparent transparent #00c4f3;
  top: 15px;
  right: 0;
  bottom: auto;
  left: auto;
}
.airline-horizontal .airline-milestone {
  border-top: 2px solid #00c4f3;
  display: inline;
  float: left;
  margin: 20px 0 0 0;
  padding: 40px 0 0 0;
}
.airline-horizontal .airline-milestone:before {
  top: -17px;
  left: auto;
}
.airline-horizontal .airline-milestone.is-plan:after {
  top: -17px;
  left: 0;
}

.airline-milestone {
/*  border-left: 2px solid #00c4f3;*/
  border-left: 2px solid #046880;
  margin: 0 0 0 20px;
  padding: 0 0 5px 25px;
  position: relative;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.airline-milestone:before {
  border: 7px solid #00c4f3;
  border-radius: 50%;
  content: "";
  display: block;
  position: absolute;
  left: -17px;
  width: 32px;
  height: 32px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.airline-milestone.is-cancel:after,
.airline-milestone.is-delay:after,
.airline-milestone.is-flying:after,
.airline-milestone.is-arrived:after,
.airline-milestone.is-plan:after {
  color: #FFF;
  content: "\f072";
  display: block;
  font-family: "FontAwesome";
  line-height: 32px;
  position: absolute;
  top: 0;
  left: -17px;
  text-align: center;
  width: 32px;
  height: 32px;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
 
}
.airline-milestone.is-plan:before{
    background-color:#5cb85c;
    border: 0;
}
.airline-milestone.is-cancel:before,
.airline-milestone.is-delay:before{
    background-color:#f0ad4e;
/*    background-color:#8DACB8;*/
    border: 0;
}
/*.airline-milestone.is-plan:before,*/
.airline-milestone.is-arrived:before,
.airline-milestone.is-flying:before {
/*  background-color: #EEE;*/
  background-color: #00c4f3;
    
}
.airline-milestone.is-delay:after,
.airline-milestone.is-flying:after{
     /*rotate*/    
    transform:rotate(135deg);
    -ms-transform:rotate(135deg); /* Internet Explorer */
    -moz-transform:rotate(135deg); /* Firefox */
    -webkit-transform:rotate(135deg); /* Safari 和 Chrome */
    -o-transform:rotate(135deg); /* Opera */
}            

.airline-milestone.is-cancel:after,
.airline-milestone.is-arrived:after {
    transform:rotate(200deg);
    -ms-transform:rotate(200deg); /* Internet Explorer */
    -moz-transform:rotate(200deg); /* Firefox */
    -webkit-transform:rotate(200deg); /* Safari 和 Chrome */
    -o-transform:rotate(200deg); /* Opera */
}            
.airline-milestone.is-delay .airline-action .airline-title {
  color: #f0ad4e;
/*  color: #3ad6fb;*/
}

.airline-action {
  background-color: #FFF;
  padding: 12px 10px 12px 20px;
  position: relative;
  top: -15px;
}
.airline-action.is-expandable .airline-title {
  cursor: pointer;
  position: relative;
}
.airline-action.is-expandable .airline-title:focus {
  outline: 0;
  text-decoration: underline;
}
.airline-action.is-expandable .airline-title:after {
  border: 6px solid #666;
  border-color: transparent transparent transparent #666;
  content: "";
  display: block;
  position: absolute;
  top: 6px;
  right: 0;
}
.airline-action.is-expandable .airline-content {
  display: none;
}
.airline-action.is-expandable.is-expanded .airline-title:after {
  border-color: #666 transparent transparent transparent;
  top: 10px;
  right: 5px;
}
.airline-action.is-expandable.is-expanded .airline-content {
  display: inline-block;
    margin: 20px 0 0;
}
.airline-action .airline-title, .airline-action .airline-content {
  word-wrap: break-word;
}
.airline-action .airline-title {
  color: #00c4f3;
  font-size: 18px;
  margin: 0;
}
.airline-action .date {
  display: block;
  font-size: 14px;
  margin-bottom: 15px;
}
.airline-action .airline-content {
  font-size: 14px;
}

.file-list {
  line-height: 1.4;
  list-style: none;
  padding-left: 10px;
}

body {
  background-color: #EEE;
  font-family: Helvetica, Arial, Verdana, sans-serif;
}

.airline-page {
  max-width: 1200px;
  margin: 40px 30px;
}
.airline-action .airline-content{
    display: inline-block;
    width: 90%;
}
.airline-action .to-city-infos,
.airline-action .from-city-infos{
    position: relative;
    display: block;
    width: 45%;
    float: left;
    text-align: center;
}

.airline-action .arrow-right:after{
    color: #ccc;
    font-size: 50px;
    top: 25px;
    position: relative;
    float: left;
    display: block;
    font-family: "FontAwesome";
    content: '\f072';
    width: 10%;
    text-align: center;
    transform: rotate(42deg);
    -ms-transform: rotate(42deg);
    -moz-transform: rotate(42deg);
    -webkit-transform: rotate(42deg);
    -o-transform: rotate(42deg);
}    
p.airport-name{
    font-size: 1.5em;
    font-weight: 500;
    color: #0088cc;
    line-height: 1.5em;
/*    text-align: center;    */
}
p.plane-actual-time{
    color: #337ab7;
    font-weight: 500;
}
p.plane-plan-time{
    color: #337ab7;
    font-weight: 300;
    font-size: 0.75em;
} 

p.plane-plan-time span{
    color: #ccc;
    margin-right: 0.5em;
}
p.plane-plan-time span{
    margin-right: 0.5em;
}
.airline-action h2 i{
    margin: 0 0.5em;
    color: #046880;
}  
.ion-android-plane:before {
/*    content: "\f3a4";*/
    transform: rotate(50deg);
    -ms-transform: rotate(50deg);
    -moz-transform: rotate(50deg);
    -webkit-transform: rotate(90deg);
    -o-transform: rotate(90deg);
}
.airline-action h2 span i,
.airline-action h2 span:nth-child(4){
    color: #ccc;
}    
small.airport-detial{
    cursor: pointer;
    color: #337ab7;
}
/*.airline-page > h2,.airline-page >h1{
    color:#046880;
}*/
.loading .hide{
    display:none;
}            
.loading{
    width: 100%;
    text-align: center;
    margin: 150px auto;
}
.loading i{
    font-size: 3em;
    color: rgba(0, 0, 0, .5);    
}           
.modal-title span:first-child{
    font-size: 1.5em;
    color: #046880;
    line-height: 1em;
}    
.modal-title span:last-child{
    font-size: .85em;
    color: #00c4f3;
    padding-left: 1.5em;    
}    
#airport-accordion .panel-title span{
    color:#ccc;
    margin-left: 0.5em;
}
/*plane  route list group*/    
.plane-route-thead,
.plane-route-tbody,
.plane-route-tbody .list-group .list-group-item{
    display: inline-block;
    line-height: 2em;
    text-align: center;
    width: 100%;
}    
.plane-route-tbody .list-group .list-group-item>div,
.plane-route-tbody i,
.plane-route-thead div{
    position: relative;
    float: left;
}
.plane-route-thead .start-airport{
    margin-right: 3em;
}  
    
.plane-route-thead .arrive-airport{
    margin-left: 3em;
},       

    
.plane-route-tbody .list-group,
.plane-route-tbody .list-group-item{
    width: 100%;
    
}
    
.plane-route-thead .flight-num{
    width: 7em;
}
    
.plane-route-tbody .flight-num{
    padding: 0em;
    font-weight: bold;
    color: #a94442;
    position: relative;
    float: left;
    width: 6em;
}
.plane-route-tbody .flight-num span{
    color: #337ab7;
    font-size: 0.5em;
    position: relative;
    float: left;
    width: 6em;
    padding-left: 1em;
    text-align: center;
}    
    
.flight-num,
.start-airport,
.arrive-airport,
.plane-accuracy-rate,
.flying-date,
.plane-route-tbody i {
    padding: 1em;
}
    
.plane-route-tbody .plane-accuracy-rate{
    min-width: 4em; 
} 
    
.plane-route-tbody i{
    font-size: 1.2em;
    color: #ccc;
    margin-top: 0.2em;
    text-align: center;
}
    
.plane-route-thead .flying-date,
.plane-route-thead .plane-accuracy-rate,
.plane-route-tbody .start-airport span,    
.plane-route-tbody .arrive-airport span{
    margin-left: 0.5em;
}
    
.arrive-time,
.take-off-time{
    padding: 0 1em;
    width: 8em;
    margin-left: 0.5em;
}

    
.plane-route-thead .arrive-time{
    padding: 1em;
    margin-left: 2em;
}
.plane-route-thead .take-off-time{
    padding: 1em;
    margin-left: 0;
    margin-right: 2em;
}
    
.plane-route-tbody strong.plan-time,
.plane-route-tbody span.actual-time{
    position: relative;
    float: left;
}   
.plane-route-tbody span.actual-time{
    color: #ccc;
}
</style>
    </head>
    <body>

        
        <div class="modal fade" role="dialog" aria-labelledby="planeGridSlabel" id="plane-search-modal">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="planeGridSlabel">查询结果</h4>
              </div>
              <div class="loading"><i class="fa fa-spinner fa-pulse"></i></div>  
              <div class="modal-body">
                
              </div>
              <!--<div class="modal-footer"></div>-->
            </div><!-- /.modal-content -->
            
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        

        <div class="form-group">
            <div class="input-group col-md-5 col-xs-5">
                <span class="input-group-addon">航线查询</span>
                <input type="text" class="form-control" id="start-city" placeholder="出发城市" >
                <div class="input-group-addon" id="city-switch"><span><i class="ion-ios-loop"></i></span></div>
                <input type="text" class="form-control" id="dest-city" placeholder="到达城市" >
                <span class="input-group-addon"><i class="icon ion-clock"></i></span>
                <input type="text" class="form-control"  id="plane-datepicker1" style="width:90px" readonly>
                <span class="input-group-addon" data-toggle="modal" data-target="#plane-search-modal" id="route-submit">确定</span>
            </div>

        </div>
        <div class="form-group">
            <div class="input-group col-md-5 col-xs-5">
                <span class="input-group-addon">航班查询</span>
                <input type="text" class="form-control" id="plane-flight" placeholder="航班号" >
                <span class="input-group-addon"><i class="icon ion-clock"></i></span>
                <input type="text" class="form-control"  id="plane-datepicker2" style="width:90px" readonly>
                <span class="input-group-addon" data-toggle="modal" data-target="#plane-search-modal" id="flight-submit">确定</span>
            </div>

        </div>
            
        <script src="./js/vendor/jquery-1.11.2.min.js"></script>
        <script src="./js/jquery-ui.min.js"></script>
        
        <script src="./js/bootstrap.js"></script>
        <script src="./js/bootstrap3-typeahead.js"></script>
<!--        <script src="./js/distpicker.data.js"></script>-->
<!--        <script src="./js/distpicker.js"></script>-->
        <script src="./js/bootstrap-datepicker.js"></script>
        <script src="./js/jquery.oLoader.min.js"></script>
<!--        <script src="./js/bootstrap-table-filter.js"></script>-->

        

        <script>
            
var planeCities = ''; 
var planeNameMap = {};
$(document).ready(function(){
    
    $('#plane-datepicker1,#plane-datepicker2').datepicker({
        autoclose: true,//选中之后自动隐藏日期选择框
        clearBtn: true,//清除按钮
        format: "yyyy-mm-dd",
        startDate:'now',
//        endDate:'+2m',
        todayHighlight:true,
        orientation:'bottom right',
    });
    $('#city-switch').on('click',function(){
        var startCity = $('#start-city').val();
        var destCity = $('#dest-city').val();
        $('#dest-city').val(startCity);
        $('#start-city').val(destCity);
    });
    
    
    
    $.fn.typeahead.Constructor.prototype.blur = function() {
       var that = this;
          setTimeout(function () { that.hide() }, 250);
    };
    
    
    $('#start-city,#dest-city').typeahead({
        source: function (query, process) {
            $.when(
                getPlaneCities()
                
            ).then(function(data){
                console.log("getPlaneCities",planeCities);
                //success
                 if(planeCities == ''|| planeCities.error_code != 0 ){
                    //获取支持的城市列表
                     setTimeout(1000);
//                    getPlaneCities();
                }else{
                    var names = [];
                    $.each(planeCities.result, function (index, ele) {
                        planeNameMap[ele.city] = ele.spell;
                        names.push(ele.city);
                    });
                    process(names);//调用处理函数，格式化
                }
            },function(data){});
        },
        highlighter: function(item) {
            return   item + "<small>"+ planeNameMap[item] +"</small>";
        },

        updater: function(item) {
            console.log("'" + item + "' selected.");
            return item;
        },
        afterSelect: function (item) {
//                        $("#").val(planeNameMap[item]);
            console.log(planeNameMap[item]);//取出选中项的值
        }
    });
    
    $('#route-submit').on('click',function(){
        var startCity = $('#start-city').val();
        var endCity = $('#dest-city').val();
        var date = $('#plane-datepicker1').val();
        getPlaneRoute(startCity,endCity,date);
        
    });
    $('#flight-submit').on('click',function(){
        var flight = $('#plane-flight').val();
        var date = $('#plane-datepicker2').val();
        getPlaneFlight(flight,date);
    });
    /*airline collapse*/

    $('.modal-body').on('click','.airline-action.is-expandable .airline-title',function() {
        $(this).parent().toggleClass('is-expanded');
        $(this).siblings('.airline-content').attr('aria-expanded', $(this).parent().hasClass('is-expanded'));
    });

    // Expand or navigate back and forth between sections
    $('.airline-action.is-expandable .airline-title').keyup(function(e) {
        if (e.which == 13){ //Enter key pressed
            $(this).click();
        } else if (e.which == 37 ||e.which == 38) { // Left or Up
            $(this).closest('.airline-milestone').prev('.airline-milestone').find('.airline-action .airline-title').focus();
        } else if (e.which == 39 ||e.which == 40) { // Right or Down
            $(this).closest('.airline-milestone').next('.airline-milestone').find('.airline-action .airline-title').focus();
        }
    });
    
    //get airport detail:
    $('.modal-body').on('click','.airline .airport-detial',function(){
        var code = $(this).attr('name');
        getAirportDetail(code);
    });
});

            
            
var showLoading = function(){
    $('.loading').removeClass('hide');
}
var hideLoading = function(){
    $('.loading').addClass('hide');
}

var getPlaneRoute = function(start,end,date=''){
    var apiKey = '33760b60b674362611ac6241386f5f59';
    var url = 'http://apis.juhe.cn/plan/bc?key='+ apiKey +'&start='+ start +'&end=' + end + '&date='+date;
    $.ajax({
        url:url, 
        method: "GET",  
        dataType: "jsonp",
        callback:'callback',
        beforeSend:function(data){
          showLoading();  
        },
        success: function(data){
            console.log("url",url);
            console.log("get plane route success",data);
            if(data.error_code == 0){
                var routeHtml = '<div class="plane-route-tbody"><div class="list-group">';
                var routeData = data.result;
                var routeHeader = '<div class="plane-route-thead "><div class="flight-num">航班</div><div class="start-airport">出发机场</div><div class="arrive-airport">到达机场</div><div class="take-off-time">起飞时间</div><div class="arrive-time">到达时间</div><div class="plane-accuracy-rate">准确率</div><div class="flying-date">日期</div></div>'
                $.each(routeData,function(index,ele){
                   routeHtml += '<div class="list-group-item"><div class="flight-num">'+ele.FlightNum+'<span class="flight-company">'+ele.Airline+'</span></div><div class="start-airport">'+ele.DepCity+'<span>'+ele.DepTerminal+'</span>'+'</div><i class="ion-android-plane"></i><div class="arrive-airport">' + ele.ArrCity + '<span>' + ele.ArrTerminal + '</span></div><div class="take-off-time"><strong class="plan-time">计划'+ele.DepTime+'</strong><span class="actual-time">实际'+ ele.Dexpected +'</span></div><i class="ion-clock"></i><div class="arrive-time"><strong class="plan-time">计划' + ele.ArrTime + '</strong><span class="actual-time">实际' + ele.Aexpected + '</span></div><div class="plane-accuracy-rate">' + ele.OnTimeRate +'</div><div class="flying-date">'+ ele.FlightDate + '</div></div>';
                });
                routeHtml += '</div></div>';
                $('.modal-body').html(routeHeader+routeHtml);
                hideLoading();
            }
        },
        error:function(data){
            console.log("failed",data);
        }
    });
    
}            
var getPlaneCities = function(){
    
    if( planeCities == ''|| planeCities.error_code != 0 ){
        var apiKey = '33760b60b674362611ac6241386f5f59';
        var url = 'http://apis.juhe.cn/plan/city?key='+apiKey;
        $.ajax({
            url:url, 
            method: "GET",  
            dataType: "jsonp",
            callback:'callback',
            success: function(data){
                console.log("url",url);
                console.log("get plane cities success",data);
                planeCities = data;
            },
            error:function(data){
                console.log("failed",data);
            }
        });
        
    }
    
}
var getPlaneStateIcon = function(statid){
    var stateIcon = '';
    switch(statid){
        case '1': stateIcon = 'is-plan';
            break;
        case '2': stateIcon = 'is-flying';
            break;
        case '3': stateIcon = 'is-arrived';
            break;
        case '4': stateIcon = 'is-delay';
            break;
        case '5': stateIcon = 'is-cancel';
            break;
        default: stateIcon = 'is-arrived';
            break;
    }
    return stateIcon;
}
/**
* 将JSON内容转为数据，并返回
* @param string code [机场国际三字编号]
*/  
var getAirportDetail = function(code){
    var apiKey = '33760b60b674362611ac6241386f5f59';
    var url = 'http://apis.juhe.cn/plan/airport?key='+apiKey+'&code=' + code;
    console.log("get airport url");
    $.ajax({
        url:url, 
        method: "GET",  
        dataType: "jsonp",
        callback:'callback',
        beforeSend:function(data){
          showLoading();  
        },
        success:function(data){
            console.log("get airport detail successed",data);
            if(data.error_code == 0){
                var airportHtml = '<div class="panel-group" id="airport-accordion" role="tablist" aria-multiselectable="true">';
                $.each(data.result,function(index,ele){
                    airportHtml += '<div class="panel panel-default">\
                        <div class="panel-heading" role="tab" id="airportHead'+ index+'">\
                            <h4 class="panel-title">\
                                <a role="button" data-toggle="collapse" '+(index == 0 ? 'class="collapsed"':'')+ 'data-parent="#airport-accordion" href="#airport-collapse-'+index+'" aria-expanded="true" aria-controls="airport-collapse-'+index+'">\
          <span class="airport-city">'+ele.city+'</span>'+ ele.airport + '<span title="国际机场三字编码">('+ele.airport3+'</span><span title="国际机场四字编码">'+ele.airport4+')</span>'+'</a></h4></div>\
                    <div id="airport-collapse-'+index+'" class="panel-collapse collapse'+(index == 0? ' in':'')+'" role="tabpanel" aria-labelledby="airportHead'+ index+'">\
                        <div class="panel-body">'+ ele.introduce +'\
                        </div>\
                    </div>\
                </div>';
       
                   
                });
                airportHtml +=  '</div>';
                $('.modal-body').html(airportHtml);
                hideLoading();
            }else{
                $('.modal-body').html('<div class="error-code">机场攻略查询失败，请重试</div>');
            }
            
        },
        error:function(data){
            console.log("failed",data);
        }
    });
}
/**
* 将JSON内容转为数据，并返回
* @param string flight [航班号]
* @param string date [日期]
*/         
var getPlaneFlight = function(flight,date=''){
    var apiKey = '33760b60b674362611ac6241386f5f59';
    var url = 'http://apis.juhe.cn/plan/snew?name=' + flight + '&date=' + date + '&key='+apiKey;
    $.ajax({
        url:url, 
        method: "GET",  
        dataType: "jsonp",
        callback:'callback',
        beforeSend:function(data){
            console.log("beforesend",data);
            showLoading();
        },
        success: function(data){
            console.log("url",url);
            console.log("get plane flight success",data);
           
            if(data.error_code == 0 ){
                var planeInfo = data.result.info;
                var planeList = data.result.list;
                var flightHeader = '<span>'+planeInfo.company+'</span>\
                                    <span>'+ planeInfo.fno +'</span>';
                $('.modal-title').html(flightHeader);
                var flightHtml = '<article class="airline-page">\
                                    <ul class="airline">\
                                        <li class="airline-milestone ' + getPlaneStateIcon(planeInfo.stateid) + ' airline-start ">\
                                            <div class="airline-action">\
                                                <h2 class="airline-title"><span>' + planeInfo.from_city+ '<i class="ion-location"></i></span>' + '<i class="ion-android-plane"></i><span>'+ planeInfo.to_city + '<i class="ion-location"></i></span> <span>'+planeInfo.state+'</span></h2>\
                                                <span class="date">'+ planeInfo.ddtime_full + '</span>\
                                                <div class="airline-content">\
                                                    <div class="from-city-infos"><p class="airport-name">'+planeInfo.from + '</p><p class="plane-plan-time"><span>计划起飞</span>'+ planeInfo.qftime+'</p><p class="plane-actual-time"><span>实际起飞</span>'+ planeInfo.sjqftime+'</p><p><i class="wi wi-day-' + getWeatherCode(planeInfo.from_weather)+'"></i><small>'+ planeInfo.from_weather_temperature+'</small><small class="airport-detial" name="'+planeInfo.form_code+'">机场攻略</small></p></div>\
                                                    <div class="arrow-right"></div>\
                                                    <div class="to-city-infos"><p class="airport-name">'+planeInfo.to+'</p><p class="plane-plan-time"><span>计划到达</span>'+ planeInfo.yjddtime+'</p><p class="plane-actual-time"><span>实际到达</span>'+ planeInfo.sjddtime+'</p><p><i class="wi wi-day-' + getWeatherCode(planeInfo.to_weather)+'"></i><small>'+ planeInfo.to_weather_temperature+'</small><small class="airport-detial" name="'+planeInfo.to_code+'">机场攻略</small></p></div>\
                                                </div>\
                                            </div>\
                                        </li>';
                $.each(planeList,function(index,ele){
                   flightHtml += '<li class="airline-milestone '+getPlaneStateIcon(ele.stateid)+'">\
                                    <div class="airline-action is-expandable">\
                                        <h2 class="airline-title" aria-controls="airline-milestone-content-'+index+'">' + '<span>' + ele.qf_city + '<i class="ion-location"></i></span><i class="ion-android-plane"></i><span><i class="ion-location"></i>'+ ele.dd_city + '</span> <span>' + ele.state + '</span></h2>\
                                        <div class="airline-content" id="airline-milestone-content-'+index+'" role="region" aria-expanded="false">\
                                            <div class="from-city-infos"><p class="airport-name">'+ele.qf+'</p><p class="plane-plan-time"><span>计划起飞</span>'+ ele.jhqftime_full+'</p><p class="plane-actual-time"><span>实际起飞</span>'+ ele.sjqftime_full+'</p><p><small class="airport-detial" name="'+ele.qf_citycode+'">机场攻略</small></p></div>\
                                            <div class="arrow-right"></div>\
                                            <div class="to-city-infos"><p class="airport-name">'+ele.dd+'</p><p class="plane-plan-time"><span>计划到达</span>'+ ele.jhddtime_full+'</p><p class="plane-actual-time"><span>实际到达</span>'+ ele.sjddtime_full+'</p><p><small class="airport-detial" name="'+ele.dd_citycode+'">机场攻略</small></p></div>\
                                        </div>\
                                    </div>\
                                </li>'; 
                });
                flightHtml += '</ul></article>';
            }else{
                flightHtml = '<div class="error-code">航班查询失败，'+ data.reason +'</div>'
            }
            hideLoading();
            $('.modal .modal-body').html(flightHtml);
        },
        error:function(data){
            console.log("failed",data);
        }
    });
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
      case'雷阵雨并伴有冰雹': code = 'hail';
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
      case'阵雪': code = 'snow';
      break;
      case'小雪': code = 'snow';
      break;
      case'中雪': code = 'snow';
      break;
      case'大雪': code = 'snow';
      break;
      case'暴雪': code = 'snowthunderstorm';
      break;
      case'雾': code = 'fog';
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


        </script>
    </body>
</html>