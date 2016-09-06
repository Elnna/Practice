<?php

function wx_interface(){
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
wx_interface();