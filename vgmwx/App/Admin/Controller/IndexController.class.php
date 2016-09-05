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
            $this->reponseMsg();
        }
//        echo 'tooken';
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
    /*public function responseMsg(){
        //1.获取微信推送过来的post数据(xml格式)
        $postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
        $tmpStr = $postArr;
        //.2处理消息类型，并设置回复类型和内空
        $postObj = simplexml_load_string($postArr);
//        print_r($postObj);
        if(strtolower($postObj->MsgType) == 'event'){
            if(strtolower($postObj->Event) == 'subscribe'){
                $toUser = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time = time();
                $msgType = 'text';
                
                $content = '欢迎关注我们的微信公众号';
//                $content = '公众账号' .$postOjb->ToUserName. '\n微信用户的openid' .$postObj->FromUserName .'\n回复消息格式： ' .$tmpstr;
                $template = "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    </xml>";
                $info = sprintf($template,$toUser,$fromUser,$time,$msgType,$content);

                echo $info;
            }
        }*/
    
    
    public function reponseMsg(){
		//1.获取到微信推送过来post数据（xml格式）
		$postArr = $GLOBALS['HTTP_RAW_POST_DATA'];
		//2.处理消息类型，并设置回复类型和内容
		/*<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[FromUser]]></FromUserName>
<CreateTime>123456789</CreateTime>
<MsgType><![CDATA[event]]></MsgType>
<Event><![CDATA[subscribe]]></Event>
</xml>*/
		$postObj = simplexml_load_string( $postArr );
		//$postObj->ToUserName = '';
		//$postObj->FromUserName = '';
		//$postObj->CreateTime = '';
		//$postObj->MsgType = '';
		//$postObj->Event = '';
		// gh_e79a177814ed
		//判断该数据包是否是订阅的事件推送
		if( strtolower( $postObj->MsgType) == 'event'){
			//如果是关注 subscribe 事件
			if( strtolower($postObj->Event == 'subscribe') ){
				//回复用户消息(纯文本格式)	
				$toUser   = $postObj->FromUserName;
				$fromUser = $postObj->ToUserName;
				$time     = time();
				$msgType  =  'text';
				$content  = '欢迎关注我们的微信公众账号'.$postObj->FromUserName.'-'.$postObj->ToUserName;
				$template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							</xml>";
				$info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
				echo $info;
/*<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[fromUser]]></FromUserName>
<CreateTime>12345678</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[你好]]></Content>
</xml>*/
			

			}
		}
    }
        
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}