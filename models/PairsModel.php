<?php
namespace models;

use config\Db;

class PairsModel extends Db
{
    function ret_pairs()
    {
        $sql = "SELECT * FROM `sgostu_pair` WHERE `man_code` = ? OR woman_code = ? ORDER BY `pair_code` LIMIT ?,?";
        $res = $this->sql($sql, array("iiii", $_GET['dancer'], $_GET['dancer'], ($_GET['page'] - 1) * 20, 20));
        return $this->toArray($res);
    }

    function ret_pairs_ids()
    {
        $sql = "SELECT pair_code FROM `sgostu_pair` WHERE `man_code` = ? OR woman_code = ?";
        $res = $this->sql($sql, array("ii", $_GET['dancer'], $_GET['dancer']));
        return $this->toArray($res);
    }

    function ret_one_pairs()
    {
        $sql = "SELECT * FROM `sgostu_pair` WHERE `pair_code` = ?";
        $res = $this->sql($sql, array("i", $_GET['id']));
        return $this->toRow($res);
    }

    function getClubs()
    {
        $sql = "SELECT * FROM `sgostu_club` ORDER BY `club_name`";
        $res = $this->sql($sql, 0);
        return $this->toArray($res);
    }

    function getOneClub($id)
    {
        $sql = "SELECT * FROM `sgostu_club` WHERE `club_code` = ?";
        $res = $this->sql($sql, array("i", $id));
        return $this->toRow($res);
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

    function getOneDancer($id)
    {
        $sql = "SELECT * FROM `sgostu_dancer` WHERE `dancer_code` = ?";
        $res = $this->sql($sql, array("i", $id));
        return $this->toRow($res);
    }

    function getDancerSex($id)
    {
        $sql = "SELECT * FROM `sgostu_dancer` WHERE `dancer_sex` = ?";
        $res = $this->sql($sql, array("i", $id));
        return $this->toArray($res);
    }

    function off($st, $id)
    {
        if ($st == 0) {
            $sql = "UPDATE `sgostu_pair` SET pair_active = ?, pair_enddate = NOW()  WHERE `pair_code` = ?";

        } else {
            $sql = "UPDATE `sgostu_pair` SET pair_active = ?, pair_enddate = null  WHERE `pair_code` = ?";
        }
        $this->sql($sql, array("ii", $st, $id));
    }

    function add()
    {
        echo $sql = "INSERT INTO `sgostu_pair`(man_code,woman_code,club_code,pair_active,pair_statrdate) VALUES(?,?,?,?,NOW())";
        $this->sql($sql, array("ssss", $_POST['man_code'], $_POST['woman_code'], $_POST['club_code'], $_POST['pair_active']));
    }

    function del()
    {
        $sql = "DELETE FROM `sgostu_pair` WHERE `pairs_code` = ?";
        $this->sql($sql, array("i", $_POST['del']));
    }
}

?>