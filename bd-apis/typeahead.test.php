<html>
    <head>
        <link rel="stylesheet" href="./css/bootstrap.css">

    </head>
    <body>
        <div class="modal fade " id="zodiacSearchModal" tabindex="-1" role="dialog" aria-labelledby="zodiacSearchModalLabel">
            <div class="modal-dialog" role = "document">
                <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="zodiacSearchModalLabel">星座查询</h4>
                    </div>
                    <div class="modal-body">
                        <input type="text" placeholder="星座名" id="zodiac-input" data-provide="typeahead" data-items="4">
                        <div class="daily-options">
                            <label for="radio" class="col-sm-4 control-label">日查询</label>
                            <div class="col-sm-8">
                                <div class="radio-inline"><label><input type="radio" name="daily-option" value="today" checked=""> 今日</label></div>
                                <div class="radio-inline"><label><input type="radio" name="daily-option"  value="tomorrow" > 明日</label></div>
                            </div>

                        </div>
                        <div class="week-options">
                            <label for="radio" class="col-sm-4 control-label">周查询</label>
                            <div class="col-sm-8">
                                <div class="radio-inline"><label><input type="radio" checked="" name="week-option" value="week"> 本周</label></div>
                                <div class="radio-inline"><label><input type="radio"   name="week-option" value="nextweek"> 下周</label></div>
                            </div>
                        </div>
                        <div class="zodiac-options">
                            <div class="row"></div>
                            <div class="row"></div>
                            <div class="row"></div>
                            <div class="row"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" name="cancel">取消</button>
                        <button type="button" class="btn btn-primary" name="submit" id="zodiac-search-submit">确定</button>
                    </div>
                </div>
            </div>
        </div> 
        <input type="text" placeholder="星座名" id="zodiac-input2" data-provide="typeahead" data-items="4">
        <script src="./js/vendor/jquery-1.11.2.min.js"></script>

        <script src="./js/bootstrap3-typeahead.js"></script>
        <script>
            $(document).ready(function(){
                 var zodiacArr = ["白羊座", "金牛座", "双子座","巨蟹座","狮子座","处女座","天秤座","天蝎座","射手座","摩羯座","水瓶座","双鱼座"];
            $('#zodiac-input').typeahead({
               
                source:zodiacArr
            });
        });
           

        </script>
    </body>
</html>