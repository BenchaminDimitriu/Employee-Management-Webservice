<?php
namespace app\controllers;

class Employee extends \app\core\Controller{

	public function index(){
		$employee = new \app\models\Profile();
		$employees = $employee->getAllUserProfile();

		$item = new \app\models\Item();
	 	$lowStock = $item->getAllLow();

		$this->view('Employee/index', ['employee'=>$employees, 'lowStock'=>$lowStock]);
	}

	public function add(){
		if(isset($_POST['action'])){
			if($_POST['username'] == "" || $_POST['password'] == ""){
				header('location:/Employee/index?error=Please enter username and password');
			} else{
					
					$user = new \app\models\User();
					$user = $user->get($_POST['username']);

					if($user != null){
						header('location:/Employee/index?error=Username already taken');
					} else{
						$employee = new \app\models\User();
						$employee->username = $_POST['username'];
						$employee->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
						
						$user_id = $employee->insert();

						$profile = new \app\models\Profile();
						$profile->user_id = $user_id;
						$profile->insert();
						header('location:/Employee/index?message=Employee created');
					}
			}
		}
	}
}