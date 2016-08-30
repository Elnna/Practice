/*公共的js*/
/*
* 添加按钮
*/

$('#button-add').click(function(){
    var url = SCOPE.add_url;
    window.location.href = url;
    
});

/*提交form表单*/
$('#singcms-button-submit').click(function(){
    var data = $('#singcms-form').serializeArray();
    console.log("form: ", data);
    var postData = {};
    $(data).each(function(index,ele){
        postData[ele.name] = ele.value;
    
    });
    
    // console.log("postData",postData);
    var url = SCOPE.save_url;
//     var jump_url = SCOPE.jump_url;
    
    $.post(url,postData,function(res){
        if(res.status ==1){
            //成功
            return dialog.success(res.message,history.back());
            
        }else if(res.status == 0){
            //失败；
            return dialog.error(res.message);
        }
    },'json');
    
});

$('.singcms-table #singcms-edit').on('click',function(){
    var id = $(this).attr('attr-id');
    // console.log("id",id);
    // console.log("url",SCOPE.edit_url);
    var url = SCOPE.edit_url + '&id=' + id;
    // console.log("url",url);
    window.location.href = url;
});

$('.singcms-table #singcms-delete,.singcms-table #singcms-on-off').on('click',function(){
    var id = $(this).attr('attr-id');
    // var a = $(this).attr('attr-a');
    var message = $(this).attr('attr-message') ? $(this).attr('attr-message') : '更改状态';
    var url = SCOPE.set_status_url;
    var status = ($(this).attr('attr-status') == 0 || $(this).attr('attr-status') == 1) ? $(this).attr('attr-status') : -1;

console.log("status",status);
   var data = {};
   data['id'] = id;
   data['status'] = status;
   layer.open({
       type:0,
       title:'是否提交？',
       btn:['yes','no'],
       closeBtn:2,
       content:'是否确定' + message,
       scrollbar:true,
       yes:function(){
           //执行相关跳转
           toDelete(url,data);
           console.log("yes");
       },
       
   });
});

function toDelete(url,data){
    console.log("url",url);
    console.log("data",data);
    $.post( url, data, function(res){
        console.log("res",res);
            if(res.status == 1){
                return dialog.success(res.message,'');
                //跳转到相关页面
                
            }else{
                return dialog.error(res.message);
            }
        },'JSON');
}

/*
*排序操作
*/
$('#button-listorder').click(function(){
    var data = $('#singcms-listorder').serializeArray();
    // console.log("data",data);
    var postData = {};
    $(data).each(function(index,ele){
        postData[ele.name] = ele.value;
    });
    // console.log("postData",postData);
    var url = SCOPE.listorder_url;
    $.post(url,postData,function(res){
        if(res.status == 1){
            return dialog.success(res.message,res['data']['jump_url']);
        }else if(res.status == 0){
            return dialog.error(res.message,res['data']['jump_url']);
        }
    },'JSON');
});

/*文章推送*/
$('#singcms-push').click(function(){
    var id = $("#select-push").val();
    // alert("id",id);
    if(id == 0){
        return dialog.error(0,'请选择推荐位');
    }
    var push = {};
    var postData = {};
    $("input[name=pushcheck]:checked").each(function(i){
        push[i] = $(this).val();
    });
    postData['push'] = push;
    postData['position_id'] = id;
    console.log("postData",postData);
    var url = SCOPE.push_url;
    $.post(url,postData,function(res){
        if(res.status == 1){
            return dialog.success(res.message,res['data']['jump_url']);
        }else{
            console.log("error",res.message);
            return dialog.error(res.message);
        }
        
    },'JSON');
})