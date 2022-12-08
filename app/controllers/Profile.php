<?php
namespace app\controllers;

class Profile extends \app\core\Controller{

	//Allows the user to edit their own profile
	#[\app\filters\Login]
	public function edit(){

		//Gets the profile for the current user that is logged in
		$profile = new \app\models\Profile();
		$profile = $profile->get($_SESSION['user_id']);
			
		//Only runs the code if the save button is clicked
		if(isset($_POST['action'])){
			//Verify that all of the feilds are not empty
			if($_POST['firstname'] == '' || $_POST['lastname'] == '' || $_POST['address'] == '' || $_POST['username'] == ''){
					header('location:/Profile/edit?error=Feild cannot be empty');
					return;
			} else{
				//The profile for that user is updated
				$profile->first_name = $_POST['firstname'];
				$profile->last_name = $_POST['lastname'];
				$profile->address = $_POST['address'];
				$profile->update();
			}

			//Gets the current user logged in
			$user = new \app\models\User();
			$user = $user->getUser($_SESSION['user_id']);

			//Verify that the username is not the same as the current username that the user is logged in as
			if($_POST['username'] != $_SESSION['username'])
			{
				//Verify that the typed username is not used
				$userVerify = new \app\models\User();
				$userVerify = $userVerify->get($_POST['username']);

				if($userVerify != null){
					header('location:/Profile/edit?error=Username already talen');
					return;
				}else{
					//Updates the username
			 		$_SESSION['username'] = $_POST['username'];
					$user->username = $_POST['username'];
					$user->update();
					header('location:/Profile/edit?message=Username has been updated');
					return;
				}
			} 

			//Verifys that the password input is empty to know if the user wants to change their
			//password or not
			if($_POST['password'] != null){
				//Verify that the new password they want to use is already in use
				if(password_verify($_POST['password'],$user->password_hash)){
					header('location:/Profile/edit?error=Password has already been used');
				}else{
					//Verify that the password and password confirm input boxes match
					if($_POST['password'] == $_POST['password_confirm']){
						//Updates the password for that user
						$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
						$user->update();
						header('location:/Profile/edit?message=Password has been updated');
					}else{
						header('location:/Profile/edit?error=Passwords do not match.');
					}
				}
			} else{
				header('location:/Profile/edit?message=Profile has been updated');
			}
		}else{
			//Creates the view with the profile and the low item in stock notification
			$item = new \app\models\Item();
	 		$lowStock = $item->getAllLow();

			$this->view('Profile/edit', ['profile'=>$profile, 'lowStock'=>$lowStock]);
		}
	}
}