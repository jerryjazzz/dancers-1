<?php
namespace controllers;
header("HTTP/1.0 404 Not Found");
class Error404Controller{
    public $model;
    public $data = array();
    function index() {
        $this->data['title'] = "404";
        $this->data['desc'] = "ERROR";
        $this->data['key'] = "HELLO";
        return "Error404";
    }
}

?>