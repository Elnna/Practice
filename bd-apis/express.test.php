<?php 
header('Content-type:text/html;charset=utf-8');
require_once('./api/weather.code.php');
$data = array(
    array(
          "name"=>"感冒指数",
          "code" => "gm",
          "index" => "",
          "details" =>"各项气象条件适宜，发生感冒机率较低。但请避免长期处于空调房间中，以防感冒。",
          "otherName" => "",
        ),
    array(
          "code" => "fs",
          "details" =>"紫外线强度较弱，建议涂擦SPF在12-15之间，PA+的防晒护肤品。",
          "index" => "较弱",
          "name" =>"防晒指数",
          "otherName" => "",
        ),
    array(
          "name"=>"穿衣指数",
          "code" => "ct",
          "index" => "",
          "details" =>"天气热，建议着短裙、短裤、短薄外套、T恤等夏季服装。",
          "otherName" => "",
        ),
    array(
          "code" => "yd",
          "details" =>"阴天，且天气较热，请减少运动时间并降低运动强度。",
          "index" => "较不宜",
          "name" =>"运动指数",
          "otherName" => "",
        ),
    array(
          "name"=>"洗车指数",
          "code" => "xc",
          "index" => "不宜",
          "details" =>"不宜洗车，未来24小时内有雨，如果在此期间洗车，雨水和路上的泥水可能会再次弄脏您的爱车。",
          "otherName" => "",
        ),
    array(
          "code" => "ls",
          "details" =>"天气阴沉，不利于水分的迅速蒸发，不太适宜晾晒。若需要晾晒，请尽量选择通风的地点。",
          "index" => "不太适宜",
          "name" =>"晾晒指数",
          "otherName" => "",
        ),
      
      );
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="./css/ionicons.min.css">
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<!--        <link rel="../src/stylesheet" href="bootstrap-table-filter.css">-->

<!--    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<!--    <script src="../src/bootstrap-table-filter.js"></script>-->
        
        <style>
        
 @import url(http://fonts.googleapis.com/css?family=Raleway:400,900);

body{
  font-family: 'Raleway', sans-serif;
  color: #333;
}

header h1{
  text-align: center;
  font-weight: bold;
  margin-top: 0;
}
  
 header p{
   text-align: center;
   margin-bottom: 0;
 }

.hexa{
  border: 0px;
  float: left;
  text-align: center;
  height: 35px;
  width: 60px;
  font-size: 22px;
  background: #f0f0f0;
  color: #3c3c3c;
  position: relative;
  margin-top: 15px;
}

.hexa:before{
  content: ""; 
  position: absolute; 
  left: 0; 
  width: 0; 
  height: 0;
  border-bottom: 15px solid #f0f0f0;
  border-left: 30px solid transparent;
  border-right: 30px solid transparent;
  top: -15px;
}

.hexa:after{
  content: ""; 
  position: absolute; 
  left: 0; 
  width: 0; 
  height: 0;
  border-left: 30px solid transparent;
  border-right: 30px solid transparent;
  border-top: 15px solid #f0f0f0;
  bottom: -15px;
}

.timeline {
  position: relative;
  padding: 0;
  width: 100%;
  margin-top: 20px;
  list-style-type: none;
}

.timeline:before {
  position: absolute;
  left: 50%;
  top: 0;
  content: ' ';
  display: block;
  width: 2px;
  height: 100%;
  margin-left: -1px;
  background: rgb(213,213,213);
  background: -moz-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(30,87,153,1)), color-stop(100%,rgba(125,185,232,1)));
  background: -webkit-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: -o-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: -ms-linear-gradient(top, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  background: linear-gradient(to bottom, rgba(213,213,213,0) 0%, rgb(213,213,213) 8%, rgb(213,213,213) 92%, rgba(213,213,213,0) 100%);
  z-index: 5;
}

.timeline li {
  padding: 2em 0;
}

.timeline .hexa{
  width: 16px;
  height: 10px;
  position: absolute;
  background: #00c4f3;
  z-index: 5;
  left: 0;
  right: 0;
  margin-left:auto;
  margin-right:auto;
  top: -30px;
  margin-top: 0;
}

.timeline .hexa:before {
  border-bottom: 4px solid #00c4f3;
  border-left-width: 8px;
  border-right-width: 8px;
  top: -4px;
}

