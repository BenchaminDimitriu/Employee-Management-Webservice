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

/*	
	public function getRole($role){
		$SQL = "SELECT role FROM user WHERE username=:username";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]); <----- MAYBE change here for (['role'=>$role]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\User');
		return $STMT->fetch();
	}
*/

	public function updatePassword(){
		$SQL = "UPDATE user SET password_hash=:password_hash WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['password_hash'=>$this->password_hash,
						'user_id'=>$this->user_id]);
	}


}
