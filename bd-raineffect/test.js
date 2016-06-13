//js代码如下，需要
$('#cities').click(addProvince);
//点击输入框，加载城市信息
function addProvince(){
    //加载标题等内容
    if($('#choose').children().length==1){
        $('#choose').append('<div id="container"><div id="mainCity"><h5 class="title"><span>+</span>主要城市</h5></div><div id="province"><h5 class="title"><span>+</span>省市</h5></div></div>');
        //$('#choose h5').css('backgroundImage','linear-gradient(left,#FFE2B2 50%,#fff)');
        $('#container').css({'position':'absolute','zIndex':300,'top':'22px','left':0,'display':'none'}).width(640).css('border', '1px solid #F99E07');
        //点击标题，实现收缩城市信息
        $('.title').click(function(){
            $(this).siblings().slideToggle('slow');
            if($(this).children('span').text()=='+'){
                $(this).children('span').text('-');
            }
            else{
                $(this).children('span').text('+');
            }
        })
    }
    //热门城市
    if($('#mainCity ul').length==0) {
        $('#mainCity').append('<ul class="cityInfo"></ul>');
        $('#mainCity ul').width('100%').height(130).css('position','relative');
        for (var i = 0; i < hotcity.size(); i++) {
            $('#mainCity ul').append('<li></li>');
            $('#mainCity ul li').eq(i).width('9%').height(30).css('paddingLeft','13px').css('float', 'left').css('cursor','pointer').css('lineHeight','30px');
            $('#mainCity ul li').eq(i).text(hotcity.elements[i].value).css('position','relative');
        }
    }
    //省市
    if($('#province ul').length==0){
        $('#province').append('<ul class="cityInfo"></ul>');
        $('#province ul').width('100%').height(130).css('position','relative');
        for(var i=5;i<province.size();i++){
            $('#province ul').append('<li></li>')
            $('#province ul li').eq(i-5).width('9%').height(30).css('paddingLeft','10px').css('float','left').css('cursor','pointer').css('lineHeight','30px');
            $('#province ul li').eq(i-5).text(province.elements[i].value).css({'position':'relative','zIndex':300-i});
        }
    }
    //设置鼠标移动到城市上时，显示市、区信息
    $('#mainCity>ul>li').mouseover(addCities).mouseout(function(){
       // $(this).children('ul').css('display','none');
      //  $(this).children('ul').children('li').css('background','#fff');
        $(this).css('background','#fff');
    });
    $('#province>ul>li').mouseover(proAddCity).mouseout(function(){
        $(this).children('ul').css('display','none');
        $(this).children('ul').children('li').css('background','#FFE2B1');
        $(this).css('background','#fff');
    })
    //当鼠标移动到某个具体的城市上时，改变背景色
    $('#container li ul li').mouseover(function(){$(this).css('background','#FFE2B1');$(this).parent('ul').css('display','block')})
        .mouseout(function(){$(this).css('background','#fff');$(this).parent('ul').css('display','block')})
    //点击标题实现内容隐藏/显示
    $('#container').toggle('slow',function(){
        if($('#container').css('display')!='none'){
            $('#mainCity>ul').css('display', 'block');
            $('#province>ul').css('display', 'block');
            $('h5 span').text('+');
        }
    });
 
}
//加载城市信息
function addCities() {
    $(this).css('background','#FFE2B1');
    var posX=$(this).position().left;
    //如果高度超出范围，则向上显示
    /*var posY=$(this).position().top;
    var cha=($('#province>ul').height()-posY);*/
       /* if ($(this).children('ul').length == 0) {
            $(this).append('<ul></ul>');
            $(this).children('ul').css({
                'border': '2px solid #FFE2B1',
                'position': 'absolute',
                'background': '#FFE2B1',
                'width': '300px',
                'overflow': 'hidden',
                'zIndex': 300,
                'display':'none',
                //'top': '20px',
                'padding': '5px'
            });
            var pro = $(this).text();
            var keyVal = district.getKey(pro);
            var regexp = new RegExp('^' + keyVal + '\\d+');
            var arr = district.keys();
            for (var i = 0; i < arr.length; i++) {
                if (regexp.test(arr[i])) {
                    $(this).children('ul').append('<li style="width:33%;height:20px;float:left">' + district.get(arr[i]) + '</li>');
                }
            }
            //如果宽度超出，则为向右显示
            if(posX>=($('#container').width()-$(this).children('ul').width())){
                $(this).children('ul').css('right',0);
            }*/
            /*如果高度超出，则为向上显示
            if(cha<=$(this).children('ul').height()){
                $(this).children('ul').css('bottom','20px');
            }*/
           /* $(this).children('ul').children('li')
                .mouseover(function(){$(this).css('background','#FFE2B1');})
                .mouseout(function(){$(this).css('background','#fff');});
        }
        else {
            $(this).children('ul').css('display', 'block');
        }*/
    doChooseCity();
}
function proAddCity(){
    $(this).css('background','#FFE2B1');
   // $(this).css('color','#FFE2B1');
    var posX=$(this).position().left;
    /*设置判断高度是否超出边界的变量
    var posY=$(this).position().top;
    var cha=($('#province>ul').height()-posY);*/
    if ($(this).children('ul').length == 0) {
        $(this).append('<ul></ul>');
        $(this).children('ul').css({
            'border': '2px solid #FFE2B1',
            'position': 'absolute',
            'left':'0',
            'background': '#FFE2B1',
            'width': '300px',
            'overflow': 'hidden',
            'zIndex': 400,
            'paddingLeft': '13px',
            'display':'block'
        });
        var pro = $(this).text();
        var keyVal = province.getKey(pro);
        var regexp = new RegExp('^' + keyVal + '\\d+');
        var arr = cityPlace.keys();
        for (var i = 0; i < arr.length; i++) {
            if (regexp.test(arr[i])) {
                $(this).children('ul').append('<li style="width:33%;height:30px;float:left;line-height: 30px;">' + cityPlace.get(arr[i]) + '</li>');
            }
        }
        if(posX>=($('#container').width()-$(this).children('ul').width())){
            $(this).children('ul').css({'right':0,'left':'auto'});
        }
        /*如果高度超出边界，则为向上显示
        if(cha<=$(this).children('ul').height()){
            $(this).children('ul').css('bottom','20px');
        }*/
        $(this).children('ul').children('li')
            .mouseover(function(){$(this).css({'color':'#FF7700'});})
            .mouseout(function(){$(this).css({'color':'#000'})});
    }
    else {
        $(this).children('ul').css('display', 'block');
    }
    doChoose();
}
//当点击某个城市时，将信息反馈在input中，同时将div隐藏
function doChoose() {
    $('#container li ul li').click(function () {
        $(this).siblings().css('background','#FFE2B1');
        var v = $(this).text();
        var m = $(this).get(0).parentNode.parentNode.firstChild;
        m=$(m).text();
        $('#cities').val(m + '-' + v);
        $('#container').hide('slow');
    })
}
function doChooseCity(){
    $('#mainCity>ul>li').click(function(){
        var v = $(this).text();
        $('#cities').val(v);
        $('#container').hide('slow');
    })
}