.timeline .hexa:after {
  border-left-width: 8px;
  border-right-width: 8px;
  border-top: 4px solid #00c4f3;
  bottom: -4px;
}

.direction-l,
.direction-r {
  float: none;
  width: 100%;
  text-align: center;
}

.flag-wrapper {
  text-align: center;
  position: relative;
}

.flag {
  position: relative;
  display: inline;
  background: rgb(255,255,255);
  font-weight: 600;
  z-index: 15;
  padding: 6px 10px;
  text-align: left;
  border-radius: 5px;
}

.direction-l .flag:after,
.direction-r .flag:after {
  content: "";
  position: absolute;
  left: 50%;
  top: -15px;
  height: 0;
  width: 0;
  margin-left: -8px;
  border: solid transparent;
  border-bottom-color: rgb(255,255,255);
  border-width: 8px;
  pointer-events: none;
}

.direction-l .flag {
  -webkit-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  -moz-box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  box-shadow: -1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
}

.direction-r .flag {
  -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  -moz-box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
  box-shadow: 1px 1px 1px rgba(0,0,0,0.15), 0 0 1px rgba(0,0,0,0.15);
}

.time-wrapper {
  display: block;
  position: relative;
  margin: 4px 0 0 0;
  z-index: 14;
  line-height: 1em;
  vertical-align: middle;
  color: #fff;
}

.direction-l .time-wrapper {
  float: none;
}

.direction-r .time-wrapper {
  float: none;
}

.time {
  background: #00c4f3;
  display: inline-block;
  padding: 8px;
}

.desc {
  position: relative;
  margin: 1em 0 0 0;
  padding: 1em;
  background: rgb(254,254,254);
  -webkit-box-shadow: 0 0 1px rgba(0,0,0,0.20);
  -moz-box-shadow: 0 0 1px rgba(0,0,0,0.20);
  box-shadow: 0 0 1px rgba(0,0,0,0.20);
  z-index: 15;
}

.direction-l .desc,
.direction-r .desc {
  position: relative;
  margin: 1em 1em 0 1em;
  padding: 1em;
  z-index: 15;
}

@media(min-width: 768px){
  .timeline {
    width: 660px;
    margin: 0 auto;
    margin-top: 20px;
  }

  .timeline li:after {
    content: "";
    display: block;
    height: 0;
    clear: both;
    visibility: hidden;
  }
  
  .timeline .hexa {
    left: -28px;
    right: auto;
    top: 8px;
  }

  .timeline .direction-l .hexa {
    left: auto;
    right: -28px;
  }

  .direction-l {
    position: relative;
    width: 310px;
    float: left;
    text-align: right;
  }

  .direction-r {
    position: relative;
    width: 310px;
    float: right;
    text-align: left;
  }

  .flag-wrapper {
    display: inline-block;
  }
  
  .flag {
    font-size: 18px;
  }

  .direction-l .flag:after {
    left: auto;
    right: -16px;
    top: 50%;
    margin-top: -8px;
    border: solid transparent;
    border-left-color: rgb(254,254,254);
    border-width: 8px;
  }

  .direction-r .flag:after {
    top: 50%;
    margin-top: -8px;
    border: solid transparent;
    border-right-color: rgb(254,254,254);
    border-width: 8px;
    left: -8px;
  }

  .time-wrapper {
    display: inline;
    vertical-align: middle;
    margin: 0;
  }

  .direction-l .time-wrapper {
    float: left;
  }

  .direction-r .time-wrapper {
    float: right;
  }

  .time {
    padding: 5px 10px;
  }

  .direction-r .desc {
    margin: 1em 0 0 0.75em;
  }
}

@media(min-width: 992px){
  .timeline {
    width: 800px;
    margin: 0 auto;
    margin-top: 20px;
  }

  .direction-l {
    position: relative;
    width: 380px;
    float: left;
    text-align: right;
  }

  .direction-r {
    position: relative;
    width: 380px;
    float: right;
    text-align: left;
  }
}
            
