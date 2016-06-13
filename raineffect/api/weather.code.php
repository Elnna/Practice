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
    '00' => 'sunny',
    '01' => 'cloudy',
    '02' => 'cloudy',
    '03' => 'showers',   
    '04' => 'storm-showers',
    '05' => 'hail',
    '06' => 'sleet',
    '07' => 'sprinkle',
    '08' => 'rainy',
    '09' => 'rain',
    '10' => 'thunderstorm',
    '11' => 'thunderstorm',
    '12' => 'thunderstorm',
    '13' => 'snow',
    '14' => 'snow',
    '15' => 'snow',
    '16' => 'snow',
    '17' => 'snowthunderstorm',
    '18' => 'fog',
    '19' => 'sleet',
    '20' => 'radioactive',
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