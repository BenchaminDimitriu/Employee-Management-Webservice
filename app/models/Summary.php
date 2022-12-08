<?php
namespace app\models;

class Summary extends \app\core\Models{

	//Used in the controller Item/edit: creates a summary
	public function insert(){
		$SQL = "INSERT INTO summary(item_name, amount, discount, purchaseP, sellingP, user, originalSP) VALUES (:item_name, :amount, :discount, :purchaseP, :sellingP, :user, :originalSP)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['item_name'=>$this->item_name,
						'amount'=>$this->amount,
						'purchaseP'=>$this->purchaseP,
						'discount'=>$this->discount,
						'sellingP'=>$this->sellingP,
						'originalSP'=>$this->originalSP,
						'user'=>$this->user]);
	}

	//Used in the controller Item/index and Item/filterCategory: gets all of the summarys
	public function getAll(){
		$SQL = "SELECT * FROM summary ORDER BY `date`, item_name";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Summary');
		return $STMT->fetchAll();
	}

	//Used in the controller Item/index: gets all of the summarys between the given month and year 
	public function getFilter($month, $year){
		$SQL = "SELECT * FROM summary WHERE month(`date`)=$month AND year(`date`)=$year ORDER BY `date`, item_name";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Summary');
		return $STMT->fetchAll();
	}
}
