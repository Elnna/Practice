<?php
namespace app\controller;
use think\Controller;

class Index extends Controller{
	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$time='2016-11-21 0:00:00';
        echo strtotime($time);
        echo '<hr>';
        $time=date_create_from_format('Y-m-d H:i:s',$time)->getTimestamp();
        echo $time;  
        echo '<hr>';
        echo date('Y-m-d H:i:s',$time);
        $time2 = '2016-12-5 23:59:59';
        $stime2 = strtotime($time2);
        echo $stime2;
        echo '<hr>';
        
        echo date('Y-m-d H:i:s',$stime2);
        $time3 = time();
        echo '<hr>';
        if($time3 > $time){
            echo "time1:" . date('Y-m-d H:i:s',strtotime('2016-11-21 0:00:00')) . '<hr>';
            echo "not time:" . date('Y-m-d H:i:s',$time3);
        }else{
            echo '为时尚早';
        }
        if($time3 > $stime2){
            
            echo "not time:" . date('Y-m-d H:i:s',$time3);
        }else{
            echo "stime2:" . $stime2 . '<hr>';
            echo "time2:" . date('Y-m-d H:i:s',$stime2) . '<hr>';
            echo '为时尚早';
        }
        
//       echo date_format('1479807519','Y-m-d H:i:s');
//		$data = ['name' => 'Graham', 'age' => 25];
//		return json(['data' => $data,'code' => 1, 'msg' => '操作完成']);
		// $this->dispaly();
	}
}

