<?php
namespace controllers;

use models\PairsModel;
use prototypes\Controllers;

class PairsController extends Controllers
{
    function __construct()
    {
        $this->model = new PairsModel();
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
        $this->data['pairs'] = $this->model->ret_pairs();
        $this->data['pages'] = ceil(count($this->model->ret_pairs_ids()) / 20);
        $this->data['title'] = "Пары";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "PairsList";
    }
    function create()
    {
        if (isset($_POST['add'])) {
            $this->model->add();
            echo "<script>window.history.go(-2);</script>";
        }

        $this->data['title'] = "Пара";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "PairsCreate";
    }
}

?>