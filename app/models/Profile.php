<?php
namespace app\models;

class Profile extends \app\core\Models{

	//Used in the controller Employee/add: creates a profile for a user
	public function insert(){
		$SQL = "INSERT INTO profile (user_id) VALUES (:user_id)";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$this->user_id]);
	}

	//Used in the controller Profile/edit: used to edit the user profile
	public function update(){
		$SQL = "UPDATE profile SET first_name=:first_name, last_name=:last_name, address=:address WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(
			['first_name'=>$this->first_name, 
			 'last_name'=>$this->last_name, 
			 'address'=>$this->address,
			 'profile_id'=>$this->profile_id]);
	}

	//Used in the controller Employee/remove: deletes the user profile
	public function delete(){
		$SQL = "DELETE FROM profile WHERE profile_id=:profile_id";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['profile_id'=>$this->profile_id]);
	}

	//Used in the controller Employee/index: gets all of the profiles for a user
	public function getAll(){
		$SQL = "SELECT profile.*, user.* FROM profile JOIN user ON profile.user_id = user.user_id WHERE role=:role";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['role'=>'employee']);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Profile");
		return $STMT->fetchAll();
	}

	//Used in the controller Employee/remove: gets a profile for one user
	public function get($user_id){
		$SQL = "SELECT user.username, profile.* FROM profile JOIN user ON user.user_id = profile.user_id WHERE profile.user_id=:user_id ";
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['user_id'=>$user_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS, "app\\models\\Profile");
		return $STMT->fetch();
	}
}
