<?php
namespace Common\Model;
use Think\Model;
class AdminModel extends Model{
    private $_db = '';
    public function __construct(){
        $this->_db = M('admin');
    }
    public function getAdminByUsername($usr){
       $res =  $this->_db->where('username="'.$usr.'"')->find();
        return $res;
        
    }
    public function getAdminByAdminId($adminId = 0){
        $res = $this->_db->where('admin_id ='. $adminId)->find();
        return $res;
    }
    public function updateByAdminId($id,$data){
        if(!$id || !is_numeric($id)){
            throw_exception("ID不合法");
        }
        if(!$data || !is_array($data)){
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('admin_id=' . $id)->save($data);
    }
    public function insert($data = array()){
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }
    public function getAdmins(){
        $data = array(
            'status'=>array('neq',-1)
        );
        return $this->_db->where($data)
                         ->order('admin_id desc')
                         ->select();
    }
    /*
    *通过id更新状态
    */
    public function updateStatusById($id,$status){
        $data = array();
        if(!is_numeric($status)){
            throw_exception('状态值不能为非数字字符');
        }
        if(!$id || !is_numeric($id)){
            throw_exception('ID不合法');
        }
        $data['status'] = $status;
        return $this->_db->where('admin_id=' .$id)->save($data);
    }
    
    public function getLastLoginUsers(){
        $time = mktime(0,0,0,date('m'),date('d'),date('Y'));
        $data = array(
            'status' => 1,
            'lastlogintime' => array('gt',$time),
        );
        $res = $this->_db->where($data)->count();
        return $res['tp_count'];
    }
    
 
   
    
    
}