<?php
class constellation{
    private $appkey = false; //申请的聚合天气预报APPKEY
 
    private $url = 'http://apis.baidu.com/bbtapi/constellation/constellation_query'; //城市列表API URL
    private $type = array('today','tomorrow','week','nextweek','month','year');
    public function __construct($appkey){
        $this->appkey = $appkey;
    }
 
    
 
    /**
     * 根据星座名称获取星座运势
     * @param string $star [星座名称]
     * @return array
     */
    public function getFortuneByName($star){
        $paramsArray = array(
//            'apikey'   => $this->appkey,
            'consName'  => $star,
            'type'    => 'today'//default;
        );
        $params = http_build_query($paramsArray);
        $content = $this->gfcurl($this->url,$params);
        return $this->_returnArray($content);
    }
 
    /**
     * 根据星座名称与时间类型查询星座运势
     * @param string $star [星座名称]
     * @param string $type [时间类型]
     * @return array
     */
    public function getFortuneByNameType($star,$type){
         $paramsArray = array(
//            'apikey'   => $this->appkey,
            'consName'  => $star,
            'type'    => $type,
        );
        $params = http_build_query($paramsArray);
        $content = $this->gfcurl($this->url,$params);
        return $this->_returnArray($content);
    }

    /**
     * 将JSON内容转为数据，并返回
     * @param string $content [内容]
     * @return array
     */
    public function _returnArray($content){
        return json_decode($content,true);
    }
  
    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    public function gfcurl($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();

        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.118 Safari/537.36' );//常见浏览器的UA
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );//连接允许的最常时间
        curl_setopt( $ch, CURLOPT_TIMEOUT , 30);//设置cURL运行的最长时间
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            $header = array('apikey: 2cf291486b5dd04551e81c11e1346615');
                // 添加apikey到header
            curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );//最近一次获取的http code
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }
 
}
?>