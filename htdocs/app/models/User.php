<?php
namespace app\models;

class User extends \app\core\Models{

	//needs to connect to the DB - through the Model base class

	public function insert(){
		$SQL = "INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username, 'password_hash'=>$this->password_hash]);
		$user_id = self::$_connection->lastInsertId();
		return $user_id;
	}

	public function get($username){
		//get all records from the owner table
		$SQL = "SELECT * FROM user WHERE username=:username";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\User");
		return $STMT->fetch();
	}

	public function update(){
		$SQL = "UPDATE user SET username=:username, password_hash=:password_hash WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['password_hash'=>$this->password_hash,
						'username'=>$this->username,
						'user_id'=>$this->user_id]);
	}

	public function getUser($user_id){
		$SQL = "SELECT * FROM user WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\User");
		return $STMT->fetch();
	}

	//Deletes a specified product
	public function delete(){
		$SQL = "DELETE FROM user WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id]);
	}
}