.weather-index{
    display: inline-block;
    color: #ccc;
    
}            
.weather-index div{
    display: block;
    width: 3em;
    position: relative;
    float: left;
    text-align: center;
    margin-right: 1em;
}
.weather-index i{
    font-size: 3em;
} 
.weather-index small{
    position: relative;
    float: left;
    width: 3em;
}            
            
        </style>
    </head>
    <body>
        <div class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" id="expressSearch">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">查询结果</h4>
              </div>
                
              <div class="modal-body">
                
              </div>
              <div class="modal-footer"></div>
            </div><!-- /.modal-content -->
            
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        
        
        

        
       <div class="form-horizontal">
            <div class="form-group">
                <label for="express-com" class="col-sm-3 control-label">快递公司</label>
                <div class=" input-group col-sm-8">
                    <span class="input-group-addon" id="expressComList"><i class="ion-ios-list-outline"></i></span>
                    <input type="text" class="form-control" id="express-type" placeholder="快递公司 顺丰 ">
                    <input type="hidden" class="form-control" id="express-type-code" placeholder="快递公司编号 顺丰 sf">
                </div>
            </div>
            <div class="form-group">
                <label for="express-nu" class="col-sm-3 control-label">单号</label>
                <div class="input-group col-sm-8">
                    <span class="input-group-addon"><i class="ion-merge"></i></span>
                    <input type="email" class="form-control" id="express-nu" placeholder="快递单号">
                </div>
            </div>
             <div class="form-group">
                 <div class="col-sm-offset-3 col-sm-8">
                     <button type="submit" class="btn btn-primary" id="express-submit">确定</button>
                 </div>
              </div>
        </div>
       <div class="weather-index">
           <?php foreach($data as $ik => $iv):?>
            <div class="weather-<?php echo $iv['code'];?>"><i data-toggle="popover" title="<?php echo $iv['name'];?>"  data-content="<?php echo $iv['details'] ?>" data-container="body" class="<?php echo getWeatherIndexIcon($iv['code']);?>"></i><small><?php echo $iv['index']; ?></small></div>
            <?php endforeach;?>
        </div>
        
        
        
        <script src="./js/vendor/jquery-1.11.2.min.js"></script>
        <script src="./js/jquery-ui.min.js"></script>
        
        <script src="./js/bootstrap.js"></script>
        <script src="./js/bootstrap3-typeahead.js"></script>
