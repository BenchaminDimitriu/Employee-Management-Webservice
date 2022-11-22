<?php
namespace app\models;

class Item extends \app\core\Models{

	public function getAll(){
		$SQL = "SELECT * FROM item";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Item');
		return $STMT->fetchAll();
	}

	public function get($item_id){
		$SQL = "SELECT * FROM item WHERE item_id=:item_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_id'=>$item_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Item');
		return $STMT->fetch();
	}

	public function insert(){
		$SQL = "INSERT INTO item(item_name,item_qty,item_Pprice,item_Sprice,item_discount,category_id) VALUES (:item_nane,:item_qty,:item_Pprice,:item_Sprice,:item_discount,:category_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_id'=>$this->item_id,
						'item_name'=>$this->item_name,
						'item_Pprice'=>$this->item_Pprice,
						'item_Sprice'=>$this->item_Sprice,
						'item_discount'=>$this->item_discount,
						'category_id'=>$this->category_id]);
		return self::$_connection->lastInsertId();
	}

	public function delete(){
		$SQL = "DELETE FROM item WHERE item_id=:item_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_id'=>$this->item_id]);
	}	
}