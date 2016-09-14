<?php
namespace models;

use config\Db;

class ClubsModel extends Db
{
    function ret_clubs()
    {
        if ($_GET['name']) {
            $sql = "SELECT * FROM `sgostu_club` s WHERE `club_name` LIKE ? ORDER BY s.`club_code` LIMIT ?,?";
            $res = $this->sql($sql, array("sii", "%" . $_GET['name'] . "%", ($_GET['page'] - 1) * 20, 20));

        } else {
            $sql = "SELECT * FROM `sgostu_club` s ORDER BY s.`club_code` LIMIT ?,?";
            $res = $this->sql($sql, array("ii", ($_GET['page'] - 1) * 20, 20));
        }
        return $this->toArray($res);
    }

    function ret_clubs_ids()
    {
        if ($_GET['name']) {
            $sql = "SELECT `club_code` FROM `sgostu_club` s WHERE `club_name` LIKE ?";
            $res = $this->sql($sql, array("s", "%" .$_GET['name'] . "%"));

        } else {
            $sql = "SELECT `club_code` FROM `sgostu_club` s";
            $res = $this->sql($sql, 0);
        }
        return $this->toArray($res);
    }

    function ret_one_clubs()
    {
        $sql = "SELECT * FROM `sgostu_club` WHERE `club_code` = ?";
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
        $sql = "UPDATE `sgostu_club` SET club_name = ?,club_name_en = ?,club_name_ua = ?,club_boss = ?,club_boss_en = ?,club_boss_ua = ?,club_index = ?,club_street = ?,club_street_en = ?,club_street_ua = ?,club_phone = ?,club_fax = ?,club_mail = ?,organization_code = ?,club_pageinfo = ?,club_site = ? WHERE `club_code` = ?";
        $this->sql($sql, array("ssssssssssssssssi", $_POST['club_name'],$_POST['club_name_en'],$_POST['club_name_ua'],$_POST['club_boss'],$_POST['club_boss_en'],$_POST['club_boss_ua'],$_POST['club_index'],$_POST['club_street'],$_POST['club_street_en'],$_POST['club_street_ua'],$_POST['club_phone'],$_POST['club_fax'],$_POST['club_mail'],$_POST['organization_code'],$_POST['club_pageinfo'],$_POST['club_site'], $_GET['id']));
    }
    function img($id)
    {
        $sql = "UPDATE `sgostu_club` SET club_logo = ? WHERE `club_code` = ?";
        $this->sql($sql, array("si",$_POST['club_logo'],$id));
    }

    function add()
    {
        $sql = "INSERT INTO `sgostu_club`(club_name,club_name_en,club_name_ua,club_boss,club_boss_en,club_boss_ua,club_index,club_street,club_street_en,club_street_ua,club_phone,club_fax,club_mail,club_logo,organization_code,club_pageinfo,club_site) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $this->sql($sql, array("sssssssssssssssss",$_POST['club_name'],$_POST['club_name_en'],$_POST['club_name_ua'],$_POST['club_boss'],$_POST['club_boss_en'],$_POST['club_boss_ua'],$_POST['club_index'],$_POST['club_street'],$_POST['club_street_en'],$_POST['club_street_ua'],$_POST['club_phone'],$_POST['club_fax'],$_POST['club_mail'],$_POST['club_logo'],$_POST['organization_code'],$_POST['club_pageinfo'],$_POST['club_site']));
        return $this->last_id();
    }

    function del()
    {
        $sql = "DELETE FROM `sgostu_club` WHERE `clubs_code` = ?";
        $this->sql($sql, array("i", $_POST['del']));
    }
}

?>