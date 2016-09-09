<?php
namespace controllers;
use models\HomeModel;
use prototypes\Controllers;
class HomeController extends Controllers{
	function __construct()
	{
		$this->model = new HomeModel();
	}
	function index() {
		$this->data['langs'] = $this->model->ret_lang() ;
		$this->data['title'] = "Hom2";
		$this->data['desc'] = "desc";
		$this->data['key'] = "KEY";
		return "Home";
	}
}

?>