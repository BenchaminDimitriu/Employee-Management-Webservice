<?php 
namespace app\controllers;

class Employee extends app\core\Controller{

	public function index(){
		$this->view('/Employee/add');
	}
}