<?php
namespace app\controllers;

class Employee extends \app\core\Controller{

	public function index(){
		$employee = new \app\models\Employee();
		$employees = $employee->getAll();

		$this->view('Employee/index', $employees);
	}

	public function add(){
		if(isset($_POST['action'])){
			$employee = new \app\models\Employee();
			$employee->first_name = $_POST['first_name'];
			$employee->last_name = $_POST['last_name'];
			$employee->address = $_POST['address'];
			
			$item->user_id->$_SESSION['user_id'];
			header('location:/Employee/index');
			}else{
				$this->view('Employee/add');
			}
	}
	public function delete($item_id){
		$employee = new \app\models\Employee();
		$employee = $employee->get($user_id);
		$employee->delete();
	    header('location:/Employee/index');
	}

}