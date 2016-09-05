<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;

//define("WX_ACCESS_TOKEN", "voguemwx");
class IndexController extends Controller {
    public function index(){
       if (!C("WX_ACCESS_TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $echoStr = $_GET["echostr"];		
		$token = C('WX_ACCESS_TOKEN');
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
            //第一次接入wx
			echo $echoStr;
            exit;
		}else{
            $this->responseMsg();
        }
        echo 'tooken';
    }
    //接收事件推送并回复
    /*
    接收格式
    <xml>
 <ToUserName><![CDATA[toUser]]></ToUserName>
 <FromUserName><![CDATA[fromUser]]></FromUserName>
 <CreateTime>1348831860</CreateTime>
 <MsgType><![CDATA[text]]></MsgType>
 <Content><![CDATA[this is a test]]></Content>
 <MsgId>1234567890123456</MsgId>
 </xml>
 
 回复格式
 
 <xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[fromUser]]></FromUserName>
<CreateTime>12345678</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[你好]]></Content>
</xml>

    */
    public function responseMsg(){
        //1.获取微信推送过来的post数据(xml格式)
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        //.2处理消息类型，并设置回复类型和内空
        $postObj = simplexml_load_string($postArr);
        if(strtolower($postObj->MsgType) == 'event'){
            if(strtolower($postObj->Event) == 'subscribe'){
                $toUser = $postObj->FromuserName;
                $fromUser = $postObj->ToUserName;
                $time = time();
                $msgType = 'text';
                $content = '欢迎关注我们的微信公众号';
                $template = '<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    </xml>';
                $info = sprintf($template,$toUser,$fromUser,$time,$msgType,$content);

                echo $info;
            }
        }
        
    }
    
    
}