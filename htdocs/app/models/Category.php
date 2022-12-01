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
	
	public function getAll(){
		$SQL = "SELECT category.*, item.qty*item.Sprice as totalP, count(1) as totalS FROM category JOIN item ON item.category_id=category.category_id GROUP BY category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Category');
		return $STMT->fetchAll();
	}

	public function getAllEmpty(){
		$SQL = "SELECT * FROM category";
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
		$SQL = "SELECT * FROM category WHERE name=:name";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['name'=>$name]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Category");
		return $STMT->fetch();
	}

	public function delete(){
		$SQL = "DELETE FROM category WHERE category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['category_id'=>$this->category_id]);
	}	
}