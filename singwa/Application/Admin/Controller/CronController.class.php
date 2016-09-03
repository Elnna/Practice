<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Upload;

/**
 * 后台计划任务，业务脚本
 */
class CronController extends CommonController {
    public function dumpmysql(){
        $res = D('Basic')->select();
        if(!$res['dumpmysql']){
            die('系统没有设置开启自动备份数据库的内容');
        }
        $shell = "mysqldump -u".C("DB_USER")." ".C("DB_NAME")." > /tmp/cms".date('Ymd') .'.sql';
        exec($shell);
    }
}