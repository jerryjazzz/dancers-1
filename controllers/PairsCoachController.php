<?php
namespace controllers;

use models\PairsCoachModel;
use prototypes\Controllers;

class PairsCoachController extends Controllers
{
    function __construct()
    {
        $this->model = new PairsCoachModel();
    }

    function index()
    {
        if(isset($_POST['del'])){
            $this->model->del();
        }
        if(isset($_POST['off'])){
            $this->model->off(0,$_POST['off']);
        }
        if(isset($_POST['on'])){
            $this->model->off(1,$_POST['on']);
        }
        $this->data['pairs'] = $this->model->ret_paircoachs();
        $this->data['pages'] = ceil(count($this->model->ret_paircoachs_ids()) / 20);
        $this->data['title'] = "Тренеры пар";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "PairsCoachList";
    }
    function create()
    {
        if (isset($_POST['add'])) {
            $this->model->add();
            echo "<script>window.history.go(-2);</script>";
        }
        $this->data['coach'] = $this->model->getCoachs();
        $this->data['title'] = "Тренер пары";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "PairsCoachCreate";
    }
}

?>