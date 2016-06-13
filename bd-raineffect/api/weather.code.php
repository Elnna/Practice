<?php

//    <string name="wi_day_sunny">&#xf00d;</string>
/*

    $file = '../values/weathericons.xml';
    $weatherCode = array();
    $xml = simplexml_load_file($file);
    echo $xml->getName() . "<br />";

foreach($xml->children() as $child)
  {
    echo substr($child,3,2). "<br>";
  echo $child->getName() . ": " . $child->attributes() . "<br />";
  }
*/
$weatherCodeArr = array(
    '晴' => 'sunny',
    '多云' => 'cloudy',
    '阴' => 'cloudy',
    '阵雨' => 'showers',   
    '雷阵雨' => 'storm-showers',
    '雷阵雨并伴有冰雹' => 'radioactive'/* 'hail'*/,
    '雨夹雪' => 'sleet',
    '小雨' => 'sprinkle',
    '中雨' => 'rain-mix',
    '大雨' => 'rain',
    '暴雨' => 'thunderstorm',
    '大暴雨' => 'thunderstorm',
    '特大暴雨' => 'thunderstorm',
    '阵雪' => 'radioactive'/*'snow'*/,
    '小雪' => 'radioactive'/*'snow'*/,
    '中雪' => 'radioactive'/*'snow'*/,
    '大雪' => 'radioactive'/*'snow'*/,
    '暴雪' => 'radioactive'/*'snowthunderstorm'*/,
    '雾' => 'radioactive'/*'fog'*/,
    '冻雨' => 'sleet',
    '沙尘暴' => 'radioactive',
    '小雨-中雨' => 'radioactive',
    '暴雨-大暴雨' => 'radioactive',
    '大暴雨-特大暴雨' => 'radioactive',
    '小雪-中雪' => 'radioactive',
    '中雪-大雪' => 'radioactive',
    '大雪-暴雪' => 'radioactive',
    '浮沉' => 'radioactive',
    '扬沙' => 'radioactive',
    '强沙尘暴' => 'radioactive',
   /* '21' => '',
    '22' => '',
    '23' => '',
    '24' => '',
    '25' => '',
    '26' => '',
    '27' => '',
    '28' => '',
    '29' => '',
    '30' => '',
    '31' => '',*/
    );


$weatherCode = json_encode($weatherCodeArr);
define('WEATHER_CODE',$weatherCode);
?>