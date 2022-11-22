<?php

class Profile extends \app\core\Controller{
	

	public function index(){


		$this->view('Profile/edit');

	}

	public function editProfile(){
				

				$profile = new \app\models\Profile();
				$profile = $user->getUserProfile($_SESSION['user_id']);
				if(isset($_POST['action'])){

			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			$profile->address = $_POST['address'];
			$profile->insert();

// to change password we need password + password confirmation (can use Ecomm stuff)

			//check the old password
			$user = new \app\models\User();

			$user = $user->get($_SESSION['username']);
			
			if(password_verify($_POST['old_password'],$user->password_hash)){
				if($_POST['password'] == $_POST['password_confirm']){
					$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
					$user->updatePassword();
					header('location:/Profile/edit?message=Password changed successfully.');
				}else{
					header('location:/Profile/edit?error=Passwords do not match.');
				}
			}else{
				header('location:/Profile/edit?error=Wrong old password provided.');
			}

// once edited needs to redirect to the coresponding homepage i.e admin/employee

			header('location:/item/indexAdmin');					
			
					}else{
			
						$this->view('Profile/edit',$profile);
			
					}
			}
		}	