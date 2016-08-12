<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends CommonController {
    public function index(){
        $id = intval($_GET['id']);
        if(!$id || $id <0){
            return $this->error('ID不合法');
        }
        $news = D('News')->find($id);
        // print_r($news);
        if(!$news || $news['status'] != 1){
            $this->error('ID不存在或资讯被关闭');
        }
        
        $count = intval($news['count'])+1;
        D('News')->updateCount($id,$count);
        $content = D('NewsContent')->find($id);
        
        $news['content'] = htmlspecialchars_decode($content['content']);
        $rankNews = $this->getRank();
       
        $adsConds = array(
            'status' => 1,
            'position_id' => 5,
        );
        
        $ads = D('PositionContent')->select($adsConds,2);
        
        $res2 = array(
            'ads' => $ads,
            'rankNews' => $rankNews,
            'catId' => $news['catid'],
            'news' => $news,
            );
            // print_r($news);
        $this->assign('res',$res2);
        $this->display('Detail/index');
    }
    public function view(){
        if(!getLoginUsername()){
            $this->error('您没有权限访问页面');
        }
        $this->index();
    }
}