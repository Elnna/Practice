<?php
namespace Home\Controller;
use Think\Controller;
class CatController extends CommonController {
    
    public function index(){
        $id = intval($_GET['id']);
        if(!$id){
            return $this->error('ID不存在');
        }
        $nav = D('Menu')->find($id);
        if(!$nav || $nav['status'] !=1){
            return $this->error('栏目id不存在或着状态不为正常');
        }
        $rankNews = $this->getRank();
       
        $adsConds = array(
            'status' => 1,
            'position_id' => 5,
        );
        
        $ads = D('PositionContent')->select($adsConds,2);
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 2;
        $conds = array(
            'status' => 1,
            'thumb' => array('neq',''),
            'catid' => $id,
        );
        
        $news = D('News')->getNews($conds,$page,$pageSize);
        $count = D('News')->getNewsCount($conds);
        
        $res = new \Think\Page($count,$pageSize);
        $pageres = $res->show();
        
        
        
        $res2 = array(
            'ads' => $ads,
            'rankNews' => $rankNews,
            'catId' => $id,
            'listNews' => $news,
            'pageres' => $pageres
            );
            // print_r($res2);
        $this->assign('res',$res2);
        $this->display();
        
    }
}