<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="./css/ionicons.min.css">
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
   
    </head>
    <body>

        
        <div class="modal fade" role="dialog" aria-labelledby="gridSlabel" id="illegal-search-modal">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSlabel">查询结果</h4>
              </div>
                
              <div class="modal-body">
                
              </div>
              <div class="modal-footer"></div>
            </div><!-- /.modal-content -->
            
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        
        <div id="getCarData"><button>获取数据</button></div>
        <div class="form-horizontal" id="car-illegal-search">


            <div class="form-group">
                <label class="col-sm-3 control-label" for="car-city">查询地址:</label>
                <div class="col-sm-4">
                    <select class="form-control" id="car-province"></select>
                </div>
                <div class="col-sm-3">
                    <select class="form-control" id="car-city"></select>
                </div>

            </div>

            <div class="form-group">
                <label for="car-lsnum-left" class="col-sm-3 control-label">车牌号码:</label>
                <div class="col-sm-2">
                    <select id="car-lsprefix" class="form-control col-sm-6">

                    </select>
                </div>

                <div class="col-sm-2">

                    <select id="car-lsnum" class="form-control col-sm-6">
                        <option value="">空</option>
                        <?php for( $i=65; $i<=90;$i++):
                        ?>
                        <option value="<?php echo chr($i);?>"><?php echo chr($i);?></option>
                        <?php
                        endfor;
                        ?>

                    </select>
                </div>
                <div class="input-group col-sm-3">
                    <input type="text" class="form-control" id="car-lsnum-left" placeholder="车牌号码后五位">
                </div>

            </div>
            <div class="form-group">
                <label for="car-type" class="col-sm-3 control-label">车辆类型:</label>
                <div class="col-sm-7">
                    <select id="car-type" class="form-control col-sm-1">

                    </select>
                </div>

            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#illegal-search-modal" id="illegal-search-btn">违章查询</button>
                </div>
            </div>
        </div>
        <script src="./js/vendor/jquery-1.11.2.min.js"></script>
        <script src="./js/jquery-ui.min.js"></script>
        
        <script src="./js/bootstrap.js"></script>
        <script src="./js/bootstrap3-typeahead.js"></script>
<!--        <script src="./js/distpicker.data.js"></script>-->
<!--        <script src="./js/distpicker.js"></script>-->
<!--        <script src="./js/bootstrap-datepicker.js"></script>-->
<!--        <script src="./js/bootstrap-table-filter.js"></script>-->

        

        <script>
            
            
