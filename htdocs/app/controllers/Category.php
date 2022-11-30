<?php
namespace app\controllers;

class Category extends \app\core\Controller{
	#[\app\filters\Login]
	public function index(){
		$category = new \app\models\Category();
		$categorys = $category->getAll();

		$this->view('Category/index', ['category'=>$categorys]);
	}

	#[\app\filters\Login]
 	public function add($name){
		if($name == 'null'){
			header('location:/Category/index?error=Please enter the category name');
		} else{
			$category= new \app\models\Category();
			$category = $category->getName($name);

			if($category != null){
				header('location:/Category/index?error=Category name already taken');
			} else{
				$category= new \app\models\Category();
				$category->name = $name;
				$category->insert();

				header('location:/Category/index?message=Category was Created');
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