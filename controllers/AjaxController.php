<?php
namespace controllers;

use models\CityModel;
use prototypes\Controllers;

class CityController extends Controllers
{
    function __construct()
    {
        $this->model = new CityModel();
    }

    function index()
    {
        if(isset($_POST['del'])){
            $this->model->del();
        }
        $this->data['city'] = $this->model->ret_city();
        $this->data['pages'] = ceil(count($this->model->ret_city_ids()) / 20);
        $this->data['title'] = "Города";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "CityList";
    }

    function edit()
    {
        if (isset($_POST['edit'])) {
            $this->model->update();
            echo "<script>window.history.go(-2);</script>";
        }

        $this->data['city'] = $this->model->ret_one_city();
        $this->data['title'] = "Город";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "CityEdit";
    }
    function create()
    {
        if (isset($_POST['add'])) {
            $this->model->add();
            echo "<script>window.history.go(-2);</script>";
        }

        $this->data['city'] = $this->model->ret_one_city();
        $this->data['title'] = "Город";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "CityCreate";
    }
}

?>