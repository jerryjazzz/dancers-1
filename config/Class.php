<?php
function clases ($class) {
    include_once dirname(dirname(__FILE__))."/".str_replace("\\","/",$class).".php";
};
spl_autoload_register(clases);

?>