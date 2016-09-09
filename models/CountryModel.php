<?php
namespace models;
use config\Db;
class CountryModel extends Db
{
    function ret_country()
    {
        $sql = "SELECT * FROM `sgostu_country` ORDER BY `country_code` LIMIT ?,?";
        $res = $this->sql($sql, array("ii",($_GET['page']-1)*20,20));
        return $this->toArray($res);
    }
    function ret_country_ids()
    {
        $sql = "SELECT `country_code` FROM `sgostu_country`";
        $res = $this->sql($sql, 0);
        return $this->toArray($res);
    }
    function ret_one_country()
    {
        $sql = "SELECT * FROM `sgostu_country` WHERE `country_code` = ?";
        $res = $this->sql($sql, array("i",$_GET['id']));
        return $this->toRow($res);
    }
    function update()
    {
        $sql = "UPDATE `sgostu_country` SET country_name = ?,country_name_en = ?,country_name_ua = ? WHERE `country_code` = ?";
        $this->sql($sql, array("sssi",$_POST['country_name'],$_POST['country_name_en'],$_POST['country_name_ua'],$_GET['id']));
    }
    function add()
    {
        $sql = "INSERT INTO `sgostu_country`(country_name,country_name_en,country_name_ua) VALUES(?,?,?)";
        $this->sql($sql, array("sss",$_POST['country_name'],$_POST['country_name_en'],$_POST['country_name_ua']));
    }
    function del()
    {
        $sql = "DELETE FROM `sgostu_country` WHERE `country_code` = ?";
        $this->sql($sql, array("i",$_POST['del']));
    }
}

?>