$(document).ready(function(){

     $.when(
         getCarType(),
         getCarManager()
     ).then(function(data){
    //success
         
//         illegalPageInit();
         $('#car-province').on('change',function(){
             var proValue = $(this).val();
//             console.log("debug1",proValue);
             if(proValue !=''){
                 if(carManager.status == '0'){
                 
                     $.each(carManager.result.data,function(index,ele){
//                        console.log("pro change1",ele.province == proValue);

                         if(ele.province == proValue){
//                             console.log("pro change",proValue);
                              proMakeHtml(index);
                             return true;
                         }
                     });
                 }
             }
             
            
             
         });
         $('#car-city').on('change',function(){
             var cityValue = $('#car-city option:selected').text();
//            console.log("debug2",cityValue);

             if(cityValue !=''){
                 if(carManager.status == '0'){
                     $.each(carManager.result.data,function(index,ele){
                         if(ele.list){
                             $.each(ele.list,function(index2,ele2){
//                                 console.log("change city",index2);
//                                 console.log("city compare",cityValue == ele2.city);
                                 if(cityValue == ele2.city){
                                     cityMakeHtml(index,index2);
        //                             $('#car-lsnum ［value='+ele2.lsnum+']').selected = true;
                                 }
                             });
                         }
                         
                     });
                 }
             }
             
             
             
         });
         $('#illegal-search-btn').on('click',function(){
             var proValue = $('#car-province').val();
             var cityValue = $('#car-city').val();
             var lsprefixValue = $('#car-lsprefix').val();
             var lsnumValue = $('#car-lsnum').val();
             var numValue = $('#car-lsnum-left').val();
             var typeValue = $('#car-type').val();
             var frameValue = $('#car-frame').val()?$('#car-frame').val():'';
             var enginenoValue = $('#car-engine').val()?$('#car-engine').val():'';
             illegalList(cityValue,lsprefixValue,lsnumValue+numValue,typeValue,frameValue,enginenoValue);
             console.log("proValue",proValue);
             console.log("cityValue",cityValue);
             console.log("lsprefixValue",lsprefixValue);
             console.log("lsnumValue",lsnumValue);
             console.log("numValue",numValue);
             console.log("typeValue",typeValue);
             console.log("frameValue",frameValue);
             console.log("enginenoValue",enginenoValue);
         });
     },
     function(data){
    //failed   
         console.log("failed");
     });

});
/**
* 将JSON内容转为数据，并返回
* @param string carorg [管局名称]
* @param string lsprefix [车牌前缀]
* @param string lsnum [车牌剩余部分]
* @param string lstype [车辆类型]
* @param string frameno [车架号]
* @param string engineno [发动机号]
* @return array
*/         
            
            
var illegalList = function(carorg,lsprefix,lsnum,lstype,frameno,engineno){
    var url = 'http://apis.baidu.com/netpopo/illegal/illegal?carorg='+carorg+'&lsprefix='+lsprefix+'&lsnum='+lsnum+'&lstype='+lstype+'&frameno='+frameno+'&engineno='+ engineno;
    var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
    
    $.ajax({
        url:url, 
        method: "GET",  
        headers: apikey, 
        dataType: "json",
        success: function(data){
            console.log("get car illegal list url",url);
            illData = data;
            console.log("illData",illData);
            if(illData.status == '0'){
                var illHtml = '<div class="panel-group" id="ill-accordion" role="tablist" aria-multiselectable="true">';
                var totalSocre = 0;
                var totalPrice = 0;
                var modalHeader = '';
                $.each(illData.result.list,function(index,ele){
                    totalSocre += parseInt(ele.score);
                    totalPrice += parseInt(ele.price);
                    illHtml += '<div class="panel panel-default"><div class="panel-heading" role="tab" id="illListheading-'+(index+1)+'"><h4 class="panel-title"><a ' + (index==0?'':'class="collapsed"') + 'role="button" data-toggle="collapse" data-parent="#ill-accordion" href="#illList-'+ (index+1) +'" aria-expanded="true" aria-controls="collapse-'+ (index+1) +'"><span>记<strong>' + ele.score + '</strong>分，罚款<strong>' + ele.price + '</strong>元</span><span>未处理</span></a></h4></div><div id="illList-' + (index+1) + '" class="panel-collapse collapse' +( index == 0 ? ' in' : '') + '" role="tabpanel" aria-labelledby="illListheading-' + (index+1) + '"><div class="panel-body"><p><strong>时间:</strong>' + ele.time + '</p><p><strong>地点:</strong>' + ele.address + '</p><p><strong>描述:</strong>' + ele.content + '</p></div></div></div>'
                });
                illHtml += '</div>'
                modalHeader = '<span><strong>'+ lsprefix+lsnum + '</strong></span><span>共计<strong>'+ illData.result.list.length +'</strong>次违章 计<strong>'+totalSocre+'</strong>分,</span><span>罚款:<strong>'+ totalPrice  +'</strong>元</span>';
                $('.modal .modal-body').html(illHtml);
                $('.modal .modal-title').html(modalHeader);
                
            }else{
                $('.modal .modal-body').html('<div class="error-code">查询失败</div>');
            }
            
        },
        error:function(data){
            console.log("failed",data);
        }
    });
    
}            
var frameEnginehtml = function(frame,engine){
    var frameHtml = '';
    var engineHtml = '';
    if(frame =='0'|| frame ==''){
        $('#car-illegal-search .form-group:nth-child(5)').html('');
    }else{
        frameHtml = '<label for="car-type" class="col-sm-3 control-label">车架号码:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-frame" placeholder="请输入车架号码'+(frame=='100'?'':('后'+frame +'位'))+'"></div>';
        $('#car-illegal-search .form-group:nth-child(5)').html(frameHtml);
    }
    if(engine == '0' || engine == ''){
        $('#car-illegal-search .form-group:nth-child(4)').html('');
    }else{
         engineHtml = '<label for="car-type" class="col-sm-3 control-label">发动机号码:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-engine" placeholder="请输入发动机号码'+(engine =='100'?'':('后'+ engine +'位'))+'"></div>';
         $('#car-illegal-search .form-group:nth-child(4)').html(engineHtml);
    }
}
var cityMakeHtml = function(i1,i2){
   
    var ele1 = carManager.result.data[i1];
    var ele2 = ele1.list[i2];
    console.log("city ele1",ele1);
    console.log("city ele2",ele2);
    
    if(ele1.carorg == ''|| ele2.carorg !=''){
        if(ele1.carorg == ''&& ele2.carorg ==''){
            console.log("debug eles empty");
            $('#car-illegal-search .form-group:nth-child(5)').html('');
            $('#car-illegal-search .form-group:nth-child(4)').html('');
        }else{
            frameEnginehtml(ele2.frameno,ele2.engineno);
        }
        
        
    }
//    console.log("city debug",$('#car-lsnum [value='+ele2.lsnum+']'));
    $('#car-lsnum [value='+ele2.lsnum+']').attr('selected','selected');
    $('#car-city [value='+ele2.city+']').attr('selected','selected');
    $('#car-lsprefix [value='+ele2.lsprefix+']').attr('selected','selected');
    $('#car-province [value='+ele1.province+']').attr('selected','selected');
   
}            
var proMakeHtml = function(i){
    var ele = carManager.result.data[i];
    setCityLsNumList(ele.province);
   
}  

