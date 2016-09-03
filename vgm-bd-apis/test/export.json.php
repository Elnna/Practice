<?php
$fp = fopen('./api/express.csv',"r") or die('no file opened');
$res = array();
while(!feof($fp))
{
        $str = fgets($fp);
        $str= str_replace(PHP_EOL, '', $str);
        $arr = explode(',', $str);
        if(count($arr)>1){
                $arr =  array(
                                'com' => $arr[0],
                                'name' => $arr[1],
                                );
                $res[] = $arr;
        }
}
fclose($fp);

$res_json = json_encode($res);
echo "\n";
?>

<pre><?php var_dump($res);?></pre>