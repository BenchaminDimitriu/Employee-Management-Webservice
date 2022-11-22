<?php
namespace app\controllers;

class Profile extends \app\core\Controller{

	public function index(){
		$employee = new \app\models\Profile();
		$employees = $employee->getAll();

		$this->view('Profile/edit', ['employee'=>$employees]);
	}
}