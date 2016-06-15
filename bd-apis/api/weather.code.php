<?php
$weatherCodeArr = array(
    '晴' => 'sunny',
    '多云' => 'cloudy',
    '阴' => 'cloudy',
    '阵雨' => 'showers',   
    '雷阵雨' => 'storm-showers',
    '雷阵雨并伴有冰雹' => 'hail',
    '雨夹雪' => 'sleet',
    '小雨' => 'sprinkle',
    '中雨' => 'rain-mix',
    '大雨' => 'rain',
    '暴雨' => 'thunderstorm',
    '大暴雨' => 'thunderstorm',
    '特大暴雨' => 'thunderstorm',
    '阵雪' => 'snow',
    '小雪' => 'snow',
    '中雪' => 'snow',
    '大雪' => 'snow',
    '暴雪' => 'snowthunderstorm',
    '雾' => 'fog',
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
    );


$weatherCode = json_encode($weatherCodeArr);
define('WEATHER_CODE',$weatherCode);
?>