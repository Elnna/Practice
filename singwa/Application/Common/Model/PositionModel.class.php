<?php
namespace Common\Model;
use Think\Model;

/*
* 文章内容content model操作
*/
class PositionModel extends Model{
    private $_db = '';
    public function __construct(){
        $this->_db = M('position');
    }
    public function getPositions($data,$page,$pageSize = 10){
        $conditions = $data;
        $data['status'] = array('neq',-1);
        if(isset($data['title']) && $data['title']){
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['id']) && $data['id']){
            $conditions['id'] = intval($data['id']);
        }
        $offset = ($page-1) *$pageSize;
        $list = $this->_db->where($conditions)
            ->order('id desc')
            -> limit($offset,$pageSize)
            ->select();
        return $list;    
        
    }
    public function getPositionsCount($data = array()){
        $conditions = $data;
        $data['status'] = array('neq',-1);
        if(isset($data['title']) && $data['title']){
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['id']) && $data['id']){
            $conditions['id'] = intval($data['id']);
        }
        return $this->_db->where($conditions)->count();
    }
    public function updateListorderById($id,$listorder){
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
       
        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('id='.$id)->save($data);
    }
    public function updateStatusById($id,$status){
        $data = array();
        if(!$id || !is_numeric($id)){
            throw_exception("ID数据不合法");
        }
        if(!$status || !is_numeric($status)){
            throw_exception("状态不合法");
        }
        $data['status'] = $status;
        return $this->_db->where('id='. $id)->save($data);
        
    }
    
    /*public function insert($data = array()){
        if(!is_array($data)|| !$data){
            return 0;
        }
        $data['create_time'] = time();
        $data['username'] = getLoginUsername();
        return $this->_db->add($data);
    }
    public function getNews($data,$page,$pageSize = 10){
        $conditions = $data;
        $data['status'] = array('neq',-1);
        if(isset($data['title']) && $data['title']){
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['catid']) && $data['catid']){
            $conditions['catid'] = intval($data['catid']);
        }
        $offset = ($page-1) *$pageSize;
        $list = $this->_db->where($conditions)
            ->order('listorder desc, news_id desc')
            -> limit($offset,$pageSize)
            ->select();
        return $list;    
        
    }
    public function getNewsCount($data = array()){
        $conditions = $data;
        $data['status'] = array('neq',-1);
        if(isset($data['title']) && $data['title']){
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['catid']) && $data['catid']){
            $conditions['catid'] = intval($data['catid']);
        }
        return $this->_db->where($conditions)->count();
    }
    public function updateNewsListorderById($id,$listorder){
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
       
        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('news_id='.$id)->save($data);
    }
    public function find($id){
        $data = array();
        if($id && is_numeric($id)){
            $data = $this->_db->where('news_id=' . $id)->find();
        }
        return $data;
        
    }
    
    public function updateById($id, $data){
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!$data || !is_array($data)){
            throw_exception('更新数据不合法');
        }
        return $this->_db->where("news_id=" . $id)->save($data);
    }
    
    public function updateStatusById($id, $status){
        $data = array();
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        if(!is_numeric($status)){
            throw_exception('状态不合法');
        }
        $data['status'] = $status;
        // $sql = $this->_db->fetchSql(true)->where('news_id='.$id)->save($data);;
        // return $sql;
        return $this->_db->where('news_id='.$id)->save($data);
    }*/
    
    public function getNormalPositions(){
        $conditions = array('status'=> 1);
        $list = $this->_db->where($conditions)->order('id')->select();
        return $list;
    }
    
}