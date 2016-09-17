<?php
$weatherCodeArr = array(
    '晴' => 'sunny',
    '日食' => 'solar-eclipse',
    '晴转阴' => 'sunny-overcast',
    '多云' => 'cloudy',
    '多云大风' => 'cloudy-gusts',
    '多云微风' => 'cloudy-windy',
    '大风' => 'windy',
    '风' => 'light-wind',
    '阴' => 'cloudy-high',
    '阵雨' => 'showers',  
    '冰雹' =>'hail',
    '闪电' =>'lightning',
    '雷雨' => 'thunderstorm',
    '雷阵雨' => 'storm-showers',
    '雷阵雨并伴有冰雹' => 'hail',
    '雨夹雪' => 'sleet',
    '暴风雪' => 'sleet-storm',
    '小雨' => 'sprinkle',
    '中雨' => 'rain-mix',
    '大雨' => 'rain-wind',
    '暴雨' => 'storm-showers',
    '大暴雨' => 'thunderstorm',
    '特大暴雨' => 'thunderstorm',
    '阵雪' => 'snow',
    '小雪' => 'snow',
    '中雪' => 'snow',
    '大雪' => 'snow-wind',
    '暴雪' => 'snow-thunderstorm',
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
    '霾' =>'haze'
    );


$weatherCode = json_encode($weatherCodeArr);
define('WEATHER_CODE',$weatherCode);
function getWeatherIndexIcon( $index ){
    $indexIcon = '';
    switch($index){
    
        case 'gm': $indexIcon = 'ion-ios-medkit';
            break;
        case 'fs': $indexIcon = 'ion-umbrella';
            break;
        case 'ct': $indexIcon = 'ion-tshirt-outline';
            break;
        case 'yd': $indexIcon = 'ion-ios-football';
            break;
        case 'xc': $indexIcon = 'ion-model-s';
            break;
        case 'ls': $indexIcon = 'ion-ios-sunny-outline';
            break;
        default:$indexIcon = 'ion-ios-sunny-outline';
            break;
    }
    return $indexIcon;
}
?>