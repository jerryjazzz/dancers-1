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
        if (isset($_POST['del'])) {
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
            $id = $this->model->add();
            if ($_FILES['country_flag']['name']) {
                $_POST['country_flag'] = $this->load($_FILES['country_flag'], $id);
                $this->model->img($id);
            }
            echo "<script>window.history.go(-2);</script>";
        }
        $this->data['country'] = $this->model->ret_one_country();
        $this->data['title'] = "Страна";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "CountryCreate";
    }

    function load($inp, $id)
    {
        global $url;
        $img = '';
        $uploaddir = str_replace(array('\\', 'www'), array('/', ''), $url->APP_PATH . '\online\img\\');
        $file = substr($inp['name'], strrpos($inp['name'], '.'), 999);
        $uploadfile = $uploaddir . "flag" . $id . $file;
        if (move_uploaded_file($inp['tmp_name'], $uploadfile)) {
            //  $inf = "Файл корректен и был успешно загружен.\n";
            $img = $uploaddir . time() . $file;
        } else {
            // $inf= "Возможная атака с помощью файловой загрузки!\n";
            exit("Ошибка при загрузке картинки");
        }
        return str_replace($uploaddir, "", $uploadfile);
    }
}

?>