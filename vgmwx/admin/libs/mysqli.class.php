<?php
//include_once('../../config.php');
class mysqliDB{
    public static $mysqli = null;
    /*
    * 报错函数
    * @param string $err
    */
    function error($err){
//        die("对不起，您的操作有误，错误原因为：" . $err);
        echo "对不起，您的操作有误，错误原因为：" . $err;
        return false;
    }
    /*
    * 连接数据库
    *连接mysqli : mysqli是mysql的增强版本，用pdo连接数据库效率要比mysql直*接连接要慢，综合考虑，本人尝试用mysqli以面象对象的方式操作数据库
    * @param string $config
    *   @param string $dbhost 主机名
    *   @param string $dbuser 用户名
    *   @param string $dbpwd 密码
    *   @param string $dbname 数据库名
    *   @param string $dbcharset 字符集/编码
    * @return boolean
    */
    public function __construct($config = ''){
//    public function connect($config = ''){
        if(!class_exists('mysqli')){
            $this->error('不支持mysqli,请先开启');
        }
        if(is_array($config) && !empty($config)){
            extract($config);
       
            if(empty($dbhost)){
                $this->error('没有定义数据库配置');
            }
        }
        if(!isset(self::$mysqli)){
            try{
                self::$mysqli = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
            }catch(mysqli_sql_exception $e){
                $this->error($e->getMessage);
            }

            if(self::$mysqli->errno){
                $this->error('('. self::$mysqli->errno . ')' . self::$mysqli->error);
                return false;
            }
            if(!self::$mysqli->set_charset("utf8")){
                $this->error('('. self::$mysqli->errno . ')' . self::$mysqli->error);
            }
            
        }
        return self::$mysqli;
    }
    
    /*
    * 执行sql语句
    * @param string $sql
    * @return  bool 返回成功、资源、失败
    */
    function query($sql){
       
        if((($query = mysqli_query(self::$mysqli,$sql))) === false){
            echo $sql . '<br/>' . mysqli_error(self::$mysqli);
            return null;
//            $this->error($sql . '<br/>' . mysqli_error(self::$mysqli));
        }else{
          
            return $query;
        }
    }
    
    /*
    * 列表
    * @param source $query  sql语句通过mysqli_query执行出来的资源
    * @return array 列表数组
    */
    function findAll($query){
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }
    
    /*
    * 单条
    * @param source $query  sql语句通过mysqli_query执行出来的资源
    * @return array 单条信息数组
    */
    function findOne($query){
        return mysqli_fetch_array($query,MYSQLI_ASSOC);
    }
    /* 
    * 指定行的指定字段的值
    * @param source $query sql语句通过mysqli_query执行出来的资源
    * @return array 返回指定行的指定字段值
    */
    function findResult($query,$row=0,$field=0){
        mysqli_data_seek($query,$row);
        return mysqli_fetch_row($query)[$field];
    }
    
    /*
    * 添加行
    * @param string $table
    * @param array $arr 添加数组 (二维数组)
    *   [['name'=>'cat1','age'=>1],['name'=>'cat2','age'=>2],...]
    * @return 返回插入的id
    */
    function insert($table,$arr){
        
        $keys = array_keys($arr[0]);
        array_walk($keys,array('mysqliDB','addSpecialChar'));
        $fields = join(',',$keys);
        $binds = '('. str_replace(' ',',', trim(str_repeat("? ",count($arr[0])))) . ')';
        $types = $this->getTypes($arr[0]);
        $this->addSpecialChar($table);
        $sql = "INSERT INTO {$table}({$fields}) VALUES {$binds} ";
        
        $stmt = self::$mysqli->prepare($sql);
        if(!$stmt){
            $this->error("sql stament 为空");
            return false;
        }
        foreach($arr as $k => $v){
            extract($v);
            foreach($v as $k1 => $v1){
                eval('$vals[\''. $k . '\'] [\''. $k1 . '\'] = &$' . $k1 . ';');
            }
            unset($k1,$v1);
            
        }
        unset($k,$v);
   
        $store = array();
        foreach($vals as $v){
            call_user_func_array(array($stmt, 'bind_param'), array_merge(array($types), $v));
            mysqli_stmt_execute($stmt);
            $store['stmt'] = $stmt;
            $store['insert_id'] = $stmt->insert_id;
//            $store[] = $stmt->insert_id;
        }
        unset($v);
        return $store;  
    }
    
    /*
    * 注防sql注放按照insert的方法
    * 修改函数 
    * @param string $table
    * @param array $arr 修改数组(一维数组)
    * @param string $where 条件 array('and' => array('name'=> 'cat1', id=> 7), 'or' => array('sex' => 1));
    * @return 
    */
    function update($table,$arr,$where){
        
        $kArr = array();
        foreach($arr as $k => $v){
            $v = mysqli_real_escape_string(self::$mysqli,$v);
            $kArr[] = $this->addSpecialChar($k) . "='" .$v . "'";
        }
        $kArr = implode(",", $kArr);
        $this->addSpecialChar($table);
        $sql = "update " .$table . " set " . $kArr . " where " . $where;
//        return $sql;
        $this->query($sql);
    }
    
    /*
    * 删除函数
    * @param string $table 表名
    * @param string $where 条件
    */
    function del($table,$where){
        $this->addSpecialChar($table);
        $sql = "delete from {$table} where {$where}";
//        return $sql;
        $this->query($sql);
    }
    
    
    /*
    *获取参数类型首字母
    * @param array $arr 
    */
    
    function getTypes($arr=array()){
        $strType = '';
        if(!empty($arr)){
            foreach($arr as $var){
                $chrType = substr((string)gettype($var),0,1);
                $strType .= (!in_array($chrType,array("i","d","s"))) ? "b" : $chrType;
            }
        }
        
        return $strType;
    }
    
    /*
    * 通过反引号引用字段
    * @param unknown $value
    * @return string
    */
    function addSpecialChar(&$value){
        if($value==='*'||strpos($value,'.')!==false||strpos($value,'`')!==false){
            //不用做处理
        }elseif(strpos($value,'`')===false){
            $value='`'.trim($value).'`';
        }
        return $value;
    }
    
}