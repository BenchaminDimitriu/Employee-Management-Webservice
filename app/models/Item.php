<?php
namespace app\models;

class Item extends \app\core\Models{
	
	//Used in the controller Item/add: creates an item
	public function insert(){
		$SQL = "INSERT INTO item(item_name, qty, Pprice, Sprice, category_id) VALUES (:item_name, :qty, :Pprice, :Sprice, :category_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_name'=>$this->item_name,
						'qty'=>$this->qty,
						'Pprice'=>$this->Pprice,
						'Sprice'=>$this->Sprice,
						'category_id'=>$this->category_id]);
	}

	//Used in the controller Item/edit: updates the item
	public function update(){
		$SQL = "UPDATE item SET item_name=:item_name, qty=:qty, Pprice=:Pprice, Sprice=:Sprice, category_id=:category_id WHERE item_id=:item_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['item_name'=>$this->item_name,
			'qty'=>$this->qty,
			'Sprice'=>$this->Sprice,
			'Pprice'=>$this->Pprice,
			 'category_id'=>$this->category_id,
			 'item_id'=>$this->item_id]);
	}

	//Used in the controller Item/remove: deletes a item
	public function delete(){
		$SQL = "DELETE FROM item WHERE item_id=:item_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_id'=>$this->item_id]);
	}

	//Used in the controller Item/edit, Item/remove:gets an item
	public function get($item_id){
		$SQL = "SELECT * FROM item WHERE item_id=:item_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_id'=>$item_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Item');
		return $STMT->fetch();
	}

	//Used in the controller Item/index, Item/filterCategory:gets all items
	public function getAll(){
		$SQL = "SELECT item.*, category.name FROM item LEFT JOIN category ON category.category_id = item.category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Item');
		return $STMT->fetchAll();
	}

	//Used in the controller /Category/remove, /Item/filterCategory:gets all items for a category
	public function getAllForCat($category_id){
		$SQL = "SELECT item.*, category.name FROM item JOIN category ON category.category_id = item.category_id WHERE item.category_id=:category_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['category_id'=>$category_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Item');
		return $STMT->fetchAll();
	}

	//Used in the controller Item/index, Item/filterCategory, Category/index, Employee/index, Profile/edit:gets all //item low in stock
	public function getAllLow(){
		$SQL = "SELECT item_name, qty FROM item WHERE qty <= 5";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Item');
		return $STMT->fetchAll();
	}

	
}