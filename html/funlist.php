<?php 
$arr = get_defined_functions();
//print_r($arr['internal']);
for($i=0; $i < count($arr['internal']); $i++){?>
<p>
<?php
    print $i . '=>' . $arr['internal'][$i] . "\n";
}
    ?></p>