<?php
namespace controllers;

use models\ClassModel;
use prototypes\Controllers;

class ClassController extends Controllers
{
    function __construct()
    {
        $this->model = new ClassModel();
    }

    function index()
    {
        if(isset($_POST['del'])){
            $this->model->del();
        }
        $this->data['class'] = $this->model->ret_class();
        $this->data['pages'] = ceil(count($this->model->ret_class_ids()) / 20);
        $this->data['title'] = "Классы";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "ClassList";
    }

    function edit()
    {
        if (isset($_POST['edit'])) {;
            $this->model->update();
            echo "<script>window.history.go(-2);</script>";
        }
        $this->data['class'] = $this->model->ret_one_class();
        $city = $this->model->getOneCity($this->data['class']['city_code']);
        $this->data['class']['class_city'] = $city['city_name'];
        $this->data['title'] = "Класс";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "ClassEdit";
    }
    function create()
    {
        if (isset($_POST['add'])) {
            $id = $this->model->add();
            echo "<script>window.history.go(-2);</script>";
        }
        $this->data['class'] = $this->model->ret_one_class();
        $this->data['title'] = "Класс";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "ClassCreate";
    }

}

?>