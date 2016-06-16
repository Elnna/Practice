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
    private $weatherUrl = 'http://apis.baidu.com/apistore/weatherservice';
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
    private $expressUrl = 'http://api.kuaidi100.com/api';
    private $expressId = 'false';
    
    private $weatherCode = WEATHER_CODE;
    
    public function __construct($appkey){
        $this->appkey = $appkey;
    }
    
    /**
     * 将JSON内容转为数据，并返回
     * @param string $content [内容]
     * @return array
     */
    public function _returnArray($content){
        return json_decode($content,true);
    }
    
    
    /**----------------------------天气---------------------------**/
    /**
     * 获取天气预报支持城市列表
     * @return array
     */
    public function getCitys(){
        $params = false;
        $baidu = true;
        $content = $this->juhecurl($this->cityUrl,$params,$baidu);
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
        $baidu = true;
        $content = $this->juhecurl($this->weatherUrl.'/recentweathers',$params,$baidu);
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
        $baidu = true;
        $content = $this->juhecurl($this->pyUrl.'/weather',$params,$baidu);
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
        $baidu = true;
        $content = $this->juhecurl($this->cityNameUrl.'/cityname',$params,$baidu);
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
        $baidu = true;
        $content = $this->juhecurl($this->cityInfoUrl.'/cityinfo',$params,$baidu);
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
        $baidu = true;
        $content = $this->juhecurl($this->cityCodeUrl.'/cityid',$params,$baidu);
        return $this->_returnArray($content);
    }
 
    
    
    /**
    *
    *查询天气代码
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
/**----------------------------星座查询---------------------------**/

    
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
        $baidu = true;
        $content = $this->juhecurl($this->constellUrl,$params,$baidu);
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
        $baidu = true;
        $content = $this->juhecurl($this->constellUrl,$params,$baidu);
        return $this->_returnArray($content);
    }

/**----------------------------快递查询---------------------------**/

    /**
    *运单查询
    *@param  string $id  快递查询接口
    *@param string $com 快递公司代码
    *@param  string $nu  快递单号
    *@param  string show  返回类型：0->json字符串，1->xml对象，2->html对象，3->text广本
    *@param  string multi  返回类型：0->返回一行信息，1->返回多行完整信息
    *@param  string order  desc->按时间由新到旧排列，asc->按时间由旧到新排列
    */
    public function getExpress($id,$com,$nu){
        $paramsArray = array(
            'id' => $id,
            'com' => $com,
            'nu' => $nu,
            'show' => 0,
            'multi' => 1,
            'order' => 'desc'
        );
        
        $params = http_build_query($paramsArray);
        $content = $this->juhecurl($this->expressUrl,$params);
        return $this->_returnArray($content);
        
    }
    
   
    
/**----------------------------火车票---------------------------**/
    /**
    *车次详情
    *@param  string $train  车次
    *@param  string $from   始发站
    *@param  string $to   终点站
    *@param  string $date   出发时间
    */
    public function getTrainDetail($train,$from,$to,$date){
        $paramsArray = array(
            'version' => '1.0',
            'train' => $train,
            'from' => $from,
            'to' => $to,
            'date' => $date
        );
        $params = http_build_query($paramsArray);
        $baidu = true;
        $content = $this->juhecurl($this->trainUrl . '/traindetail',$params,$baidu);
        return $this->_returnArray($content);   
    }
    
    
     /**
    *车站搜索
    *@param  string  $station 车次
    */
    public function getStationSearch($station){
        $paramsArray = array(
            'version' => '1.0',
            'station' => $station
        );
        $params = http_build_query($paramsArray);
        $baidu = true;
        $content = $this->juhecurl($this->trainUrl . '/stationsearch',$params,$baidu);
        return $this->_returnArray($content);   
    }
    
    
    /**
    *站站搜索
    *@param  string $from   出发站
    *@param  string $to   到达站
    *@param  string $date   出发时间
    */
    public function getS2SSearch($from,$to,$date){
        $paramsArray = array(
            'version' => '1.0',
            'from' => $from,
            'to' => $to,
            'date' => $date
        );
        $params = http_build_query($paramsArray);
        $baidu = true;
        $content = $this->juhecurl($this->trainUrl . '/s2ssearch',$params,$baidu);
        return $this->_returnArray($content);   
    }
    
    
     /**
    *车次详情
    *@param  string $key   车站字符串
    */
    public function getSuggestSearch($keyword){
        $paramsArray = array(
            'version' => '1.0',
            'keyword' => $keyword,
        );
        $params = http_build_query($paramsArray);
        $baidu = true;
        $content = $this->juhecurl($this->trainUrl . '/suggestsearch',$params,$baidu);
        return $this->_returnArray($content);   
    }
    
    
    
    /**
     * 请求接口返回内容
     * @param  string $url [请求的URL地址]
     * @param  string $params [请求的参数]
     * @param  string $baidu [api是否来自百度]
     * @param  int $ipost [是否采用POST形式]
     * @return  string
     */
    public function juhecurl($url,$params=false,$baidu=false,$ispost=0){
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
            if($baidu){
                $header = array('apikey:'. $this->appkey);
                // 添加apikey到header
                curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
            }
           
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