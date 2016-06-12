<?php
function getIp() {
    if (getenv('HTTP_CLIENT_IP'))
    {
        $ip = getenv('HTTP_CLIENT_IP');
    } elseif (getenv('HTTP_X_FORWARDED_FOR'))
    {
        $ip = getenv('HTTP_X_FORWARDED_FOR');
    } elseif (getenv('REMOTE_ADDR'))
    {
        $ip = getenv('REMOTE_ADDR');
    } else
    {
        $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
    }
    return $ip;
}
?>