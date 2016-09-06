<?php
//装载模板文件
include_once("wx_tpl.php");

//获取微信发送数据
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

  //返回回复数据
if (!empty($postStr)){
          
    	//解析数据
          $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
    	//发送消息方ID
          $fromUsername = $postObj->FromUserName;
    	//接收消息方ID
          $toUsername = $postObj->ToUserName;
   	 //消息类型
          $form_MsgType = $postObj->MsgType;
          
    	//事件消息
          if($form_MsgType=="event")
          {
            //获取事件类型
            $form_Event = $postObj->Event;
            //订阅事件
            if($form_Event=="subscribe")
            {
              //回复欢迎文字消息
              $msgType = "text";
              $contentStr = "感谢您关注公众平台教程！[愉快]\n\n想学公众平台使用的朋友请输入“跟我学”！[玫瑰]";
              $resultStr = sprintf($textTpl, $fromUsername, $toUsername, time(), $msgType, $contentStr);
              echo $resultStr;
              exit;
            }
          
          }
          
  }
  else 
  {
          echo "";
          exit;
  }


/*include_once('wx_tpl.php');
//获取微信发送数据
$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
if(!empty($postStr)){
    //解析xml数据
    $postObj = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
    //发送消息方ID
    $fromUserName = $postObj->FromUserName;
    //接收方ID
    $toUserName = $postObj->ToUserName;
    //消息类型
    $msgType = $postObj->MsgType;
    //事件消息
    if(!$msgType == 'event'){
        $event = $postObj->Event;
        if($event == "subscribe"){
            $type = "text";
            $content = "感谢关注WeiZhi伟志服饰[愉快]！";
            $time = time();
            $info = sprintf($textTpl,$fromUserName,$toUserName,$time,$type,$content);
    
            echo $info;
            
            exit;
            
        }
    }
}else{
    echo "Post数据为空";
    exit;
}*/

/*function wx_interface(){
    $echoStr = $_GET["echostr"];
    $signature = $_GET["signature"];
    $timestamp = $_GET["timestamp"];
    $nonce = $_GET["nonce"];
        		
	$token = 'wx123456';
	$tmpArr = array($token, $timestamp, $nonce);
    // use SORT_STRING rule
	sort($tmpArr, SORT_STRING);
	$tmpStr = implode( $tmpArr );
	$tmpStr = sha1( $tmpStr );
		
	if( $tmpStr == $signature ){
        echo $echoStr;
        exit;
    }
}
wx_interface();*/