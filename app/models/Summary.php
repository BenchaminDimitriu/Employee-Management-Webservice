<?php
namespace app\models;

class Summary extends \app\core\Models{

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

	public function getAll(){
		$SQL = "SELECT * FROM summary ORDER BY `date`, item_name";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Summary');
		return $STMT->fetchAll();
	}
}
