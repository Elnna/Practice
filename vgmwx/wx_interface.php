<?php
include_once('wx_tpl.php');
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
            /*$info = "<xml>\n
                    <ToUserName><![CDATA[" .$fromUserName ."]]></ToUserName>\n
                    <FromUserName><![CDATA[" .$toUserName ."]]></FromUserName>\n
                    <CreateTime>". time() . "</CreateTime>\n
                    <MsgType><![CDATA[news]]></MsgType>\n
                    <ArticleCount>3</ArticleCount>\n
                    <Articles>\n";
            $info .= "<item>\n
            <Title><![CDATA[伟志夏季给你清凉]]></Title>\n 
            <Description><![CDATA[]]></Description>\n
            <PicUrl><![CDATA[http://ww2.sinaimg.cn/mw690/a8a5270cjw1f7k1fmy7cjj20zk0qoadu.jpg]]></PicUrl>\n
            <Url><![CDATA[http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405456946&idx=1&sn=90dccfe5de6011b609a985855545cc7e&scene=4#wechat_redirect]]></Url>\n
            </item>\n";
            $info .= "<item>\n
            <Title><![CDATA[招贤纳士]]></Title>\n 
            <Description><![CDATA[加入伟志，让生活更精彩！]]></Description>\n
            <PicUrl><![CDATA[http://all.voguem.com/vgmwx/public/img/1.jpg]]></PicUrl>\n
            <Url><![CDATA[http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405471567&idx=1&sn=2c4eb54b9247eddf43637e12d1858948&scene=4#wechat_redirect]]></Url>\n
            </item>\n";
             $info .= "<item>\n
            <Title><![CDATA[春末夏初穿什么？]]></Title>\n 
            <Description><![CDATA[来自意大利国际设计大师的手笔，伟志衬褂，男人衣橱的必备品。]]></Description>\n
            <PicUrl><![CDATA[http://all.voguem.com/vgmwx/public/img/2.jpg]]></PicUrl>\n
            <Url><![CDATA[http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd]]></Url>\n
            </item>\n";
            $info .= "</Articles>\n
                    </xml>";*/
            
            echo $info;
            
            exit;
            
        }
    }
}else{
    echo "Post数据为空";
    exit;
}

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