<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="./css/ionicons.min.css">
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
   
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
                    <button type="submit" class="btn btn-primary" id="express-submit">确定</button>
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
         if(carManager.status == '0'){
             var cityHtml = '';
             var lsnumHtml = '';
             var proHtml = '';
             var lsprefixHtml = '';
             
             $.each(carManager.result.data,function(index,ele){
                 proHtml += '<option value="' + ele.carorg + '">'+ele.province+'</option>';
                 lsprefixHtml += '<option value="' + ele.lsprefix + '">' + ele.lsprefix + '</option>';

                 $.each(ele[index].list,function(index2,ele2){
                    cityHtml += '<option value="' + (ele2.carorg ? ele2.carorg :ele.carorg) + '">'+ele2.city+'</option>';
                    lsnumHtml = '<option value="' + ele2.lsnum + '">' + ele2.lsnum + '</option>';
                    
                });
                 
                
             });
             $('#car-province').html(proHtml);
             $('#car-city').html(cityHtml);
             $('#car-lsnum').html(lsnumHtml);
             $('#car-lsprefix').html(lsprefixHtml);
             
         }
         //车辆类型
         if(carType.status == '0'){
             var typeHtml = '';
             $.each(carType.result,function(i,ele){
                 typeHtml += '<option value="'+ ele.code +'">' + ele.name.substr(0,ele.name.lengh -2) + '</option>';
             });
             $('#car-type').html(typeHtml);
         }
         
         $('#car-province').on('click',function(){
             var proValue = $(this).val();
             if(carManager.status == '0'){
                 $.each(carManager.result.data,function(index,ele){
                     if(ele.province == proValue){
                          proMakeHtml(index);
                     }
                 })
             }
            
             
         });
         $('#car-city').on('click',function(){
             var cityValue = $(this).val();
             if(carManager.status == '0'){
                 $.each(carManager.result.data,function(index,ele){
                     $.each(ele[index].list,function(index2,ele2){

                         if(cityValue == ele2.city){
                             cityMakeHtml(index,index2);
                             $('#car-lsnum ［value='+ele2.lsnum+']').selected = true;
                         }
                     });
                 });
             }
             
             
         });
     }
     function(data){
    //failed   
         console.log("failed");
     });

});
var cityMakeHtml = function(i1,i2){
   
    var ele1 = carManager.result.data[i1];
    var ele2 = ele1.list[i2];
    if(ele1.carorg == ''){
         var frameHtml = '';
         var engineHtml = '';
         if(ele2.frameno == 100){
             frameHtml = '<label for="car-type" class="col-sm-3 control-label">车辆类型:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-frame" placeholder="请输入车架号码"></div>';

         }else{
             frameHtml = '<label for="car-type" class="col-sm-3 control-label">车辆类型:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-frame" placeholder="请输入车架号码后'+ele2.frameno+'位"></div>';
         }
         if(ele2.engineno == '100'){
             engineHtml = '<label for="car-type" class="col-sm-3 control-label">发动机号码:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-frame" placeholder="请输入发动机号码"></div>';
         }else{
             engineHtml = '<label for="car-type" class="col-sm-3 control-label">发动机号码:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-frame" placeholder="请输入发动机号码后'+ele2.engineno+'位"></div>';
         }
        $('#car-illegal-search .form-group:nth-child(4)').html(engineHtml);
        $('#car-illegal-search .form-group:nth-child(5)').html(frameHtml);
    }
        
    
    
}            
var proMakeFOHtml = function(proValue){
    console.log("debug1",proValue);
    if(carManager.status == 0){
        console.log("debug2");

        $.each(carManager.result.data,function(index,ele){
            
            console.log("debug3",proValue);
            console.log("debug4",ele.province);
            console.log("debug5",proValue == ele.province);

            if(proValue == ele.province){
                var cityHtml = '';
                var lsnumHtml = '<option value="">空</option>';
                var frameHtml = '';
                var engineHtml = '';
                //如果省对应的carorg不为空，则查询支持的省下的市都可以用省对应的”frameno”、 “engineno”的两个字段的
                if(ele.carorg !=''){
                    if(ele.frameno == '100'){
                        frameHtml = '<label for="car-type" class="col-sm-3 control-label">车架号码:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-frame" placeholder="请输入车架号码"></div>';

                    }else{
                        frameHtml = '<label for="car-type" class="col-sm-3 control-label">发动机号码:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-frame" placeholder="请输入发动机号码后'+ele.frameno+'位"></div>';
                    }
                    if(ele.engineno == '100'){
                        engineHtml = '<label for="car-type" class="col-sm-3 control-label">发动机号码:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-frame" placeholder="请输入发动机号码"></div>';
                    }else{
                        engineHtml = '<label for="car-type" class="col-sm-3 control-label">发动机号码:</label><div class="input-group col-sm-7"><input type="text" class="form-control" id="car-frame" placeholder="请输入发动机号码后'+ele.engineno+'位"></div>';
                    }
                } 
                $('#car-illegal-search .form-group:nth-child(4)').html(engineHtml);
                $('#car-illegal-search .form-group:nth-child(5)').html(frameHtml);

                $.each(ele[index].list,function(index2,ele2){
                    cityHtml += '<option value="' + (ele2.carorg ? ele2.carorg :ele.carorg) + '">'+ele2.city+'</option>';
                    lsnumHtml = '<option value="' + ele2.lsnum + '">' + ele2.lsnum + '</option>';


                });
                $('#car-lsnum').html(lsnumHtml);
                $('#car-city').html(cityHtml);
                return true;
            }
        });
    } else{
    console.log("carManager empty");
    }
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
                return carManager;
                /*if(carManager.status == 0){
                     var proHtml = '';
                     var cityHtml = '';
                     var lsprefixHtml = '';
                     $.each(carManager.result.data,function(i,ele){
                         proHtml += '<option value="' + ele.carorg + '">'+ele.province+'</option>';
                         lsprefixHtml += '<option value="' + ele.lsprefix + '">' + ele.lsprefix + '</option>';
                     });

                     $('#car-province').html(proHtml);
                     $('#car-lsprefix').html(lsprefixHtml);
                 }else{
                     console.log("carManager empty");
                 }*/
    //            return data;
            },
            error:function(data){
                console.log("failed",data);
            }
        });
    }
     
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
                return carType;
                /*if(carType.status == 0){
//                         var ctype = carType.result;
                     var chtml = '';
                     $.each(carType.result,function(i,ele){
                         chtml += '<option value="'+ ele.code +'">' + ele.name.substr(0,ele.name.lengh -2) + '</option>';
                     });
                     $('#car-type').html(chtml);
                 } else{
                     console.log("carType empty");
                 }*/
    //            return data;
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