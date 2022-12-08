<?php
namespace app\filters;

#[\Attribute]
class Login extends \app\core\AccessFilter{

	//Makes sure that the current user logs in before accessing our website
	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/index?error=You must log in to use these features!');
			return true;
		}
		return false;
	}
}
?>