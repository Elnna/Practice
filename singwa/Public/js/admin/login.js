/*
*前端登录业务类
*author:Elnna
*/
var login = {
    check:function(){
        //get username and passwd
        var username = $('input[name="username"]').val();
        // alert(username);
        var pwd = $('input[name="password"]').val();
        if(!username){
            dialog.error("用户名不能为空!");
        }
        if(!pwd){
            dialog.error("密码不能为空!");
        }
//        var url = window.location.origin + window.location.pathname + '?c=login&a=check';
        console.log('url', url);
        var url = '/admin.php?c=login&a=check';
        var data = {
            'username':username,
            'password':pwd
        };

        $.post(url,data,function(res){
            if(res.status == 0 ){
                return dialog.error(res.message);
            }
            if(res.status == 1){
                return dialog.success(res.message,'/admin.php?c=index');
//                return dialog.success(res.message,window.location.origin + window.location.pathname + '?c=index');
            }
        },'JSON');
    }
}