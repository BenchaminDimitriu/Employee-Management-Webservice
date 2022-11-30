<?php
namespace app\controllers;

class Item extends \app\core\Controller{
	#[\app\filters\Login]
	public function indexAdmin(){
		$this->view('/Item/index');
	}

	#[\app\filters\Login]
 	public function add(){
		if(isset($_POST['action'])){
			
			$item = new \app\models\Item();
			$item->item_name = $_POST['name'];
			$item->item_qty = $_POST['qty'];
			$item->item_Pprice = $_POST['Pprice'];
			$item->item_Sprice = $_POST['Sprice'];
			$item->category_id = $_POST['category'];

			$item->insert();

			header('location:/Item/index?message=Item Created');
		}else{
			//Gets all of the categorys
	 		$category = new \jkn_bay\models\Category();
	 		$categorys = $category->getAll();

			$this->view('Item/add', ['categorys'=>$categorys]);
		}
	}
}