<?php 
    
    $ROOT = 'rap.alibaba-inc.com';
    $PORT = 80;
    $MOCK = '/mockjs/';
    $PROJECT_ID = 85;
    
    function nope() {

    }

    class RAP {

        public static function getRapData($projectId = 85, $url, $fn = nope, $extra = null) {  
            global $RAP_FLAG;
            global $ROOT;
            global $MOCK;

            // 不使用RAP，则直接获取真实数据返回
            if (!$RAP_FLAG) {
                return $fn();
            }
            
            // 额外参数初始化
            if (!$extra) {
                $extra = (object)array();
            } else {
                $extra = (object)$extra;
            }

            $root = 'http://'.$ROOT.$MOCK;

            // 使用传入的root
            if (property_exists($extra, 'root')) {
                $root = $extra->root;
                $check_root = $extra->root;
            }

            if (substr($url, 0, 1) != '/') {
                $url = '/'.$url;
            }

            // 获取RAP接口数据（MockJS渲染之后的）
            $jsonp_str = 'callback(';
            $html = file_get_contents($root.$projectId.$url);
            $html = trim($html);
            $html = substr($html, strpos($html, $jsonp_str) + strlen($jsonp_str), -1);
            //$html = substr($html, $len, strlen($html) - $len - 1);
            $json = json_decode($html);

            return $json;
        }  
    }

?>