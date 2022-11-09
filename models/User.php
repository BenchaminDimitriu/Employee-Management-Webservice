<?php
namespace Sys_Dev_Project\models;

class User extends \Sys_Dev_Project\core\Models{

	//needs to connect to the DB - through the Model base class

	public function insert(){
		$SQL = "INSERT INTO user(username, password_hash, role) VALUES (:username, :password_hash, :role)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username, 'password_hash'=>$this->password_hash, 'role'=>$this->role]);
		$user_id = self::$_connection->lastInsertId();
		return $user_id;
	}

	public function get($username){
		//get all records from the owner table
		$SQL = "SELECT * FROM user WHERE username LIKE :username";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);//pass any data for the query
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "Sys_Dev_Project\\models\\User");
		return $STMT->fetch();
	}
}