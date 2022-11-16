<?php
namespace app\controllers;

class Category extends \app\core\Controller{

	#[\app\filters\Login]
 	public function add(){
		if(isset($_POST['action'])){
			
			$category= new \Sys_Dev_Project\models\Category();
			$category->category_name = $_POST['name'];
			$category->insert();

			if($_SESSION['role'] == 'admin'){
					header('location:/Item/indexAdmin?message=Category Created');
			}else{
					header('location:/Item/indexEmployee?message=Category Created');
			}
		}else{
			$this->view('Category/add');
		}
	}
}