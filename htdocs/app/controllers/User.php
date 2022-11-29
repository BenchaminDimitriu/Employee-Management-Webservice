<?php
namespace app\controllers;

class User extends \app\core\Controller{

	public function index(){
		//Add difference between both admin and button
		if(isset($_POST['action'])){
			$user = new \app\models\User();
			$user = $user->get($_POST['username']);

			if($_POST['password'] == "" || $_POST['username'] == ""){
				 	header('location:/User/index?error=Please enter username and password');
			} else{
				if(password_verify($_POST['password'], $user->password_hash)){
			 		$_SESSION['username'] = $user->username;
			 		$_SESSION['user_id'] = $user->user_id;
			 		$_SESSION['role'] = $user->role;

					if($_SESSION['role'] == 'admin'){						
						header('location:/Item/indexAdmin');
					}else{
						header('location:/Item/indexAdmin');
					}
				}else{
					header('location:/User/index?error=Incorrect username or password');
				}
			}
		}else{
			$this->view('User/index');
		}
	}

	public function logout(){
		session_destroy();
		header('location:/User/index?message=You\'ve been successfully logged out');
	}

	public function remove($user_id){
			$user = new \app\models\User();
			$user = $user->getUser($user_id);
			
			$profile = new \app\models\Profile();
			$profile = $profile->getUserProfile($user_id);

			$profile->delete();
			$user->delete();
				
			header('location:/Employee/index?error=Employee Deleted');
	 }
}
?>