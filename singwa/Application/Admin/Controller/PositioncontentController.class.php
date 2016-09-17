<?php
/*后台推荐位内容*/
namespace Admin\Controller;
use Think\Controller;

class PositionContentController extends CommonController{

    
    public function index(){
        $conds = array();
        $title = $_GET['title'];
        if($title){
            $conds['title'] = $title;
            $this->assign('stitle',$title);
        }
        if($_GET['position_id']){
            $conds['position_id'] = intval($_GET['position_id']);
            $this->assign('position_id',$conds['position_id']);
            
        }
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 6;
        $positionsContent = D('PositionContent')->getPositionContents($conds,$page,$pageSize);
        $count = D('PositionContent')->getPositionContentsCount($conds);
        
        $res = new \Think\Page($count,$pageSize);
        $pageres = $res->show();
        
        $positions = D('Position')->getNormalPositions();
        // print_r($positions);
        $this->assign('positions',$positions);
        $this->assign('contentTitle',$title);
        $this->assign('pageres',$pageres);
        $this->assign('positionsContent',$positionsContent);
        
        $this->display();
        
    }
   
    public function add(){
        if($_POST){
            if(!isset($_POST['position_id']) || !$_POST['position_id']){
                return show(0,'推荐位ID不能为空');
            }
            if(!isset($_POST['title']) || !$_POST['title']){
                return show(0,'推荐位标题不能为空');
            }
            if(!isset($_POST['url']) && !$_POST['news_id']){
                return show(0,'url与news_id不能同时为空');
            }
            if(!isset($_POST['thumb']) || !$_POST['thumb']){
                if($_POST['news_id']){
                    $res = D('news')->find($_POST['news_id']);
                    if($res && is_array($res)){
                        $_POST['thumb'] = $res['thumb'];
                    }
                }else{
                    return show(0,'图片不能为空');
                }
            }
            if($_POST['id']){
                return $this->save($_POST);
            }
            try{
                $id = D('PositionContent')->insert($_POST);
                // $id = 1;
                if($id){
                    return show(1,'新增成功');
                }
                return show(0,'新增失败');
            }catch(Exception $e){
                return show(0,$e->getMessage());
            }
            
        }else{
            $positions = D('Position')->getNormalPositions();
            $this->assign('positions',$positions);
            $this->display();
        }
    }
    
    public function edit(){
        $id = $_GET['id'];
        $position = D('PositionContent')->find($id);
        $positions = D('Position')->getNormalPositions();
        //  print_r($position);
        //  print_r($positions);
        $this->assign('positions',$positions);
        $this->assign('pcontent',$position);
        $this->display();
    }
    
    public function save($data){
        $id = $data['id'];
        unset($data['id']);
        try{
            $res = D('PositionContent')->updateById($id,$data);
            if($res === false){
                return show(0,'更新失败');
            }
            return show(1,'更新成功');
            
        }catch(Exception $e){
            return show(0, $e->getMessage);
        }
    }
    
    
    public function listorder(){
        return parent::listorder('PositionContent');
        // print_r($_POST);
        /*$listorder = $_POST['listorder'];
        $jumpUrl = $_SERVER['HTTP_REFERER'];
        $errors = array();
        if($listorder){
            try{
                foreach ($listorder as $positionId => $v) {
                    // 更新
                    $res = D('PositionContent')->updatePContentListorderById($positionId,$v);
                    if($res === false){
                        $errors[] = $positionId;
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
        return show(0,'排序数据失败',array('jump_url'=> $jumpUrl));*/

    }
    
    public function setStatus(){
        return parent::setStatus($_POST,'PositionContent');
    }
    
    
    
    
    
    
    
    
    
    
    
}