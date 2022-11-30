<?php
namespace app\controllers;

class Modification extends \app\core\Controller{
#[\app\filters\Login]
public function index(){
		$this->view('Modification/index');
}

}