var carType = '';
var carManager = '';

var getCarManager = function(){
    var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
    var url = 'http://apis.baidu.com/netpopo/illegal/illegal1';
    if(carManager == ''){
        $.ajax({
            url:url, 
            method: "GET",  
            headers: apikey, 
            dataType: "json",
            success: function(data){
                    console.log("get car manager url",url);
                carManager = data;
                console.log("carManager",carManager);
                if(carManager.status == '0'){
                     var cityHtml = '';
                     var lsnumHtml = '';
                     var proHtml = '';
                     var lsprefixHtml = '';

                     $.each(carManager.result.data,function(index,ele){
                         proHtml += '<option value="' + ele.province + '">'+ele.province+'</option>';


                     });
                     $('#car-province').html(proHtml);
                   
                     setCityLsNumList($('#car-province').val());

                 }
            },
            error:function(data){
                console.log("failed",data);
            }
        });
    }
     
}
var setCityLsNumList = function(pro){
//    console.log("set city2",pro);
    $.each(carManager.result.data,function(index,ele){

        if(pro == ele.province){

            var cityHtml = '';
            var lsnumHtml = '';
            var lsprefixHtml = '';
            
            if(ele.carorg !=''){
                frameEnginehtml(ele.frameno,ele.engineno);
            }else{
                $('#car-illegal-search .form-group:nth-child(4)').html('');
                $('#car-illegal-search .form-group:nth-child(5)').html('');
            }
            
            
            
            
            if(ele.list){
                $.each(ele.list,function(index2,ele2){
                    cityHtml += '<option value="' + (ele2.carorg ? ele2.carorg :ele.carorg) + '">'+ele2.city+'</option>';
                    lsnumHtml += '<option value="' + ele2.lsnum + '">' + ele2.lsnum + '</option>';
                    lsprefixHtml += '<option value="' + ele2.lsprefix + '">' + ele2.lsprefix + '</option>';
                });
            }else{
                cityHtml += '<option value="'+ ele.carorg +'">'+ ele.province +'</option>';
                lsnumHtml += '<option value=""></option>';
                lsprefixHtml += '<option value="' + ele.lsprefix + '">' + ele.lsprefix + '</option>';
            }
            
            $('#car-city').html(cityHtml);  
            $('#car-lsnum').html(lsnumHtml);  
            $('#car-lsprefix').html(lsprefixHtml);  
            return true;
        } 
    });
    
}
var getCarType = function(){
    var apikey = {'apikey':'0a6c63dd26f6268752341ed2ef15dba6'};
    var url = 'http://apis.baidu.com/netpopo/illegal/illegal2';
    if(carType == ''){
        $.ajax({
            url:url, 
            method: "GET",  
            headers: apikey, 
            dataType: "json",
            success: function(data){
                    console.log("get car type url",url);
                carType = data;
                console.log("carType",carType);
                if(carType.status == '0'){
                    var typeHtml = '';
                    $.each(carType.result,function(i,ele){
                        typeHtml += '<option value="'+ ele.code +'">' + ele.name.substr(0,ele.name.length -2) + '</option>';
                    });
                    $('#car-type').html(typeHtml);
                 }
            },
            error:function(data){
                console.log("failed",data);
            }
        });
    }
     
}

        </script>
    </body>
</html>