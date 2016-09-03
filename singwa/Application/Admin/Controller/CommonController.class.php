<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class CommonController extends Controller {


	public function __construct() {
		
		parent::__construct();
		$this->_init();
	}
	/**
	 * 初始化
	 * @return
	 */
	private function _init() {
		// 如果已经登录
		$isLogin = $this->isLogin();
		if(!$isLogin) {
			// 跳转到登录页面
			$this->redirect('/admin.php?c=login');
		}
	}

	/**
	 * 获取登录用户信息
	 * @return array
	 */
	public function getLoginUser() {
		return session("adminUser");
	}

	/**
	 * 判定是否登录
	 * @return boolean 
	 */
	public function isLogin() {
		$user = $this->getLoginUser();
		if($user && is_array($user)) {
			return true;
		}

		return false;
	}
	
    public function setStatus($data,$model){
       
        try{
            if($data){
                $id = $data['id'];
                $status = $_POST['status'];
                //执行更新操作
                $res = D($model)->updateStatusById($id,$status);
                if($res){
                    return show(1,'更新成功');
                }else{
                    return show(0,'更新失败');
                }
                
            }
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
        return show(0,'没有更新的数据');
    }
    
    public function listorder($model){
        
        $listorder = $data['listorder'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $errors = array();
        if($listorder){
            try{
                foreach ($listorder as $id => $v) {
                    // 更新
                    $res = D($model)->updateListorderById($id,$v);
                    if($res === false){
                        $errors[] = $id;
                    }
                }
            }catch(Exception $e){
                return show(0,$e->getMessage(),array('jump_url'=> $jumpUrl));

            }
            if($errors){
                return show(0,'排序失败'.implode(',',$errors),array('jump_url'=> $jumpUrl));
            }
            return show(1,'排序成功',array('jump_url'=> $jumpUrl));

        }
        return show(0,'排序数据失败',array('jump_url'=> $jumpUrl));

    }
    
    
    
	

}