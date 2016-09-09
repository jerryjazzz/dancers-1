<?php
namespace models;
use config\Db;
class HomeModel extends Db
{
    function ret_lang()
    {
        $sql = "SELECT * FROM `sgostu_city`";
        $res = $this->sql($sql, 0);
        return $this->toRow($res);
    }
}

?>