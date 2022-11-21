<?php
namespace app\models;

class Employee extends \app\core\Models{

	//Gets the order for the specific profile
	public function getAll(){
		$SQL = "SELECT * FROM user WHERE role=:role";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['role'=>'employee']);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Employee");
		return $STMT->fetch();
	}	
}