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
        //订阅
        if($event == "subscribe"){
            $type = "text";
            $content = "欢迎新朋友 [愉快] !\n\n关注WeiZhi伟志服饰\n有惊喜[爱心]\n\n打开惊喜请输入【jx】\n\n历史文章请输入【wz】\n\n";
            $time = time();
            $info = sprintf($textTpl,$fromUserName,$toUserName,$time,$type,$content);
            echo $info;
            
            exit;
        }
        //退订消息的接收
        if($event == 'unsubscribe'){
            
            $content = "";
            $fn = './public/tmp/unsubscribe.txt';
            $fp = fopen($fn, "r");
            $l = 0;
          
            
            while(!feof($fp)){
                $line = fgets($fp,4096);    //逐行读取
                $l++;
                if(!strstr($line,$fromUserName)){
                    $content = $l . "  " . $fromUserName . "  " . date("Y-m-d H:i:s") . " 退订\n"; 
                   
                }
            }
            fclose($fp);
            
            if(!empty($content)){
                $fp = fopen($fn, "a");
                fwrite($fp,$content);
                fclose($fp);
            }
            
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
        $geotable_id = "geotable_id=42";
        $ak = "&ak=fDb9hmtLGcgdtgm7zCBiQgdeuTjqp6lp";
        $coord_type="&coord_type=wgs84ll";
        $location = "&location=" .$locationX.",".$locationY;
       
        $bdMapApiUrl = "http://api.map.baidu.com/cloudrgc/v1?";
        //http://api.map.baidu.com/cloudrgc/v1?geotable_id=4&ak=fDb9hmtLGcgdtgm7zCBiQgdeuTjqp6lp&coord_type=wgs84ll&location=23.12004,113.30764
        
        ob_start();
        readfile($bdMapApiUrl.$geotable_id.$ak.$coord_type.$location);
        $res = ob_get_contents();
        ob_end_clean();
        
        if(!empty($res)){
          
            $res = json_decode($res);
            $city = $res->address_component->city;
            //新浪天气查询接口:
            $weatherApiUrl = "http://php.weather.sina.com.cn/xml.php?password=DJOYnieT8234jlsK";
            $city=str_replace(array("市","县","区"),array("","",""),$city);
            
            $city = "&city=".urlencode(iconv("UTF-8","GBK",$city));
            //0:当天,1:第二天,...
            $day = "&day=0";
            
            //抓取天气
            ob_start();
            readfile($weatherApiUrl.$city.$day);
            $weather = ob_get_contents();
            if(!empty($weather) && strstr($weather,'Weather')){
                preg_match_all("/\<city\>(.*?)\<\/city\>/",$weather,$wCity);
                preg_match_all("/\<status2\>(.*?)\<\/status2\>/",$weather,$wStatus2);
                preg_match_all("/\<status1\>(.*?)\<\/status1\>/",$weather,$wStatus1);
                preg_match_all("/\<temperature2\>(.*?)\<\/temperature2\>/",$weather,$wTemperature2);
                preg_match_all("/\<temperature1\>(.*?)\<\/temperature1\>/",$weather,$wTemperature1);
                preg_match_all("/\<direction2\>(.*?)\<\/direction2\>/",$weather,$wDirection2);
                preg_match_all("/\<direction1\>(.*?)\<\/direction1\>/",$weather,$wDirection1);
                preg_match_all("/\<power2\>(.*?)\<\/power2\>/",$weather,$wPower2);
                preg_match_all("/\<power1\>(.*?)\<\/power1\>/",$weather,$wPower1);
                preg_match_all("/\<chy_shuoming\>(.*?)\<\/chy_shuoming\>/",$weather,$wChy_shuoming);
                preg_match_all("/\<savedate_weather\>(.*?)\<\/savedate_weather\>/",$weather,$wSavedate_weather);
                //检查天气是否一致
                if($wStatus2 == $wStatus1){
                    $wStatus = $wStatus2[1][0];
                }else{
                    $wStatus = $wStatus2[1][0] ."转" . $wStatus1[1][0];
                }
                $weatherRes = array(
                    $wCity[1][0] . "天气预报",
                    "发布:" . $wSavedate_weather[1][0],
                    "气候:" . $wStatus,
                    "气温:" . $wTemperature2[1][0] . '-' . $wTemperature1[1][0],
                    "风向(力):" . $wDirection2[1][0] . ' ' . $wPower2[1][0] . '级 - ' . $wDirection1[1][0] . ' ' . $wPower1[1][0],
                    "穿衣:" . $wChy_shuoming[1][0]   
                );
                $weatherRes = implode("\n",$weatherRes);
                $msgType = "text";
                $info = sprintf($textTpl,$fromUserName,$toUserName,time(),$msgType,$weatherRes);
                echo $info;
               
            }
        
            
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