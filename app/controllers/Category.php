<?php
namespace app\controllers;

class Category extends \app\core\Controller{
	
	//Allows the user to view all of the categorys
	#[\app\filters\Login]
	public function index(){
		
		//Populates the view with all of the categorys and the low in stock items for
		//the notifications
		$category = new \app\models\Category();
		$categorys = $category->getCats();

		$item = new \app\models\Item();
	 	$lowStock = $item->getAllLow();

		$this->view('Category/index', ['categorys'=>$categorys, 'lowStock'=>$lowStock]);
	}

	//Allows a user to create a category
	#[\app\filters\Login]
 	public function add(){
		//Verify that the input feild is not empty
		if($_POST['name'] == ''){
			header('location:/Category/index?error=Please enter the category name');
		} else{

			//Verify that the name they typed was not already taken
			$categoryCheck= new \app\models\Category();
			$categoryCheck = $categoryCheck->getName($_POST['name']);

			if($categoryCheck != null){
				header('location:/Category/index?error=Category name already taken');
			} else{

				//Creates the category with the typed name
				$category= new \app\models\Category();
				$category->name = $_POST['name'];
				$category->insert();

				header('location:/Category/index?message=Category was Created');
			}
		}	
	}

	//Allows the user to edit the category
	#[\app\filters\Login]
 	public function edit($category_id){

 		//Sets the name to the correct category_id
 		$name = $_POST['category_id_'.$category_id];

		//Verify if the input feild is not empty
		if($name == ''){
			header('location:/Category/index?error=Category name cannot be blank');
		} else{
			//Verify that the name they typed is not already taken
			$category = new \app\models\Category();
			$category = $category->getName($name);
			if($category){
				header('location:/Category/index?error=Category name already taken');
			} else{
				//Updates the category with the new name
				$categoryName = new \app\models\Category();
				$categoryName->category_id = $category_id;
				$categoryName->name = $name;
				$categoryName->update();

				header('location:/Category/index?message=Category was updated');
			}
		} 		
	}

	//Allows user to delete a category
	#[\app\filters\Login]
	public function remove($category_id){
		//Verify that there are not any items in the category and if thats true then it
		//gets deleted
		$category = new \app\models\Category();
		$category = $category->get($category_id);

		$item = new \app\models\Item();
		$items = $item->getAllForCat($category_id);
		
		if($items != null){
			header('location:/Category/index?error=Cannot delete, still items in category');
		} else{
			$category->delete();
			header('location:/Category/index?error=Category Deleted');
		}	
	} 
}