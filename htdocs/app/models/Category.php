<?php
namespace app\models;

class Category extends \app\core\Models{
	
	public function insert(){
		$SQL = "INSERT INTO category (name) VALUES (:name)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['name'=>$this->name]);
	}

	public function update(){
		$SQL = "UPDATE category SET name=:name WHERE category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['name'=>$this->_name,
			 'category_id'=>$this->category_id]);
	}
		//Used in Item Index
	public function getAllWithItems(){
		$SQL = "SELECT category.* FROM category JOIN item ON item.category_id=category.category_id GROUP BY category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Category');
		return $STMT->fetchAll();
	}

	//Used for Category Index
	public function getAll(){
		$SQL = "SELECT category.*, (SELECT SUM(item.qty) FROM item WHERE item.category_id = category.category_id) as totalP, (SELECT count(0) FROM item WHERE item.category_id = category.category_id) as totalS  FROM category LEFT JOIN item ON item.category_id=category.category_id GROUP BY category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Category');
		return $STMT->fetchAll();
	}


	public function get($category_id){
		$SQL = "SELECT * FROM category WHERE category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['category_id'=>$category_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Category');
		return $STMT->fetch();
	}

	public function getName($name){
		//get all records from the owner table
		$SQL = "SELECT * FROM category WHERE name LIKE '$name' ";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Category");
		return $STMT->fetch();
	}

	public function delete(){
		$SQL = "DELETE FROM category WHERE category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['category_id'=>$this->category_id]);
	}	
}