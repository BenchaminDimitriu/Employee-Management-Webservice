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
	public function get($user_id){
		$SQL = "SELECT * FROM profile WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\Employee');
		return $STMT->fetch();
	}


	public function insert(){
		$SQL = "INSERT INTO profile (user_id,first_name,last_name,address) VALUES (:user_id, :first_name,:last_name,:address)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id,
						'first_name'=>$this->first_name,
						'last_name'=>$this->last_name,
						'address'=>$this->address]);
		return self::$_connection->lastInsertId();
	}

	public function update(){
		$SQL = "UPDATE profile SET first_name=:first_name, last_name=:last_name,address=:address WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id,
						'first_name'=>$this->first_name,
						'last_name'=>$this->last_name,
						'address'=>$this->address]);
	}

	public function delete(){
		$SQL = "DELETE FROM profile WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id]);

	}


}