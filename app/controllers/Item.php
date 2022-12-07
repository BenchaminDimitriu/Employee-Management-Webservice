<?php
namespace app\controllers;

class Item extends \app\core\Controller{

	public function index(){

		$item = new \app\models\Item();
		$items = $item->getAll();
		
		//Gets all of the categorys for the catalog
	 	$category = new \app\models\Category();
	 	$categorys = $category->getAllCat();

		$item = new \app\models\Item();
	 	$lowStock = $item->getAllLow();


	 	if(isset($_POST['action'])){
	 		if($_POST['year'] == "" || $_POST['month'] == "" ){
	 			$summary = new \app\models\Summary();
	 			$summary = $summary->getAll();
	 		} else{
				$summary = new \app\models\Summary();
				$summary = $summary->getFilter($_POST['month'], $_POST["year"]);
			}
	 	} else{
	 		$summary = new \app\models\Summary();
	 		$summary = $summary->getAll();
		}

	 	$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys, 'lowStock'=>$lowStock, 'summary'=>$summary]);
	}

	#[\app\filters\Login]
	public function add(){
		if(isset($_POST['action'])){
			if($_POST['name'] == "" || $_POST['qty'] == "" || $_POST['Pprice'] == ""  || $_POST['Sprice'] == ""){
				header('location:/Item/index?error=Please enter all info');
			} else{
				
				$category = new \app\models\Category();
	 			$category = $category->get($_POST['category']);

	 			if($category != null){
					$item->category_id = $category->category_id;
	 			}

	 			$item = new \app\models\Item();
				$item->item_name = $_POST['name'];
				$item->qty = $_POST['qty'];
				$item->Pprice = $_POST['Pprice'];
				$item->Sprice = $_POST['Sprice'];

				$item->insert();
					header('location:/Item/index?message=Item Created');
				}
			}
	}

	#[\app\filters\Login]
	public function edit($item_id){
		$item = new \app\models\Item();
	 	$item = $item->get($item_id);
	 	
	 	$categorys = new \app\models\Category();
	 	$categorys = $categorys->getAll();


		if(isset($_POST['action'])){
			if($_POST['name'] == "" || $_POST['purchaseP'] == ""  || $_POST['sellingP'] == ""){
				header('location:/Item/index?error=Please enter all info');
			} else{
				
				$category = new \app\models\Category();
	 			$category = $category->get($_POST['category']);
	 			
	 			if($category != null){
					$item->category_id = $category->category_id;
	 			}

				$item->item_name = $_POST['name'];
				$item->Pprice = $_POST['purchaseP'];
				$item->Sprice = $_POST['sellingP'];

				if($_POST['qtyS'] != "" || $_POST['qtyP'] != ""){
					$summary = new \app\models\Summary();
					if($_POST['qtyS'] != ''){
						$summary->amount = "- " . $_POST['qtyS'];
						$summary->item_name = $_POST['name']; 
						$summary->discount = $_POST['discount']; 
						$summary->purchaseP = round($_POST['purchaseP'], 2);
						if($_POST['discount'] != ""){
							$discountedPrice = $_POST['sellingP'] * ($_POST['discount'] / 100);
							$summary->sellingP = round($_POST['sellingP'] - $discountedPrice, 2); 
						} else{
							$summary->sellingP = round($_POST['sellingP'], 2);
						} 
						$summary->originalSP = $_POST['sellingP'];
						$summary->user = $_SESSION['username'];
						
						if(($item->qty - ((int) $_POST['qtyS'] + (int) $_POST['qtyP'])) < 0){
							$item->update();
							header('location:/Item/index?error=Item quantity cannot be below zero');
						} else{
							$summary->insert();
							$item->qty = $item->qty - $_POST['qtyS'];
							$item->update();
							header('location:/Item/index?message=Item updated');
						}
					}
					if($_POST['qtyP'] != ''){
						$summary->amount = "+ " . $_POST['qtyP'];
						$summary->discount = null; 
						$summary->item_name = $_POST['name'];  
						$summary->originalSP = $_POST['sellingP'];
						$summary->sellingP = null;
						$summary->purchaseP = $_POST['purchaseP']; 
						$summary->user = $_SESSION['username'];
						$summary->insert();
						$item->qty = $_POST['qtyP'] + $item->qty;
						$item->update();
						header('location:/Item/index?message=Item updated');
					}
				} else{
					$item->update();
					header('location:/Item/index?message=Item updated');
				}

				echo 'here 1';
			}
		} else{
			$this->view('Item/edit', ['item'=>$item, 'categorys'=>$categorys]);
		}
	}

	#[\app\filters\Login]
	public function remove($item_id){
			$item = new \app\models\Item();
			$item = $item->get($item_id);
			if($item->qty != 0){
				header('location:/Item/index?error=Item still has quantities');
			}else{
				$item->delete();
				header('location:/Item/index?message=Item deleted');
			}
			
	}

	public function filterCategory($category_id){
		
		if(isset($_POST['action'])){
			$this->index();
		} else{
			//If no filter is selected
		if($category_id == 'None'){
			
			//Gets all of the products for the catalog
			$item = new \app\models\Item();
	 		$items = $item->getAll();
	 		
	 		//Gets all of the categorys for the catalog
	 		$category = new \app\models\Category();
	 		$categorys = $category->getAllCat();

	 		$item = new \app\models\Item();
	 		$lowStock = $item->getAllLow();


	 		$summary = new \app\models\Summary();
	 		$summary = $summary->getAll();

			$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys, 'lowStock'=>$lowStock, 'summary'=>$summary]);
		}else{
			
			//Gets all of the products for the specified category
			$item = new \app\models\Item();
			$items = $item->getAllForCat($category_id);
	 		
	 		//Gets all of the categorys for the catalog
	 		$category = new \app\models\Category();
	 		$categorys = $category->getAllCat();

	 		$item = new \app\models\Item();
	 		$lowStock = $item->getAllLow();


	 		$summary = new \app\models\Summary();
	 		$summary = $summary->getAll();

			$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys, 'lowStock'=>$lowStock, 'summary'=>$summary]);
		}
		}
		
	}
}