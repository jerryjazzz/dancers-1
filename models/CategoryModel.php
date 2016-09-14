<?php
namespace models;

use config\Db;

class ClassModel extends Db
{
    function ret_class()
    {
        $sql = "SELECT * FROM `sgostu_class` s ORDER BY s.`class_code` LIMIT ?,?";
        $res = $this->sql($sql, array("ii", ($_GET['page'] - 1) * 20, 20));
        return $this->toArray($res);
    }

    function ret_class_ids()
    {
        $sql = "SELECT `class_code` FROM `sgostu_class` s";
        $res = $this->sql($sql, 0);

        return $this->toArray($res);
    }

    function ret_one_class()
    {
        $sql = "SELECT * FROM `sgostu_class` WHERE `class_code` = ?";
        $res = $this->sql($sql, array("i", $_GET['id']));
        return $this->toRow($res);
    }

    function getOneCityId($a)
    {
        $sql = "SELECT city_code FROM `sgostu_city` WHERE `city_name` = ?";
        $res = $this->sql($sql, array("s", $a));
        return $this->toRow($res);
    }

    function getOneCity($a)
    {
        $sql = "SELECT `city_name` FROM `sgostu_city` WHERE `city_code` = ?";
        $res = $this->sql($sql, array("s", $a));
        return $this->toRow($res);
    }

    function getCountry()
    {
        $sql = "SELECT * FROM `sgostu_country` ORDER BY `country_name`";
        $res = $this->sql($sql, 0);
        return $this->toArray($res);
    }

    function getOrganization()
    {
        $sql = "SELECT * FROM `sgostu_country` ORDER BY `country_organization`";
        $res = $this->sql($sql, 0);
        return $this->toArray($res);
    }

    function update()
    {
        $sql = "UPDATE `sgostu_class` SET class_name = ?,class_name_en = ?, class_name_ua = ?, class_add1 = ?, class_add2 = ?, class_pos = ?, class_regpos = ?, class_letter = ?, class_letter_en = ?, class_letter_ua = ?, class_outsum = ? WHERE `class_code` = ?";
        $this->sql($sql, array("sssssssssssi", $_POST['class_name'], $_POST['class_name_en'], $_POST['class_name_ua'], $_POST['class_add1'], $_POST['class_add2'], $_POST['class_pos'], $_POST['class_regpos'], $_POST['class_letter'], $_POST['class_letter_en'], $_POST['class_letter_ua'], $_POST['class_outsum'], $_GET['id']));
    }
    function add()
    {
        $sql = "INSERT INTO `sgostu_class`(class_name,class_name_en, class_name_ua, class_add1, class_add2, class_pos, class_regpos, class_letter, class_letter_en, class_letter_ua, class_outsum) VALUES(?,?,?,?,?,?,?,?,?,?,?)";
        $this->sql($sql, array("sssssssssss", $_POST['class_name'], $_POST['class_name_en'], $_POST['class_name_ua'], $_POST['class_add1'], $_POST['class_add2'], $_POST['class_pos'], $_POST['class_regpos'], $_POST['class_letter'], $_POST['class_letter_en'], $_POST['class_letter_ua'], $_POST['class_outsum']));
        return $this->last_id();
    }

    function del()
    {
        $sql = "DELETE FROM `sgostu_class` WHERE `class_code` = ?";
        $this->sql($sql, array("i", $_POST['del']));
    }
}

?>