<?php
namespace Admin\Controller;
use Think\Controller;
use \wechatCallbackapi;

class IndexController extends Controller {
    public function index(){
        $wechatObj = new wechatCallbackapi();
        $wechatObj->valid();
    }
    
    
}