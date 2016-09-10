<?php
namespace models;

use config\Db;

class DancersModel extends Db
{
    function ret_dancers()
    {
        if ($_GET['name'] || $_GET['lastname'] || $_GET['club']) {
            if ($_GET['club']) {
                $sql = "SELECT dancer_code,dancer_firstname,dancer_lastname,dancer_birth,class_code, cl.club_name AS dancer_club FROM `sgostu_dancer` s LEFT JOIN sgostu_club cl ON s.club_code = cl.club_code WHERE s.dancer_firstname LIKE ? AND s.dancer_lastname LIKE ? AND `s`.club_code = ? ORDER BY s.`dancer_code` LIMIT ?,?";
                $res = $this->sql($sql, array("ssiii", "%" . $_GET['name'] . "%", "%" . $_GET['lastname'] . "%",$_GET['club'], ($_GET['page'] - 1) * 20, 20));
            } else {
                $sql = "SELECT dancer_code,dancer_firstname,dancer_lastname,dancer_birth,class_code, cl.club_name AS dancer_club FROM `sgostu_dancer` s LEFT JOIN sgostu_club cl ON s.club_code = cl.club_code WHERE s.dancer_firstname LIKE ? AND s.dancer_lastname LIKE ? ORDER BY s.`dancer_code` LIMIT ?,?";
                $res = $this->sql($sql, array("ssii", "%" . $_GET['name'] . "%", "%" . $_GET['lastname'] . "%", ($_GET['page'] - 1) * 20, 20));
            }

        } else {
            $sql = "SELECT dancer_code,dancer_firstname,dancer_lastname,dancer_birth,class_code, cl.club_name AS dancer_club FROM `sgostu_dancer` s LEFT JOIN sgostu_club cl ON s.club_code = cl.club_code ORDER BY s.`dancer_code` LIMIT ?,?";
            $res = $this->sql($sql, array("ii", ($_GET['page'] - 1) * 20, 20));
        }
        return $this->toArray($res);
    }

    function ret_dancers_ids()
    {
        if ($_GET['name'] || $_GET['lastname'] || $_GET['club']) {
            if ($_GET['club']) {
                $sql = "SELECT dancer_code FROM `sgostu_dancer` s WHERE s.dancer_firstname LIKE ? AND s.dancer_lastname LIKE ? AND `s`.club_code = ?";
                $res = $this->sql($sql, array("ssi", "%" . $_GET['name'] . "%", "%" . $_GET['lastname'] . "%",$_GET['club']));
            } else {
                $sql = "SELECT dancer_code FROM `sgostu_dancer` s WHERE s.dancer_firstname LIKE ? AND s.dancer_lastname LIKE ?";
                $res = $this->sql($sql, array("ss", "%" . $_GET['name'] . "%", "%" . $_GET['lastname'] . "%"));
            }

        } else {
            $sql = "SELECT dancer_code  FROM `sgostu_dancer` s";
            $res = $this->sql($sql, 0);
        }
        return $this->toArray($res);
    }

    function ret_one_dancers()
    {
        $sql = "SELECT * FROM `sgostu_dancer` WHERE `dancer_code` = ?";
        $res = $this->sql($sql, array("i", $_GET['id']));
        return $this->toRow($res);
    }

    function getClubs()
    {
        $sql = "SELECT * FROM `sgostu_club` ORDER BY `club_name`";
        $res = $this->sql($sql, 0);
        return $this->toArray($res);
    }

    function getClass()
    {
        $sql = "SELECT * FROM `sgostu_class` ORDER BY `class_code`";
        $res = $this->sql($sql, 0);
        return $this->toArray($res);
    }

    function getCountry()
    {
        $sql = "SELECT * FROM `sgostu_country` ORDER BY `country_name`";
        $res = $this->sql($sql, 0);
        return $this->toArray($res);
    }

    function getOneClass($id)
    {
        $sql = "SELECT * FROM `sgostu_class` WHERE `class_code` = ?";
        $res = $this->sql($sql, array("i", $id));
        return $this->toRow($res);
    }

    function update()
    {
        $sql = "UPDATE `sgostu_dancer` SET dancer_firstname = ?, dancer_lastname = ?, dancer_firstname_en = ?, dancer_lastname_en = ?, dancer_birth = ?, dancer_sex = ?, dancer_index = ?, dancer_street = ?, dancer_house = ?, dancer_flat = ?, dancer_phone = ?, dancer_mail = ?, dancer_book = ?,class_la_date = NOW(),class_st_date = NOW(),class_date = NOW(),dancer_card = ?,country_code = ?  WHERE `dancer_code` = ?";
        $this->sql($sql, array("sssssssssssssssi", $_POST['dancer_firstname'], $_POST['dancer_lastname'], $_POST['dancer_firstname_en'], $_POST['dancer_lastname_en'], $_POST['dancer_birth'], $_POST['dancer_sex'], $_POST['dancer_index'], $_POST['dancer_street'], $_POST['dancer_house'], $_POST['dancer_flat'], $_POST['dancer_phone'], $_POST['dancer_mail'], $_POST['dancer_book'], $_POST['dancer_card'], $_POST['country_code'], $_GET['id']));
    }

    function add()
    {
        echo $sql = "INSERT INTO `sgostu_dancer`(dancer_firstname , dancer_lastname , dancer_firstname_en , dancer_lastname_en , dancer_birth , dancer_sex , dancer_index , dancer_street , dancer_house , dancer_flat , dancer_phone , dancer_mail , dancer_book ,class_la_date,class_st_date,class_date,class_st_code,class_la_code,dancer_card,country_code) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW(),NOW(),?,?,?,?)";
        $this->sql($sql, array("sssssssssssssssss", $_POST['dancer_firstname'], $_POST['dancer_lastname'], $_POST['dancer_firstname_en'], $_POST['dancer_lastname_en'], $_POST['dancer_birth'], $_POST['dancer_sex'], $_POST['dancer_index'], $_POST['dancer_street'], $_POST['dancer_house'], $_POST['dancer_flat'], $_POST['dancer_phone'], $_POST['dancer_mail'], $_POST['dancer_book'], $_POST['class_st_code'], $_POST['class_la_code'], $_POST['dancer_card'], $_POST['country_code']));
    }

    function del()
    {
        $sql = "DELETE FROM `sgostu_dancer` WHERE `dancers_code` = ?";
        $this->sql($sql, array("i", $_POST['del']));
    }
}

?>