<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    
    public function index(){
        $news = D('News')->maxcount(); //文章最大阅读量
        print_r($news);
        $conds = array('status' => 1);
        $newscount = D('News')->getNewsCount($conds);//文章数量
        $positioncount  = D('Position')->getPositionsCount($conds);
        $admincount = D('Admin')->getLastLoginUsers(); //用户登录人数
        $this->assign('news',$news);
        $this->assign('newscount',$newscount);
        $this->assign('positioncount',$positioncount);
        $this->assign('admincount',$admincount);
    	$this->display();
    }

    public function main() {
    	$this->display();
    }
}