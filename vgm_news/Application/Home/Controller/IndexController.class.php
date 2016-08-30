<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index($type=''){
        //获取排行
        $rankNews = $this->getRank();
        //获取首页大图
        $conds = array(
            'status'=> 1,
            'position_id' => 2,
        );
        $smallConds = array(
            'status'=> 1,
            'position_id' => 3,
        );
        $listConds = array(
            'status' => 1,
            'thumb' => array('neq',''),
        );
        $adsConds = array(
            'status' => 1,
            'position_id' => 5,
        );
        $topPic = D('PositionContent')->select($conds,1);
        $topSmallPic = D('PositionContent')->select($smallConds,3);
        $lists = D('News')->select($listConds,30);
        $ads = D('PositionContent')->select($adsConds,2);
        
        $res = array(
            'topPic' =>$topPic,
            'topSmallPic' => $topSmallPic,
            'lists' => $lists,
            'ads' => $ads,
            'rankNews' => $rankNews,
            'catId' => 0
            );
            // print_r($res);
        $this->assign('res',$res);
        /*生成静态化页面*/
        if($type == 'buildHtml'){
            $this->buildHtml('index',HTML_PATH,'Index/index');
        }else{
             $this->display();
        }
       
    }
     
    public function build_html(){
        $this->index('buildHtml');
        return show(1,'首页缓存生成成功');
    }
    /*定时生成首页*/
    public function crontab_html(){
        if(APP_CRONTAB !=1){
            die('the_file_must_exec_crontab');
        }
        $res = D('Basic')->select();
        if(!$res['cacheindex']){
            die('系统没有设置开启自动生成首页缓存内容');
        }
        $this->index('buildHtml');
    }
    
    public function getCount(){
        if(!$_POST){
            return show(0,'没有任何内容');
        }
        $newsId = array_unique($_POST);
        try{
            $list = D("News")->getNewsByNewsIdIn($newsId);
        }catch(Exception $e){
            return show(0,$e->getMessage());
        }
        if(!$list){
            return show(0,'noDATa');
        }
        $data = array();
        foreach($list as $k=> $v){
            $data[$v['news_id']] = $v['count'];
        }
        return show(1,'success',$data);
    }
    
    
    
}