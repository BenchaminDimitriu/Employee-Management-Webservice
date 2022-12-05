<?php
namespace app\controllers;

class Profile extends \app\core\Controller{

	public function edit(){
		
		$profile = new \app\models\Profile();
		$profile = $profile->getUserProfile($_SESSION['user_id']);
		
		if(isset($_POST['action'])){
			if($_POST['firstname'] == '' || $_POST['lastname'] == '' || $_POST['address'] == ''){
					header('location:/Profile/edit?error=Feild cannot be empty');
					return;
			} else{
				$profile->first_name = $_POST['firstname'];
				$profile->last_name = $_POST['lastname'];
				$profile->address = $_POST['address'];
				$profile->update();
			}

			$user = new \app\models\User();
			$user = $user->get($_SESSION['username']);
			
			if($_POST['password'] != null){
				if(password_verify($_POST['password'],$user->password_hash)){
					header('location:/Profile/edit?error=Password has already been used');
				}else{
						if($_POST['password'] == $_POST['password_confirm']){
							$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
							$user->updatePassword();
							header('location:/Profile/edit?message=Password has been updated');
						}else{
							header('location:/Profile/edit?error=Passwords do not match.');
						}
					}
			} else{
				header('location:/Profile/edit?message=Profile Updated');
			}
		}else{

			$item = new \app\models\Item();
	 		$lowStock = $item->getAllLow();

			$this->view('Profile/edit', ['profile'=>$profile, 'lowStock'=>$lowStock]);
		}
	}
}