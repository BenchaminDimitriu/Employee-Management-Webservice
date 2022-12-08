<?php
namespace app\controllers;

class Employee extends \app\core\Controller{

	//Allows the admin to view all of the employees
	#[\app\filters\Login]
	#[\app\filters\Admin]
	public function index(){

		//Populates the vieww with all of the employee profiles and gets the low item stock for
		//the notification
		$employee = new \app\models\Profile();
		$employees = $employee->getAll();

		$item = new \app\models\Item();
	 	$lowStock = $item->getAllLow();

		$this->view('Employee/index', ['employee'=>$employees, 'lowStock'=>$lowStock]);
	}

	//Allows the admin to add a employee
	#[\app\filters\Login]
	#[\app\filters\Admin]
	public function add(){
		//Only runs the code if the add button is clicked
		if(isset($_POST['action'])){
			//Verify that the feilds are not empty before creating the employee
			if($_POST['username'] == "" || $_POST['password'] == "" || $_POST['passwordConf'] == ""){
				header('location:/Employee/index?error=Please enter username and password');
			} else{
				//Verify that the username is not already in use
				$user = new \app\models\User();
				$user = $user->get($_POST['username']);

				if($user != null){
					header('location:/Employee/index?error=Username already taken');
				} else{

					//Verify that the user input password and password confirmation match
					if($_POST['password'] == $_POST['passwordConf']){

						//Created the user and a profile for that user with the default values
						$employee = new \app\models\User();
						$employee->username = $_POST['username'];
						$employee->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
						
						$user_id = $employee->insert();

						$profile = new \app\models\Profile();
						$profile->user_id = $user_id;
						$profile->insert();
						header('location:/Employee/index?message=Employee created');
					} else{
						header('location:/Employee/index?error=Passwords do not match');
					}
				}
			}
		}
	}

	
	//Allows the admin to delete employees
	#[\app\filters\Login]
	#[\app\filters\Admin] 
	public function remove($user_id){
		//Gets the employee and the profile for that employee
		//and deletes it
		$user = new \app\models\User();
		$user = $user->getUser($user_id);
		
		$profile = new \app\models\Profile();
		$profile = $profile->get($user_id);

		$profile->delete();
		$user->delete();
			
		header('location:/Employee/index?error=Employee Deleted');
	}
}