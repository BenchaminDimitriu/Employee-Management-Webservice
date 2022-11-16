<?php
namespace app\models;

class Item extends \app\core\Models{

	public function getAll(){
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

	public function insert(){
		$SQL = "INSERT INTO category(category_id,category_name,item_id) VALUES (:category_id,:category_name,:item_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['category_id'=>$this->category_id,
						'category_name'=>$this->category_name,
						'item_id'=>$this->item_id]);
		return self::$_connection->lastInsertId();
	}


	

	public function delete(){
		$SQL = "DELETE FROM category WHERE category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['category_id'=>$this->category_id]);
	}	
}