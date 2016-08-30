<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class LoginController extends Controller {

    public function index(){
        if(session('adminUser')){
            $this->redirect('/admin.php?c=index');
        }
    	return $this->display();
    }
    
    public function check(){
        $usr = $_POST['username'];
        $pwd = $_POST['password'];
        if(!trim($usr)){
            return show(0,'用户名不能为空');
        }
        if(!trim($pwd)){
            return show(0,'密码不能为空');
        }
        $res = D('Admin')->getAdminByUsername($usr); //实例化对象
        if(!$res || $res['status'] != 1){
            return show(0,'该用户不存在');
        }
       
        if($res['password'] != getMd5Password($pwd)){
            
//            return show(0, $res['password'] . ' | ' . getMd5Password($pwd) . '|' .($res['password'] != getMd5Password($pwd)));
            return show(0,'密码错误' );
        }
        $data = array('username' => $usr,'password' => getMd5Password($pwd));
        D('Admin')->updateByAdminId($res['admin_id'] ,$data);
        
        session('adminUser',$res);
        return show(1,'登录成功');
        
    }
    public function logout(){
        session('adminUser',null);
        $this->redirect('/admin.php?c=login');
    }

}