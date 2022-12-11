<?php
namespace app\models;

class Category extends \app\core\Models{
	
	//Used in controller Category/add: creates the category
	public function insert(){
		$SQL = "INSERT INTO category (name) VALUES (:name)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['name'=>$this->name]);
	}

	//Used in controller Category/update: updates the category
	public function update(){
		$SQL = "UPDATE category SET name=:name WHERE category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['name'=>$this->name,
			 'category_id'=>$this->category_id]);
	}
	
	//Used in controller Category/remove: deletes the category
	public function delete(){
		$SQL = "DELETE FROM category WHERE category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['category_id'=>$this->category_id]);
	}	

	//Used in controller Item/Index: gets all of the categorys
	public function getAll(){
		$SQL = "SELECT category.* FROM category";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Category');
		return $STMT->fetchAll();
	}

	//Used in Category/index: gets all of the categorys with the number of items and quantity in each
	public function getCats(){
		$SQL = "SELECT category.*, (SELECT SUM(item.qty) FROM item WHERE item.category_id = category.category_id) as totalP, (SELECT count(0) FROM item WHERE item.category_id = category.category_id) as totalS  FROM category LEFT JOIN item ON item.category_id=category.category_id GROUP BY category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Category');
		return $STMT->fetchAll();
	}

	//Used in the controller :gets the category based off of the category id
	public function get($category_id){
		$SQL = "SELECT * FROM category WHERE category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['category_id'=>$category_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Category');
		return $STMT->fetch();
	}

	//Used in the controller : gets the category based off of the name
	public function getName($name){
		//get all records from the owner table
		$SQL = "SELECT * FROM category WHERE name=:name";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['name'=>$name]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Category");
		return $STMT->fetch();
	}
}