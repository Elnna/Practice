<?php
$expressCodeArray = array(
    'common' => array(
//        'ems' => 'EMS',
        'shentong' => '申通',
        'yuantong' => '圆通',
//        'zhongtong' => '中通',
        'baishi' => '百世',
//        'ems'=> 'E邮宝',
        'ups' => 'UPS',
//        'upsen' => 'UPS（英)',
        'shunfeng' => '顺丰',
//        'shunfengen' => '顺丰(英)',
        'yunda' => '韵达',
        'tiantian' => '天天',
        'zhaijisong' => '宅急送'
        
    ),
        'A'=> array(
            'aae' => 'AAE',
            'anxingdakuaixi' => '安信达',
        ),
        'B' => array(
            'bht' => 'BHT',
            'baifudongfang' => '百福东方',
        ),
        'C' => array(
            'coe' => 'COE'
        ),
        'D' => array(
            'dhl' => 'DHL',
            'datianwuliu' => '大田',
            'debangwuliu' => '德邦',
        ),
        'F' => array(
           'fedex' => 'FedEx',
            'feikangda'=> '飞康达',
        )
);


$expressCode = json_encode($expressCodeArray);
define('Express_Code',$expressCode);
    