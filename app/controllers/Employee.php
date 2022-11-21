<?php
namespace app\controllers;

class Employee extends \app\core\Controller{

	public function index(){
		$employee = new \app\models\Employee();
		$employees = $employee->getAll();

		$this->view('Employee/index', $employees);
	}

	public function add(){
		$this->view('/Employee/add');
	}
}