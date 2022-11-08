<?php
namespace Sys_Dev_Project\filters;

#[\Attribute]
class Admin extends \Sys_Dev_Project\core\AccessFilter{
	
	public function run(){
		if($_SESSION['role'] != 'admin'){
			header('location:/User/account?error=Your account does not have the privelage to this page');
			return true;
		}
		return false;
	}
}

?>