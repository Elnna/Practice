<?php
//文本消息模板
$textTpl =  "<xml>
             <ToUserName><![CDATA[%s]]></ToUserName>
             <FromUserName><![CDATA[%s]]></FromUserName>
             <CreateTime>%s</CreateTime>
             <MsgType><![CDATA[%s]]></MsgType>
             <Content><![CDATA[%s]]></Content>
             </xml>";
//回复图文消息模板
$newsTpl =  "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <ArticleCount>%s</ArticleCount>
            <Articles>
            <item>
            <Title><![CDATA[%s]]></Title> 
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
            </item>
            <item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
            </item>
            </Articles>
            </xml>";
//图片消息模板
$imageTpl =  "<xml>
             <ToUserName><![CDATA[%s]]></ToUserName>
             <FromUserName><![CDATA[%s]]></FromUserName>
             <CreateTime>%s</CreateTime>
             <MsgType><![CDATA[%s]]></MsgType>
             <PicUrl><![CDATA[%s]]></PicUrl>
             <MediaId><![CDATA[%s]]></MediaId>
             </xml>";

//语音消息模板
$voiceTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <MediaId><![CDATA[%s]]></MediaId>
            <Format><![CDATA[%s]]></Format>
            <MsgId>%s</MsgId>
            </xml>";


//开启语音识别模板
$voiceOpenTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <MediaId><![CDATA[%s]]></MediaId>
                <Format><![CDATA[%s]]></Format>
                <Recognition><![CDATA[腾讯微信团队]]></Recognition>
                <MsgId>%s</MsgId>
                </xml>";

//视频消息
$videoTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <MediaId><![CDATA[%s]]></MediaId>
            <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
            <MsgId>%s</MsgId>
            </xml>";

//小视频消息

$smallVideoTpl ="<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <MediaId><![CDATA[%s]]></MediaId>
                <ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
                <MsgId>%s</MsgId>
                </xml>";


//地理位置
$localtionTpl ="<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <Location_X>%s</Location_X>
            <Location_Y>%s</Location_Y>
            <Scale>%s</Scale>
            <Label><![CDATA[%s]]></Label>
            <MsgId>%s</MsgId>
            </xml>";
    
    
    
    
// 链接消息

$linkTpl =  "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <Url><![CDATA[%s]]></Url>
            <MsgId>%s</MsgId>
            </xml>";
    

/*------------------事件-----------------*/

//关注、取消事件
$eventTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <Event><![CDATA[%s]]></Event>
            </xml>";

//扫描二维码 
//未关注
$scanSqrcodeUTpl =  "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[event]]></MsgType>
                    <Event><![CDATA[subscribe]]></Event>
                    <EventKey><![CDATA[%s]]></EventKey>
                    <Ticket><![CDATA[%s]]></Ticket>
                    </xml>";


//已关注
$scanSqrcodeTpl =   "<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[event]]></MsgType>
                    <Event><![CDATA[SCAN]]></Event>
                    <EventKey><![CDATA[%s]]></EventKey>
                    <Ticket><![CDATA[%s]]></Ticket>
                    </xml>";


//自定义菜单

$menuDiyTpl =   "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[event]]></MsgType>
                <Event><![CDATA[CLICK]]></Event>
                <EventKey><![CDATA[%s]]></EventKey>
                </xml>";

//点菜单跳转
$menuClickTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[event]]></MsgType>
                <Event><![CDATA[VIEW]]></Event>
                <EventKey><![CDATA[%s]]></EventKey>
                </xml>";