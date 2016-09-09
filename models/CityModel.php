<?php
namespace models;
use config\Db;
class CityModel extends Db
{
    function ret_city()
    {
        $sql = "SELECT * FROM `sgostu_city` WHERE `country_code` = ? ORDER BY `city_code` LIMIT ?,?";
        $res = $this->sql($sql, array("iii",$_GET['country'],($_GET['page']-1)*20,20));
        return $this->toArray($res);
    }
    function ret_city_ids()
    {
        $sql = "SELECT `city_code` FROM `sgostu_city` WHERE `country_code` = ?";
        $res = $this->sql($sql, array("i",$_GET['country']));
        return $this->toArray($res);
    }
    function ret_one_city()
    {
        $sql = "SELECT * FROM `sgostu_city` WHERE `city_code` = ?";
        $res = $this->sql($sql, array("i",$_GET['id']));
        return $this->toRow($res);
    }
    function update()
    {
        $sql = "UPDATE `sgostu_city` SET city_name = ?,city_name_en = ?,city_name_ua = ? WHERE `city_code` = ?";
        $this->sql($sql, array("sssi",$_POST['city_name'],$_POST['city_name_en'],$_POST['city_name_ua'],$_GET['id']));
    }
    function add()
    {
        $sql = "INSERT INTO `sgostu_city`(city_name,city_name_en,city_name_ua,city_onreglist) VALUES(?,?,?,1)";
        $this->sql($sql, array("sss",$_POST['city_name'],$_POST['city_name_en'],$_POST['city_name_ua']));
    }
    function del()
    {
        $sql = "DELETE FROM `sgostu_city` WHERE `city_code` = ?";
        $this->sql($sql, array("i",$_POST['del']));
    }
}

?>