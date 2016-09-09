<?php
namespace controllers;

use models\CountryModel;
use prototypes\Controllers;

class CountryController extends Controllers
{
    function __construct()
    {
        $this->model = new CountryModel();
    }

    function index()
    {
        if(isset($_POST['del'])){
            $this->model->del();
        }
        $this->data['country'] = $this->model->ret_country();
        $this->data['pages'] = ceil(count($this->model->ret_country_ids()) / 20);
        $this->data['title'] = "Страны";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "CountryList";
    }

    function edit()
    {
        if (isset($_POST['edit'])) {
            $this->model->update();
            echo "<script>window.history.go(-2);</script>";
        }

        $this->data['country'] = $this->model->ret_one_country();
        $this->data['title'] = "Страна";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "CountryEdit";
    }
    function create()
    {
        if (isset($_POST['add'])) {
            $this->model->add();
            echo "<script>window.history.go(-2);</script>";
        }

        $this->data['country'] = $this->model->ret_one_country();
        $this->data['title'] = "Страна";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "CountryCreate";
    }
}

?>