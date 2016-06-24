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
    </head>
    <body>
        
        <div class="modal fade" role="dialog" aria-labelledby="gridSystemModalLabel" id="trainSearch">
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
        
        <div class="test"></div>
      <div class="form-group">
          <div class="input-group col-md-6 col-xs-6">
            <div class="input-group-addon"><span>站站查询</span></div>
            <input type="text" class="form-control" id="start-station" placeholder="出发站" >
            <div class="input-group-addon" id="station-change"><span>换</span></div>                    <input type="text" class="form-control" id="dest-station" placeholder="到达站" >
            <div class="input-group-addon"><i class="icon ion-clock"></i></div>
            <input type="text" class="form-control"  id="ss-datepicker" style="width:90px" readonly >
            <div class="input-group-addon" data-toggle="modal" data-target="#trainSearch"><span id="ss-submit">确定</span></div> 
        </div>

        </div>
            <div class="form-group">
                <div class="input-group col-md-6 col-xs-6">
                    <div class="input-group-addon"><span>车次查询</span></div>
                    <input type="text" class="form-control" id="train-search" placeholder="车次 G101" style="width:180px">
                    <div class="input-group-addon"><i class="icon ion-clock"></i></div>
                    <input type="text" class="form-control"  id="ts-datepicker" readonly>
                    <div class="input-group-addon" data-toggle="modal" data-target="#trainSearch"><span id="train-submit">确定</span></div>
                </div>
                <p class="help-block">车次的站站查询 = <span>站站查询</span>站点 + <span>车次查询</span>车次、时间</p>

            </div>
        <div class="form-group">
            <div class="input-group col-md-6 col-xs-6">
                <div class="input-group-addon"><span>车站查询</span></div>
                <input type="text" class="form-control" id="train-station-search" placeholder="北京西">
                <div class="input-group-addon" data-toggle="modal" data-target="#trainSearch"><span id="station-search">确定</span></div>
            </div>
        </div>
        
        <script src="./js/vendor/jquery-1.11.2.min.js"></script>
        <script src="./js/jquery-ui.min.js"></script>
        
        <script src="./js/bootstrap.js"></script>
        <script src="./js/bootstrap3-typeahead.js"></script>
        <script src="./js/bootstrap-datepicker.js"></script>
        <script src="./js/bootstrap-table-filter.js"></script>

        

        <script>
            
            
            $(document).ready(function(){
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
                    $('#start-station').val(endSta);
                    $('#dest-station').val(startSta);
                    
                   
                });
                $('#ss-submit').on('click',function(){
                    var from = $('#start-station').val();
                    var to = $('#dest-station').val();
                    var date = $("#ss-datepicker").val();
                     trainSSSearch(from,to,date);
                });
                $("#train-submit").on('click',function(){
                    var from = $('#start-station').val();
                    var to = $('#dest-station').val();
                    var date = $("#ts-datepicker").val();
//                     var train = 
                    var train = unescape(encodeURIComponent($('#train-search').val()));
                    tarinSearch(train,date,from,to);

                });
                $('#station-search').on('click',function(){
                    var sta = $('#train-station-search').val();
                    stationSearch(sta);
                });
                
                $('.modal-body').on('click','.filter-btn',function (e){
                    
//                    console.log("filter");
                    var rex = new RegExp($('#filter').val(), 'i');
//                    alert(rex);
                    console.log(rex);
                    $('.searchable tr').after('<tr></tr>').hide();
                    $('.searchable tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();

                });
                
                
        });
            
