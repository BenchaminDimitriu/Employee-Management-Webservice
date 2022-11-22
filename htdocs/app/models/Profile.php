<?php
namespace app\models;

class Profile extends \app\core\Models{

	public function insert(){
		$SQL = "INSERT INTO profile (user_id) VALUES (:user_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id]);
	}

	public function getUserProfile($user_id){
		$SQL = "SELECT * FROM profile WHERE user_id=:user_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Profile");
		return $STMT->fetch();
	}

	public function getAllUserProfile(){
		$SQL = "SELECT profile.*, user.* FROM profile JOIN user ON profile.user_id = user.user_id WHERE role=:role";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['role'=>'employee']);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Profile");
		return $STMT->fetchAll();
	}

	public function delete(){
		$SQL = "DELETE FROM profile WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id]);
	}
}
