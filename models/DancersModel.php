<?php
namespace models;
use config\Db;
class DancersModel extends Db
{
    function ret_dancers()
    {
        $sql = "SELECT * FROM `sgostu_dancer` ORDER BY `dancer_code` LIMIT ?,?";
        $res = $this->sql($sql, array("ii",($_GET['page']-1)*20,20));
        return $this->toArray($res);
    }
    function ret_dancers_ids()
    {
        $sql = "SELECT `dancer_code` FROM `sgostu_dancer`";
        $res = $this->sql($sql, 0);
        return $this->toArray($res);
    }
    function ret_one_dancers()
    {
        $sql = "SELECT * FROM `sgostu_dancer` WHERE `dancers_code` = ?";
        $res = $this->sql($sql, array("i",$_GET['id']));
        return $this->toRow($res);
    }
    function update()
    {
        $sql = "UPDATE `sgostu_dancer` SET dancers_name = ?,dancers_name_en = ?,dancers_name_ua = ? WHERE `dancers_code` = ?";
        $this->sql($sql, array("sssi",$_POST['dancers_name'],$_POST['dancers_name_en'],$_POST['dancers_name_ua'],$_GET['id']));
    }
    function add()
    {
        $sql = "INSERT INTO `sgostu_dancer`(dancers_name,dancers_name_en,dancers_name_ua,dancers_onreglist,country_code) VALUES(?,?,?,1,?)";
        $this->sql($sql, array("ssss",$_POST['dancers_name'],$_POST['dancers_name_en'],$_POST['dancers_name_ua'],$_GET['country']));
    }
    function del()
    {
        $sql = "DELETE FROM `sgostu_dancer` WHERE `dancers_code` = ?";
        $this->sql($sql, array("i",$_POST['del']));
    }
}

?>