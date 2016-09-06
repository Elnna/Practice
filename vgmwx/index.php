<?php
require_once('./wx_interface.php');
$wechatObj = new wechatCallbackapiTest();
$wechatObj->valid();

echo 'hello wx interface';