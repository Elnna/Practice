<?php
/**
*time:2016-6-12
*/
//----------------------------------
// 百度数据天气预报接口请求类
//----------------------------------
require_once('weather.code.php');
/*便民查询类，实现：天气、星座、车票、*/
class convenienceInfo{
    private $appkey = false; //申请的聚合天气预报APPKEY
 
    
    //查询天气
    $weatherUrl = 'http://apis.baidu.com/apistore/weatherservice';
    /*private $cityUrl = 'http://apis.baidu.com/apistore/weatherservice/citylist'; //城市列表API URL
 
    private $weatherUrl = 'http://apis.baidu.com/apistore/weatherservice/recentweathers'; //根据城市请求历史七天和未来四天天气API URL
    private $pyUrl = 'http://apis.baidu.com/apistore/weatherservice/weather';//根据城市拼音查询
    private $cityNameUrl = 'http://apis.baidu.com/apistore/weatherservice/cityname';//根据城市名称查询
    private $cityInfoUrl = 'http://apis.baidu.com/apistore/weatherservice/cityinfo'; //城市信息列表
 
    private $cityCodeUrl = 'http://apis.baidu.com/apistore/weatherservice/cityid'; //根据城市代码
    */
    
    //查询星座
    private $constellUrl = 'http://apis.baidu.com/bbtapi/constellation/constellation_query'; //星座列表 URL
    
    //查询火车票
    private $trainUrl = 'http://apis.baidu.com/qunar/qunar_train_service'; 
    /*private $trainDetailUrl = 'http://apis.baidu.com/qunar/qunar_train_service/traindetail';//车次详情
    private $stationsearchUrl = 'http://apis.baidu.com/qunar/qunar_train_service/stationsearch';//车站详情
    private $ssSearchUrl = 'http://apis.baidu.com/qunar/qunar_train_service/s2ssearch';//站站搜索
    private $suggestSearchUrl = 'http://apis.baidu.com/qunar/qunar_train_service/suggestsearch'; //建议
        */
    
    //快递查询
    
    private $weatherCode = WEATHER_CODE;
    
    public function __construct($appkey){
        $this->appkey = $appkey;
    }
    
    /**
     * 获取天气预报支持城市列表
     * @return array
     */
    public function getCitys(){
        $content = $this->juhecurl($this->cityUrl);
        return $this->_returnArray($content);
    }
 
    /**
     * 根据城市请求历史七天和未来四天天气API URL
     * @param string $city [城市名称]
     * @return array
     */
    public function getWeather($city){
        $paramsArray = array(
            'cityname'  => $city
        );
        $params = http_build_query($paramsArray);
        $content = $this->juhecurl($this->weatherUrl,$params);
        return $this->_returnArray($content);
    }
 
    /**
     * 根据城市拼音查询
     * @param string $pinyin [城市拼音]
     * @return array
     */
    public function getWeatherByPY($py){
         $paramsArray = array(
            'citypinyin'  => $py
        );
        $params = http_build_query($paramsArray);
        $content = $this->juhecurl($this->pyUrl,$params);
        return $this->_returnArray($content);
    }
 
    /**
     * 根据城市名称查询
     * @param  string $city [城市名称]
     * @return array
     */
    public function getWeatherByName($city){
        $paramsArray = array(
            'cityname'    => $city
        );
        $params = http_build_query($paramsArray);
        $content = $this->juhecurl($this->cityNameUrl,$params);
        return $this->_returnArray($content);
    }
 
    /**
     * 城市信息列表
     * @param  string $city [城市名称]
     * @return array
     */
    public function getCityInfo($city){
        $paramsArray = array(
            'cityname'  => $city
        );
        $params = http_build_query($paramsArray);
        $content = $this->juhecurl($this->cityInfoUrl,$params);
        return $this->_returnArray($content);
    }
 
    /**
     * 根据城市代码
     * @param  string $code [城市代码]
     * @return array
     */
    public function getCityId($code){
        $paramsArray = array(
            'cityid'  => $code
        );
        $params = http_build_query($paramsArray);
        $content = $this->juhecurl($this->cityCodeUrl,$params);
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
    *
    *
    **/
    public function getWeatherByWeatherId($weatherId){
        $codes = json_decode($this->weatherCode);
        $code = false;
        foreach($codes as $k => $v){
            if($k == $weatherId){
                $code = $v;
                break;
            }
        }
        return $code;
    }
    
    /**
     * 根据星座名称获取星座运势
     * @param string $star [星座名称]
     * @return array
     */
    public function getZodiacFortuneByName($star){
        $paramsArray = array(
            'consName'  => $star,
            'type'    => 'today'//default;
        );
        $params = http_build_query($paramsArray);
        $content = $this->juhecurl($this->constellUrl,$params);
        return $this->_returnArray($content);
    }
 
     /**
     * 根据星座名称与时间类型查询星座运势
     * @param string $star [星座名称]
     * @param string $type [时间类型]
     * @return array
     */
    public function getZodiacFortuneByNameType($star,$type){
         $paramsArray = array(
            'consName'  => $star,
            'type'    => $type,
        );
        $params = http_build_query($paramsArray);
        $content = $this->juhecurl($this->constellUrl,$params);
        return $this->_returnArray($content);
    }
    
    
    
    
    
    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    public function juhecurl($url,$params=false,$ispost=0){
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
            $header = array('apikey:'. $this->appkey);
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