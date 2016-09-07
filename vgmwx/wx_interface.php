<?php

include_once('wx_tpl.php');
include_once('bd_api.php');
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
    if($msgType == 'event'){
        $event = $postObj->Event;
        if($event == "subscribe"){
            $type = "text";
            $content = "欢迎新朋友 [愉快] !\n\n关注WeiZhi伟志服饰\n有惊喜[爱心]\n\n打开惊喜请输入【jx】\n\n历史文章请输入【wz】\n\n";
            $time = time();
            $info = sprintf($textTpl,$fromUserName,$toUserName,$time,$type,$content);
            echo $info;
            
            exit;
        }
    }
    
    if($msgType == 'text'){
        $msgContent = trim($postObj->Content);
        
       /* $fp = fopen("./face.txt",'a');
        fwrite($fp,$msgContent);
        fwrite($fp,', ');
        fclose();*/
        
        if(!empty($msgContent)){
            
            switch($msgContent){
                case 'jx':
                    $res_arr = array(
                        array(
                            "关注有惊喜",
                            "http://voguem.com/vgmwx/public/img/gz.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        ),
                        array(
                            "伟志夏季给你清凉",
                            "http://voguem.com/vgmwx/public/img/1.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        ),
                        array(
                            "招贤纳士",
                            "http://voguem.com/vgmwx/public/img/2.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        ),
                        array(
                            "春末夏初穿什么",
                            "http://voguem.com/vgmwx/public/img/3.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        ),
                        array(
                            "招贤纳士",
                            "http://voguem.com/vgmwx/public/img/4.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        )
                        
                    );
                    break;
                case 'wz':
                   $res_arr = array(
                       array(
                            "关注有惊喜",
                            "http://voguem.com/vgmwx/public/img/gz.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        ),
                        array(
                            "伟志夏季给你清凉",
                            "http://voguem.com/vgmwx/public/img/1.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        ),
                        array(
                            "招贤纳士",
                            "http://voguem.com/vgmwx/public/img/1.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        ),
                        array(
                            "春末夏初穿什么",
                            "http://voguem.com/vgmwx/public/img/1.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        ),
                        array(
                            "招贤纳士",
                            "http://voguem.com/vgmwx/public/img/1.jpg",
                            "http://mp.weixin.qq.com/s?__biz=MzI1MDIxMTI5Mg==&mid=405522006&idx=1&sn=d7dcd44a6d81cb168ae5e3f02b434b05#rd"
                        )
                        
                    );
                    break;
                case '/::)': //表情
                    
                    $info = sprintf(
                        $musicTpl,
                        $fromUserName,
                        $toUserName,
                        time(),
                        "夏洛特烦恼",
                        "金志文",
                        "http://voguem.com/vgmwx/public/music/xialuotefannao-jinzhiwen.mp3",
                        "http://voguem.com/vgmwx/public/music/hxiaoluotefannao-jinzhiwen.mp3"
                    );
                    echo $info;
                    break;
                default:
                    $type = "text";
                    $content = "打开惊喜[爱心]请输入【jx】\n\n[愉快]历史文章请输入【wz】";
                    $time = time();
                    $info = sprintf($textTpl,$fromUserName,$toUserName,$time,$type,$content);
                    echo $info;
                    break;
                    
                    
            }
            
            $count = count($res_arr);
            if($count > 0){
                $resStr ="<xml>\n
                    <ToUserName><![CDATA[" .$fromUserName ."]]></ToUserName>\n
                    <FromUserName><![CDATA[" .$toUserName ."]]></FromUserName>\n
                    <CreateTime>". time() . "</CreateTime>\n
                    <MsgType><![CDATA[news]]></MsgType>\n
                    <ArticleCount>$count</ArticleCount>\n
                    <Articles>\n";  
                foreach($res_arr as $k => $v){
                    $resStr .= "<item>\n
                                <Title><![CDATA[". $v[0] ."]]></Title>\n 
                                <Description><![CDATA[]]></Description>\n
                                <PicUrl><![CDATA[". $v[1] ."]]></PicUrl>\n
                                <Url><![CDATA[". $v[2] ."]]></Url>\n
                                </item>\n";
                }
                $resStr .= "</Articles>\n
                            </xml>";
                echo $resStr;
            }
            
           exit; 
        }
    }
    
    //接收图片消息
    if($msgType == 'image'){
        //获取pic url
        $fromPicUrl = $postObj->PicUrl;
        //构造pic存储名字
        $filename = './public/img/'. $fromUserName. date('YmdHis'). '.jpg';
        
        ob_start();  
        //make file that output from url goes to buffer  
        readfile($url);  
        //file_get_contents($url);  这个方法不行的！！！只能用readfile  
        $img = ob_get_contents();  
        ob_end_clean();  
        if(!empty($img)){
            $fp = @fopen($filename, "a"); //append  
            fwrite($fp, $img);  
            fclose($fp);  
            
            $content = "图片上传成功";
        }else{
            $content = "图片上传失败";      
        }
        
        $msgType = 'text';
       
        $info = sprintf($textTpl,$fromUserName,$toUserName,time(),$msgType,$content);
        echo $info;
        
        exit;    
    }
    
    //地址位置，本地天气
    if($msgType == 'location'){
        $locationX = $postObj->Location_X;
        $locationY = $postObj->Location_Y;
        $locationScale = $postObj->Scale;
        $locationLabel = $postObj->Label;
        //云逆地址解析
        //http://api.map.baidu.com/cloudrgc/v1?location=40.055,116.308&geotable_id=135675&coord_type=bd09ll&ak=QPTtujW7FzsUjbGlilkpw6D5
        
        //地址解析使用百度地图api链接
        $bdMapApiUrl = "http://api.map.baidu.com/geocoder?";
        //坐标类型
        $mapCoordType = '&coord_type=wgs84ll';
        $ak = 'A0CWHx8fyG8OuwSiHoVDwcScEuw16WWY';
        $output = 'xml';
        $sk = 'xKPp5QclmAi1lqkKrd6fZ352GvF2Vymg';
        $uri = '/geocoder/v2/';
        $address = $locationLabel;
        $querystring_arrays = array(
            'address' => $address,
            'output' => $output,
            'ak' => $ak
        );
        $sn = caculateAKSN($ak, $sk, $uri, $querystring_arrays);
//        sprintf($bdMapApiUrl, urlencode($address), $output, $ak, $sn);
        $bdMapApiUrl = $bdMapApiUrl.$mapCoordType.'&location='.$locationX.','.$locationY;
        //抓取百度地址解析：
        ob_start();
        readfile($bdMapApiUrl);
        $res = ob_get_contents();
        ob_end_clean();
        
        if(!empty($res)){
            $fn = './public/tmp/map'.  date('YmdHis'). '.txt';
            $fp = fopen($fn,'w');
//            fwrite($fp,$postStr);
            fwrite($fp,$bdMapApiUrl);
//            fwrite($fp,$res);
            
            fclose($fp);
        }else{
            $msgType = 'text';
            $content = "无法解析map地址";
            $info = sprintf($textTpl,$fromUserName,$toUserName,time(),$msgType,$content);
            echo $info;
       
        }
        exit;
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