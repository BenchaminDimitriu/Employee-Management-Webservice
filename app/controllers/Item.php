<?php
namespace app\controllers;

class Item extends \app\core\Controller{

	
	//Allows the user to be able to view all of the items
	#[\app\filters\Login]
	public function index(){
		//Gets all of the items, categorys, and low items in stock
		$item = new \app\models\Item();
		$items = $item->getAll();
		
		//Gets all of the categorys for the catalog
	 	$category = new \app\models\Category();
	 	$categorys = $category->getAll();

		$item = new \app\models\Item();
	 	$lowStock = $item->getAllLow();

	 	//Verify that the filter by date button is clicked 
	 	if(isset($_POST['action'])){
	 		//Verify that the input feilds are not empty, if so then get all of the modifications
	 		if($_POST['year'] == "" || $_POST['month'] == "" ){
	 			$summary = new \app\models\Summary();
	 			$summary = $summary->getAll();
	 		} else{
	 			//Gets the certain modifications based on the input feild values
				$summary = new \app\models\Summary();
				$summary = $summary->getFilter($_POST['month'], $_POST["year"]);
				header('location:/Item/index?message=Hello World');
			}
	 	} else{
	 		//Gets all of the modifications
	 		$summary = new \app\models\Summary();
	 		$summary = $summary->getAll();
		}

	 	$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys, 'lowStock'=>$lowStock, 'summary'=>$summary]);
	}

	//Allows user to add items
	#[\app\filters\Login]
	public function add(){
		//Verify that the add item button is clicked
		if(isset($_POST['action'])){
	 		//Verify that the input feilds are not empty
			if($_POST['name'] == "" || $_POST['qty'] == "" || $_POST['Pprice'] == ""  || $_POST['Sprice'] == ""){
				header('location:/Item/index?error=Please enter all info');
			} else{
				//Gets the category that the user has selected
				$category = new \app\models\Category();
				$category = $category->get($_POST['category']);

				//Verfiy that the category selected is not null, if not then it sets the item category id 
				if($category != null){
				$item->category_id = $category->category_id;
				}

				//Creates the item
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

	//Allows the user to edit items
	#[\app\filters\Login]
	public function edit($item_id){
		
		//Gets the item to edit
		$item = new \app\models\Item();
	 	$item = $item->get($item_id);

	 	//Verifys that the edit button is clicked
		if(isset($_POST['action'])){
			//Verifys that the input feilds are not empty except for the quantity sold, quantity
			//purchased and category
			if($_POST['name'] == "" || $_POST['purchaseP'] == ""  || $_POST['sellingP'] == ""){
				header('location:/Item/index?error=Please enter all info');
			} else{
				//Gets the category that the user selected
				$category = new \app\models\Category();
	 			$category = $category->get($_POST['category']);
	 			
	 			//Verfiy that the category selected is not null, if not then it sets the item category id 
				if($category != null){
					$item->category_id = $category->category_id;
	 			}

	 			//Sets the item name and the currrent selling price and purchase price
				$item->item_name = $_POST['name'];
				$item->Pprice = $_POST['purchaseP'];
				$item->Sprice = $_POST['sellingP'];

				//Checks if the quantity sold or quantity purchased has a value
				if($_POST['qtyS'] != "" || $_POST['qtyP'] != ""){

					//Creates a summary
					$summary = new \app\models\Summary();

					//Checks if the quantity sold has a value
					if($_POST['qtyS'] != ''){

						//Sets the amount to the string value of quantity sold input and it also sets
						//the summary item name, discount and the rounded version of purchase price
						$summary->amount = "- " . strval($_POST['qtyS']);
						$summary->item_name = $_POST['name']; 
						$summary->discount = $_POST['discount']; 
						$summary->purchaseP = round($_POST['purchaseP'], 2);

						//Checks if there is a discount to be added
						if($_POST['discount'] != ""){
							//Creates the discounted price off of the selling price of the item and
							//sets the summary selling price
							$discountedPrice = $_POST['sellingP'] * ($_POST['discount'] / 100);
							$summary->sellingP = round($_POST['sellingP'] - $discountedPrice, 2); 
						} else{
							//Sets the summary price with no discount
							$summary->sellingP = round($_POST['sellingP'], 2);
						} 

						//Sets the original selling price incase it is every changed for that item,
						//it would not change for this summary, and it sets the user
						$summary->originalSP = $_POST['sellingP'];
						$summary->user = $_SESSION['username'];

						//Checks if the quantity sold - the quantity purchased would make the item quantity less than //zero, if so then it just updates the item and not the quantity
						if(($item->qty - ((int) $_POST['qtyS'] - (int) $_POST['qtyP'])) < 0){
							$item->update();
							header('location:/Item/index?error=Item quantity cannot be below zero');
						} else{
							//Creates the summary and updates the item with the item quantity
							$summary->insert();
							$item->qty = $item->qty - $_POST['qtyS'];
							$item->update();
							header('location:/Item/index?message=Item updated');
						}
					}

					//Checks if the quantity purchased has a value 
					if($_POST['qtyP'] != ''){
						//Gets the values for the summary
						$summary->amount = "+ " . strval($_POST['qtyP']);
						$summary->discount = null; 
						$summary->item_name = $_POST['name'];  
						$summary->originalSP = $_POST['sellingP'];
						$summary->sellingP = null;
						$summary->purchaseP = $_POST['purchaseP']; 
						$summary->user = $_SESSION['username'];

						//Checks if the quantity sold - the quantity purchased would make the item quantity less than //zero and that the current quantity is not less then zero, if so then it just updates the //item and not the quantity
						if(($item->qty - ((int) $_POST['qtyS'] - (int) $_POST['qtyP'])) < 0 && !($item->qty < 0)){
							$item->update();
							header('location:/Item/index?error=Item quantity cannot be below zero');
						} else{
							//Creates the summary and updates the item with the item quantity
							$summary->insert();
							$item->qty = $_POST['qtyP'] + $item->qty;
							$item->update();
							header('location:/Item/index?message=Item updated');
						}
					}
				} else{
					//Updates the item if there are no values for quantity sold or quantity purchased
					$item->update();
					header('location:/Item/index?message=Item updated');
				}
			}
		} else{
	 		//Creates the view and populates it with the item and categorys
		 	$categorys = new \app\models\Category();
		 	$categorys = $categorys->getAll();

			$this->view('Item/edit', ['item'=>$item, 'categorys'=>$categorys]);
		}
	}

	//Allows the user to delete items
	#[\app\filters\Login]
	public function remove($item_id){
		//Gets the item
		$item = new \app\models\Item();
		$item = $item->get($item_id);
		//Verify that the item quantity is at 0 before deleting
		if($item->qty != 0){
			header('location:/Item/index?error=Item still has quantities');
		}else{
			$item->delete();
			header('location:/Item/index?message=Item deleted');
		}		
	}

	//Allows the user to filter the items based on the category
	#[\app\filters\Login]
	public function filterCategory($category_id){
		
		//Verify that the filter by date button is clicked, if so reload the page
		//with the new selling summary
		if(isset($_POST['action'])){
			$this->index();
		} else{
			//If no filter is selected
			if($category_id == 'None'){

				//Gets all of the items, categorys, summary, and low item stock
				$item = new \app\models\Item();
		 		$items = $item->getAll();
		 	} else {

		 		//Gets all of the items for the specified category with the 
				$item = new \app\models\Item();
				$items = $item->getAllForCat($category_id);
		 	}
		 		
	 		$category = new \app\models\Category();
	 		$categorys = $category->getAll();

	 		$item = new \app\models\Item();
	 		$lowStock = $item->getAllLow();

	 		$summary = new \app\models\Summary();
	 		$summary = $summary->getAll();

			$this->view('Item/index', ['item'=>$items, 'categorys'=>$categorys, 'lowStock'=>$lowStock, 'summary'=>$summary]);
		}
	}
}