<?php
// Массив параметров из URI запроса.
$params = array();

// Если запрошен любой URI, отличный от корня сайта.
if ($_SERVER['REQUEST_URI'] != '/') {
    try {
        $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $uri_parts = explode('/', trim($url_path, ' /'));
        $n = count($uri_parts);
        $i=0;
        while ($i<$n){
            if (count($uri_parts[$i+1])>0){
                $_GET[$uri_parts[$i]]= urldecode($uri_parts[$i+1]);
            }else{
                $_GET[$uri_parts[$i]]= '';
            }
            $i=$i+2;
        }

    } catch (Exception $e) {
        $module = '404';
        $action = 'main';
    }
}

class URL {
    function __construct() { // конструктор загружает в $APP_PATH путь к проекту
        $this->APP_PATH = dirname(dirname(__FILE__)) ;

    }
    function clear($data){
        foreach($data  as $k=>$text){
            $data[$k]=str_replace("'", "\'", $text);
            $data[$k]=strip_tags($data[$k]);
        }
        return $data;


    }

}
$url = new URL;
?>