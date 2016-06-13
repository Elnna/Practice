<?php
define('DEFAULT_IP','125.42.205.112');
define('DEFAULT_CITY','北京');
class gaddress{
    
    private $unknown = 'unknown'; 
    
    public function getIp(){ 
        $realip = '';  
         
        if (isset($_SERVER)){  
            if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $this->unknown)){  
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);  
                foreach($arr as $ip){  
                    $ip = trim($ip);  
                    if ($ip != $this->unknown){  
                        $realip = $ip;  
                        break;  
                    }  
                }  
            }else if(isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP']) && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $this->unknown)){  
                $realip = $_SERVER['HTTP_CLIENT_IP'];  
            }else if(isset($_SERVER['REMOTE_ADDR']) && !empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], $this->unknown)){  
                $realip = $_SERVER['REMOTE_ADDR'];  
            }else{  
                $realip = $this->unknown;  
            }  
        }else{  
            if(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $this->unknown)){  
                $realip = getenv("HTTP_X_FORWARDED_FOR");  
            }else if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), $this->unknown)){  
                $realip = getenv("HTTP_CLIENT_IP");  
            }else if(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), $this->unknown)){  
                $realip = getenv("REMOTE_ADDR");  
            }else{  
                $realip = $this->unknown;  
            }  
        }  
        $realip = preg_match("/[\d\.]{7,15}/", $realip, $matches) ? $matches[0] : $this->unknown;  
        return $realip;  
    }

    public function getCityByIp($ip = DEFAULT_IP){
        $city = DEFAULT_CITY;
        if(filter_var($ip, FILTER_VALIDATE_IP)){ 
            if($ip == $this->unknown){
                $ip = DEFAULT_IP;
            } 
            $content = file_get_contents("http://api.map.baidu.com/location/ip?ak=7IZ6fgGEGohCrRKUE9Rj4TSQ&ip={$ip}&coor=bd09ll");
            //var_dump($content);
            $address = json_decode($content);
            if(!$address->status){
                $city = explode('|',$address->address)[2];
            } 
        }
        return $city;
    }


}
?>