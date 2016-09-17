<?php
namespace Common\Model;
use Think\Model;

/*
* 推荐位内容content model操作
*/
class PositionContentModel extends Model{
    private $_db = '';
    public function __construct(){
        $this->_db = M('position_content');
    }
    
    public function getPositionContents($data,$page,$pageSize = 10){
        $conditions = $data;
        $data['status'] = array('neq',-1);
        if(isset($data['title']) && $data['title']){
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['position_id']) && $data['position_id']){
            $conditions['position_id'] = intval($data['position_id']);
        }
        $offset = ($page-1) *$pageSize;
        $list = $this->_db->where($conditions)
            ->order('id desc')
            ->limit($offset,$pageSize)
            ->select();
        return $list;    
        
    }
    
    public function getPositionContentsCount($data = array()){
        $conditions = $data;
        $data['status'] = array('neq',-1);
        if(isset($data['title']) && $data['title']){
            $conditions['title'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['position_id']) && $data['position_id']){
            $conditions['position_id'] = intval($data['position_id']);
        }
        return $this->_db->where($conditions)->count();
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
    public function updateById($id,$data){
        if(!$id || !is_numeric($id)){
            throw_exception("ID数据不合法");
        }
        if(!$data || !is_array($data)){
            throw_exception("数据不合法");
        }
        return $this->_db->where('id='. $id)->save($data);
    }
    
    public function insert($data = array()){
        if(!is_array($data)|| !$data){
            return 0;
        }
        
        return $this->_db->add($data);
    }
    
    public function find($id){
        $data = array();
        if($id && is_numeric($id)){
            $data = $this->_db->where('id=' . $id)->find();
        }
        return $data;
        
    }
    
    public function select($data=array(),$limit){
        if(!$data ||!is_array($data)){
            throw_exception('数据不合法');
        }
        if(!$limit|| !is_numeric($limit)){
            throw_exception("数据不合法");
        }
        return $this->_db->where($data)
                    ->order('id desc')
                    ->limit($limit)
                    ->select();
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
    
}