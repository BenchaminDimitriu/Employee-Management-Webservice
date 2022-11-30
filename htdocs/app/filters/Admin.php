<?php
namespace app\filters;

#[\Attribute]
class Admin extends \app\core\AccessFilter{
	
	public function run(){
		if($_SESSION['role'] != 'admin'){
			header('location:/Item/index?error=Your account does not have the privelage to this page');
			return true;
		}
		return false;
	}
}

?>