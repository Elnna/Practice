$(function(){
   /*$('#text1').text(test(10,20,30));
   $('#text2').text(test(10,20));
    var str1 = '这是一个测试这是一个测试日土目工目土fjasdfasdfas ffjasdhfahsdga;sdg';
    var str2 = '这是一';
    $('#text3').text(str1.slice(0,20));
    $('#text4').text(str2.slice(0,20));
    
    */
    $('#lay').click(function(){
       var index =  layer.open({
            type:1,
            title:false,
            
            btn:false,
            content:'<div class="weyiDialog show" name="" id="showTextOpDialog">' +
            '<div class="weyiMask"></div>'+
            '<div class="weyiDia ">'+
            ' <div class="weyiDiaT">保存文档<a href="#this" class="close" name="weyiDiaClose"></a></div>' +
            '<div class="weyiDiaM">' +
            ' <div class="weyiNot">' +
            '<div class="con">' +
            '<p>保存文档成功，是否继续保存？取消会返回文档列表页^_^</p>' +
            ' </div>' +
            '<div class="btn">' +
            '<a href="#this" class="weyi_a" id="confirmBtn">继续保存</a>' +
            '<a href="#this" class="weyi_a_bgB" id="cancelBtn">取消</a>' +
            '</div>' +
            ' </div>' +
            ' </div>' +
            '</div>' +
            '</div>'
        });
        $(document).delegate('#confirmBtn','click',function(){
            
            layer.closeAll('page');
            console.log("confirm btn");
        });
        $(document).delegate('#cancelBtn','click',function(){
            console.log("cancle btn");
            layer.closeAll('page');
        });
                    
    });
    
    
});
/*function test(test1,test2){
    var test3 = arguments[2] ? arguments[2] :
2;
    return test1+test2+test3;
}*/