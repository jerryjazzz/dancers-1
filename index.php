<?php
session_start();
srand(time());
require "config/Config.php";
require "config/Class.php";
require "config/Url.php";
try {
    require_once "{$url->APP_PATH}/controllers/Func.php";
} catch (Exception $e) {
    echo 'Ошибка: ', $e->getMessage(), "\n";
}
?>