<?php
namespace app\controllers;

class Category extends \app\core\Controller{

	public function index(){
		$category = new \app\models\Category();
		$categorys = $category->getAll();

		$item = new \app\models\Item();
	 	$lowStock = $item->getAllLow();

		$this->view('Category/index', ['categorys'=>$categorys, 'lowStock'=>$lowStock]);
	}

	#[\app\filters\Login]
 	public function add(){
		if($_POST['name'] == ''){
			header('location:/Category/index?error=Please enter the category name');
		} else{
			$categoryCheck= new \app\models\Category();
			$categoryCheck = $categoryCheck->getName($_POST['name']);

			if($categoryCheck != null){
				header('location:/Category/index?error=Category name already taken');
			} else{
				$category= new \app\models\Category();
				$category->name = $_POST['name'];
				$category->insert();

				header('location:/Category/index?message=Category was Created');
			}
		}	
	}

	#[\app\filters\Login]
 	public function edit($category_id){
			if($_POST['name'] == ''){
				header('location:/Category/index?error=Category name cannot be blank');
			} else{
				$category = new \app\models\Category();
				$category = $category->getName($_POST['name']);

				if($categorys != null){
					header('location:/Category/index?error=Category name already taken');
				} else{
					$category->name = $_POST['name'];
					$category->update();
					header('location:/Category/index?message=Category was updated');
				}
			}	
	}


	#[\app\filters\Login]
	public function remove($category_id){
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