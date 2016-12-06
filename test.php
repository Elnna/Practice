<?php
$str = "灵魂 ，香气 ，哈哈 ，你好 ，hello ,world";
$arr = mb_split(" ",$str);
$arr2 = mb_split("\,|\，",$str);

echo $str.'<br/>';
var_dump($arr);
echo '<br/>';
var_dump($arr2);
?>