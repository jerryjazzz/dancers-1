<?php
namespace models;

use config\Db;

class PairsCoachModel extends Db
{
    function ret_paircoachs()
    {
        $sql = "SELECT * FROM `sgostu_pair_coach` WHERE `pair_code` = ? ORDER BY `pair_code` LIMIT ?,?";
        $res = $this->sql($sql, array("iii", $_GET['pair'], ($_GET['page'] - 1) * 20, 20));
        return $this->toArray($res);
    }

    function ret_paircoachs_ids()
    {
        $sql = "SELECT pair_code FROM `sgostu_pair_coach` WHERE `pair_code` = ?";
        $res = $this->sql($sql, array("i", $_GET['pair']));
        return $this->toArray($res);
    }

    function ret_one_paircoachs()
    {
        $sql = "SELECT * FROM `sgostu_pair_coach` WHERE `pair_code` = ?";
        $res = $this->sql($sql, array("i", $_GET['id']));
        return $this->toRow($res);
    }
    function getCoachs()
    {
        $sql = "SELECT * FROM `sgostu_coach`";
        $res = $this->sql($sql, 0);
        return $this->toArray($res);
    }
    function getOneCoach($id)
    {
        $sql = "SELECT * FROM `sgostu_coach` WHERE `coach_code` = ?";
        $res = $this->sql($sql, array("i", $id));
        return $this->toRow($res);
    }

    function off($st,$id)
    {
        $sql = "UPDATE `sgostu_pair_coach` SET pair_active = ?  WHERE `pair_code` = ?";
        $this->sql($sql, array("ii",$st,$id));
    }

    function add()
    {
        echo $sql = "INSERT INTO `sgostu_pair_coach`(pair_code,coach_code,pair_coach_startdate,pair_coach_active,pair_coach_enddate) VALUES(?,?,NOW(),?,null)";
        $this->sql($sql, array("sss", $_GET['pair'], $_POST['coach_code'], $_POST['pair_coach_active']));
    }

    function del()
    {
        $sql = "DELETE FROM `sgostu_pair_coach` WHERE `pairsCoach_code` = ?";
        $this->sql($sql, array("i", $_POST['del']));
    }
}

?>