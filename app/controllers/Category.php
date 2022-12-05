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
			$categoryCheck = $categoryCheck->getName($name);

			if($category != null){
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
 		echo 'hello';
		if($_POST['name'] == 'null'){
			//header('location:/Category/index?error=Category name cannot be blank');
		} else{
			$categorys = new \app\models\Category();
			$categorys = $categorys->getName($_POST['name']);

			if($categorys != null){
			//	header('location:/Category/index?error=Category name already taken');
			} else{
				$category= new \app\models\Category();
				$category = $category->get($category_id);
				$category->name = $_POST['name'];
				$category->update();
			//	header('location:/Category/index?message=Category was updated');
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

	public function populateNav(){
		$item = new \app\models\Item();
	 	$items = $item->getAllLow();
	 	$this->view('nav', $items);
	} 
}