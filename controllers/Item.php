<?php
namespace Sys_Dev_Project\controllers;

class Item extends \Sys_Dev_Project\core\Controller{

	public function indexAdmin(){
		$this->view('/Item/indexAdmin');
	}

	#[\Sys_Dev_Project\filters\Login]
 	public function add(){
		if(isset($_POST['action'])){
			
			$item = new \Sys_Dev_Project\models\Item();
			$item->item_name = $_POST['name'];
			$item->item_qty = $_POST['qty'];
			$item->item_Pprice = $_POST['Pprice'];
			$item->item_Sprice = $_POST['Sprice'];
			$item->category_id = $_POST['category'];

			$item->insert();

			if($_SESSION['role'] == 'admin'){
					header('location:/Item/indexAdmin?message=Item Created');
			}else{
					header('location:/Item/indexEmployee?message=Item Created');
			}
		}else{
			//Gets all of the categorys
	 		$category = new \jkn_bay\models\Category();
	 		$categorys = $category->getAll();

			$this->view('Item/add', ['categorys'=>$categorys]);
		}
	}
}