<?php
namespace app\controllers;

class Item extends \app\core\Controller{

	public function index(){

		$item = new \app\models\Item();
		$items = $item->getAll();
		
		//Gets all of the categorys for the catalog
	 	$category = new \app\models\Category();
	 	$categorys = $category->getAllWithItems();

		$item = new \app\models\Item();
	 	$lowStock = $item->getAllLow();

		$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys, 'lowStock'=>$lowStock]);
	}

	#[\app\filters\Login]
	public function add(){
		if(isset($_POST['action'])){
			if($_POST['name'] == "" || $_POST['qty'] == "" || $_POST['Pprice'] == ""  || $_POST['Sprice'] == "" || $_POST['category'] == ""){
				header('location:/Item/index?error=Please enter all info');
			} else{
				
				$category = new \app\models\Category();
	 			$category = $category->getName($_POST['category']);
	 			var_dump($category);
				if($category != null){
					$item = new \app\models\Item();
					$item->item_name = $_POST['name'];
					$item->qty = $_POST['qty'];
					$item->Pprice = $_POST['Pprice'];
					$item->Sprice = $_POST['Sprice'];
					$item->category_id = $category->category_id;

					$item->insert();

					header('location:/Item/index?message=Item Created');
				} else{
					header('location:/Item/index?error=Category does not exist');
				}
			}
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
	 		$categorys = $category->getAllWithItems();

	 		$item = new \app\models\Item();
	 		$lowStock = $item->getAllLow();

			$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys, 'lowStock'=>$lowStock]);
		}else{
			
			//Gets all of the products for the specified category
			$item = new \app\models\Item();
			$items = $item->getAllForCat($category_id);
	 		
	 		//Gets all of the categorys for the catalog
	 		$category = new \app\models\Category();
	 		$categorys = $category->getAllWithItems();

	 		$item = new \app\models\Item();
	 		$lowStock = $item->getAllLow();

			$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys, 'lowStock'=>$lowStock]);
		}
	}
}