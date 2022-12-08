<?php
namespace app\filters;

#[\Attribute]
class Admin extends \app\core\AccessFilter{
	
	//Makes sure that the current user does not try to access anything that they do not have permission too
	public function execute(){
		if($_SESSION['role'] != 'admin'){
			header('location:/User/index?error=Your account does not have the privelage to this page');
			return true;
		}
		return false;
	}
}