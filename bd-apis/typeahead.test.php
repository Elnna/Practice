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
        <?php 
            $zodiacDateArr = array('白羊座'=>'3月21日-4月19日','金牛座'=>'4月20日-5月20日','双子座'=>'5月21日-6月21日','巨蟹座'=>'6月22日-7月22日','狮子座'=>'7月23日-8月22日','处女座'=>'8月23日-9月22日','天枰座'=>'9月23日-10月23日','天蝎座'=>'10月24日-11月22日','射手座'=>'11月23日-12月21日','摩羯座'=>'12月22日-1月19日','水瓶座'=>'1月20日-2月18日','双鱼座'=>'2月19日-3月20日');
        ?>
        <?php $indexArr = array_keys($zodiacDateArr);?>
        <h4><pre><?php var_dump($zodiacDateArr[$indexArr[array_search('双子座',$indexArr)]]);?></pre></h4>
        <?php $zodiacDateArr2 = array_flip($zodiacDateArr);?>
        <h4><pre><?php var_dump(array_search("双子座",$zodiacDateArr2));?></pre></h4>
        <img src="" alt="zodiac" style="width:140px; height:140px;">
        
        <form target="_blank" id="train_form" method="post" accept-charset="utf-8" action="/submit">
<input name="targeturl" value="" type="hidden"><input name="ie" value="utf-8" type="hidden"><input name="fromid" value="Khslsogou-S1170291-T1134341" type="hidden"><input name="est" value="marketing" type="hidden"><table class="tra-table"><tbody>
<tr>
<th>站站查询</th>
<td class="wt-180"><div class="tra-input-box" id="train_td0" style="z-index:3">
<input type="text" id="train_city1" value="出发城市" name="" autocomplete="off" style="color: rgb(153, 153, 153);"><span class="pos-ico" onclick="showpopuphotcity(0, 0, 'train_city1');"></span>
</div></td>
<td class="change-ico"><a href="#" id="sogou_vr_21063201_exchangecity_0"></a></td>
<td class="wt-180"><div class="tra-input-box" id="train_td1" style="z-index:3">
<input type="text" id="train_city2" value="到达城市" autocomplete="off" style="color: rgb(153, 153, 153);"><span class="pos-ico" onclick="showpopuphotcity(1, 0, 'train_city2');"></span>
</div></td>
<td id="train_stations"><input type="button" onmouseout="this.className='tra-btn'" onmouseover="this.className='tra-btn-hover'" class="tra-btn" value="查询" id="sogou_vr_21063201_btn0_0"></td>
</tr>
<tr>
<th>车次查询</th>
<td><div class="tra-input-box" id="train_td2" style="z-index:2">
<input id="train_trainno" type="text" value="例：D321" autocomplete="off" style="color: rgb(153, 153, 153);"><span class="tra-ico" onclick="showpopuphotcity(2, 0, 'train_trainno', true);"></span>
</div></td>
<td colspan="3" id="train_train"><input type="button" onmouseout="this.className='tra-btn'" onmouseover="this.className='tra-btn-hover'" class="tra-btn" value="查询" id="sogou_vr_21063201_btn1_0"></td>
</tr>
<tr>
<th>车站查询</th>
<td><div class="tra-input-box" id="train_td3" style="z-index:1">
<input id="train_city0" type="text" value="例：北京南" autocomplete="off" style="color: rgb(153, 153, 153);"><span class="pos-ico" onclick="showpopuphotcity(3, 0, 'train_city0');"></span>
</div></td>
<td colspan="3" id="train_station"><input type="button" onmouseout="this.className='tra-btn'" onmouseover="this.className='tra-btn-hover'" class="tra-btn" value="查询" id="sogou_vr_21063201_btn2_0"></td>
</tr>
</tbody></table>
</form>
        <script src="./js/vendor/jquery-1.11.2.min.js"></script>

        <script src="./js/bootstrap3-typeahead.js"></script>
        <script>
            $(document).ready(function(){
                 var zodiacArr = ["白羊座", "金牛座", "双子座","巨蟹座","狮子座","处女座","天秤座","天蝎座","射手座","摩羯座","水瓶座","双鱼座"];
            $('#zodiac-input').typeahead({
               
                source:zodiacArr
            });
                $('img').attr('src','img/zodiac/'+changeZodiacImg("双子座") +'.png');
        });
          var changeZodiacImg = function(imgNameChi){
            var zodiacImgName = 'text';
            switch(imgNameChi){

                case '白羊座': zodiacImgName = 'Aries';
                    break;
                case '金牛座': zodiacImgName = 'Taurus';
                    break;
                case "双子座": zodiacImgName = 'Gemini';
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

        </script>
    </body>
</html>