<?php
namespace Sys_Dev_Project\controllers;

class Item extends \Sys_Dev_Project\core\Controller{

	public function indexAdmin(){
		$this->view('/Item/indexAdmin');
	}
}