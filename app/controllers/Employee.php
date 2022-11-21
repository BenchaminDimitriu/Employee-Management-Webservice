<?php
namespace app\controllers;

class User extends \app\core\Controller{

	public function index(){
		$employee = new \app\models\Employee();
		$employees = $employee->getAll();

		$this->view('Employee/index', $employees);
	}

	public function index(){
		$this->view('/Employee/add');
	}
}