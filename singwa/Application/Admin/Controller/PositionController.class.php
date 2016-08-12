<?php
/*后台推荐位控制*/
namespace Admin\Controller;
use Think\Controller;

class PositionController extends CommonController{

    
    public function index(){
        $conds = array();
        $title = $_GET['title'];
        if($title){
            $conds['title'] = $title;
            
        }
        if($_GET['id']){
            $conds['id'] = intval($_GET['id']);
            $this->assign('id',$conds['id']);
            
        }
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 6;
        $positions = D('Position')->getPositions($conds,$page,$pageSize);
        $count = D('Position')->getPositionsCount($conds);
        
        $res = new \Think\Page($count,$pageSize);
        $pageres = $res->show();
        
        $this->assign('positions',$positions);
        $this->assign('title',$title);
        $this->assign('pageres',$pageres);
        
        $this->display();
        
    }
   
    public function add(){
       $this->display();
    }
    public function listorder(){
        return parent::listorder('Position');
    }
    
    public function setStatus(){
       
        return parent::setStatus($_POST,'Position');
    }
    
    
    
    
    
    
    
    
    
    
}