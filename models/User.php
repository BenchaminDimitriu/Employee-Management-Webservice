<?php

namespace Sys_Dev_Project\models;

class User extends \app\core\Models{

	public function get($username){
		$SQL = "SELECT * FROM user WHERE username=:username";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$username]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\models\User');
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
	public function insert(){
		$SQL = "INSERT INTO user(username, password_hash) VALUES (:username, :password_hash)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['username'=>$this->username,
						'password_hash'=>$this->password_hash]);
	}

	public function updatePassword(){
		$SQL = "UPDATE user SET password_hash=:password_hash WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['password_hash'=>$this->password_hash,
						'user_id'=>$this->user_id]);
	}


}
