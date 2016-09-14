<?php
namespace controllers;

use models\ClubsModel;
use prototypes\Controllers;

class ClubsController extends Controllers
{
    function __construct()
    {
        $this->model = new ClubsModel();
    }

    function index()
    {
        if(isset($_POST['del'])){
            $this->model->del();
        }
        $this->data['clubs'] = $this->model->ret_clubs();
        $this->data['pages'] = ceil(count($this->model->ret_clubs_ids()) / 20);
        $this->data['title'] = "Клубы";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "ClubsList";
    }

    function edit()
    {
        if (isset($_POST['edit'])) {
            $city = $this->model->getOneCity($_POST['club_city']);
            $_POST['city_code'] = $city['city_code'];
            $_POST['organization_code'] = 0;
            $this->model->update();
            echo "<script>window.history.go(-2);</script>";
        }
        $this->data['clubs'] = $this->model->ret_one_clubs();
        $city = $this->model->getOneCity($this->data['clubs']['city_code']);
        $this->data['clubs']['club_city'] = $city['city_name'];
        $this->data['title'] = "Клуб";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "ClubsEdit";
    }
    function create()
    {
        if (isset($_POST['add'])) {
            $_POST['club_logo'] = "";
            $city = $this->model->getOneCityId($_POST['club_city']);
            $_POST['city_code'] = $city['city_code'];
            $_POST['organization_code'] = 0;
            $id = $this->model->add();
            if ($_FILES['club_logo']['name']) {
                $_POST['club_logo'] = $this->load($_FILES['club_logo'], $id);
                $this->model->img($id);
            }
            echo "<script>window.history.go(-2);</script>";
        }
        $this->data['clubs'] = $this->model->ret_one_clubs();
        $this->data['title'] = "Клуб";
        $this->data['desc'] = "";
        $this->data['key'] = "";
        return "ClubsCreate";
    }

    function load($inp, $id)
    {
        global $url;
        $img = '';
        $uploaddir = str_replace(array('\\', 'www'), array('/', ''), $url->APP_PATH . '\online\img\\');
        $file = substr($inp['name'], strrpos($inp['name'], '.'), 999);
        $uploadfile = $uploaddir . "clublogo" . $id . $file;
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