<?php
namespace Sys_Dev_Project\controllers;

class User extends \Sys_Dev_Project\core\Controller{

	public function index(){
		//Add difference between both admin and button
		if(isset($_POST['action'])){
			$user = new \Sys_Dev_Project\models\User();
			$user = $user->get($_POST['username']);
			if(password_verify($_POST['password'], $user->password_hash)){
				$_SESSION['username'] = $user->username;
				$_SESSION['user_id'] = $user->user_id;
				$_SESSION['role'] = $user->role;

				if($_SESSION['role'] == 'admin'){
					header('location:/Item/indexAdmin');
				}else{
					header('location:/Item/indexEmployee?message=You have been successfully logged in');
				}
			}else{
				header('location:/User/index?error=Incorrect username or password');
			}

		}else{
			$this->view('User/index');
		}
 	 }

 	 public function register(){
		 if(isset($_POST['action'])){
			if($_POST['password'] == $_POST['password_confirmation']){
			 		$user = new \Sys_Dev_Project\models\User();

			 		if($user->get($_POST['username'])){
			 			header('location: User/register?error=The Username already exists, Choose another');
			 		}else{
			 			$user->username = $_POST['username'];
			 			$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			 			$user->role = $_POST['role'];
			 			$user_id =  $user->insert();
			 			$_SESSION[$_POST['username']] =  $user->username;
						$_SESSION['user_id'] = $user_id;
						header('location:/User/index?message=Your profile is set up, login when ready');
			 		}
			} 	 	
		 }else{
		 	$this->view('User/register');
		 }
	 }
}

?>
