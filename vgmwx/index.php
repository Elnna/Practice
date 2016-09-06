<?php
require_once('./wx_interface.php');

$wechatObj = new wechatCallbackapi();
$wechatObj->valid();

echo 'hello wx interface';