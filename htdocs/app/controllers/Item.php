<?php
namespace app\controllers;

class Item extends \app\core\Controller{

	public function index(){

		$item = new \app\models\Item();
		$items = $item->getAll();
		
		//Gets all of the categorys for the catalog
	 	$category = new \app\models\Category();
	 	$categorys = $category->getAll();

		$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys]);
	}
	//
	public function itemslow(){
		$item = new \app\models\Item();
		$items = $item->lowStock();

		// ??? something here

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

	#[\app\filters\Login]
	public function remove($item_id){
			$item = new \app\models\Item();
			$item = $item->get($item_id);

			$item->delete();
			
			header('location:/Item/index?error=Item deleted');
	}

	public function filterCategory($category_id){
		
		//If no filter is selected
		if($category_id == 'None'){
			
			//Gets all of the products for the catalog
			$item = new \app\models\Item();
	 		$items = $item->getAll();
	 		
	 		//Gets all of the categorys for the catalog
	 		$category = new \app\models\Category();
	 		$categorys = $category->getAll();

			$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys]);
		}else{
			
			//Gets all of the products for the specified category
			$item = new \app\models\Item();
			$items = $item->getAllForCat($category_id);
	 		
	 		//Gets all of the categorys for the catalog
	 		$category = new \app\models\Category();
	 		$categorys = $category->getAll();

			$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys]);
		}
	} 
}