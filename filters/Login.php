<?php
namespace Sys_Dev_Project\filters;

#[\Attribute]
class Login extends \Sys_Dev_Project\core\AccessFilter{

	public function execute(){
		if(!isset($_SESSION['user_id'])){
			header('location:/User/index?error=You must log in to use these features!');
			return true;
		}
		return false;
	}
}
?>