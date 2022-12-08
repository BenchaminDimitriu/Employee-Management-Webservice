<?php
namespace app\core;

class Controller{
	protected function view($name, $data = []){	
		include('app\\views\\' . $name . '.php');
	}
}