var filtersName = function(filter){
    var fname = '';
    switch(filter){
        case 'arriTimeRange': fname='到站时间';
            break;
        case 'deptTimeRange': fname='发车时间';
            break;
        case 'station': fname = '站点信息'
            break;
        case 'stationType': fname='站点类型';
            break;
        case 'ticketType': fname='座位类型';
            break;
        case 'trainType': fname='车次类型';
            break;
        default:
            break;
    }
    return fname;
}

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
                
                //搜索框
                var html = '<div class="form-inline"><div class="input-group"><div class="input-group-addon filter-btn" ><span >过滤</span></div><div class="input-group"><input id="filter" type="text" class="form-control" placeholder="自定义搜索" ></div>';
                for(var x in filters){
                    html += '<div class="form-group"><select class="form-control">';
                   
                    html += '<option>' + filtersName(x)+ '</option>';
                    for(var i=0; i < filters[x].length;i++){
                        html += '<option value="' + filters[x][i].value + '">'+ filters[x][i].name + '</option>';
                    }
                    html += '</select></div>';
                }
                html += '</div></div>';
                
                //table
                html += '<table class="table table-bordered table-hover"><thead><th>车次</th><th>站点</th><th>类型</th><th>出发站</th><th>终点站</th><th>城市</th><th>时间</th><th>座位信息</th></thead><tbody class="searchable">';
                for(var x in trainInfo){
                    html += '<tr><td>'+trainInfo[x].code+'</td><td>'+trainInfo[x].station+'</td><td>'+ trainInfo[x].stationType +'</td><td>'+ trainInfo[x].deptStation +'</td><td>'+
                    trainInfo[x].arriStation +'</td><td>'+ trainInfo[x].deptCity + '<i class="ion-arrow-right-c"></i>' + trainInfo[x].arriCity +'</td><td>'+ trainInfo[x].deptTime + '<i class="ion-arrow-right-c"></i>'+ trainInfo[x].arriTime +'<span>'+ '(历时' + trainInfo[x].interval + ')' +'</span></td><td><ul class="list-group">';
                   
                    for(var j=0; j< ticketInfo[x].length;j++){
                        html += '<li class="list-group-item">'  + '<span class="badge">'+ '￥'+ ticketInfo[x][j].pr +'</span>' + ticketInfo[x][j].type + '</li>';
                       
                    }
                    html += '</ul></td></tr>';
                }
                html += '</tbody></table>';
                $('.modal .modal-body').html(html);
               
                var html2 = '<address>站点:<strong>'+ data.data.city+'</strong><br>总计:<abbr>'+ data.data.count+'</abbr></address>';
                $('.modal-footer').html(html2);
                
            } else{
                $('.modal .modal-body').html('<div class="error-code">'+ data.errmsg +'</div>');
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
                $('.modal .modal-body').html(html);
                $('.modal .modal-footer').html(html2);
            }else{
                $('.modal .modal-body').html('<div class="error-code">'+ data.errmsg +'</div>');
            }
        },
        error:function(data){
            console.log(data);
        }
     });
}
            
    var trainSSSearch = function(from,to,date){
//        alert("test");
        console.log("date",date);
        var apikey = {'apikey':'2cf291486b5dd04551e81c11e1346615'};
        var url = 'http://apis.baidu.com/qunar/qunar_train_service/s2ssearch?version=1.0&from=' + from + '&to=' + to +'&date=' + date;
//        url = 'http://apis.baidu.com/qunar/qunar_train_service/s2ssearch?version=1.0&from=%E5%8C%97%E4%BA%AC&to=%E4%B8%8A%E6%B5%B7&date=2016-07-01';
        console.log("url",url);
        $.ajax({
            url:url, 
            method: "GET",  
            headers: apikey, 
            dataType: "json",
            success: function(data){
                console.log("data",data);
                if(data.ret){
                    var data = data.data.trainList;
                    
                    /*var html = '<table class="table table-striped"><thead>\
                    <th>车次</th><th><div class="two-line"><span>出发站</span><span>到达站</span></div></th>\
                    <th><div class="two-line"><span>出发时间</span><span>到达时间</span></div></th><th>历时</th>\
                    <th>座位信息</th></thead><tbody>';
                    for(var i=0; i<data.length; i++){
                        html += '<tr><td colspan="4"><div class="ticket-info><div class="train">' + data[i].trainNo + '</div>\
                                <div class="tcdd"><strong class="start-s">'+ data[i].from+ '</strong><strong class="end-s">\
                                ' + data[i].to +'</strong></div>\
                                <div class="tcds"><strong class="start-t">'+ data[i].startTime + '</strong><strong class="end-t">\
                                ' + data[i].endTime +'</strong></div>\
                                <div class="train-ls"><strong>' + data[i].duration + '</strong></div></div></td>\
                                <td><ul class="list-group">';//</tr>';

                        for(var j=0;j <data[i]['seatInfos'].length; j++){
                            html += '<li class="list-group-item"><span class="badge">' + data[i].seatInfos[j].remainNum + '张\
                                    </span>' + data[i].seatInfos[j].seat  + '(' + data[i].seatInfos[j].seatPrice + '￥/张' + ')\
                                    ' + '</li>';
                        }
                        html += '</ul></td></tr>';
                    }
                    html += '</tbody></table>';*/
                    var html = '<table class="table table-striped"><thead>\
                    <th>车次信息</th><th>座位信息</th></thead><tbody>';
                    for(var i=0; i<data.length; i++){
                        html += '<tr><td><div class="ticket-info"><h1>' + data[i].trainNo + '</h1>\
                                <div class="tcdd"><span><i class="ion-android-locate"></i></span><strong class="start-s">' + data[i].from + '</strong><span><i class="ion-android-pin"></i></span><strong class="end-s">' + data[i].to +'</strong></div>\
                                <div class="tcds"><span><i class="ion-ios-clock"></i></span><strong class="start-t">'+ data[i].startTime + '</strong><span><i class="ion-ios-time"></i></span><strong class="end-t">' + data[i].endTime +'</strong>\
                                </div> <div class="train-ls"><span><i class="ion-speedometer"></i></span><strong>' + data[i].duration + '</strong></div></div></td><td><ul class="list-group">';//</tr>';

                        for(var j=0;j <data[i]['seatInfos'].length; j++){
                            html += '<li class="list-group-item"><span class="badge">' + data[i].seatInfos[j].remainNum + '张\
                                    </span>' + data[i].seatInfos[j].seat  + '(' + data[i].seatInfos[j].seatPrice + '￥/张' + ')\
                                    ' + '</li>';
                        }
                        html += '</ul></td></tr>';
                    }
                    html += '</tbody></table>';
                  
                     $('.modal .modal-body').html(html);
                }else{
                     $('.modal .modal-body').html('<div class="error-code">'+ data.errmsg +'</div>');
                }
            },
            error:function(data){

            }
        });
    }

        </script>
    </body>
</html>