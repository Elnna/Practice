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
        
        <form class="form-inline">
          <div class="form-group">
            <label for="express-com">快递公司</label>
              <select>
                  
              </select>
<!--            <input type="text" class="form-control" id="express-com" placeholder="快递公司代号">-->
          </div>
          <div class="form-group">
            <label for="express-nu">单号</label>
            <input type="email" class="form-control" id="express-nu" placeholder="快递单号">
          </div>
          <button type="submit" class="btn btn-default">确定</button>
        </form>
        
        <script src="./js/vendor/jquery-1.11.2.min.js"></script>
        <script src="./js/jquery-ui.min.js"></script>
        
        <script src="./js/bootstrap.js"></script>
        <script src="./js/bootstrap3-typeahead.js"></script>
        <script src="./js/bootstrap-datepicker.js"></script>
        <script src="./js/bootstrap-table-filter.js"></script>

        

        <script>
            
            
            $(document).ready(function(){

                   $('select').on('click',function(){
        //                    var apikey = {'apikey':'25b8f22d3ca6bdc864a1b5e7984f0395'};
                        var key = '25b8f22d3ca6bdc864a1b5e7984f0395';
                        var url = 'http://v.juhe.cn/exp/com?key=' + key;
                         $.ajax({
                            url:url, 
                            method: "GET",  
        //                        headers: apikey, 
                            dataType: "json",
                            success: function(data){
                                    console.log("url",url);
                            },
                            error:function(data){

                             }
                        });

                });
        });
            

            
    

        </script>
    </body>
</html>