<?php
global $data;
function logic()
{
    global $data;
    $conroller = array_keys($_GET)[0];
    if(!$conroller){
        $conroller = '';
        $action = '';
    }else{
        $action = $_GET[$conroller];
    }
    $modules = new \config\Routs();
    $mod = $modules->config['modules'];
    if(is_array($mod[$conroller]) && $mod[$conroller]['actions'][$action]) {
        $className = "\\controllers\\" . $mod[$conroller]['controller'];
        $actionName = $mod[$conroller]['actions'][$action];
    }else{
        $className = "\\controllers\\Error404Controller";
        $actionName = "Index";
    }
    if(!$_GET['page'])
        $_GET['page'] = 1;
    $class = new $className();
    $views = $class->$actionName();
    $data = $class->data;
    render($views);
    return true;
}

function isStatic($uri)
{
    $static = new Cisstatic();
    return $static->print_info($uri);
}

function transliterate($string, $st)
{
    $converter = array(
        'Ъ' => '\Tv', 'Ь' => '\Mg', 'ь' => 'j', 'ъ' => '-j',
        'ю' => 'yu', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'yi', 'е' => 'ye', 'ё' => 'yo',
        'ч' => 'ch', 'ж' => 'zh', 'я' => 'ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v',
        'г' => 'g', 'д' => 'd',
        'з' => 'z',
        'и' => 'i', 'й' => 'y', 'к' => 'k',
        'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r',
        'с' => 's', 'т' => 't', 'у' => 'u',
        'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'э' => 'e',
        ' ' => '_',
        'Ю' => 'Yu',
        'Щ' => 'Sch', 'Ш' => 'Sh', 'Ч' => 'Ch',
        'Я' => 'Ya', 'Ы' => 'Yi', 'Е' => 'YE', 'Ё' => 'YO',
        'А' => 'A', 'Б' => 'B', 'В' => 'V',
        'Г' => 'G', 'Д' => 'D',
        'Ж' => 'Zh', 'З' => 'Z',
        'И' => 'I', 'Й' => 'Y', 'К' => 'K',
        'Л' => 'L', 'М' => 'M', 'Н' => 'N',
        'О' => 'O', 'П' => 'P', 'Р' => 'R',
        'С' => 'S', 'Т' => 'T', 'У' => 'U',
        'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Э' => 'E'
    );

    if ($st == 0)
        return strtr($string, $converter);
    else
        return strtr($string, array_flip($converter));
}

function pre($ar)
{
    echo "<pre>";
    print_r($ar);
    echo "</pre>";
}
function head(){
    global $url, $data;
    extract($data, EXTR_PREFIX_SAME, "wddx");
    require_once $url->APP_PATH."/views/Header.php";
}
function footer(){
    global $url, $data;
    extract($data, EXTR_PREFIX_SAME, "wddx");
    require_once $url->APP_PATH."/views/Footer.php";
}
function render($views){
    global $url, $data;
    extract($data, EXTR_PREFIX_SAME, "wddx");
    require_once $url->APP_PATH."/views/{$views}.php";
}

logic();
?>