<!--        <script src="./js/bootstrap-datepicker.js"></script>-->
<!--        <script src="./js/bootstrap-table-filter.js"></script>-->

        

        <script>
            
            
            $(document).ready(function(){
                $("[data-toggle=popover]").popover({
                    trigger:'manual',
                    placement : 'bottom', //placement of the popover. also can use top, bottom, left or right
                   
//                    title : '<div style="text-align:center; color:red; text-decoration:underline; font-size:14px;"> Muah ha ha</div>', //this is the top title bar of the popover. add some basic css
                    html: 'true', //needed to show html of course
                    content : '<div id="popOverBox"><img src="http://www.hd-report.com/wp-content/uploads/2008/08/mr-evil.jpg" width="251" height="201" /></div>', //this is the content of the html box. add the image here or anything you want really.
                    animation: false
                }).on("mouseenter", function () {
                    var _this = this;
                    $(this).popover("show");
                    $(this).siblings(".popover").on("mouseleave", function () {
                    $(_this).popover('hide');
                    });
                }).on("mouseleave", function () {
                    var _this = this;
                    setTimeout(function () {
                    if (!$(".popover:hover").length) {
                    $(_this).popover("hide")
                    }
                    }, 100);
                });
               /* $('select').on('click',function(){
                        getExpressCom();
                });
                */
                /*$("#local_object_data").typeahead({
                        source: function (query, process) {
                            var names = [];
                            $.each(localObjectData, function (index, ele) {
                                objMap[ele.name] = ele.id;
                                names.push(ele.name);
                            });
                            process(names);//调用处理函数，格式化

                        },
                        afterSelect: function (item) {
                            console.log(objMap[item]);//取出选中项的值
                        }
                    });*/
                
                $("#express-type").typeahead({
                    source: function (query, process) {
                            var names = [];
                            $.each(comArr.result, function (index, ele) {
                                comMap[ele.name] = ele.type;
                                names.push(ele.name);
                            });
                            process(names);//调用处理函数，格式化

                        },
                    afterSelect: function (item) {
                        $("#express-type-code").val(comMap[item]);
                        console.log(comMap[item]);//取出选中项的值
                    }
                });
                
                
                $('#expressComList').on('click',function(){
                    //查询快递公司
//                    alert("test");
                    //var expCom = getExpressCom();
                   
                    var expCom = comArr;
                     console.log("data",expCom);
                    if(expCom.status == 0){
                        var comData = expCom.result;
                        var html = '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">';
                        for(var i=0; i< comData.length;i++){
                            html += '<div class="panel panel-default"><div class="panel-heading" role="tab" id="heading-'+(i+1)+'"><h4 class="panel-title"><a '+(i==0?'': 'class="collapsed"')+' role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-'+(i+1)+'" aria-expanded="true" aria-controls="collapse-'+(i+1)+'">'+comData[i].name+'</a></h4></div><div id="collapse-'+(i+1)+'" class="panel-collapse collapse'+(i==0?' in':'')+'" role="tabpanel" aria-labelledby="heading-'+(i+1)+'"><div class="panel-body"><address><abbr title="快递公司编号"><i class="ion-ios-pricetag-outline"></i>:</abbr>'+ comData[i].type +'<br><abbr title="固定电话"><i class="ion-android-call"></i>:</abbr>'+comData[i].number+'<br><abbt title="移动电话"><i class="ion-iphone"></i>:</abbr>'+ comData[i].tel +'</address></div></div></div>';
                        }
                        html +='</div>';
                        $('.modal .modal-body').html(html);
                        $('#expressSearch').modal('toggle');
                    }
                    else{
                        $('.modal .modal-body').html('<div class="error-code">查询失败，请重试！</div>');
                    }

                });
               $('#express-submit').on('click',function(){
                  /* var type = $('#express-type-code').val();
                   var num = $('#express-nu').val();
                   var listData = getExpressList(type,num); */
                   
                   /*ion-location*/
//                   alert("test");
//                   console.log("test");
                   var expListData = expList;
                   console.log(expListData);
                   if(expListData.status == 0){
                       expListData = expListData.result;
                       var comName = getExpComName(expListData.type);
//                       var comName = '顺丰';
                       console.log(deliStatus(expListData.deliverystatus));
                       var html = '<header><p>'+deliStatus(expListData.deliverystatus)+'</p>\
                                  <h1>'+ comName + '<span>' + expListData.number+'</span></h1></header><ul class="timeline">';
                       for(var i=0; i< expListData.list.length;i++){
                           html += '<li><div class="direction-'+(i%2==0? 'r':'l') +'"><div class="flag-wrapper"><span class="hexa"></span><span class="flag">'+expListData.list[i].time.substr(11,9)+'</span><span class="time-wrapper"><span class="time">'+ expListData.list[i].time.substr(0,10) +'</span></span></div><div class="desc">'+ expListData.list[i].status +'</div></div></li>';
                       }
                       html +='</ul>';
                       console.log(html);
                       $('body').html(html);
                       
                   }else{
                        $('.modal .modal-body').html('<div class="error-code">查询失败，请重试！</div>');
                   }
               });

        });
       

/*
var localObjectData = [{ id: 1, name: 'beijing' }, { id: 2, name: 'shanghai' }, { id: 3, name: 'guangzhou' }, { id: 4, name: 'sz' }];
var objMap = {};
*/

            
var comMap = {}; 
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
var getExpressCom = function(){
    var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
    var url = 'http://apis.baidu.com/netpopo/express/express2';
     $.ajax({
        url:url, 
        method: "GET",  
        headers: apikey, 
        dataType: "json",
        success: function(data){
            console.log("url",url);
            return data;
        },
        error:function(data){

        }
    });
}
var getExpComName = function( type){
//    var comList = getExpressCom();
    var comName = type.substr(0,type.length-7);
    var comList = comArr;
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
var getExpressList = function(type,num){
    var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
    var url = 'http://apis.baidu.com/netpopo/express/express1?type=' + type + '&number=' + number;
     $.ajax({
        url:url, 
        method: "GET",  
        headers: apikey, 
        dataType: "json",
        success: function(data){
                console.log("url",url);
            return data;
        },
        error:function(data){
            console.log("failed",data);
        }
    });
}
            
    

        </script>
    </body>
</html>