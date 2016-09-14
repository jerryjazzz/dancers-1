<?php
namespace controllers;

use models\DancersModel;
use prototypes\Controllers;

class DancersController extends Controllers
{
    function __construct()
    {
        $this->model = new DancersModel();
    }

    function index()
    {
        if(isset($_POST['del'])){
            $this->model->del();
        }
        $this->data['dancers'] = $this->model->ret_dancers();
        $this->data['pages'] = ceil(count($this->model->ret_dancers_ids()) / 20);
        $this->data['title'] = "Танцоры";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "DancersList";
    }

    function edit()
    {
        if (isset($_POST['edit'])) {
            $_POST['dancer_birth'] = date( 'Y-m-d H:i:s', strtotime($_POST['dancer_birth']) );
            if($_POST['class_la_code'] < $_POST['class_st_code'])
                $_POST['class_code'] = $_POST['class_la_code'];
            else
                $_POST['class_code'] = $_POST['class_st_code'];
            $this->model->update();
            //echo "<script>window.history.go(-2);</script>";
        }
        $this->data['dancers'] = $this->model->ret_one_dancers();
        $date = $this->data['dancers']['dancer_birth'];
        $phpdate = strtotime($date);
        $this->data['dancers']['dancer_birth'] = date('d-m-Y',$phpdate);
        $this->data['title'] = "Танцор";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "DancersEdit";
    }
    function create()
    {
        if (isset($_POST['add'])) {
            $_POST['dancer_birth'] = date( 'Y-m-d H:i:s', strtotime($_POST['dancer_birth']) );
            if($_POST['class_la_code'] < $_POST['class_st_code'])
                $_POST['class_code'] = $_POST['class_la_code'];
            else
                $_POST['class_code'] = $_POST['class_st_code'];
            $this->model->add();
            echo "<script>window.history.go(-2);</script>";
        }

        $this->data['dancers'] = $this->model->ret_one_dancers();
        $this->data['title'] = "Танцор";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "DancersCreate";
    }
}

?>