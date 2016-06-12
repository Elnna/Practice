<?php

//    <string name="wi_day_sunny">&#xf00d;</string>

    $file = '../values/weathericons.xml';
    $weatherCode = array();
    $xml = simplexml_load_file($file);
    echo $xml->getName() . "<br />";

foreach($xml->children() as $child)
  {
    echo substr($child,4,2). "<br>";
  echo $child->getName() . ": " . $child->attributes() . "<br />";
  }

?>