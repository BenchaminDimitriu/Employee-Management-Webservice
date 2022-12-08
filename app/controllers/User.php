<?php
namespace app\controllers;

class User extends \app\core\Controller{

	//Allows the user to be able to login
	public function index(){
		//Only runs the code if the save button is clicked
		if(isset($_POST['action'])){
			
			//Gets the current user trying to login
			$user = new \app\models\User();
			$user = $user->get($_POST['username']);

			//Verify that the input feilds are not empty
			if($_POST['password'] == "" || $_POST['username'] == ""){
				 	header('location:/User/index?error=Please enter username and password');
			} else{
				//Verify that the the typed password matches the database password
				if(password_verify($_POST['password'], $user->password_hash)){
			 		//Creates the session
			 		$_SESSION['username'] = $user->username;
			 		$_SESSION['user_id'] = $user->user_id;
			 		$_SESSION['role'] = $user->role;

			 		header('location:/Item/index');
				}else{
					header('location:/User/index?error=Incorrect username or password');
				}
			}
		}else{
			$this->view('User/index');
		}
	}

	//Allows the user to be able to log out
	public function logout(){
		//Destroys the session 
		session_destroy();
		header('location:/User/index?message=You have been successfully logged out');
	}
}